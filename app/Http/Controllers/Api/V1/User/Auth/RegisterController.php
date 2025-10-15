<?php

namespace App\Http\Controllers\Api\V1\User\Auth;

use Exception;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Traits\User\RegisteredUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Providers\Admin\BasicSettingsProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

class RegisterController extends Controller
{
    use RegistersUsers, RegisteredUsers;

    protected $basic_settings;

    public function __construct()
    {
        $this->basic_settings = BasicSettingsProvider::get();
    }
    
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {

        $validator = $this->validator($request->all());
        if($validator->fails()) {
            return Response::error($validator->errors()->all(),[]);
        }

        $validated = $validator->validate();
        $basic_settings             = $this->basic_settings;

        $validated['email_verified']    = ($basic_settings->email_verification == true) ? false : true;
        $validated['sms_verified']      = ($basic_settings->sms_verification == true) ? false : true;
        $validated['kyc_verified']      = ($basic_settings->kyc_verification == true) ? false : true;
        $validated['password']          = Hash::make($validated['password']);
        $validated['username']          = make_username($validated['firstname'],$validated['lastname']);
        // $validated['referral_id']       = generate_unique_string('users','referral_id',8,'number');

        if(User::where("username",$validated['username'])->exists()) return Response::error([__('User already exists!')],[],400);

        try{
            event(new Registered($user = $this->create($validated)));
        }catch(Exception $e) {
            return Response::error([__('Registration failed! Please try again')],[],500);
        }

        // get user with all information
        try{
            $user = User::find($user->id);
        }catch(Exception $e) {
            return Response::error([__('Failed to fetch user information. Please try again')],[],500);
        }

        try{
            $token = $user->createToken("auth_token")->accessToken;
        }catch(Exception $e) {
            return Response::error([__('Failed to generate user token! Please try again')],[],500);
        }

        return $this->registered($request, $user, $token);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data) {

        $basic_settings = $this->basic_settings;
        $password_rule = "required|string|min:6";
        if($basic_settings->secure_password) {
            $password_rule = ["required",Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()];
        }

        return Validator::make($data,[
            'firstname'     => 'required|string|max:60',
            'lastname'      => 'required|string|max:60',
            'email'         => 'required|string|email|max:150|unique:users,email',
            'password'      => $password_rule,
            'refer'         => 'sometimes|nullable|string|exists:users,referral_id',
        ]);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard("api");
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create($data);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user, $token)
    {
        try{
            $mail_response = [];
            if($user->email_verified == false) {
                $mail_response = AuthorizationController::sendCodeToMail($user);
            }
        }catch(Exception $e) {
            $user->delete();
            return Response::error([$e->getMessage()],[],500);
        }

        try{
            $this->createUserWallets($user);
        }catch(Exception $e) {
            $this->guard()->logout();
            $user->delete();
            return Response::error([__('Registration Failed! Something went wrong! Please try again')],[],500);
        }

        return Response::success([__('User successfully registered')],[
            'token'         => $token,
            'user_info'     => $user->only([
                'id',
                'firstname',
                'lastname',
                'fullname',
                'username',
                'email',
                'mobile_code',
                'mobile',
                'full_mobile',
                'email_verified',
                'kyc_verified',
                'two_factor_verified',
                'two_factor_status',
                'two_factor_secret',
            ]),
            'authorization' => [
                'status'    => count($mail_response) > 0 ? true : false,
                'token'     => $mail_response['token'] ?? "",
            ],
        ],200);
    }
}

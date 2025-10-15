<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BasicSettings;
use App\Notifications\Admin\SendTestMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;

class SetupEmailController extends Controller
{

    /**
     * Displpay The Email Configuration Page
     *
     * @return view
     */
    public function configuration() {
        $page_title = "Email Method";
        $email_config = BasicSettings::first()->mail_config;
        return view('admin.sections.setup-email.config',compact(
            'page_title',
            'email_config',
        ));
    }


    /**
     * Display The Email Default Template Page
     *
     * @return view
     */
    public function defaultTemplate() {
        $page_title = "Default Template";
        return view('admin.sections.setup-email.default-template',compact(
            'page_title',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator                  = Validator::make($request->all(),[
            'method'                => 'required|string|in:smtp,php,mailgun|max:20',
            'host'                  => 'required_if:method,smtp|string|max:255',
            'port'                  => 'required_if:method,smtp|numeric',
            'encryption'            => 'required_if:method,smtp|string|in:ssl,tls,auto|max:15',
            'username'              => 'required_if:method,smtp|string|max:250',
            'password'              => 'required_if:method,smtp|string|max:250',
            'from_address'          => 'required_if:method,smtp|string|max:250',

            'mailgun_host'          => 'nullable|required_if:method,mailgun|string|max:255',
            'mailgun_port'          => 'nullable|required_if:method,mailgun|numeric',
            'mailgun_encryption'    => 'nullable|required_if:method,mailgun|string|in:ssl,tls,auto|max:15',
            'mailgun_username'      => 'nullable|required_if:method,mailgun|string|max:250',
            'mailgun_password'      => 'nullable|required_if:method,mailgun|string|max:250',
            'mailgun_from_address'  => 'nullable|required_if:method,mailgun|string|max:250',
            'mailgun_domain'        => 'nullable|required_if:method,mailgun|string|max:250',
            'mailgun_secret'        => 'nullable|required_if:method,mailgun|string|max:250',
        ]);

        $validated = $validator->validate();

        $basic_settings = BasicSettings::first();
        if(!$basic_settings) {
            return back()->with(['error' => ['Basic settings not found!']]);
        }

        // Make object of email template
        if($validated['method'] == "smtp") {
            $data = [
                'method'            => $validated['method'] ?? false,
                'host'              => $validated['host'] ?? false,
                'port'              => $validated['port'] ?? false,
                'encryption'        => $validated['encryption'] ?? false,
                'username'          => $validated['username'] ?? false,
                'password'          => $validated['password'] ?? false,
                'from'              => $validated['from_address'] ?? false,
                'app_name'          => $basic_settings['site_name'] ?? env("APP_NAME"),
            ];
        }else if($validated['method'] == "mailgun") {
            $data = [
                'method'                => $validated['method'] ?? false,
                'mailgun_host'          => $validated['mailgun_host'] ?? false,
                'mailgun_port'          => $validated['mailgun_port'] ?? false,
                'mailgun_encryption'    => $validated['mailgun_encryption'] ?? false,
                'mailgun_username'      => $validated['mailgun_username'] ?? false,
                'mailgun_password'      => $validated['mailgun_password'] ?? false,
                'mailgun_from_address'  => $validated['mailgun_from_address'] ?? false,
                'app_name'              => $basic_settings['site_name'] ?? env("APP_NAME"),
                'mailgun_domain'        => $validated['mailgun_domain'],
                'mailgun_secret'        => $validated['mailgun_secret'],
            ];
        }else {
            $data = [];
        }

        try{
            $basic_settings->update([
                'mail_config'       => $data,
            ]);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went worng! Please try again.']]);
        }


        if($validated['method'] == 'mailgun') {
            $env_modify_keys = [
                "MAIL_MAILER"       => $data['method'],
                "MAIL_HOST"         => $data['mailgun_host'],
                "MAIL_PORT"         => $data['mailgun_port'],
                "MAIL_USERNAME"     => $data['mailgun_username'],
                "MAIL_PASSWORD"     => $data['mailgun_password'],
                "MAIL_ENCRYPTION"   => $data['mailgun_encryption'],
                "MAIL_FROM_ADDRESS" => $data['mailgun_from_address'],
                "MAIL_FROM_NAME"    => $data['app_name'],
            ];
            $env_modify_keys['MAILGUN_DOMAIN']  = $data['mailgun_domain'];
            $env_modify_keys['MAILGUN_SECRET']  = $data['mailgun_secret'];
        }else {
            $env_modify_keys = [
                "MAIL_MAILER"       => $data['method'],
                "MAIL_HOST"         => $data['host'],
                "MAIL_PORT"         => $data['port'],
                "MAIL_USERNAME"     => $data['username'],
                "MAIL_PASSWORD"     => $data['password'],
                "MAIL_ENCRYPTION"   => $data['encryption'],
                "MAIL_FROM_ADDRESS" => $data['from'],
                "MAIL_FROM_NAME"    => $data['app_name'],
            ];
            $env_modify_keys['MAILGUN_DOMAIN']  = "";
            $env_modify_keys['MAILGUN_SECRET']  = "";
        }

        try{
            modifyEnv($env_modify_keys);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went worng! Please try again.']]);
        }

        return back()->with(['success' => ['Information updated successfully!']]);
    }


    public function sendTestMail(Request $request) {
        $validator = Validator::make($request->all(),[
            'email'         => 'required|string|email',
        ]);

        $validated = $validator->validate();

        try{
            Notification::route('mail',$validated['email'])->notify(new SendTestMail());
        }catch(Exception $e) {
            dd($e);
            return back()->with(['error' => ['Something went worng! Please try again.']]);
        }

        return back()->with(['success' => ['Email send successfully!']]);
    }
}

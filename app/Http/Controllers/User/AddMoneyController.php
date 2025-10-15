<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Models\UserWallet;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TemporaryData;
use App\Constants\GlobalConst;
use App\Models\Admin\Currency;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\BasicSettings;
use App\Http\Controllers\Controller;
use App\Models\Admin\PaymentGateway;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Constants\PaymentGatewayConst;
use App\Models\Admin\CryptoTransaction;
use App\Traits\ControlDynamicInputFields;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\PaymentGatewayCurrency;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use App\Http\Helpers\PaymentGateway as PaymentGatewayHelper;


class AddMoneyController extends Controller
{
    use ControlDynamicInputFields;

    public function index() {

        $page_title = "Add Money";
        $user_wallets = UserWallet::auth()->get();
        $user_currencies = Currency::whereIn('id',$user_wallets->pluck('currency_id')->toArray())->get();

        $payment_gateways = PaymentGateway::addMoney()->active()->with('currencies')->has("currencies")->get();

        // return view('user.sections.add-money.index',compact('page_title','payment_gateways'));
    }

    public function submit(Request $request, PaymentGatewayCurrency $gateway_currency) {

        $validated = Validator::make($request->all(),[
            'amount'            => 'required|numeric|gt:0',
            'gateway_currency'  => 'required|string|exists:'.$gateway_currency->getTable().',alias',
        ])->validate();
        $request->merge(['currency' => $validated['gateway_currency']]);

        try{
            $instance = PaymentGatewayHelper::init($request->all())->type(PaymentGatewayConst::TYPEADDMONEY)->setProjectCurrency(PaymentGatewayConst::PROJECT_CURRENCY_MULTIPLE)->gateway()->render();

            if($instance instanceof RedirectResponse === false && isset($instance['gateway_type']) && $instance['gateway_type'] == PaymentGatewayConst::MANUAL) {
                $manual_handler = $instance['distribute'];
                return $this->$manual_handler($instance);
            }
        }catch(Exception $e) {
            return back()->with(['error' => [$e->getMessage()]]);
        }
        return $instance;
    }

    public function success(Request $request, $gateway){
        try{
            $token = PaymentGatewayHelper::getToken($request->all(),$gateway);
            $temp_data = TemporaryData::where("type",PaymentGatewayConst::TYPEADDMONEY)->where("identifier",$token)->first();

            if(Transaction::where('callback_ref', $token)->exists()) {
                if(!$temp_data) return redirect()->route('user.add.money.index')->with(['success' => ['Transaction request sended successfully!']]);;
            }else {
                if(!$temp_data) return redirect()->route('user.add.money.index')->with(['error' => ['Transaction failed. Record didn\'t saved properly. Please try again.']]);
            }

            $update_temp_data = json_decode(json_encode($temp_data->data),true);
            $update_temp_data['callback_data']  = $request->all();
            $temp_data->update([
                'data'  => $update_temp_data,
            ]);
            $temp_data = $temp_data->toArray();
            $instance = PaymentGatewayHelper::init($temp_data)->type(PaymentGatewayConst::TYPEADDMONEY)->setProjectCurrency(PaymentGatewayConst::PROJECT_CURRENCY_SINGLE)->responseReceive();
            if($instance instanceof RedirectResponse) return $instance;
        }catch(Exception $e) {
            return back()->with(['error' => [$e->getMessage()]]);
        }
        return redirect()->route("user.add.money.index")->with(['success' => ['Successfully added money']]);
    }

    public function cancel(Request $request, $gateway) {

        $token = PaymentGatewayHelper::getToken($request->all(),$gateway);

        if($temp_data = TemporaryData::where("type",PaymentGatewayConst::TYPEADDMONEY)->where("identifier",$token)->first()) {
            $temp_data->delete();
        }

        return redirect()->route('user.add.money.index');
    }

    public function postSuccess(Request $request, $gateway)
    {
        try{
            $token = PaymentGatewayHelper::getToken($request->all(),$gateway);
            $temp_data = TemporaryData::where("type",PaymentGatewayConst::TYPEADDMONEY)->where("identifier",$token)->first();
            Auth::guard($temp_data->data->creator_guard)->loginUsingId($temp_data->data->creator_id);
        }catch(Exception $e) {
            return redirect()->route('frontend.index');
        }

        return $this->success($request, $gateway);
    }

    public function postCancel(Request $request, $gateway)
    {
        try{
            $token = PaymentGatewayHelper::getToken($request->all(),$gateway);
            $temp_data = TemporaryData::where("type",PaymentGatewayConst::TYPEADDMONEY)->where("identifier",$token)->first();
            Auth::guard($temp_data->data->creator_guard)->loginUsingId($temp_data->data->creator_id);
        }catch(Exception $e) {
            return redirect()->route('frontend.index');
        }

        return $this->cancel($request, $gateway);
    }

    public function callback(Request $request,$gateway) {

        $callback_token = $request->get('token');
        $callback_data = $request->all();

        try{
            PaymentGatewayHelper::init([])->type(PaymentGatewayConst::TYPEADDMONEY)->setProjectCurrency(PaymentGatewayConst::PROJECT_CURRENCY_SINGLE)->handleCallback($callback_token,$callback_data,$gateway);
        }catch(Exception $e) {
            // handle Error
            logger($e);
        }
    }

    public function handleManualPayment($payment_info) {

        // Insert temp data
        $data = [
            'type'          => PaymentGatewayConst::TYPEADDMONEY,
            'identifier'    => generate_unique_string("temporary_datas","identifier",16),
            'data'          => [
                'gateway_currency_id'    => $payment_info['currency']->id,
                'amount'                 => $payment_info['amount'],
                'wallet_id'              => $payment_info['wallet']->id,
            ],
        ];

        try{
            TemporaryData::create($data);
        }catch(Exception $e) {
            return redirect()->route('user.add.money.index')->with(['error' => ['Failed to save data. Please try again']]);
        }
        return redirect()->route('user.add.money.manual.form',$data['identifier']);
    }

    public function showManualForm($token) {
        $tempData = TemporaryData::search($token)->first();
        if(!$tempData || $tempData->data == null || !isset($tempData->data->gateway_currency_id)) return redirect()->route('user.add.money.index')->with(['error' => ['Invalid request']]);
        $gateway_currency = PaymentGatewayCurrency::find($tempData->data->gateway_currency_id);
        if(!$gateway_currency || !$gateway_currency->gateway->isManual()) return redirect()->route('user.add.money.index')->with(['error' => ['Selected gateway is invalid']]);
        $gateway = $gateway_currency->gateway;
        if(!$gateway->input_fields || !is_array($gateway->input_fields)) return redirect()->route('user.add.money.index')->with(['error' => ['This payment gateway is under constructions. Please try with another payment gateway']]);
        $amount = $tempData->data->amount;

        $page_title = "Payment Instructions";
        // return view('user.sections.add-money.manual.instruction',compact("gateway","page_title","token","amount"));
    }

    public function manualSubmit(Request $request,$token) {
        $request->merge(['identifier' => $token]);
        $tempDataValidate = Validator::make($request->all(),[
            'identifier'        => "required|string|exists:temporary_datas",
        ])->validate();

        $tempData = TemporaryData::search($tempDataValidate['identifier'])->first();
        if(!$tempData || $tempData->data == null || !isset($tempData->data->gateway_currency_id)) return redirect()->route('user.add.money.index')->with(['error' => ['Invalid request']]);
        $gateway_currency = PaymentGatewayCurrency::find($tempData->data->gateway_currency_id);
        if(!$gateway_currency || !$gateway_currency->gateway->isManual()) return redirect()->route('user.add.money.index')->with(['error' => ['Selected gateway is invalid']]);
        $gateway = $gateway_currency->gateway;
        $amount = $tempData->data->amount ?? null;
        if(!$amount) return redirect()->route('user.add.money.index')->with(['error' => ['Transaction Failed. Failed to save information. Please try again']]);
        $wallet = UserWallet::find($tempData->data->wallet_id ?? null);
        if(!$wallet) return redirect()->route('user.add.money.index')->with(['error' => ['Your wallet is invalid!']]);

        $this->file_store_location = "transaction";
        $dy_validation_rules = $this->generateValidationRules($gateway->input_fields);

        $validated = Validator::make($request->all(),$dy_validation_rules)->validate();
        $get_values = $this->placeValueWithFields($gateway->input_fields,$validated);

        // Make Transaction
        DB::beginTransaction();
        try{
            $id = DB::table("transactions")->insertGetId([
                'type'                          => PaymentGatewayConst::TYPEADDMONEY,
                'trx_id'                        => generate_unique_string('transactions','trx_id',16),
                'user_type'                     => GlobalConst::USER,
                'user_id'                       => $wallet->user->id,
                'wallet_id'                     => $wallet->id,
                'payment_gateway_currency_id'   => $gateway_currency->id,
                'request_amount'                => $amount->requested_amount,
                'request_currency'              => $wallet->currency->code,
                'exchange_rate'                 => $gateway_currency->rate,
                'percent_charge'                => $amount->percent_charge,
                'fixed_charge'                  => $amount->fixed_charge,
                'total_charge'                  => $amount->total_charge,
                'total_payable'                 => $amount->total_amount,
                'receive_amount'                => $amount->will_get,
                'receiver_type'                 => GlobalConst::USER,
                'receiver_id'                   => $wallet->user->id,
                'available_balance'             => $wallet->balance,
                'payment_currency'              => $gateway_currency->currency_code,
                'details'                       => json_encode(['input_values' => $get_values]),
                'status'                        => PaymentGatewayConst::STATUSPENDING,
                'created_at'                    => now(),
            ]);

            DB::table("temporary_datas")->where("identifier",$token)->delete();
            DB::commit();
        }catch(Exception $e) {
            DB::rollBack();
            return redirect()->route('user.add.money.manual.form',$token)->with(['error' => ['Something went wrong! Please try again']]);
        }
        return redirect()->route('user.add.money.index')->with(['success' => ['Transaction Success. Please wait for admin confirmation']]);
    }

    public function cryptoPaymentAddress(Request $request, $trx_id) {

        $page_title = "Crypto Payment Address";
        $transaction = Transaction::where('trx_id', $trx_id)->firstOrFail();

        if($transaction->gateway_currency->gateway->isCrypto() && $transaction->details?->payment_info?->receiver_address ?? false) {
            return view('user.sections.add-money.payment.crypto.address', compact(
                'transaction',
                'page_title',
            ));
        }

        return abort(404);
    }

    public function cryptoPaymentConfirm(Request $request, $trx_id)
    {
        $transaction = Transaction::where('trx_id',$trx_id)->where('status', PaymentGatewayConst::STATUSWAITING)->firstOrFail();

        $dy_input_fields = $transaction->details->payment_info->requirements ?? [];
        $validation_rules = $this->generateValidationRules($dy_input_fields);

        $validated = [];
        if(count($validation_rules) > 0) {
            $validated = Validator::make($request->all(), $validation_rules)->validate();
        }

        if(!isset($validated['txn_hash'])) return back()->with(['error' => ['Transaction hash is required for verify']]);

        $receiver_address = $transaction->details->payment_info->receiver_address ?? "";

        // check hash is valid or not
        $crypto_transaction = CryptoTransaction::where('txn_hash', $validated['txn_hash'])
                                                ->where('receiver_address', $receiver_address)
                                                ->where('asset',$transaction->gateway_currency->currency_code)
                                                ->where(function($query) {
                                                    return $query->where('transaction_type',"Native")
                                                                ->orWhere('transaction_type', "native");
                                                })
                                                ->where('status',PaymentGatewayConst::NOT_USED)
                                                ->first();

        if(!$crypto_transaction) return back()->with(['error' => ['Transaction hash is not valid! Please input a valid hash']]);

        if($crypto_transaction->amount >= $transaction->total_payable == false) {
            if(!$crypto_transaction) return back()->with(['error' => ['Insufficient amount added. Please contact with system administrator']]);
        }

        DB::beginTransaction();
        try{

            // Update user wallet balance
            DB::table($transaction->creator_wallet->getTable())
                ->where('id',$transaction->creator_wallet->id)
                ->increment('balance',$transaction->receive_amount);

            // update crypto transaction as used
            DB::table($crypto_transaction->getTable())->where('id', $crypto_transaction->id)->update([
                'status'        => PaymentGatewayConst::USED,
            ]);

            // update transaction status
            $transaction_details = json_decode(json_encode($transaction->details), true);
            $transaction_details['payment_info']['txn_hash'] = $validated['txn_hash'];

            DB::table($transaction->getTable())->where('id', $transaction->id)->update([
                'details'       => json_encode($transaction_details),
                'status'        => PaymentGatewayConst::STATUSSUCCESS,
            ]);

            DB::commit();

        }catch(Exception $e) {
            DB::rollback();
            return back()->with(['error' => ['Something went wrong! Please try again']]);
        }

        return back()->with(['success' => ['Payment Confirmation Success!']]);
    }

    public function redirectUsingHTMLForm(Request $request, $gateway)
    {
        $temp_data = TemporaryData::where('identifier', $request->token)->first();
        if(!$temp_data || $temp_data->data->action_type != PaymentGatewayConst::REDIRECT_USING_HTML_FORM) return back()->with(['error' => ['Request token is invalid!']]);
        $redirect_form_data = $temp_data->data->redirect_form_data;
        $action_url         = $temp_data->data->action_url;
        $form_method        = $temp_data->data->form_method;

        return view('payment-gateway.redirect-form', compact('redirect_form_data', 'action_url', 'form_method'));
    }

    /**
     * Redirect Users for collecting payment via Button Pay (JS Checkout)
     */
    public function redirectBtnPay(Request $request, $gateway)
    {
        try{
            return PaymentGatewayHelper::init([])->setProjectCurrency(PaymentGatewayConst::PROJECT_CURRENCY_SINGLE)->handleBtnPay($gateway, $request->all());
        }catch(Exception $e) {
            return redirect()->route('user.add.money.index')->with(['error' => [$e->getMessage()]]);
        }
    }

    /**
     * Method for view authorize card view page
     * @param Illuminate\Http\Request $request,$identifier
     */
    public function authorizeCardInfo(Request $request,$identifier){
        $page_title         = "Authorize card infomation";
        $temp_data          = TemporaryData::where('identifier',$identifier)->first();

        return view('user.sections.add-money.automatic.authorize',compact(
            'page_title',
            'temp_data'
        ));
    }
    /**
     * Method function authorize payment submit
     * @param Illuminate\Http\Request $request, $identifier
     */
    public function authorizePaymentSubmit(Request $request,$identifier){
        $temp_data          = TemporaryData::where('identifier',$identifier)->first();
        if(!$temp_data) return back()->with(['error' => ['Sorry ! Data not found.']]);

        $validator          = Validator::make($request->all(),[
            'card_number'   => 'required',
            'date'          => 'required',
            'code'          => 'required'
        ]);

        if($validator->fails()) return back()->withErrors($validator)->withInput($request->all());
        $validated          = $validator->validate();

        $gateway_credentials          = $this->authorizeCredentials($temp_data);
        $basic_settings               = BasicSettings::first();

        $validated['card_number']     = str_replace(' ', '', $validated['card_number']);

        $convert_date   = explode('/', $validated['date']);
        $month          = $convert_date[1];
        $year           = $convert_date[0];

        $current_year   = substr(date('Y'), 0, 2);
        $full_year      = $current_year . $year;

        $validated['date'] = $full_year . '-' . $month;

        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName($gateway_credentials->app_login_id);
        $merchantAuthentication->setTransactionKey($gateway_credentials->transaction_key);
        $amount = $temp_data->data->amount->total_amount;


        // Set the transaction's refId
        $refId = 'ref' . time();

        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();

        $creditCard->setCardNumber($validated['card_number']);
        $creditCard->setExpirationDate($validated['date']);
        $creditCard->setCardCode($validated['code']);


        // Add the payment data to a paymentType object
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        $generate_invoice_number        = generate_random_string_number(10) . time();

        // Create order information
        $order = new AnetAPI\OrderType();
        $order->setInvoiceNumber($generate_invoice_number);
        $order->setDescription("Add Money");

        // Set the customer's Bill To address
        $customerAddress = new AnetAPI\CustomerAddressType();
        $customerAddress->setFirstName(auth()->user()->firstname);
        $customerAddress->setLastName(auth()->user()->lastname);
        $customerAddress->setCompany($basic_settings->site_name);
        $customerAddress->setAddress(auth()->user()->address->address);
        $customerAddress->setCity(auth()->user()->address->city);
        $customerAddress->setState(auth()->user()->address->state);
        $customerAddress->setZip(auth()->user()->address->zip);
        $customerAddress->setCountry(auth()->user()->address->country);

        $make_customer_id       = auth()->user()->id . $gateway_credentials->code;
        // Set the customer's identifying information
        $customerData = new AnetAPI\CustomerDataType();
        $customerData->setType("individual");
        $customerData->setId($make_customer_id);
        $customerData->setEmail(auth()->user()->email);

        // Add values for transaction settings
        $duplicateWindowSetting = new AnetAPI\SettingType();
        $duplicateWindowSetting->setSettingName("duplicateWindow");
        $duplicateWindowSetting->setSettingValue("60");

        // Add some merchant defined fields. These fields won't be stored with the transaction,
        // but will be echoed back in the response.
        // $merchantDefinedField1 = new AnetAPI\UserFieldType();
        // $merchantDefinedField1->setName("customerLoyaltyNum");
        // $merchantDefinedField1->setValue("1128836273");

        // $merchantDefinedField2 = new AnetAPI\UserFieldType();
        // $merchantDefinedField2->setName("favoriteColor");
        // $merchantDefinedField2->setValue("blue");

        // Create a TransactionRequestType object and add the previous objects to it
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($amount);
        $transactionRequestType->setOrder($order);
        $transactionRequestType->setPayment($paymentOne);
        $transactionRequestType->setBillTo($customerAddress);
        $transactionRequestType->setCustomer($customerData);
        $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
        // $transactionRequestType->addToUserFields($merchantDefinedField1);
        // $transactionRequestType->addToUserFields($merchantDefinedField2);

        // Assemble the complete transaction request
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest($transactionRequestType);


        // Create the controller and get the response
        $controller = new AnetController\CreateTransactionController($request);

        if($gateway_credentials->mode == GlobalConst::ENV_SANDBOX){
            $environment = \net\authorize\api\constants\ANetEnvironment::SANDBOX;

        }else{
            $environment = \net\authorize\api\constants\ANetEnvironment::PRODUCTION;
        }
        $response   = $controller->executeWithApiResponse($environment);
        if ($response != null) {
            // Check to see if the API request was successfully received and acted upon
            if ($response->getMessages()->getResultCode() == "Ok") {
                // Since the API request was successful, look for a transaction response
                // and parse it to display the results of authorizing the card
                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getMessages() != null) {
                    $trx_id = generate_unique_string("transactions","trx_id",16);
                    $status = PaymentGatewayConst::STATUSSUCCESS;
                    dd($tresponse);
                    // $inserted_id = $this->createTransactionAuthorize($trx_id,$temp_data,$status);
                    // $this->insertChargesAuthorize($temp_data,$inserted_id);
                    // $this->insertDeviceAuthorize($inserted_id);
                    // $this->sendAuthorizeNotifications($temp_data,$trx_id);
                    // $this->removeTempData($temp_data);
                    return redirect()->route('user.add.money.index')->with(['success' => ['Successfully Added Money']]);
                }else {
                    return redirect()->route('user.add.money.index')->with(['error' => ['Transaction Failed']]);
                    if ($tresponse->getErrors() != null) {
                        return redirect()->route('user.add.money.index')->with(['error' => [$tresponse->getErrors()[0]->getErrorText()]]);
                    }
                }
            }else {
                return redirect()->route('user.add.money.index')->with(['error' => ['Transaction Failed']]);
                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getErrors() != null) {
                    return redirect()->route('user.add.money.index')->with(['error' => [$tresponse->getErrors()[0]->getErrorText()]]);
                } else {
                    return redirect()->route('user.add.money.index')->with(['error' => [$response->getMessages()->getMessage()[0]->getText()]]);
                }
            }
        }else {
            return redirect()->route('user.add.money.index')->with(['error' => ['No response returned']]);
        }


    }
    // For get the gateway credentials
    function authorizeCredentials($temp_data){
        $gateway             = PaymentGateway::where('id',$temp_data->data->gateway)->first() ?? null;
        if(!$gateway) throw new Exception(__("Payment gateway not available"));
        $credentials         = $gateway->credentials;
        $app_login_id        = getPaymentCredentials($credentials,'App Login ID');
        $transaction_key     = getPaymentCredentials($credentials,'Transaction Key');
        $signature_key       = getPaymentCredentials($credentials,'Signature Key');

        $mode           = $gateway->env;

        $authorize_register_mode = [
            PaymentGatewayConst::ENV_SANDBOX => "sandbox",
            PaymentGatewayConst::ENV_PRODUCTION => "live",
        ];
        if(array_key_exists($mode,$authorize_register_mode)) {
            $mode = $authorize_register_mode[$mode];
        }else {
            $mode = "sandbox";
        }

        return (object) [
            'app_login_id'          => $app_login_id,
            'transaction_key'       => $transaction_key,
            'signature_key'         => $signature_key,
            'mode'                  => $mode,
            'code'                  => $gateway->code
        ];
    }
    // Fro insert data in db
    function createTransactionAuthorize($trx_id,$temp_data,$status){
        $trx_id = $trx_id;
        DB::beginTransaction();
        try{

            $user_id = auth()->user()->id;
            $wallet  = UserWallet::where('id',$temp_data->data->wallet_id)->first();
            $gateway = PaymentGateway::where('id',$temp_data->data->gateway)->first();

            $id = DB::table("transactions")->insertGetId([
                'type'                          => PaymentGatewayConst::TYPEADDMONEY,
                'trx_id'                        => $trx_id,
                'user_type'                     => GlobalConst::USER,
                'user_id'                       => $user_id,
                'user_wallet_id'                => $temp_data->data->wallet_id,
                'payment_gateway_currency_id'   => $temp_data->data->currency,
                'request_amount'                => $temp_data->data->amount->requested_amount,
                'request_currency'              => $wallet->currency->code,
                'exchange_rate'                 => $temp_data->data->amount->exchange_rate,
                'percent_charge'                => $temp_data->data->amount->percent_charge,
                'fixed_charge'                  => $temp_data->data->amount->fixed_charge,
                'total_charge'                  => $temp_data->data->amount->total_charge,
                'total_payable'                 => $temp_data->data->amount->total_amount,
                'receive_amount'                => $temp_data->data->amount->will_get,
                'receiver_type'                 => GlobalConst::USER,
                'receiver_id'                   => $user_id,
                'available_balance'             => $wallet->balance + $temp_data->data->amount->requested_amount,
                'payment_currency'              => $temp_data->data->amount->sender_cur_code,
                'remark'                        => ucwords(remove_speacial_char(PaymentGatewayConst::TYPEADDMONEY," ")) . " With " . $gateway->name,
                'details'                       => PaymentGatewayConst::AUTHORIZE." payment successful",
                'status'                        => $status,
                'created_at'                    => now(),
            ]);
            if($status == PaymentGatewayConst::STATUSSUCCESS){
                $this->updateWalletBalanceAuthorize($wallet,$temp_data);
            }
            DB::commit();
        }catch(Exception $e) {
            DB::rollBack();
            throw new Exception(__("Something went wrong! Please try again."));
        }
        return $id;
    }
    public function updateWalletBalanceAuthorize($wallet,$temp_data) {
        $update_amount = $wallet->balance + $temp_data->data->amount->requested_amount;
        $wallet->update([
            'balance'   => $update_amount,
        ]);
    }
}

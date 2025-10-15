<?php
namespace App\Traits\PaymentGateway;

use Exception;
use App\Models\TemporaryData;
use App\Http\Helpers\Api\Helpers;
use App\Constants\PaymentGatewayConst;

trait Authorize{

    public function authorizeInit($output = null){
        if(!$output) $output = $this->output;
        if($output['type'] === PaymentGatewayConst::TYPEADDMONEY){
            return $this->setupAuthorizeInitAddMoney($output);
        }
    }

    public function setupAuthorizeInitAddMoney($output,){
        $junk_data = $this->authorizeJunkInsert();
        if(request()->expectsJson()) {
            return $junk_data->identifier;
        }
        return redirect()->route('user.add.money.authorize.card.info',$junk_data->identifier);
    }
    public function authorizeJunkInsert() {
        $output = $this->output;
        $temp_record_token = generate_unique_string('temporary_datas', 'identifier', 60);



        $data = [
            'gateway'       => $output['gateway']->id,
            'currency'      => $output['currency']->id,
            'amount'        => json_decode(json_encode($output['amount']),true),
            'wallet_table'  => $output['wallet']->getTable(),
            'wallet_id'     => $output['wallet']->id,
            'creator_table' => auth()->guard(get_auth_guard())->user()->getTable(),
            'creator_id'    => auth()->guard(get_auth_guard())->user()->id,
            'creator_guard' => get_auth_guard(),
        ];

        return TemporaryData::create([
            'type'          => PaymentGatewayConst::AUTHORIZE,
            'identifier'    => $temp_record_token,
            'data'          => $data,
        ]);
    }
    public function authorizeInitApi($output = null){
        if(!$output) $output = $this->output;
        if($output['type'] === PaymentGatewayConst::TYPEADDMONEY){
            return $this->setupAuthorizeInitAddMoney($output);
        }
    }
}

?>

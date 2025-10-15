<?php

namespace App\Models;

use App\Constants\GlobalConst;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\PaymentGateway;
use App\Constants\PaymentGatewayConst;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $casts = [
        'id'                => 'integer',
        'details'           => 'object',
        'receive_amount'    => 'decimal:8',
        'status'            => 'integer',
    ];

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin() {
        return $this->belongsTo(Admin::class,'user_id');
    }

    public function getRouteKeyName()
    {
        return "trx_id";
    }

    public function user_wallet()
    {
        return $this->belongsTo(UserWallet::class, 'wallet_id');
    }
    public function payment_gateway()
    {
        return $this->belongsTo(PaymentGateway::class);
    }

    public function getCreatorAttribute() {
        if($this->user_type == GlobalConst::USER) {
            return $this->user;
        }else if($this->user_type == GlobalConst::ADMIN) {
            return $this->admin;
        }
    }

    public function receiver_info() {
        return $this->belongsTo(User::class,'receiver_id');
    }

    public function getReceiverAttribute() {
        if($this->receiver_type == GlobalConst::USER) {
            return $this->receiver_info;
        }
    }
    
    public function getCreatorWalletAttribute() {
        if($this->user_type == GlobalConst::USER) {
            return $this->user_wallet;
        }else if($this->user_type == GlobalConst::ADMIN) { //  if user type ADMIN wallet_id is user wallet id. Because admin has no wallet.
            return $this->user_wallet;
        }
    }

    public function getStringStatusAttribute() {
        $status = $this->status;
        $data = [
            'class' => "",
            'value' => "",
        ];
        if($status == PaymentGatewayConst::STATUSSUCCESS) {
            $data = [
                'class'     => "badge badge--success",
                'value'     => "Success",
            ];
        }else if($status == PaymentGatewayConst::STATUSPENDING) {
            $data = [
                'class'     => "badge badge--warning",
                'value'     => "Pending",
            ];
        }else if($status == PaymentGatewayConst::STATUSHOLD) {
            $data = [
                'class'     => "badge badge--warning",
                'value'     => "Hold",
            ];
        }else if($status == PaymentGatewayConst::STATUSREJECTED) {
            $data = [
                'class'     => "badge badge--danger",
                'value'     => "Rejected",
            ];
        }else if($status == PaymentGatewayConst::STATUSWAITING) {
            $data = [
                'class'     => "badge badge--danger",
                'value'     => "Waiting",
            ];
        }

        return (object) $data;
    }

    public function scopeMoneyOut($query) {
        return $query->where('type',PaymentGatewayConst::TYPEWITHDRAW);
    }

    public function gateway_currency() {
        return $this->belongsTo(PaymentGatewayCurrency::class,'payment_gateway_currency_id');
    }

    public function scopePending($query) {
        return $query->where('status',PaymentGatewayConst::STATUSPENDING);
    }

    public function scopeComplete($query) {
        return $query->where('status',PaymentGatewayConst::STATUSSUCCESS);
    }

    public function scopeReject($query) {
        return $query->where('status',PaymentGatewayConst::STATUSREJECTED);
    }

    public function scopeAddMoney($query) {
        return $query->where('type',PaymentGatewayConst::TYPEADDMONEY);
    }

    public function scopeChartData($query) {
        return $query->select([
            DB::raw("DATE(created_at) as date"),
            DB::raw('COUNT(*) as total')
        ])
        ->groupBy('date')
        ->pluck('total');
    }

    public function scopeThisMonth($query) {
        return $query->whereBetween('created_at',[now()->startOfMonth(),now()->endOfMonth()]);
    }

    public function scopeThisYear($query) {
        return $query->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()]);
    }

    public function scopeYearChartData($query) {
        return $query->select([
            DB::raw('sum(total_charge) as total, YEAR(created_at) as year, MONTH(created_at) as month'),
        ])->groupBy('year','month')->pluck('total','month');
    }

    public function scopeAuth($query) {
        return $query->where('user_type',GlobalConst::USER)->where('user_id',auth()->user()->id);
    }

    public function scopeMoneyTransfer($query) {
        return $query->where('type',PaymentGatewayConst::TYPETRANSFERMONEY);
    }

    public function scopeSearch($query,$data) {
        return $query->where("trx_id","like","%".$data."%");
    }
}

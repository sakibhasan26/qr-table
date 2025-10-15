<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMSProvider extends Model
{
    use HasFactory;

    protected $guarded      = ['id'];

    protected $casts        = [
        'id'                => 'integer',
        'admin_id'          => 'integer',
        'slug'              => 'string',
        'provider_name'     => 'string',
        'provider_title'    => 'string',
        'config'            => 'object',
        'image'             => 'string',
        'status'            => 'integer'
    ];

    public function scopeAuth($q){
        return $q->where('admin_id',auth()->user()->id);
    }
}

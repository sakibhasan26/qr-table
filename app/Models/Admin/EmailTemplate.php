<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    use HasFactory;

    protected $guarded      = ['id'];

    protected $casts        = [
        'id'                => 'integer',
        'slug'              => 'string',
        'name'              => 'string',
        'subject'           => 'string',
        'body'              => 'string',
        'variables_info'    => 'object',
        'status'            => 'integer',
        'last_edit_by'      => 'integer'
    ];

    public function admin(){
        return $this->belongsTo(Admin::class,'last_edit_by');
    }
}

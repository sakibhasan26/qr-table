<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'slug'      => 'string',
        'data'      => 'object',
        'admin_id ' => 'integer',
        'status'    => 'integer'
    ];


    protected $appends = [
        'editData',
    ];

    public function getEditDataAttribute() {
        $data = [
            'id'   => $this->id,
            'name' => $this->name,
            'data' => $this->data,
        ];

        return json_encode($data);
    }

    public function admin() {
        return $this->belongsTo(Admin::class);
    }


}

<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'image'      => 'string',
        'slug'      => 'string',
        'data'      => 'object',
        'price '    => 'decimal:8',
        'qty '      => 'integer',
        'popular '  => 'integer',
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
            'image' => $this->image,
            'popular' => $this->popular,
            'qty' => $this->qty,
            'price' => $this->price,
        ];

        return json_encode($data);
    }

    public function admin() {
        return $this->belongsTo(Admin::class);
    }


}

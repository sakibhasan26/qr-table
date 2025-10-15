<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialAuthDriver extends Model
{
    use HasFactory;

    const PANEL_USER = "USER";

    protected $guarded = ['id'];

    protected $casts = [
        'credentials' => 'object',
    ];

    public function scopeUserPanel($query)
    {
        return $query->where('panel', self::PANEL_USER);
    }
}

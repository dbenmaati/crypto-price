<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_title',
        'site_logo_light',
        'site_logo_dark',
        'site_logo_heigh',
        'site_logo_width',
        'site_favicon',
    ];

    protected $casts = [
        'site_logo_light' => 'array',
        'site_logo_dark' => 'array',
        'site_favicon' => 'array',
    ];
}

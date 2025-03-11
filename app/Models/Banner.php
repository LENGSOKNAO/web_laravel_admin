<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';

    protected $fillable = [
        'banner_name',
        'banner_description',
        'banner_image',
        'banner_small_image',
        'banner_is_enable',
        'banner_link'
    ];
}

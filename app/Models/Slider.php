<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';

    protected $fillable = [
        'slide_name',
        'slide_brand',
        'slide_image',
        'slide_small_image',
        'slide_description',
        'slide_is_enable',
    ];
}

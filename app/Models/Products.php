<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'product_category',
        'product_brand',
        'product_sizes',
        'product_description',
        'product_price',
        'product_qty',
        'product_color',
        'product_link',
        'product_is_enable',
        'product_comming_soon',
        'product_image',
        'product_list_image',
    ];

    protected $casts = [
        'product_category' => 'array',
        'product_sizes' => 'array',
        'product_list_image' => 'array',
    ];
}

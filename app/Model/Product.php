<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'on_sale',
        'rating', 'sold_count', 'review_count', 'price',
    ];

    public function skus()
    {
        return $this->hasMany(\App\Model\ProductSku::class);
    }
}

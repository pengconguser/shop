<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    protected $fillable = [
        'title', 'description', 'price', 'stock',
    ];

    public function product()
    {
        return $this->belongsTo(\App\Model\Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'base_price',
        'base_total',
        'sku',
        'type',
        'name',
        'weight',
        'attributes',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}

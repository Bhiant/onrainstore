<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    public const PENDING = 'pending';
    public const SHIPPED = 'shipped';

    protected $fillable = [
        'user_id',
        'order_id',
        'track_number',
        'status',
        'total_qty',
        'total_weight',
        'admin_name',
        'customer_name',
        'phone',
        'kecamatan',
        'city',
        'province',
        'shipped_by',
        'shipped_at',
    ];

    /**
     * Relationship to the order model
     *
     * @return void
     */
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }
}

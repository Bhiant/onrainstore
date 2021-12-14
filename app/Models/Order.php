<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'code',
        'status',
        'order_date',
        'payment_status',
        'base_total_price',
        'note',
        'customer_admin_name',
        'customer_name',
        'customer_phone',
        'customer_alamat',
        'customer_kecamatan',
        'customer_city',
        'customer_province',
        'resi',
        'approved_by',
        'approved_at',
        'cancelled_by',
        'cancelled_at',
        'cancellation_note',
    ];

    protected $casts = [
        'deleted_at' => 'datetime'
    ];
    public const PENDING = 'Pending';
    public const DIPROSES = 'Diproses';
    public const DIKIRIM = 'Dikirim';
    public const SELESAI = 'Selesai';
    public const RETURN = 'Return';

    public const ORDERCODE = 'INV';

    public const PAID = 'paid';
    public const UNPAID = 'unpaid';
    public const STATUSES = [
        self::PENDING => 'Pending',
        self::DIPROSES => 'Diproses',
        self::DIKIRIM => 'Dikirim',
        self::SELESAI => 'Selesai',
        self::RETURN => 'Return',

    ];

    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public static function generateCode()
    {
        $dateCode = self::ORDERCODE . '/' . date('Ym') . '/';

        $lastOrder = self::select([\DB::raw('MAX(orders.code) AS last_code')])
            ->where('code', 'like', $dateCode . '%')
            ->first();

        $lastOrderCode = !empty($lastOrder) ? $lastOrder['last_code'] : null;

        $orderCode = $dateCode . '00001';
        if ($lastOrderCode) {
            $lastOrderNumber = str_replace($dateCode, '', $lastOrderCode);
            $nextOrderNumber = sprintf('%05d', (int)$lastOrderNumber + 1);

            $orderCode = $dateCode . $nextOrderNumber;
        }

        if (self::_isOrderCodeExists($orderCode)) {
            return generateOrderCode();
        }

        return $orderCode;
    }

    private static function _isOrderCodeExists($orderCode)
    {
        return Order::where('code', '=', $orderCode)->exists();
    }

    /**
     * Check order is paid or not
     *
     * @return boolean
     */
    public function isUnPaid()
    {
        return $this->payment_status == self::UNPAID;
    }

    public function isPending()
    {
        return $this->status == self::PENDING;
    }

    /**
     * Check order is confirmed
     *
     * @return boolean
     */
    public function isDiproses()
    {
        return $this->status == self::DIPROSES;
    }

    /**
     * Check order is delivered
     *
     * @return boolean
     */
    public function isDikirim()
    {
        return $this->status == self::DIKIRIM;
    }

    /**
     * Check order is completed
     *
     * @return boolean
     */
    public function isSelesai()
    {
        return $this->status == self::SELESAI;
    }

    /**
     * Check order is cancelled
     *
     * @return boolean
     */
    public function isReturn()
    {
        return $this->status == self::RETURN;
    }

    // public static function statuses()
    // {
    //     return [
    //         0 => 'Pending',
    //         'Diproses' => 'Diproses',
    //         'Dikirim' => 'Dikirim',
    //         'Terkirim' => 'Terkirim',
    //         'Return' => 'Return',
    //     ];
    // }

    // public function statusLabel()
    // {
    //     $statuses = $this->statuses();

    //     return isset($this->status) ? $statuses[$this->status] : null;
    // }
}

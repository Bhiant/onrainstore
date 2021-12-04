<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public const UPLOAD_DIR = 'uploads';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public const SMALL = '135x141';
    public const MEDIUM = '312x400';
    public const LARGE = '600x656';

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}

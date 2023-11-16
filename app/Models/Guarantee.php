<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guarantee extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'purchase_date' => 'datetime',
        'expired_date' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id'
    ];

    public function Order() {
        return $this->belongsTo(Orders::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}

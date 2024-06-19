<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $fillable = [
        'user_id',
    ];

    public function userCart() {
        return $this->belongsTo(User::class);
    }

    public function CartItems() {
        return $this->hasMany(CartItems::class);
    }

    public function getTotalPriceAttribute()
    {
        return $this->cartItems->sum(function($cartItem) {
            return $cartItem->product->Price;
        });
    }
}

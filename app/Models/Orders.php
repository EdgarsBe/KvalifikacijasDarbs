<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'OrderOpen',
        'OrderClosed',
        'Status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function OrderItems() {
        return $this->hasMany(OrderItems::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesProducts extends Model
{
    use HasFactory;

    protected $fillable = [
        'categories_id',
        'product_id'
    ];

    public function Categories() {
        return $this->belongsTo(Categories::class);
    }

    public function Products() {
        return $this->belongsTo(Product::class);
    }
}

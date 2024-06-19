<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'Title',
        'Summary',
        'Price',
        'ReleaseDate',
        'Developer',
        'Publisher',
    ];

    public function images() {
        return $this->hasMany(Images::class);
    }

    public function thumbnailImages() {
        return $this->hasMany(Images::class)->where('is_thumbnail', true);
    }

    public function ProductsForCartItems() {
        return $this->hasMany(CartItems::class);
    }

    public function ProductsForCategories() {
        return $this->belongsToMany(Categories::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Categories::class, 'product_category_id');
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}

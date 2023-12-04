<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'brand',
        'price',
        'inventory',
        'image',
    ];
    public function category_product()
    {
        return $this->hasMany('App\Models\CategoryProduct');
    }

    public function order_item()
    {
        return $this->hasMany('App\Models\OrderItem');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $table = 'category_product';
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'category_id',
    ];
}

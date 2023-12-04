<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'name_receiver',
        'phone_receiver',
        'address',
        'total_price',
        'purchase_method'
    ];

    public function order_item() {
        return $this->hasMany('App\Models\OrderItem');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $tabel='orders';
    protected $id='id';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'product_title',
        'image',
        'price',
        'quantity',
        'product_id',
        'user_id',
        'payment_status',
        'delivery_status',
    ];
    

}

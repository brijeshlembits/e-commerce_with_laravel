<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $id = 'id';
    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'discount_price',
        'quantity',
        'category',
    ];
   
}

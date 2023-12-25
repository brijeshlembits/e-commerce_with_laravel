<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commets extends Model
{
    protected $table='commets';
    protected $id='id';
    protected $fillable = [
        'name',
        'email',
        'message',
    ];
}

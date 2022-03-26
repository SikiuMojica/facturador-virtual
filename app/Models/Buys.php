<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buys extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'user_name',
        'user_phone',
        'product_id',
        'amount',
    ];
}

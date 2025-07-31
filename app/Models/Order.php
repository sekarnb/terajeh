<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'reservasi_id',
        'product_id',
        'jumlah',
        'notes',
    ];
}

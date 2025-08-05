<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'reservasi_id',
        'menu_id',
        'jumlah',
        'notes',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}

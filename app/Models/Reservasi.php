<?php

namespace App\Models;

use App\Enums\ReservasiStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_customer',
        'no_hp',
        'jumlah_tamu',
        'tanggal',
        'jam',
        'total_bayar',
        'bukti_bayar',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jam' => 'time',
        'status' => ReservasiStatus::class,
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orders', 'reservasi_id', 'product_id')
                    ->withPivot('jumlah')
                    ->withTimestamps();
    }

    /**
     * Get the URL of the reservation's proof image.
     */
    public function bukti_bayar(): string
    {
        return Storage::url($this->bukti_bayar);
    }
}

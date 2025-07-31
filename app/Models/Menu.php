<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'nama',
        'foto',
        'harga',
        'deskripsi',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function foto()
    {
        return Storage::url($this->foto);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';

    protected $fillable = [
        'user_id',
        'produk_id',
        'jumlah',
        'alamat',
        'telepon',
        'total',
        'status',
        'tanggal_pembelian',
    ];

    // Tambahkan relasi ini
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckoutItem extends Model
{
    protected $table = 'checkout_items'; // sesuaikan dengan nama tabel kamu

    protected $fillable = [
        'checkout_id',
        'produk_id',
        'qty'
    ];

    // Relasi ke tabel checkout
    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }

    // Relasi ke produk
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}

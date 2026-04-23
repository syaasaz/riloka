<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $primaryKey = 'id'; //default: id
    protected $keyType = 'integer'; //default: bigInteger
    protected $table = 'transaksis';

    protected $fillable = [
        'id',
        'user_id',
        'produk_id',
        'jumlah',
        'total_harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}

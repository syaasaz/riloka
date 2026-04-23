<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'pesans'; // Sesuaikan nama tabel
    protected $fillable = ['sender_id', 'receiver_id', 'produk_id', 'isi'];
}

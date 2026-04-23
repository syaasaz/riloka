<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';

    protected $fillable = [
        'user_id',
        'nama',
        'gambar',
        'deskripsi',
        'kategori',
        'merek',
        'ukuran',
        'lokasi',
        'harga',
        'terjual', // ✅ tambahkan ini di akhir
    ];
    protected $casts = [
        'terjual' => 'boolean', // opsional agar aman
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // pastikan 'user_id' kolomnya ada di tabel produk
    }

    // Format harga dengan Rupiah
    public function getFormattedHargaAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    // Get image URL
    public function getImageUrlAttribute()
    {
        return asset('images/' . $this->gambar);
    }

    // Scope untuk mendapatkan produk berdasarkan user
    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }


    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}

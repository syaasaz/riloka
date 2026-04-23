<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ulasan;

class PenjualController extends Controller
{
    public function show($id)
    {
        $penjual = User::findOrFail($id);
        $produk = $penjual->produk; // pastikan relasi 'produk' ada di model User

        // Ambil semua ulasan dari produk yang dimiliki oleh penjual ini
        $ulasan = Ulasan::whereHas('produk', function ($query) use ($id) {
            $query->where('user_id', $id);
            })->with('user')->get(); // relasi 'user' dibutuhkan di Blade

        return view('profil-penjual', [
            'penjual' => $penjual,
            'produk' => $produk,
            'ulasan' => $ulasan
        ]);
}
}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Produk;
use App\Models\Ulasan;
use App\Models\Transaksi;

class ProfilController extends Controller
{
     // pastikan di atas ada use ini

     public function index()
{
    $userId = Auth::id();

    $user = User::find($userId);
    $produk = Produk::where('user_id', $userId)->get();

    $produkIds = $produk->pluck('id');

    // Tambahkan with('user') agar bisa akses $u->user->nama di blade
    $ulasan = Ulasan::whereIn('produk_id', $produkIds)->with('user')->get();

    $transaksis = Transaksi::where('user_id', $userId)->with('produk')->latest()->get();

    return view('profil', compact('user', 'produk', 'ulasan', 'transaksis'));
}

     
    public function toko()
    {
        $user = Auth::user();
        $produk = Produk::where('user_id', $user->id)->get();
        $produk = Produk::where('user_id', $user->Id)->where('terjual', false)->get();

        
        return view('toko', compact('user', 'produk'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('edit-profil', compact('user'));
    }


    public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Hapus foto jika diminta
    if ($request->has('hapus_foto') && $user->foto) {
        Storage::disk('public')->delete($user->foto);
        $user->foto = null;
    }

    // Ganti foto
    if ($request->hasFile('foto')) {
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }
        $user->foto = $request->file('foto')->store('foto-profil', 'public');
    }

    $user->nama = $request->nama;
    $user->deskripsi = $request->deskripsi;
    $user->save();

    return redirect()->route('profil')->with('success', 'Profil berhasil diperbarui!');
}
    public function ringkasan($id)
{
    $transaksi = Transaksi::with('produk', 'user')->findOrFail($id);

    // Jika user bukan pemilik transaksi, tolak
    if ($transaksi->user_id != Auth::id()) {
        abort(403);
    }

    // Biaya tetap (contoh)
    $ongkir = 11000;
    $subtotal = $transaksi->total_harga;
    $total = $subtotal + $ongkir;

    return view('ringkasan-order', compact('transaksi', 'ongkir', 'subtotal', 'total'));
}


}
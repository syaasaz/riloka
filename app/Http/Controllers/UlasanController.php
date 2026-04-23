<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ulasan;
use App\Models\Produk;

class UlasanController extends Controller
{
    public function create($produkId)
    {
        $produk = Produk::findOrFail($produkId);
        $user = Auth::user();

        return view('ulasan', compact('produk', 'user'));
    }

    public function store(Request $request)
{
    $request->validate([
        'produk_id' => 'required|exists:produks,id',
        'rating' => 'required|integer|min:1|max:5',
        'isi' => 'required|string|max:1000', // gunakan "isi"
    ]);

    Ulasan::create([
        'produk_id' => $request->produk_id,
        'user_id' => Auth::id(),
        'rating' => $request->rating,
        'isi' => $request->isi,
    ]);

    return redirect()->route('profil')->with('success', 'Ulasan berhasil dikirim.');
}

}

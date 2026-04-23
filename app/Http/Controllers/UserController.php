<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    public function show()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $produk = $user->produk; // Mengambil semua produk milik user (relasi)

        return view('profil', compact('user', 'produk'));
    }


public function profilPenjual($id)
    {
        $penjual = User::findOrFail($id);
        $produkToko = $penjual->produk;
        // JADI INI:
        return view('penjual-profil', compact('penjual', 'produkToko'));
    }

    // ⬇️ METHOD INI YANG KAMU TAMBAHKAN
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update nama dan deskripsi
        $user->name = $request->name;
        $user->description = $request->description;

        // Upload gambar jika ada
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/avatar', $filename); // Simpan file

            $user->avatar = $filename; // Simpan ke database
        }

        $user->save(); // Simpan semua perubahan

        return redirect()->route('profil')->with('success', 'Profil berhasil diperbarui.');
    }
}

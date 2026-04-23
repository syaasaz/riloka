<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // Tampilkan halaman toko
    public function index()
    {
        $user = Auth::user(); // pastikan user login
        $produk = Produk::where('user_id', $user->id)->get();

        return view('toko', compact('user', 'produk'));
    }

    // Tampilkan form tambah produk
    public function create()
    {
        return view('tambah-produk');
    }

    // Simpan data produk
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'required|image',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'merek' => 'required',
            'ukuran' => 'required',
            'lokasi' => 'required',
            'harga' => 'required|numeric',
        ]);

        // Simpan foto
        $file = $request->file('foto');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $namaFile);

        Produk::create([
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'gambar' => $namaFile,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'merek' => $request->merek,
            'ukuran' => $request->ukuran,
            'lokasi' => $request->lokasi,
            'harga' => $request->harga,
        ]);

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route('profil')->with('success', 'Produk berhasil ditambahkan');
    }

    // Method untuk edit produk
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('edit-produk', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
            'ukuran' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $produk = Produk::findOrFail($id);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('produk', 'public');
            $produk->gambar = $path;
        }

        $produk->nama = $request->nama;
        $produk->deskripsi = $request->deskripsi;
        $produk->ukuran = $request->ukuran;
        $produk->lokasi = $request->lokasi;
        $produk->harga = $request->harga;
        $produk->save();

        return redirect()->route('profil')->with('success', 'Produk berhasil diperbarui.');
    }


    // Method untuk hapus produk
    public function destroy($id)
    {
        $produk = Produk::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Delete image file
        if (file_exists(public_path('images/' . $produk->gambar))) {
            unlink(public_path('images/' . $produk->gambar));
        }

        $produk->delete();

        return redirect()->route('profil')->with('success', 'Produk berhasil dihapus');
    }

    public function terjual($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->status = 'terjual'; // Pastikan Anda punya kolom status di tabel produk
        $produk->save();

        return redirect()->back()->with('success', 'Produk ditandai sebagai terjual.');
    }

    public function show($id)
    {
        $produk = Produk::with('user')->findOrFail($id);
        return view('detail-produk', compact('produk'));
    }

    public function kategori($kategori)
    {
        $produk = Produk::where('kategori', strtolower($kategori))->get();
        return view('kategori-produk', compact('kategori', 'produk'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Keranjang;
use App\Models\Checkout;
use App\Models\Pesanan;
use App\Models\Transaksi; // Model untuk menyimpan pesanan

class KeranjangController extends Controller
{
    // Menampilkan isi keranjang belanja
    public function index()
    {
        $keranjang = Keranjang::with('produk')->where('user_id', Auth::id())->get();
        return view('keranjang', compact('keranjang'));
    }

    // Menyimpan produk ke keranjang
    public function simpan(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Harap login terlebih dahulu.');
        }

        Keranjang::create([
            'user_id' => Auth::id(),
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah ?? 1,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil dimasukkan ke keranjang!');
    }

    // Menghapus produk dari keranjang
    public function hapus($id)
    {
        $keranjang = Keranjang::findOrFail($id);

        if ($keranjang->user_id !== Auth::id()) {
            abort(403); // Akses ditolak
        }

        $keranjang->delete();

        return redirect()->route('keranjang.index')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    // Menampilkan halaman checkout
    public function checkout()
    {
        $keranjang = Keranjang::with('produk')->where('user_id', Auth::id())->get();
        return view('checkout', compact('keranjang'));
    }

    // Menyimpan data checkout
    public function simpanCheckout(Request $request)
{
    $request->validate([
        'nama' => 'required|string',
        'telepon' => 'required|string',
        'alamat' => 'required|string',
    ]);

    $userId = Auth::id();

    // Ambil item keranjang user
    $keranjangItems = Keranjang::where('user_id', $userId)->get();

    // Format detail yang benar (list produk_id dan jumlah)
    $detail = [];

    foreach ($keranjangItems as $item) {
        $detail[] = [
            'produk_id' => $item->produk_id,
            'jumlah' => $item->jumlah
        ];
    }

    // Simpan ke tabel checkout
    $hasil = Checkout::create([
        'user_id' => $userId,
        'nama' => $request->nama,
        'telepon' => $request->telepon,
        'alamat' => $request->alamat,
        'detail' => json_encode($detail), // <- Simpan sebagai JSON
    ]);

    // Tandai semua item keranjang sudah di-checkout
    Keranjang::where('user_id', $userId)->update([
        'checkout_id' => $hasil->id
    ]);

    return redirect()->route('checkout.final')->with('success', 'Checkout berhasil disimpan.');
}


    // Menampilkan halaman pemesanan
    public function pemesanan()
    {
        $checkout = Checkout::where('user_id', Auth::id())->latest()->first();
        $pesanans = Keranjang::with('produk')->where('checkout_id', $checkout->id )->get(); 

        return view('pemesanan', compact('checkout', 'pesanans'));
    }

    // Menyimpan data pemesanan ke database
    public function simpanPemesanan(Request $request)
{
    $userId = Auth::id();
    $keranjangItems = Keranjang::where('user_id', $userId)->with('produk')->get();

    foreach ($keranjangItems as $item) {
        // Tandai produk sebagai terjual
        $item->produk->update(['terjual' => true]);

        // Simpan ke tabel Pesanan
        Pesanan::create([
            'user_id' => $userId,
            'produk_id' => $item->produk_id,
            'jumlah' => $item->jumlah,
            'status' => 'menunggu',
            'total_harga' => $item->produk->harga * $item->jumlah,
        ]);
        
    }

    // Kosongkan keranjang setelah checkout
    Keranjang::where('user_id', $userId)->delete();

    return redirect()->route('dashboard')->with('success', 'Pesanan berhasil dibuat!');
}

   public function buatPesanan(Request $request)
{
    // Debug input untuk memastikan request masuk
    Log::info($request->all());

    foreach ($request->pesanan_ids as $index => $pesanan_id) {
        // Eager load produk agar relasi tidak null
        $pesanan = Keranjang::with('produk')->find($pesanan_id);

        if ($pesanan && $pesanan->produk) {
            $transaksi = new Transaksi();
            $transaksi->user_id = Auth::id();
            $transaksi->produk_id = $pesanan->produk_id;
            $transaksi->jumlah = $request->jumlahs[$index];
            $transaksi->total_harga = $pesanan->produk->harga * $request->jumlahs[$index];
            $transaksi->save();

            Log::info('Transaksi berhasil dibuat untuk pesanan ID: ' . $pesanan_id);
        } else {
            Log::warning('Produk tidak ditemukan untuk pesanan ID: ' . $pesanan_id);
        }
    }

    return response()->json(['success' => true]);
}

}
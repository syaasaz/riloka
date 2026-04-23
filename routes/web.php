<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\UlasanController;


// Root Redirect
Route::get('/', function () {
    return redirect()->route('login');
});


// Buat user manual
Route::get('/buat-user', function () {
    User::create([
        'nama' => 'Admin',
        'email' => 'admin@riloka.com',
        'password' => Hash::make('password123'),
    ]);
    return "User berhasil dibuat";
});

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Setelah login
Route::middleware(['auth'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profil
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
    Route::get('/profil/toko', [ProfilController::class, 'toko'])->name('profil.toko');
    Route::get('/penjual/{id}', [UserController::class, 'profilPenjual'])->name('profil.penjual');
    Route::get('/penjual/{id}', [PenjualController::class, 'show'])->name('penjual.show');

    // Produk
    Route::get('/toko', [ProdukController::class, 'index'])->name('toko');
    Route::get('/produk/tambah', [ProdukController::class, 'create'])->name('produk.tambah');
    Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id}/update', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}/delete', [ProdukController::class, 'destroy'])->name('produk.delete');
    Route::put('/produk/terjual/{id}', [ProdukController::class, 'terjual'])->name('produk.terjual');
    Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

    // Keranjang & Checkout
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang', [KeranjangController::class, 'simpan'])->name('keranjang.simpan');
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');

    Route::get('/checkout', [KeranjangController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/submit', [KeranjangController::class, 'simpanCheckout'])->name('checkout.submit');
    Route::get('/checkout-final', [KeranjangController::class, 'pemesanan'])->name('checkout.final');
    Route::post('/checkout-final', [KeranjangController::class, 'simpanPemesanan'])->name('checkout.final.submit');
    Route::post('/pesanan/simpan', [KeranjangController::class, 'simpanPemesanan'])->name('pesanan.simpan');

    // Chat
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
});

// Panduan (bisa tanpa login)
Route::get('/panduan', [PanduanController::class, 'index'])->name('panduan');

Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.detail');
Route::post('/chat/kirim', [ChatController::class, 'kirim'])->name('chat.kirim');


Route::get('/kategori/{kategori}', [ProdukController::class, 'kategori'])->name('produk.kategori');


Route::post('/buat-pesanan', [KeranjangController::class, 'buatPesanan'])->name('buat.pesanan');

Route::get('/transaksi/{id}/ringkasan', [ProfilController::class, 'ringkasan'])->name('transaksi.ringkasan');


//ulasan
Route::get('/ulasan/{produkId}', [UlasanController::class, 'create'])->name('ulasan.create');
Route::post('/ulasan/simpan', [UlasanController::class, 'store'])->name('ulasan.store'); 




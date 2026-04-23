<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Produk;
use App\Models\Checkout;
use App\Models\Ulasan;
use App\Models\CheckoutItem;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
{
    $userId = Auth::id();

    // Ambil semua checkout milik user
    $checkouts = \App\Models\Checkout::where('user_id', $userId)->get();

    $produkTercheckout = [];

    foreach ($checkouts as $checkout) {
        $details = json_decode($checkout->detail, true); // Ubah JSON ke array
        if (is_array($details)) {
            foreach ($details as $item) {
                if (isset($item['produk_id'])) {
                    $produkTercheckout[] = $item['produk_id'];
                }
            }
        }
    }

    // Ambil produk yang belum dibeli user
    $produk = \App\Models\Produk::whereNotIn('id', $produkTercheckout)->get();

    // Ambil ulasan
    $ulasan = \App\Models\Ulasan::latest()->take(3)->get();

    return view('dashboard', compact('produk', 'ulasan'));
}

}
    
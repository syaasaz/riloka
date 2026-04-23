<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Produk;
use App\Models\Pesan;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $tokoId = $request->query('id');
        $produkId = $request->query('produk');

        $penjual = User::find($tokoId);
        $produk = Produk::with('user')->find($produkId);

        if (!$produk) {
        return redirect()->route('dashboard')->with('error', 'Produk tidak ditemukan.');
        }

        $userId = Auth::id();

        $pesan = Pesan::where('produk_id', $produkId)
            ->where(function ($q) use ($userId, $tokoId) {
                $q->where('sender_id', $userId)->where('receiver_id', $tokoId)
                    ->orWhere('sender_id', $tokoId)->where('receiver_id', $userId);
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return view('chat', compact('penjual', 'produk', 'pesan'));
    }

    public function kirim(Request $request)
    {
        $request->validate([
            'isi' => 'required|string',
            'produk_id' => 'required|integer',
            'receiver_id' => 'required|integer',
        ]);

        Pesan::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'produk_id' => $request->produk_id,
            'isi' => $request->isi,
        ]);

        return back();
    }
}

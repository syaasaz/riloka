<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Ringkasan Order</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans min-h-screen">

    <!-- Header -->
    <div class="bg-[#AECBD5] p-4 flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <a href="{{ route('profil') }}" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <a href="{{ route('profil') }}">
                <img src="{{ asset('images/logoriloka.png') }}" alt="Logo Riloka"
                    class="w-20 h-auto hover:opacity-80 transition">
            </a>
        </div>
        <div class="w-6"></div> <!-- Spacer -->
    </div>

    <main class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg mt-6 p-6">
        <!-- Proses Order -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex-1 flex flex-col items-center">
                <div class="bg-yellow-500 text-white w-10 h-10 flex items-center justify-center rounded-full">📦</div>
                <p class="mt-2 text-sm">Dikemas</p>
            </div>
            <div class="flex-1 border-t-2 border-gray-300"></div>
            <div class="flex-1 flex flex-col items-center">
                <div class="bg-blue-500 text-white w-10 h-10 flex items-center justify-center rounded-full">🚚</div>
                <p class="mt-2 text-sm">Dikirim</p>
            </div>
            <div class="flex-1 border-t-2 border-gray-300"></div>
            <div class="flex-1 flex flex-col items-center">
                <div class="bg-green-500 text-white w-10 h-10 flex items-center justify-center rounded-full">✅</div>
                <p class="mt-2 text-sm">Selesai</p>
            </div>
        </div>

        <!-- Info Pembeli -->
        <div class="mb-6 flex items-center gap-4">
            <div
                class="w-12 h-12 rounded-full bg-gradient-to-br from-pink-400 to-yellow-400 flex items-center justify-center text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div>
                <h2 class="font-semibold">{{ $transaksi->produk->user->name }}</h2>
                <p class="text-gray-600 text-sm">Nama Toko</p>
            </div>
        </div>

        <!-- Detail Produk -->
        <div class="flex gap-4 mb-4 border p-4 rounded">
            <img src="{{ asset('images/' . $transaksi->produk->gambar) }}" alt="{{ $transaksi->produk->nama }}"
                class="w-24 h-24 object-cover rounded">
            <div class="flex-1">
                <h3 class="font-semibold">{{ $transaksi->produk->nama }}</h3>
                <p>x{{ $transaksi->jumlah }}</p>
                <p class="text-right font-semibold">Rp{{ number_format($transaksi->produk->harga, 0, ',', '.') }}</p>
            </div>
        </div>

        <!-- Rincian Harga -->
        <div class="bg-gray-50 p-4 rounded border">
            <div class="flex justify-between mb-2">
                <span>Subtotal Produk</span>
                <span>Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between mb-2">
                <span>Subtotal Pengiriman</span>
                <span>Rp11.000</span>
            </div>
            <div class="flex justify-between font-bold mb-2">
                <span>Total Pesanan</span>
                <span>Rp{{ number_format($transaksi->total_harga + 11000, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between text-sm text-gray-600">
                <span>Metode Pembayaran</span>
                <span>COD</span>
            </div>
        </div>

        <!-- Tombol Nilai -->
        <div class="mt-6 text-right">
            <a href="{{ route('ulasan.create', $transaksi->produk->id) }}"
                class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600 transition inline-block">
                Nilai
            </a>
        </div>

    </main>

</body>

</html>

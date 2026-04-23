<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout - Riloka</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Header -->
    <div class="bg-[#AECBD5] p-4 flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <a href="{{ route('dashboard') }}" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('images/logoriloka.png') }}" alt="Logo Riloka"
                    class="w-20 h-auto hover:opacity-80 transition">
            </a>
        </div>
        <div class="w-6"></div> <!-- Spacer -->
    </div>

    <!-- Konten -->
    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- Form Alamat -->
        <div class="bg-white p-6 rounded shadow">
            <form action="{{ route('checkout.submit') }}" method="POST">
                @csrf

                <h2 class="text-xl font-bold mb-4">Alamat</h2>

                <div class="mb-3">
                    <label class="block font-semibold mb-1">Nama Penerima</label>
                    <input type="text" name="nama" class="w-full border p-2 rounded" placeholder="Nama Penerima" required>
                </div>

                <div class="mb-3">
                    <label class="block font-semibold mb-1">Nomor Telepon</label>
                    <input type="text" name="telepon" class="w-full border p-2 rounded" placeholder="Nomor Telepon" required>
                </div>

                <div class="mb-3">
                    <img src="{{ asset('images/maps.png') }}" alt="Maps" class="w-full h-40 object-cover rounded border">
                </div>

                <div class="mb-3">
                    <label class="block font-semibold mb-1">Alamat Lengkap</label>
                    <textarea name="alamat" class="w-full border p-2 rounded" rows="3" placeholder="Alamat Lengkap" required></textarea>
                </div>

                <div class="mb-6">
                    <label class="block font-semibold mb-1">Detail Lainnya (Opsional)</label>
                    <textarea name="detail" class="w-full border p-2 rounded" rows="2" placeholder="Detail Lainnya"></textarea>
                </div>

                <button 
                    type="submit"
                    class="w-full bg-blue-300 text-white font-semibold py-2 rounded transition-colors duration-300 hover:bg-blue-400">
                    Selanjutnya
                </button>
            </form>
        </div>

        <!-- Profil & Pesanan -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-bold mb-4">Profil</h2>
            <div class="flex items-center mb-4">
                <img src="{{ asset('images/profil.png') }}" alt="Avatar" class="w-12 h-12 rounded-full border">
                <span class="ml-3 font-semibold text-lg">{{ Auth::user()->name }}</span>
            </div>

            <h2 class="text-xl font-bold mb-4">Pesanan</h2>

            @php
                $totalHarga = 0;
                $totalItem = 0;
            @endphp

            @foreach ($keranjang as $item)
                <div class="flex mb-4">
                    <img src="{{ asset('images/' . $item->produk->gambar) }}" alt="{{ $item->produk->nama }}" class="w-24 h-24 object-cover border mr-4">
                    <div>
                        <p class="font-bold">{{ $item->produk->nama }}</p>
                        <p>Rp{{ number_format($item->produk->harga, 0, ',', '.') }}</p>
                        <p>{{ $item->produk->ukuran ?? 'All Size' }}</p>
                    </div>
                </div>

                @php
                    $totalHarga += $item->produk->harga * $item->jumlah;
                    $totalItem += $item->jumlah;
                @endphp
            @endforeach

            <div class="mt-6 border-t pt-4">
                <div class="flex justify-between mb-2">
                    <span>{{ $totalItem }} item</span>
                    <span>Rp{{ number_format($totalHarga, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between mb-2 text-sm text-gray-600">
                    <span>Pemesanan</span>
                    <span>Berikutnya</span>
                </div>
                <div class="flex justify-between font-bold text-lg">
                    <span>Total</span>
                    <span>Rp{{ number_format($totalHarga, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

    </div>

</body>
</html>

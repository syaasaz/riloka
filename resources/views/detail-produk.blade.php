<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <!-- Header -->
    <header class="bg-[#A6C9D5] p-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard') }}" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
                <img src="{{ asset('images/logoriloka.png') }}" alt="Logo Riloka"
                    class="w-20 h-auto hover:opacity-80 transition">
            </a>
        </div>
        <a href="/keranjang">
            <img src="{{ asset('images/keranjang.png') }}" alt="Keranjang" class="w-6 h-6">
        </a>
    </header>

    <!-- Konten Produk -->
    <div class="max-w-5xl mx-auto p-6 bg-white mt-6 rounded shadow-md">
        <div class="flex flex-col md:flex-row gap-8">

            <!-- Gambar Produk -->
            <div class="w-full md:w-1/2">
                <img src="{{ asset('images/' . $produk->gambar) }}" alt="{{ $produk->nama }}" class="rounded w-full">
            </div>

            <!-- Info Produk -->
            <div class="w-full md:w-1/2 space-y-3">
                <h2 class="text-2xl font-bold">{{ $produk->nama }}</h2>
                <div class="text-sm text-gray-500 flex gap-4">
                    <span>0.0 ★</span>
                    <span>0 Penilaian</span>
                    <span>{{ $produk->terjual ? 'Terjual' : 'Tersedia' }}</span>
                </div>
                <div class="text-xl font-bold text-gray-700">Rp{{ number_format($produk->harga, 0, ',', '.') }}</div>

                @if ($produk->terjual)
                    <div class="inline-flex items-center gap-2 bg-red-100 text-red-700 px-3 py-2 rounded-lg text-sm font-semibold mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-1.414-1.414L12 9.172 7.05 4.222 5.636 5.636 10.586 10.586 5.636 15.536l1.414 1.414L12 12.828l4.95 4.95 1.414-1.414-4.95-4.95z" />
                        </svg>
                        Produk ini sudah terjual dan tidak tersedia lagi.
                    </div>
                @else
                    <form action="{{ route('keranjang.index') }}" method="POST">
                        @csrf
                        <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                        <button type="submit" class="bg-blue-200 text-sm px-3 py-1 rounded hover:bg-blue-300 transition">
                            Masukkan Keranjang
                        </button>
                    </form>

                @endif

                <!-- Penjual -->
                <div class="mt-4 flex items-center gap-4">
                    <img src="{{ asset('images/profil.png') }}" class="w-14 h-14 rounded-full" alt="Profil">
                    <div>
                        <p class="font-semibold">{{ $produk->user->name }}</p>
                        <p class="text-sm text-gray-500">★★★★★</p>
                    </div>
                </div>

                <div class="flex gap-2 mt-2">
                    <a href="{{ route('penjual.show', $produk->user->id) }}"
                        class="bg-blue-500 px-4 py-2 rounded text-white text-sm hover:bg-blue-600">
                        Lihat Profil Penjual
                    </a>

                    <a href="{{ route('chat.index', ['id' => $produk->user_id, 'produk' => $produk->id]) }}"
                        class="bg-gray-600 px-4 py-2 rounded text-white text-sm hover:bg-gray-700">
                        Chat
                    </a>

                    @if (!$produk->terjual)
                        <a href="{{ route('checkout', ['id' => $produk->id]) }}"
                            class="bg-green-600 px-4 py-2 rounded text-white text-sm hover:bg-green-700">
                            Checkout
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Spesifikasi Produk -->
        <div class="mt-6">
            <h2 class="text-lg font-semibold mb-2">Spesifikasi Produk</h2>
            <ul class="space-y-2 text-sm text-gray-700">
                <li><span class="font-semibold">Kategori:</span> {{ $produk->kategori }}</li>
                <li><span class="font-semibold">Merk:</span> {{ $produk->merek }}</li>
                <li><span class="font-semibold">Ukuran:</span> {{ $produk->ukuran }}</li>
                <li><span class="font-semibold">Dikirim dari:</span> {{ $produk->lokasi }}</li>
            </ul>
        </div>

        <!-- Deskripsi -->
        <div class="mt-6">
            <h3 class="text-lg font-semibold mb-2">Deskripsi Produk</h3>
            <p class="text-gray-700 text-sm leading-relaxed">
                {{ $produk->deskripsi }}
            </p>
        </div>
    </div>
</body>
</html>

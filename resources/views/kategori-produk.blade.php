<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kategori {{ ucfirst($kategori) }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F5F5F5] font-sans min-h-screen">

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

    <!-- Konten Utama -->
    <section class="p-6 max-w-6xl mx-auto">
        <h2 class="text-2xl font-bold mb-2">Baju {{ ucfirst($kategori) }}</h2>

        <!-- Deskripsi -->
        @if (strtolower($kategori) === 'wanita')
            <p class="text-sm text-gray-700 mb-6 max-w-5xl w-full">
                Baju wanita preloved dengan desain simpel namun tetap elegan, cocok dipakai untuk acara santai hingga semi-formal.
                Bahan nyaman di kulit, potongan fit dan flattering, masih dalam kondisi sangat layak pakai.
            </p>
        @elseif (strtolower($kategori) === 'pria')
            <p class="text-sm text-gray-700 mb-6 max-w-5xl w-full">
                Baju pria preloved model kasual dengan desain simpel dan stylish, terbuat dari bahan yang adem dan nyaman,
                cocok dipakai untuk aktivitas sehari-hari maupun acara santai, dengan kondisi masih bagus dan layak pakai.
            </p>
        @endif

        <!-- Daftar Produk -->
        @if ($produk->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($produk as $item)
                    <a href="{{ route('produk.detail', $item->id) }}"
                       class="block bg-white rounded shadow hover:shadow-lg overflow-hidden transition">
                        <img src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->nama }}"
                             class="w-full h-48 object-cover">
                        <div class="p-4">
                            <div class="text-base font-bold text-gray-800">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                            <div class="text-sm text-gray-600">{{ $item->merek }} - {{ $item->ukuran }}</div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-sm mt-4">Tidak ada produk dalam kategori ini.</p>
        @endif
    </section>

</body>
</html>

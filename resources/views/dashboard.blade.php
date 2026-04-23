<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Riloka</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-[#EDF9FC] min-h-screen overflow-x-hidden">

    <!-- Header -->
    <header class="bg-[#A6C9D5] px-4 py-2 flex items-center justify-between">
        <img src="{{ asset('images/logoriloka.png') }}" alt="Logo Riloka" class="w-20 h-auto">
        <a href="/panduan">
            <button class="bg-[#C9ECFF] text-sm font-medium px-3 py-1 rounded hover:bg-blue-200 transition">
                Panduan
            </button>
        </a>
    </header>

    <!-- Menu Navigasi + Search + Icons -->
    <div class="bg-white shadow p-4 flex flex-wrap sm:flex-nowrap items-center justify-between gap-4">
        <!-- Menu -->
        <div class="flex gap-6 text-gray-700 font-medium">
            <a href="{{ route('produk.kategori', 'wanita') }}" class="hover:text-blue-600">Wanita</a>
            <a href="{{ route('produk.kategori', 'pria') }}" class="hover:text-blue-600">Pria</a>
        </div>

        <!-- Search + Icons -->
        <div class="flex items-center gap-4 flex-wrap sm:flex-nowrap">
            <input type="text" placeholder="Search"
                class="border border-gray-300 rounded px-3 py-1 text-sm focus:outline-none w-[200px] sm:w-[250px]">

            <!-- Link Keranjang -->
            <a href="/keranjang">
                <img src="{{ asset('images/keranjang.png') }}" alt="Cart"
                    class="w-6 h-6 hover:scale-105 transition">
            </a>

            <!-- Link Chat -->
            @if ($produk->isNotEmpty())
                @php $first = $produk->first(); @endphp
                <a href="{{ route('chat.index', ['id' => $first->user_id, 'produk' => $first->id]) }}">
                    <img src="{{ asset('images/chat.png') }}" alt="Chat" class="w-6 h-6">
                </a>
            @endif

            <!-- Link Profil -->
            <a href="/profil">
                <img src="{{ asset('images/profil.png') }}" alt="Profile"
                    class="w-6 h-6 rounded-full hover:ring-2 ring-blue-400 transition">
            </a>
        </div>
    </div>

    <!-- Hero Banner -->
    <div class="bg-white mt-2 mx-0 rounded shadow-md overflow-hidden">
        <img src="{{ asset('images/bannerriloka.png') }}" alt="Banner" class="w-full h-[350px] object-cover">
    </div>

    <!-- Produk Terbaru -->
    <section class="mt-6 mx-6">
        <h2 class="text-xl font-semibold mb-4">Produk Terbaru</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @if ($produk && $produk->count() > 0)
                @foreach ($produk as $item)
                    <a href="{{ route('produk.detail', $item->id) }}"
                        class="block bg-white rounded shadow-md overflow-hidden hover:shadow-lg transition">
                        <img src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->nama }}"
                        class="w-full h-48 object-contain bg-gray-100">
                        <div class="p-4">
                            <div class="text-base font-semibold text-gray-800 mb-1">
                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{ $item->merek ?? 'Merek' }} - {{ $item->ukuran }}
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <p class="text-sm text-gray-500">Belum ada produk ditampilkan.</p>
            @endif
        </div>
    </section>

    <!-- Ulasan / Aman dan Terpercaya -->
    <section class="mt-10 mx-6 text-center mb-10">
        <h3 class="text-lg font-semibold mb-2">Aman dan Terpercaya</h3>
        <p class="text-sm text-gray-600 mb-6 max-w-2xl mx-auto">
            Riloka adalah platform marketplace untuk preloved (barang bekas layak pakai), terutama dalam kategori
            pakaian pria dan wanita.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($ulasan as $u)
                <div class="bg-white p-6 rounded-xl shadow flex flex-col items-center text-center">
                    <div class="text-yellow-400 text-lg mb-2">★★★★★</div>
                    <p class="text-sm text-gray-700 mb-3">{{ $u->isi }}</p>
                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <img src="{{ asset('images/profil.png') }}" alt="User" class="w-6 h-6 rounded-full">
                        <span>{{ $u->nama }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</body>
</html>

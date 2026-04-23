<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans min-h-screen">

    <!-- Header -->
    <header class="bg-[#A6C9D5] p-4 flex items-center justify-between">
        <div class="flex items-center gap-2">
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
        <div class="text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                </path>
            </svg>
        </div>
    </header>

    <!-- Alert Success -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mx-4 mt-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="max-w-4xl mx-auto bg-white mt-4 rounded-lg shadow-lg overflow-hidden">

        <!-- Profile Section -->
        <div class="text-center py-8 bg-white">
            <div
                class="w-20 h-20 bg-gradient-to-br from-pink-400 to-yellow-400 rounded-full mx-auto mb-4 flex items-center justify-center">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $user->nama }}</h2>
            <p class="text-sm text-gray-600">{{ $user->name }}</p>
            <div class="flex justify-center mb-4">
            </div>
            <div class="flex justify-center gap-3">
                <a href="{{ route('produk.tambah') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-600 transition">
                    Tambah Produk
                </a>
            </div>

        </div>

        <!-- Tabs -->
        <div class="border-b border-gray-200">
            <nav class="flex">
                <button class="tab-button flex-1 py-4 px-6 text-center text-gray-500 hover:text-gray-700"
                    onclick="showTab('beli')">
                    Beli
                </button>
                <button
                    class="tab-button flex-1 py-4 px-6 text-center text-blue-600 border-b-2 border-blue-600 font-medium"
                    onclick="showTab('toko')">
                    Toko
                </button>
                <button class="tab-button flex-1 py-4 px-6 text-center text-gray-500 hover:text-gray-700"
                    onclick="showTab('ulasan')">
                    Ulasan
                </button>
            </nav>
        </div>

        <!-- Tab Content -->
        <div class="p-6">
            <!-- Tab Beli -->
            <div id="beli-content" class="tab-content hidden">
                @if ($transaksis->isEmpty())
                    <div class="text-center py-12">
                        <div class="text-6xl mb-4">🛒</div>
                        <p class="text-gray-500">Belum ada pembelian</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 px-4">
                        @foreach ($transaksis as $transaksi)
                            <div class="bg-white shadow rounded-lg p-4 flex items-center gap-4">
                                <img src="{{ asset('images/' . $transaksi->produk->gambar) }}"
                                    class="w-24 h-24 object-cover rounded">
                                <div>
                                    <h2 class="text-lg font-bold">{{ $transaksi->produk->nama }}</h2>
                                    <p class="text-gray-500">Jumlah: {{ $transaksi->jumlah }}</p>
                                    <p class="text-gray-700 font-semibold">Total:
                                        Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                                    <p class="text-sm text-gray-400">{{ $transaksi->created_at->format('d M Y H:i') }}
                                    </p>

                                    <!-- Tombol Ringkasan Order -->
                                    <a href="{{ route('transaksi.ringkasan', $transaksi->id) }}"
                                        class="inline-block mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                        Ringkasan Order
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Tab Toko -->
            <div id="toko-content" class="tab-content">
                @if ($produk->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($produk as $item)
                            <div
                                class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition duration-200">
                                <div class="aspect-square bg-gray-100 rounded-t-lg overflow-hidden">
                                    @if ($item->gambar)
                                        <img src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->nama }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div
                                            class="w-full h-full flex items-center justify-center text-gray-400 text-4xl">
                                            📷
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h3 class="font-semibold text-gray-800 mb-2">{{ $item->nama }}</h3>
                                    <p class="text-green-600 font-bold text-lg mb-2">{{ $item->formatted_harga }}</p>
                                    <p class="text-gray-500 text-sm mb-2">📍 {{ $item->lokasi }}</p>
                                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($item->deskripsi, 60) }}</p>

                                    <!-- Tampilkan status terjual -->
                                    @if ($item->terjual)
                                        <div
                                            class="inline-flex items-center gap-1 bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold w-fit mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M18.364 5.636l-1.414-1.414L12 9.172 7.05 4.222 5.636 5.636 10.586 10.586 5.636 15.536l1.414 1.414L12 12.828l4.95 4.95 1.414-1.414-4.95-4.95z" />
                                            </svg>
                                            Terjual
                                        </div>
                                    @else
                                        <div
                                            class="inline-flex items-center gap-1 bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold w-fit mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            Tersedia
                                        </div>
                                    @endif


                                    <div class="flex gap-2 mt-2">
                                        <a href="{{ route('produk.edit', $item->id) }}"
                                            class="flex-1 bg-yellow-500 text-white text-center py-2 px-3 rounded text-sm hover:bg-yellow-600 transition">
                                            Edit
                                        </a>
                                        <form action="{{ route('produk.delete', $item->id) }}" method="POST"
                                            class="flex-1"
                                            onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-full bg-red-500 text-white py-2 px-3 rounded text-sm hover:bg-red-600 transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="text-6xl mb-4">🏪</div>
                        <p class="text-gray-500 mb-4">Belum ada produk di toko Anda</p>
                        <a href="{{ route('produk.tambah') }}"
                            class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition">
                            Tambah Produk Pertama
                        </a>
                    </div>
                @endif
            </div>

            <!-- Tab Ulasan -->
            <div id="ulasan-content" class="tab-content hidden">
                @if ($ulasan->count())
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach ($ulasan as $u)
                            <div class="border rounded p-4 shadow bg-white">

                                <!-- Rating -->
                                <div class="text-yellow-400 text-lg mb-2">
                                    {!! str_repeat('★', $u->rating) . str_repeat('☆', 5 - $u->rating) !!}
                                </div>
                                <!-- Isi ulasan -->
                                <p class="text-gray-700 mb-2">{{ $u->isi }}</p>
                                <!-- Nama user -->
                                <div class="flex items-center gap-2 mt-2">
                                    <div
                                        class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-sm">
                                        {{ strtoupper(substr($u->user->name, 0, 1)) }}
                                    </div>
                                    <p class="text-sm text-gray-600 font-semibold">{{ $u->user->name }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center text-gray-500 py-6">Belum ada ulasan.</div>
                @endif
            </div>

            <script>
                function showTab(tabName) {
                    // Hide all tab contents
                    const contents = document.querySelectorAll('.tab-content');
                    contents.forEach(content => content.classList.add('hidden'));

                    // Remove active class from all tabs
                    const tabs = document.querySelectorAll('.tab-button');
                    tabs.forEach(tab => {
                        tab.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600', 'font-medium');
                        tab.classList.add('text-gray-500', 'hover:text-gray-700');
                    });

                    // Show selected tab content
                    document.getElementById(tabName + '-content').classList.remove('hidden');

                    // Add active class to selected tab
                    event.target.classList.remove('text-gray-500', 'hover:text-gray-700');
                    event.target.classList.add('text-blue-600', 'border-b-2', 'border-blue-600', 'font-medium');
                }
            </script>
</body>

</html>

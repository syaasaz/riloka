<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Penjual</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans min-h-screen">

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

    <!-- Alert Success -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mx-4 mt-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Kontainer Utama -->
    <div class="max-w-6xl mx-auto bg-white mt-6 rounded-lg shadow-lg overflow-hidden px-6">

        <!-- Section Profil -->
        <div class="text-center py-8">
            <div class="w-20 h-20 bg-gradient-to-br from-pink-400 to-yellow-400 rounded-full mx-auto mb-4 flex items-center justify-center">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                    </path>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-gray-800 mb-1">{{ $penjual->nama }}</h2>
            <p class="text-sm text-gray-600 mb-2">{{ $penjual->name }}</p>
        </div>

        <!-- Tabs -->
        <div class="border-b border-gray-200">
            <nav class="flex justify-center">
                <button class="tab-button py-3 px-6 text-blue-600 border-b-2 border-blue-600 font-medium" onclick="showTab('toko')">
                    Toko
                </button>
                <button class="tab-button py-3 px-6 text-gray-500 hover:text-gray-700" onclick="showTab('ulasan')">
                    Ulasan
                </button>
            </nav>
        </div>

        <!-- Tab Content -->
        <div class="py-6">

            <!-- Tab Toko -->
            <div id="toko-content" class="tab-content">
                @if($produk->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($produk as $item)
                            <div class="bg-white border border-gray-300 rounded-lg shadow-sm hover:shadow-md transition duration-200">
                                <div class="aspect-square bg-gray-100 rounded-t-lg overflow-hidden">
                                    @if($item->gambar)
                                        <img src="{{ asset('images/' . $item->gambar) }}" 
                                             alt="{{ $item->nama }}" 
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-400 text-4xl">
                                            📷
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h3 class="font-semibold text-gray-800 mb-1">{{ $item->nama }}</h3>
                                    <p class="text-green-600 font-bold text-lg mb-1">Rp{{ number_format($item->harga, 0, ',', '.') }}</p>
                                    <p class="text-gray-500 text-sm mb-1">📍 {{ $item->lokasi }}</p>
                                    <p class="text-gray-600 text-sm">{{ Str::limit($item->deskripsi, 60) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="text-6xl mb-4">🏪</div>
                        <p class="text-gray-500">Belum ada produk di toko ini</p>
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


    <!-- Script Tab -->
    <script>
        function showTab(tabName) {
            const contents = document.querySelectorAll('.tab-content');
            contents.forEach(content => content.classList.add('hidden'));

            const tabs = document.querySelectorAll('.tab-button');
            tabs.forEach(tab => {
                tab.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600', 'font-medium');
                tab.classList.add('text-gray-500', 'hover:text-gray-700');
            });

            document.getElementById(tabName + '-content').classList.remove('hidden');
            event.target.classList.remove('text-gray-500', 'hover:text-gray-700');
            event.target.classList.add('text-blue-600', 'border-b-2', 'border-blue-600', 'font-medium');
        }
    </script>
</body>
</html>
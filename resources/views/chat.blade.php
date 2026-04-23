<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Chat Produk dan Pesan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800 font-sans">

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

    <!-- Chat Layout -->
    <div class="flex h-[calc(100vh-80px)]">
        <!-- Sidebar -->
        <div class="w-1/3 border-r p-4 overflow-y-auto">
            <h2 class="text-2xl font-semibold mb-4">Chat</h2>

            @if ($produk)
                <div class="flex items-center justify-between hover:bg-gray-100 p-2 rounded cursor-pointer">
                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('images/profil.png') }}" alt="Foto Toko"
                            class="w-10 h-10 rounded-full object-cover">
                        <div class="flex flex-col">
                            <span class="text-sm font-semibold text-gray-900">{{ $produk->user->name }}</span>
                            <span class="text-xs text-gray-500 truncate max-w-[120px]">Halo selamat datang di toko
                                kami...</span>
                        </div>
                    </div>
                    <span class="text-xs text-gray-400">
                        {{ now()->format('H:i') }}
                    </span>
                </div>
            @else
                <p class="text-gray-400 italic text-sm">Tidak ada toko yang dipilih</p>
            @endif
        </div>

        <!-- Chat Box -->
        <div class="w-2/3 bg-[#f9f9f9] flex flex-col">
            <!-- Header Chat -->
            <div class="flex items-center p-4 bg-white shadow border-b">
                <img src="{{ asset('images/profil.png') }}" class="w-12 h-12 rounded-full object-cover mr-3">

                <div class="flex flex-col">
                    <span class="text-base font-semibold text-gray-800">
                       @if ($produk && $produk->user)
                            {{ $produk->user->name }}
                        @endif
                    </span>
                    <span class="text-sm text-gray-500">
                    </span>
                </div>
            </div>


            <!-- Chat Messages -->
            <div id="chatBox" class="flex-1 p-4 overflow-y-auto space-y-2">
                @foreach ($pesan as $p)
                    @if ($p->sender_id == auth()->id())
                        <!-- Pesan dari user (kanan) -->
                        <div class="text-right">
                            <div class="bg-blue-500 text-white px-4 py-2 rounded-lg inline-block">
                                {{ $p->isi }}
                            </div>
                        </div>
                    @else
                        <!-- Pesan dari penjual (kiri) -->
                        <div class="text-left">
                            <div class="bg-gray-300 text-black px-4 py-2 rounded-lg inline-block">
                                {{ $p->isi }}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Produk Terkait -->
            @if ($produk)
                <div class="flex items-center justify-between bg-white border rounded-md m-4 p-3 shadow-sm">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/' . $produk->gambar) }}" alt="Gambar Produk"
                            class="w-16 h-16 object-cover rounded">
                        <div>
                            <p class="text-sm text-gray-700 mb-1">Kamu menanyakan tentang produk ini.</p>
                            <p class="text-sm text-gray-800 font-medium truncate w-44">{{ $produk->name }}</p>
                            <p class="text-sm font-semibold text-red-600">
                                Rp{{ number_format($produk->harga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <a href="{{ route('produk.detail', ['id' => $produk->id]) }}"
                        class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600 text-sm">
                        Lihat Produk
                    </a>
                </div>
            @endif


            <!-- Form Kirim Pesan -->
            <div class="p-4 bg-gray-200">
                <form id="formKirim" method="POST" action="{{ route('chat.kirim') }}"
                    class="flex items-center bg-white rounded-full px-4 py-2 shadow">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $produk->id ?? '' }}">
                    <input type="hidden" name="receiver_id" value="{{ $penjual->id }}">
                    <input id="chatInput" name="isi" type="text" placeholder="Tulis pesan..."
                        class="flex-1 bg-transparent outline-none text-sm px-2">
                    <button type="submit" class="ml-3 text-black hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Script Kirim Pesan -->
    <script>
        const chatBox = document.getElementById('chatBox');
        const chatInput = document.getElementById('chatInput');
        const formKirim = document.getElementById('formKirim');

        formKirim.addEventListener('submit', function(e) {
            e.preventDefault();
            const message = chatInput.value.trim();

            if (message !== '') {
                const bubble = document.createElement('div');
                bubble.className = 'bg-blue-500 text-white px-4 py-2 rounded-lg self-end max-w-xs ml-auto';
                bubble.textContent = message;
                chatBox.appendChild(bubble);
                chatInput.value = '';
                chatBox.scrollTop = chatBox.scrollHeight;

                this.submit(); // Kirim form via POST
            }
        });
    </script>

</body>

</html>

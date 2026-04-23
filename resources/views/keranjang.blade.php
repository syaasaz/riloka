<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang - Riloka</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Header -->
    <div class="bg-[#A6C9D5] p-4 flex items-center">
        <a href="{{ route('dashboard') }}" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <img src="{{ asset('images/logoriloka.png') }}" alt="Logo Riloka" class="w-20 h-auto hover:opacity-80 transition">
        </a>
    </div>

    <!-- Konten -->
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Keranjang</h1>

        @if ($keranjang->isEmpty())
            <div class="bg-white p-6 rounded shadow text-center">
                <p class="text-gray-500">Keranjang kamu kosong.</p>
            </div>
        @else
            <div class="bg-white border-2 border-blue-400 p-4 rounded-md space-y-4">
                <!-- User -->
                <div class="flex items-center mb-4">
                    <img src="{{ asset('images/profil.png') }}" alt="Avatar" class="w-12 h-12 rounded-full border">
                    <span class="ml-3 font-semibold text-lg">{{ Auth::user()->name }}</span>
                </div>

                @php $total = 0; @endphp

                @foreach ($keranjang as $item)
                    @php
                        $subtotal = $item->produk->harga * $item->jumlah;
                        $total += $subtotal;
                    @endphp

                    <!-- Produk -->
                    <div class="flex border-b pb-4">
                        <img src="{{ asset('images/' . $item->produk->gambar) }}" alt="{{ $item->produk->nama }}" class="w-32 h-32 object-cover border mr-4">
                        <div class="flex flex-col justify-between flex-grow">
                            <div>
                                <p class="font-bold">{{ $item->produk->nama }}</p>
                                <p>Rp{{ number_format($item->produk->harga) }}</p>
                                <p>{{ $item->produk->ukuran ?? 'All Size' }}</p>
                                <form action="{{ route('keranjang.hapus', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus item ini?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-500 font-semibold hover:underline">Hapus</button>
</form>

                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Total dan Checkout -->
                <div class="flex justify-between items-center pt-4 border-t">
                    <div class="text-right">
                        <p class="font-semibold">Total</p>
                        <p class="font-bold text-xl">Rp{{ number_format($total) }}</p>
                    </div>
                    <a href="{{ route('checkout') }}" class="bg-blue-300 text-white px-4 py-2 rounded hover:bg-blue-400">
                        Checkout {{ count($keranjang) }} Item
                    </a>
                </div>
            </div>
        @endif
    </div>

</body>
</html>
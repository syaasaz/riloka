<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Toko</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F5F5F5] font-sans min-h-screen">

<header class="bg-[#A6C9D5] p-4 flex items-center justify-between">
    <div class="flex items-center gap-2">
        <img src="{{ asset('images/logoriloka.png') }}" alt="Logo" class="h-10">
        <h1 class="text-lg font-semibold text-white">Riloka</h1>
    </div>
</header>

<section class="max-w-4xl mx-auto bg-white mt-6 p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Toko: {{ $user->nama }}</h2>

    @if(count($produk) > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($produk as $p)
                <div class="border p-2 bg-gray-50 rounded shadow">
                    <img src="{{ asset('images/' . $p->gambar) }}" class="w-full h-40 object-cover mb-2">
                    <div class="font-semibold">{{ $p->nama }}</div>
                    <div class="text-sm text-gray-700">Rp {{ number_format($p->harga, 0, ',', '.') }}</div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">Belum ada produk ditambahkan.</p>
    @endif
</section>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Panduan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800 font-sans">

    <!-- Header -->
    <div class="w-full bg-[#A6C9D5] py-4 px-6 relative flex items-center justify-center border-b">

        <!-- Tombol panah dan logo di kiri -->
        <div class="absolute left-4 top-1/2 -translate-y-1/2 flex items-center space-x-2">
            <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-100">
                <!-- Ikon panah kiri -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <a href="{{ route('dashboard') }}">
    <img src="{{ asset('images/logoriloka.png') }}" alt="Logo Riloka" class="w-20 h-auto hover:opacity-80 transition">
</a>

        </div>

        <!-- Judul di tengah -->
        <h1 class="text-xl font-bold text-white">Panduan</h1>
    </div>

    <!-- Isi Panduan -->
    <div class="max-w-3xl mx-auto px-6 py-10 space-y-10">

        <!-- Bagian Pembeli -->
        <div>
            <h2 class="text-xl font-semibold mb-2">{{ $panduan->judul_1 }}</h2>
            <div class="bg-[#F5F5F5] p-4 rounded-md shadow-sm">
                <div class="text-sm whitespace-pre-line">
                    {!! nl2br(e($panduan->isi_1)) !!}
                </div>
            </div>
        </div>

        <!-- Bagian Penjual -->
        <div>
            <h2 class="text-xl font-semibold mb-2">{{ $panduan->judul_2 }}</h2>
            <div class="bg-[#F5F5F5] p-4 rounded-md shadow-sm">
                <div class="text-sm whitespace-pre-line">
                    {!! nl2br(e($panduan->isi_2)) !!}
                </div>
            </div>
        </div>

    </div>

</body>
</html>

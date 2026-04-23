<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ulasan Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F5F5F5] font-sans min-h-screen">

    <!-- Header -->
    <header class="bg-[#A6C9D5] p-4 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <a href="javascript:history.back()" class="text-white text-2xl mr-4">←</a>
            <img src="{{ asset('images/logoriloka.png') }}" alt="Logo Riloka" class="h-8">
        </div>
    </header>

    <!-- Konten -->
    <section class="max-w-2xl mx-auto mt-6 bg-white p-6 rounded shadow">

        <!-- User Info -->
        <div class="flex items-center gap-4 mb-4">
            <img src="{{ asset('images/profil.png') }}" class="w-12 h-12 rounded-full" alt="Foto User">
            <p class="text-sm text-gray-2000">{{ $user->name }}</p>
        </div>

        <!-- Form Ulasan -->
        <form action="{{ route('ulasan.store') }}" method="POST">
        @csrf
        <input type="hidden" name="produk_id" value="{{ $produk->id }}">

        <!-- Penilaian -->
        <div class="mb-4">
            <label class="block mb-2">Beri penilaian untuk produk</label>
        <div class="flex text-2xl gap-1 text-yellow-500" id="rating-stars">
            @for ($i = 1; $i <= 5; $i++)
                <span class="star cursor-pointer" data-value="{{ $i }}">☆</span>
            @endfor
        </div>
        <input type="hidden" name="rating" id="rating-input" value="0">
    </div>

    <!-- Komentar -->
    <div class="mb-6">
        <label class="block mb-2">Bagikan ulasan</label>
        <textarea name="isi" rows="4" class="w-full border bg-gray-100 p-3 rounded resize-none" placeholder="Tulis ulasan kamu di sini..." required></textarea>
    </div>

    <!-- Tombol Kirim -->
    <div class="text-right">
        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600 transition">Kirim</button>
    </div>
</form>


    <!-- JavaScript Bintang -->
    <script>
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('rating-input');

        stars.forEach(star => {
            star.addEventListener('click', () => {
                const value = parseInt(star.dataset.value);
                ratingInput.value = value;

                stars.forEach((s, i) => {
                    s.textContent = (i < value) ? '★' : '☆';
                });
            });
        });
    </script>
</body>
</html>

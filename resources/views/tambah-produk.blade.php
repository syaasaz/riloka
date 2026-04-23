<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F5F5F5] font-sans min-h-screen">

    <!-- Header -->
    <div class="bg-[#AECBD5] p-4 flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <a href="{{ route('profil') }}" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <a href="{{ route('profil') }}">
                <img src="{{ asset('images/logoriloka.png') }}" alt="Logo Riloka"
                    class="w-20 h-auto hover:opacity-80 transition">
            </a>
        </div>
        <div class="w-6"></div> <!-- Spacer -->
    </div>

    <!-- Form Tambah Produk -->
    <section class="max-w-xl mx-auto bg-white mt-6 p-6 rounded shadow">
        <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Nama Produk -->
            <label class="block mb-2 font-medium">Nama Produk</label>
            <input type="text" name="nama" class="w-full border p-2 mb-4 rounded">

            <!-- Foto -->
            <label class="block mb-2 font-medium">Foto</label>
            <input type="file" name="foto" class="mb-4">

            <!-- Deskripsi -->
            <label class="block mb-2 font-medium">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="w-full border p-2 mb-4 rounded"></textarea>

            <!-- Kategori (Select Box) -->
            <label class="block mb-2 font-medium">Kategori</label>
            <select name="kategori" class="w-full border p-2 mb-4 rounded">
                <option value="">-- Pilih Kategori --</option>
                <option value="Wanita">Wanita</option>
                <option value="Pria">Pria</option>
            </select>

            <!-- Merek -->
            <label class="block mb-2 font-medium">Merek</label>
            <input type="text" name="merek" class="w-full border p-2 mb-4 rounded">

            <!-- Ukuran -->
            <label class="block mb-2 font-medium">Ukuran</label>
            <input type="text" name="ukuran" class="w-full border p-2 mb-4 rounded">

            <!-- Lokasi -->
            <label class="block mb-2 font-medium">Lokasi</label>
            <input type="text" name="lokasi" class="w-full border p-2 mb-4 rounded">

            <!-- Harga -->
            <label class="block mb-2 font-medium">Harga</label>
            <input type="text" name="harga" class="w-full border p-2 mb-4 rounded">

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition mt-4">Kirim</button>
        </form>
    </section>

</body>
</html>
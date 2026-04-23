<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F5F5F5] font-sans min-h-screen">

    <!-- Header -->
    <header class="bg-[#A6C9D5] p-4 flex items-center">
        <a href="{{ route('profil') }}" class="text-white text-xl mr-4">←</a>
        <h1 class="text-white font-bold text-lg">Riloka</h1>
    </header>

    <!-- Form -->
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <form method="POST" action="{{ route('profil.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Foto Profil -->
            <div class="flex items-center justify-center mb-4">
                <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('images/default.png') }}" alt="Foto Profil" class="w-24 h-24 rounded-full object-cover border">
            </div>

            <!-- Tombol Ganti dan Hapus -->
            <div class="flex justify-center gap-2 mb-4">
                <input type="file" name="foto" class="hidden" id="fotoInput">
                <label for="fotoInput" class="bg-blue-100 hover:bg-blue-200 px-4 py-2 rounded cursor-pointer text-sm">Ganti gambar</label>
                <button type="submit" name="hapus_foto" value="1" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded text-sm">🗑 Hapus</button>
            </div>

            <!-- Nama -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $user->nama) }}" class="w-full border px-3 py-2 rounded" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Deskripsi</label>
                <input type="text" name="deskripsi" value="{{ old('deskripsi', $user->deskripsi) }}" class="w-full border px-3 py-2 rounded">
            </div>

            <!-- Tombol Kirim -->
            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">Kirim</button>
        </form>
    </div>

</body>
</html>

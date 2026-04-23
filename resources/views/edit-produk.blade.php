<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans min-h-screen">

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

    <!-- Konten Utama -->
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <div class="flex flex-col md:flex-row gap-8">

            <!-- Gambar Produk -->
            <div class="w-full md:w-1/2 flex flex-col items-center">
                <div class="relative w-full aspect-square bg-gray-100 rounded">
                    @if ($produk->gambar)
                        <img src="{{ asset('images/' . $produk->gambar) }}" class="object-cover w-full h-full rounded"
                            alt="Foto Produk">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-4xl text-gray-400">📷</div>
                    @endif

                    <!-- Tombol Edit Gambar -->
                    <label for="foto"
                        class="absolute bottom-2 right-2 bg-black bg-opacity-60 p-2 rounded-full cursor-pointer">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536M9 11l6.293-6.293a1 1 0 011.414 0l2.586 2.586a1 1 0 010 1.414L13 15m-4 0h4">
                            </path>
                        </svg>
                        <input type="file" form="edit-form" name="foto" id="foto" class="hidden">
                    </label>
                </div>
            </div>

            <!-- Form Input -->
            <div class="w-full md:w-1/2 space-y-4">
                <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div>
                        <label class="block font-semibold">Nama</label>
                        <input type="text" name="nama" value="{{ $produk->nama }}"
                            class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block font-semibold">Deskripsi</label>
                        <textarea name="deskripsi" class="w-full border rounded px-3 py-2">{{ $produk->deskripsi }}</textarea>
                    </div>
                    <div>
                        <label class="block font-semibold">Ukuran</label>
                        <input type="text" name="ukuran" value="{{ $produk->ukuran }}"
                            class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block font-semibold">Lokasi</label>
                        <input type="text" name="lokasi" value="{{ $produk->lokasi }}"
                            class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block font-semibold">Harga</label>
                        <input type="number" name="harga" value="{{ $produk->harga }}"
                            class="w-full border rounded px-3 py-2">
                    </div>

                    <!-- Tombol Edit -->
                    <div class="flex gap-2 mt-4">
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Simpan</button>
                    </div>
                </form>

                <!-- Form Hapus (Dipisah tapi tetap sejajar secara visual) -->
                <div class="mt-2">
                    <form action="{{ route('produk.delete', $produk->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Hapus</button>
                    </form>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>

</body>

</html>

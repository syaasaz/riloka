<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pemesanan - Riloka</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Header -->
    <div class="bg-[#A6C9D5] p-4 flex items-center">
        <button onclick="window.history.back();" class="text-white text-xl mr-4">←</button>
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logoriloka.png') }}" alt="Logo Riloka" class="w-20 h-auto hover:opacity-80 transition">
        </a>
    </div>

    <!-- Konten -->
    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- Form pemesanan & Pembayaran -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-bold mb-4">Alamat</h2>

            <div class="mb-3">
                <label class="block font-semibold mb-1">Nama Penerima</label>
                <input type="text" value="{{ $checkout->nama }}" class="w-full border p-2 rounded" readonly>
            </div>

            <div class="mb-3">
                <label class="block font-semibold mb-1">Nomor Telepon</label>
                <input type="text" value="{{ $checkout->telepon }}" class="w-full border p-2 rounded" readonly>
            </div>

            <div class="mb-3">
                <label class="block font-semibold mb-1">Alamat</label>
                <textarea class="w-full border p-2 rounded" rows="3" readonly>{{ $checkout->alamat }}</textarea>
            </div>

            <h2 class="text-xl font-bold mb-4 mt-6">Pemesanan</h2>

            <div class="p-4 bg-green-100 border rounded mb-4">
                <p class="font-semibold">Reguler</p>
                <p>Garansi tiba: 24-26 Juni</p>
                <p>Rp11.000</p>
            </div>

            <h2 class="text-xl font-bold mb-4">Pembayaran</h2>

            <div class="p-4 bg-gray-100 border rounded mb-4">
                <p class="font-semibold">COD (Bayar di Tempat)</p>
            </div>

            <!-- Tombol Buat Pesanan -->
            <button 
                onclick="buatPesanan()" 
                class="w-full bg-blue-300 text-white font-semibold py-2 rounded transition-colors duration-300 hover:bg-blue-400">
                Buat Pesanan
            </button>

            <!-- Modal -->
            <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                <div class="bg-white p-8 rounded shadow-lg text-center">
                    <div class="flex justify-center mb-4">
                        <svg class="w-20 h-20 text-green-500 animate-bounce" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold mb-2">Pesanan Berhasil Dibuat!</h2>
                    <p class="text-gray-600">Anda akan diarahkan ke halaman profil...</p>
                </div>
            </div>

            <script>
                function buatPesanan() {
                    fetch("{{ route('buat.pesanan') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            pesanan_ids: JSON.parse(`@json($pesanans->pluck('id'))`),
                            jumlahs: JSON.parse(`@json($pesanans->pluck('jumlah'))`)
                        })

                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('successModal').classList.remove('hidden');
                            setTimeout(function() {
                                window.location.href = "{{ route('profil') }}";
                            }, 3000);
                        } else {
                            alert("Pesanan gagal dibuat!");
                        }
                    });
                }
            </script>

        </div>
        
        <!-- Profil & Pesanan -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-bold mb-4">Profil</h2>
            <div class="flex items-center mb-4">
                <img src="{{ asset('images/profil.png') }}" alt="Avatar" class="w-12 h-12 rounded-full border">
                <span class="ml-3 font-semibold text-lg">{{ Auth::user()->name }}</span>
            </div>

            <h2 class="text-xl font-bold mb-4">Pesanan</h2>

            @php $totalHarga = 0; @endphp

            @foreach ($pesanans as $pesanan)
                <div class="flex mb-4">
                    <img src="{{ asset('images/' . $pesanan->produk->gambar) }}" class="w-24 h-24 object-cover border mr-4" alt="{{ $pesanan->produk->nama }}">
                    <div>
                        <p class="font-bold">{{ $pesanan->produk->nama }}</p>
                        <p>Rp{{ number_format($pesanan->produk->harga, 0, ',', '.') }}</p>
                        <p>{{ $pesanan->produk->ukuran ?? 'All Size' }}</p>
                    </div>
                </div>
                @php $totalHarga += $pesanan->produk->harga * $pesanan->jumlah; @endphp
            @endforeach

            <div class="mt-6 border-t pt-4">
                <div class="flex justify-between mb-2">
                    <span>{{ $pesanans->sum('jumlah') }} item</span>
                    <span>Rp{{ number_format($totalHarga, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>Pemesanan</span>
                    <span>Rp11.000</span>
                </div>
                <div class="flex justify-between font-bold">
                    <span>Total</span>
                    <span>Rp{{ number_format($totalHarga + 11000, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

    </div>
</body>
</html>

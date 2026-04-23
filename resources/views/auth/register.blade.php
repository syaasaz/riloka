<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Riloka</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-blue-200 to-blue-300 min-h-screen flex items-center justify-center font-sans">
    <div class="bg-white rounded-xl shadow-md flex overflow-hidden w-[900px]">

        <!-- Sisi Kiri (Gambar Kaos Daur Ulang) -->
        <div class="w-1/2 bg-blue-100 flex items-center justify-center p-5">
            <img src="{{ asset('images/bajudaun.png') }}" alt="Ilustrasi Kaos" class="w-60 h-60">
        </div>

        <!-- Sisi Kanan (Form Register) -->
        <div class="w-1/2 bg-white p-10">
            <div class="text-center mb-6">
                <img src="{{ asset('images/logoriloka.png') }}" class="mx-auto mb-2" style="width: 150px; height: auto;"
                    alt="Riloka">
                <p class="text-sm text-gray-600">Buat Akun Baru</p>
            </div>

            {{-- Tampilkan error validasi --}}
            @if ($errors->any())
                <div class="mb-4 text-sm text-red-600">
                    <ul class="list-disc ml-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.submit') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm mb-1">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm mb-1">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="block text-sm mb-1">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-2 rounded hover:bg-blue-700 transition mb-4">
                    Daftar
                </button>

                <div class="text-center text-gray-500 my-4">atau</div>


                <a href="{{ route('register') }}"
                    class="w-full border border-gray-300 py-2 rounded flex items-center justify-center hover:bg-gray-100 transition mb-3">
                    <img src="{{ asset('images/google.png') }}" class="w-5 h-5 mr-2" alt="Google">
                    Daftar dengan Google
                </a>

                <div class="text-sm text-center mt-4">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login di sini</a>
                </div>
            </form>

        </div>
    </div>
</body>

</html>

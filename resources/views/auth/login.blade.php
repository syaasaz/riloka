<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Riloka</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-200 to-blue-300 min-h-screen flex items-center justify-center font-sans">
    <div class="bg-white rounded-xl shadow-md flex overflow-hidden w-[700px]">
        
        <!-- Sisi Kiri (Logo Baju) -->
        <div class="w-1/2 bg-blue-100 flex items-center justify-center p-5">
            <img src="{{ asset('images/bajudaun.png') }}" alt="Logo" class="w-48 h-48">
        </div>

        <!-- Sisi Kanan (Form Login) -->
        <div class="w-1/2 p-8">
            <div class="text-center mb-4">
                <img src="{{ asset('images/logoriloka.png') }}" class="mx-auto mb-2" style="width: 200px; height: auto;" alt="Riloka">
                <p class="text-sm text-gray-600">Masuk untuk mulai berbelanja</p>
            </div>

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm mb-1">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm mb-1">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Masuk</button>

                <div class="text-center my-4 text-gray-500">atau</div>

                <button type="button"
                    class="w-full border border-gray-300 py-2 rounded flex items-center justify-center hover:bg-gray-100 transition">
                    <img src="{{ asset('images/google.png') }}" class="w-5 h-5 mr-2" alt="Google">
                    Masuk dengan Google
                </button>
            </form>

            <div class="text-sm text-center mt-4">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar di sini</a>
            </div>
        </div>
    </div>
</body>
</html>
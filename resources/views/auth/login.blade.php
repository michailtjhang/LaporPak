<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Form</title>
    {{-- @vite('resources/css/app.css') --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="flex w-full max-w-4xl bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Left Side: Image -->
        <div class="w-1/2 h-auto">
            <img src="https://imgsrv2.voi.id/vz2ms6nQBKnlE0uG-6OAlanbLY-b4o1JCJ98TgxlL18/auto/1200/675/sm/1/bG9jYWw6Ly8vcHVibGlzaGVycy80MDI5NzUvMjAyNDA3MjkyMDA4LW1haW4uY3JvcHBlZF8xNzIyMjU4NTIwLnBuZw.jpg" alt="Police in city"
                class="w-full h-full object-cover">
        </div>

        <!-- Right Side: Form -->
        <div class="w-1/2 p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Sign In</h2>

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-sm text-gray-700">Email</label>
                    <input type="text" id="email" name="email" placeholder="Masukkan Email / No Tlp"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-pink-600">
                </div>

                <div>
                    <label for="password" class="block text-sm text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-pink-600">
                </div>

                <div class="flex justify-between items-center">
                    <a href="#" class="text-sm text-pink-600 hover:underline">Lupa Password?</a>
                </div>

                <button type="submit"
                    class="w-full py-2 px-4 bg-pink-600 text-white font-semibold rounded-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500">Log
                    In</button>

            </form>
            <div class="mt-4 flex items-center justify-center">
                <a href="{{ route('auth.socialite.redirect') }}"
                    class="flex items-center px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100">
                    <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google"
                        class="w-5 h-5 mr-2">
                    Sign In with Google
                </a>
            </div>

            <p class="text-center text-sm text-gray-500 mt-4">
                Masih Belum Punya Akun? <a href="/" class="text-pink-600 hover:underline">Daftar</a>
            </p>
        </div>
    </div>

</body>

</html>

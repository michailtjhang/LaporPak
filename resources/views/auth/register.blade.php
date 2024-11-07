<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Account Form</title>
    {{-- @vite('resources/css/app.css') --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="flex w-full max-w-4xl bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Left Side: Form -->
        <div class="w-1/2 p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Create an account
            </h2>

            @include('_message')

            <form action="" method="POST" class="space-y-4">
                @csrf

                <div class="flex space-x-2">
                    <div class="w-1/2">
                        <label for="fullName" class="block text-sm text-gray-700">Full Name</label>
                        <input type="text" id="fullname" name="fullname" placeholder="Masukkan Nama Lengkap"
                            class="mt-1 block w-full px-3 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-pink-600 @error('fullname') border-red-500 @enderror" />

                        @error('fullname')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-1/2">
                        <label for="username" class="block text-sm text-gray-700">Username</label>
                        <input type="text" id="username" name="username" placeholder="Masukkan Username"
                            class="mt-1 block w-full px-3 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-pink-600 @error('username') border-red-500 @enderror" />

                        @error('username')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan Email"
                        class="mt-1 block w-full px-3 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-pink-600 @error('email') border-red-500 @enderror" />

                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password"
                        class="mt-1 block w-full px-3 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-pink-600 @error('password') border-red-500 @enderror" />

                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="confirmPassword" class="block text-sm text-gray-700">Confirm Password</label>
                    <input type="password" id="confirmPassword" placeholder="Konfirmasi Password"
                        class="mt-1 block w-full px-3 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-pink-600 @error('confirmPassword') border-red-500 @enderror" />

                    @error('confirmPassword')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center mt-2">
                    <input type="checkbox" id="show-password" class="mr-2 h-4 w-4 text-pink-600 focus:ring-pink-500 rounded">
                    <label for="show-password" class="text-sm text-gray-700">Tampilkan Password</label>
                </div>

                <button type="submit"
                    class="w-full py-2 px-4 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-pink-500">
                    Create Account
                </button>

            </form>
            <div class="mt-4 flex items-center justify-center">
                <a href="{{ route('auth.socialite.redirect') }}"
                    class="flex items-center px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100">
                    <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google"
                        class="w-5 h-5 mr-2" />
                    Sign Up with Google
                </a>
            </div>

            <p class="text-center text-sm text-gray-500 mt-4">
                Sudah Punya Akun?
                <a href="{{ route('login') }}" class="text-red-600 hover:underline">Sign In</a>
            </p>
        </div>

        <!-- Right Side: Image -->
        <div class="w-1/2 h-auto">
            <img src="https://imgsrv2.voi.id/vz2ms6nQBKnlE0uG-6OAlanbLY-b4o1JCJ98TgxlL18/auto/1200/675/sm/1/bG9jYWw6Ly8vcHVibGlzaGVycy80MDI5NzUvMjAyNDA3MjkyMDA4LW1haW4uY3JvcHBlZF8xNzIyMjU4NTIwLnBuZw.jpg"
                alt="Police in city" class="w-full h-full object-cover" />
        </div>
    </div>

    <script>
        // JavaScript to toggle password visibility
        document.getElementById('show-password').addEventListener('change', function () {
            const passwordField = document.getElementById('password');
            const confirmPasswordField = document.getElementById('confirmPassword');
            passwordField.type = this.checked ? 'text' : 'password';
            confirmPasswordField.type = this.checked ? 'text' : 'password';
        });
    </script>

</body>

</html>

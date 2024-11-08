<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }} - {{ config('app.name') }}</title>
    @yield('meta')
    {{-- @vite('resources/css/app.css') --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @yield('css')
</head>

<body class="bg-gray-100 flex flex-col min-h-screen relative">
    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="fixed top-0 left-0 h-full bg-white shadow w-60 p-5 z-10">
            <div class="flex justify-center mb-10">
                <img class="w-44"
                    src="https://blogger.googleusercontent.com/img/a/AVvXsEih9Mtd-ojQfuvQ4AJVPsExSI3n1Bdr4b_j5n49pUrb4FN--lPBLvQhZ_HB-8G9kSq4ZcTLLjni2Ohwl-bPQXv9upf2QwTOEehbr9qoMWmPNgav8gjtGmg9RR92OJjGU3Seskpz8nitY_ngnf6NKBptZzaAztoI6sfjfNbhtjxncqvnRiIKZ9F3vOMO8b90=s1600"
                    alt="Logo">
            </div>
            <nav class="space-y-4">
                @php
                    $PermissionUser = App\Models\PermissionRole::getPermission('User', Auth::user()->role_id);
                    $PermissionRole = App\Models\PermissionRole::getPermission('Role', Auth::user()->role_id);
                    $permissionDashboard = App\Models\PermissionRole::getPermission('Dashboard', Auth::user()->role_id);
                @endphp

                @if (!empty($permissionDashboard))
                    <a href="{{ url('dashboard') }}"
                        class="block py-2 px-3 shadow rounded-lg text-base font-semibold {{ Request::segment(1) == 'dashboard' ? 'text-rose-600 bg-rose-100' : 'text-black bg-white' }}">Dashboard</a>
                @endif

                <a href="{{ url('tickets') }}"
                    class="block py-2 px-3 shadow rounded-lg text-base font-semibold {{ Request::segment(1) == 'tickets' ? 'text-rose-600 bg-rose-100' : 'text-black bg-white' }}">Aduan</a>

                @if (!empty($PermissionRole))
                    <a href="{{ route('role.index') }}"
                        class="block py-2 px-3 shadow rounded-lg text-base font-semibold {{ Request::segment(1) == 'role' ? 'text-rose-600 bg-rose-100' : 'text-black bg-white' }}">Role</a>
                @endif

                <a href="{{ route('privacy-policy') }}"
                    class="block py-2 px-3 shadow rounded-lg text-base font-semibold {{ Request::segment(1) == 'privacy-policy' ? 'text-rose-600 bg-rose-100' : 'text-black bg-white' }}">Privacy
                    Policy</a>
                <a href="{{ route('faq') }}"
                    class="block py-2 px-3 shadow rounded-lg text-base font-semibold {{ Request::segment(1) == 'faq' ? 'text-rose-600 bg-rose-100' : 'text-black bg-white' }}">FAQ</a>
                <a href="{{ route('about') }}"
                    class="block py-2 px-3 shadow rounded-lg text-base font-semibold {{ Request::segment(1) == 'about' ? 'text-rose-600 bg-rose-100' : 'text-black bg-white' }}">Tentang</a>
                <a href="{{ route('contact') }}"
                    class="block py-2 px-3 shadow rounded-lg text-base font-semibold {{ Request::segment(1) == 'contact' ? 'text-rose-600 bg-rose-100' : 'text-black bg-white' }}">Kontak</a>


            </nav>
        </aside>

        <!-- Main content -->
        <main class="flex-1 p-6 ml-60">
            <!-- Notification Profile -->
            <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow mb-6">
                <div class="flex items-center">
                    <div class="relative">
                        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center">
                            <img src="https://cdn.icon-icons.com/icons2/2643/PNG/512/female_woman_person_people_avatar_icon_159367.png"
                                alt="Profile Picture" class="w-full h-full rounded-full">
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-gray-700 text-lg font-medium">{{ Auth::user()->fullname }}</h3>
                        <p class="text-gray-500 text-sm">{{ Auth::user()->role->name }}</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center shadow">
                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 2a6 6 0 00-6 6v4H3a1 1 0 000 2h14a1 1 0 000-2h-1V8a6 6 0 00-6-6zM7 16a3 3 0 006 0H7z" />
                        </svg>
                    </button>
                    <a href="{{ route('logout') }}"
                        class="flex items-center space-x-2 bg-pink-500 text-white px-4 py-2 rounded-lg shadow">
                        <span class="text-sm">Log Out</span>
                    </a>
                </div>
            </div>

            <!-- Content -->
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
    @yield('scripts')
</body>

</html>

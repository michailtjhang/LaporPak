<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }} - {{ config('app.name') }}</title>
    @yield('meta')
    {{-- @vite('resources/css/app.css') --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
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
                    $permissionAduan = App\Models\PermissionRole::getPermission('Aduan', Auth::user()->role_id);
                @endphp

                @if (!empty($permissionDashboard))
                    <a href="{{ url('dashboard') }}"
                        class="block py-2 px-3 shadow rounded-lg text-base font-semibold {{ Request::segment(1) == 'dashboard' ? 'text-rose-600 bg-rose-100' : 'text-black bg-white' }}">Dashboard</a>
                @endif

                @if (!empty($permissionAduan))
                    <a href="{{ url('tickets') }}"
                        class="block py-2 px-3 shadow rounded-lg text-base font-semibold {{ Request::segment(1) == 'tickets' ? 'text-rose-600 bg-rose-100' : 'text-black bg-white' }}">Aduan</a>
                @endif

                @if (!empty($PermissionRole))
                    <a href="{{ route('role.index') }}"
                        class="block py-2 px-3 shadow rounded-lg text-base font-semibold {{ Request::segment(1) == 'role' ? 'text-rose-600 bg-rose-100' : 'text-black bg-white' }}">Role</a>
                @endif

                @if (!empty($PermissionUser))
                    <a href="{{ route('users.index') }}"
                        class="block py-2 px-3 shadow rounded-lg text-base font-semibold {{ Request::segment(1) == 'users' ? 'text-rose-600 bg-rose-100' : 'text-black bg-white' }}">Anggota</a>
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
                    <button type="button" data-dropdown-toggle="notification-dropdown"
                        class="relative p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-300 bg-gray-100">
                        <span class="sr-only">View notifications</span>
                        <!-- Bell icon -->
                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 2a6 6 0 00-6 6v4H3a1 1 0 000 2h14a1 1 0 000-2h-1V8a6 6 0 00-6-6zM7 16a3 3 0 006 0H7z" />
                        </svg>
                        <!-- Badge -->
                        <div
                            class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2">
                            {{ $count }}
                        </div>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg"
                        id="notification-dropdown">
                        <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50">
                            Notifications
                        </div>
                        <div>
                            @if ($users->isEmpty())
                                <p class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">No new notifications
                                </p>
                            @else
                                @foreach ($users as $user)
                                    @foreach ($user->activities as $activity)
                                        <a href="#" class="flex py-3 px-4 border-b hover:bg-gray-100">
                                            <div class="flex-shrink-0">
                                                <img class="w-11 h-11 rounded-full"
                                                    src="https://cdn.icon-icons.com/icons2/2643/PNG/512/female_woman_person_people_avatar_icon_159367.png"
                                                    alt="Bonnie Green avatar">
                                                <div
                                                    class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 rounded-full border border-white bg-primary-700">
                                                    <svg class="w-2 h-2 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 18 18">
                                                        <path
                                                            d="M15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783ZM6 2h6a1 1 0 1 1 0 2H6a1 1 0 0 1 0-2Zm7 5H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Z" />
                                                        <path
                                                            d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="pl-3 w-full">
                                                <div class="text-gray-500 font-normal text-sm mb-1.5">
                                                    {{ $activity->message }} dari Pengguna <span
                                                        class="font-semibold text-gray-900">{{ $user->fullname }}</span>
                                                </div>
                                                <div class="text-xs font-medium text-primary-700 dark:text-primary-400">
                                                    {{ $activity->time->locale('in_id')->diffForHumans() }}</div>
                                            </div>
                                        </a>
                                    @endforeach
                                @endforeach
                            @endif
                        </div>
                        <a href="#"
                            class="block py-2 text-base font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100">
                            <div class="inline-flex items-center ">
                                <svg aria-hidden="true" class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                    <path fill-rule="evenodd"
                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                View all
                            </div>
                        </a>
                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    @yield('scripts')
</body>

</html>

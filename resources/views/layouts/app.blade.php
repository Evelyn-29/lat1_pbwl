<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-900 text-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-gray-800 to-gray-900 text-gray-200 shadow-lg">
            <div class="p-5 text-2xl font-bold tracking-wide border-b border-gray-700">
                ✨ Menu
            </div>
            <nav class="px-4 py-6 space-y-2">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-2 p-3 rounded-lg transition
                    {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white font-bold shadow' : 'hover:bg-gray-700' }}">
                    🏠 Dashboard
                </a>

                <a href="{{ route('mahasiswa.index') }}"
                    class="flex items-center gap-2 p-3 rounded-lg transition
                    {{ request()->routeIs('mahasiswa.index') ? 'bg-blue-600 text-white font-bold shadow' : 'hover:bg-gray-700' }}">
                    🎓 Data Mahasiswa
                </a>

                <a href="{{ route('mahasiswa.create') }}"
                    class="flex items-center gap-2 p-3 rounded-lg transition
                    {{ request()->routeIs('mahasiswa.create') ? 'bg-blue-600 text-white font-bold shadow' : 'hover:bg-gray-700' }}">
                    ➕ Tambah Mahasiswa
                </a>

                <a href="{{ route('mahasiswa.trash') }}"
                    class="flex items-center gap-2 p-3 rounded-lg transition
                    {{ request()->routeIs('mahasiswa.trash') ? 'bg-blue-600 text-white font-bold shadow' : 'hover:bg-gray-700' }}">
                    🗑️ Trash
                </a>

                <form method="POST" action="{{ route('logout') }}" class="pt-6">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-2 w-full text-left p-3 rounded-lg bg-red-600 hover:bg-red-500 transition">
                        🚪 Logout
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main content -->
        <main class="flex-1 p-6 bg-gray-900">
            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-gray-800 shadow mb-6 rounded-lg">
                <div class="max-w-7xl mx-auto py-4 px-6 text-lg font-semibold text-gray-100">
                    {{ $header }}
                </div>
            </header>
            @endif

            <!-- Page Content -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
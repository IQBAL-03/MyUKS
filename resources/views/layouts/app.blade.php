<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyUKS') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-900 text-gray-100 flex h-screen overflow-hidden">

    <aside class="w-64 bg-gray-800 border-r border-gray-700 flex flex-col">
        <div class="h-16 flex items-center px-6 border-b border-gray-700">
            <a href="{{ route('dashboard') }}" class="text-xl font-bold text-blue-500 tracking-wider hover:text-blue-400 transition">MyUKS</a>
        </div>
        <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
            <div class="pb-2 px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                Menu Utama
            </div>
            <a href="{{ route('dashboard') }}" class="block px-4 py-2.5 rounded hover:bg-gray-700 hover:text-white transition text-gray-300">
                Dashboard
            </a>
            <a href="{{ route('treatments.index') }}" class="block px-4 py-2.5 rounded hover:bg-gray-700 hover:text-white transition text-gray-300">
                Kunjungan UKS
            </a>

            @if(auth()->user()->role === 'admin')
                <div class="mt-4 pt-4 pb-2 px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider border-t border-gray-700">
                    Data Master
                </div>
                <a href="{{ route('kelas.index') }}" class="block px-4 py-2.5 rounded hover:bg-gray-700 hover:text-white transition text-gray-300">
                    Data Kelas
                </a>
                <a href="{{ route('students.index') }}" class="block px-4 py-2.5 rounded hover:bg-gray-700 hover:text-white transition text-gray-300">
                    Data Siswa
                </a>
                <a href="{{ route('medicines.index') }}" class="block px-4 py-2.5 rounded hover:bg-gray-700 hover:text-white transition text-gray-300">
                    Data Obat
                </a>

                <div class="mt-4 pt-4 pb-2 px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider border-t border-gray-700">
                    Laporan
                </div>
                <a href="{{ route('reports.index') }}" class="block px-4 py-2.5 rounded hover:bg-gray-700 hover:text-white transition text-gray-300">
                    Laporan Bulanan
                </a>
            @endif

            @if(auth()->user()->role === 'petugas')
                <div class="mt-4 pt-4 pb-2 px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider border-t border-gray-700">
                    Informasi
                </div>
                <a href="{{ url('/stok-obat') }}" class="block px-4 py-2.5 rounded hover:bg-gray-700 hover:text-white transition text-gray-300">
                    Cek Stok Obat
                </a>
            @endif

        </nav>
    </aside>
    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        
        <header class="h-16 bg-gray-800 border-b border-gray-700 flex items-center justify-end px-6">
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-300">Halo, {{ Auth::user()->name }} ({{ ucfirst(Auth::user()->role) }})</span>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm px-3 py-1.5 bg-red-600 hover:bg-red-500 text-white rounded transition">
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto bg-gray-900 p-6">
            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 10000)" x-transition
                    class="fixed top-6 right-6 z-[9999] min-w-[300px] flex items-center justify-between px-4 py-3 bg-green-900 border border-green-700 text-green-100 rounded-lg shadow-2xl">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                    <button @click="show = false" class="text-green-400 hover:text-green-200 transition focus:outline-none ml-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            @endif
            {{ $slot }}
        </main>

    </div>

</body>
</html>
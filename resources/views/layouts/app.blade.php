<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyUKS') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-900 text-gray-100 flex h-screen overflow-hidden">

    <aside class="w-64 bg-gray-800 border-r border-gray-700 flex flex-col">
        <div class="h-16 flex items-center px-6 border-b border-gray-700">
            <span class="text-xl font-bold text-blue-500 tracking-wider">MyUKS</span>
        </div>
        <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
            
            <a href="{{ route('treatments.index') }}" class="block px-4 py-2.5 rounded hover:bg-gray-700 hover:text-white transition text-gray-300">
                Kunjungan UKS
            </a>

            @if(auth()->user()->role === 'admin')
                <div class="mt-4 pt-4 pb-2 px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider border-t border-gray-700">
                    Data Master
                </div>
                <a href="{{ route('students.index') }}" class="block px-4 py-2.5 rounded hover:bg-gray-700 hover:text-white transition text-gray-300">
                    Data Siswa
                </a>
                <a href="{{ route('kelas.index') }}" class="block px-4 py-2.5 rounded hover:bg-gray-700 hover:text-white transition text-gray-300">
                    Data Kelas
                </a>
                <a href="{{ route('medicines.index') }}" class="block px-4 py-2.5 rounded hover:bg-gray-700 hover:text-white transition text-gray-300">
                    Kelola Obat
                </a>
                
                <div class="mt-4 pt-4 pb-2 px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider border-t border-gray-700">
                    Laporan
                </div>
                <a href="{{ route('reports.index') }}" class="block px-4 py-2.5 rounded hover:bg-gray-700 hover:text-white transition text-gray-300">
                    Laporan Bulanan
                </a>
            @endif

            <!-- Menu Khusus Petugas -->
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
            {{ $slot }}
        </main>

    </div>

</body>
</html>
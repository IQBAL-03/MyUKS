<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyUKS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-900 text-gray-100 min-h-screen flex flex-col">
    <nav class="w-full p-6 flex justify-end">
        @if (Route::has('login'))
            <div class="space-x-4">
                @auth
                    <a href="{{ route('treatments.index') }}"
                        class="text-gray-300 hover:text-white transiton px-4 py-2 hover:bg-gray-800 rounded">Ke Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-gray-300 hover:text-white transition px-4 py-2 hover:bg-gray-800 rounded">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="text-gray-300 hover:text-white transition px-4 py-2 hover:bg-gray-800 rounded">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </nav>

    <main class="flex-grow flex flex-col items-center justify-center text-center px-4">
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 10000)" x-transition
                class="fixed top-6 right-6 z-[9999] min-w-[300px] flex items-center justify-between px-4 py-3 bg-green-900 border border-green-700 text-green-100 rounded-lg shadow-2xl">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="font-medium text-left">{{ session('success') }}</span>
                </div>
                <button @click="show = false" class="text-green-400 hover:text-green-200 transition focus:outline-none ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        @endif
        <div class="mb-6 text-blue-600">
            <svg class="w-20 h-20 mx-auto drop-shadow-[0_0_10px_rgba(37,99,235,0.5)]" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
        </div>

        <h1 class="text-4xl font-bold tracking-tight mb-4">
            Sistem Manajemen <span class="text-blue-500">MyUKS</span>
        </h1>
        <p class="text-gray-400 max-w-md mx-auto mb-8">
            Kelola data kunjungan siswa, rekam medis, dan stok obat dengan mudah, cepat, dan aman.
        </p>

        @auth
            <a href="{{ route('treatments.index') }}"
                class="px-6 py-3 bg-blue-600 hover:bg-blue-500 text-white font-medium rounded transition duration-200">
                Buka Dashboard
            </a>
        @else
            <div class="flex gap-4">
                <a href="{{ route('login') }}"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-500 text-white font-medium rounded transition duration-200">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                    class="px-6 py-3 bg-gray-800 hover:bg-gray-700 text-white font-medium rounded transition duration-200">
                    Daftar
                </a>
            </div>
        @endauth
    </main>

    <footer class="w-full py-6 text-center text-sm text-gray-600">
        &copy; {{ date('Y') }} MyUKS.
    </footer>

</body>

</html>
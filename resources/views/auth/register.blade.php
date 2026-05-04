<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun — UKS SMKN X</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center p-6">

    <div class="bg-gray-800 border border-gray-700 rounded-2xl p-8 w-full max-w-sm shadow-xl">

        <div class="text-center mb-8">
            <h1 class="text-xl font-bold text-sky-400">Daftar Akun</h1>
            <p class="text-sm text-gray-500 mt-1">UKS SMKN X</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm text-gray-400 mb-1">Nama Lengkap</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        class="w-full bg-gray-900 border border-gray-700 text-gray-100 rounded-lg px-3 py-2 focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-colors duration-150"
                        placeholder="Nama lengkap kamu"
                    >
                    @error('name')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm text-gray-400 mb-1">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full bg-gray-900 border border-gray-700 text-gray-100 rounded-lg px-3 py-2 focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-colors duration-150"
                        placeholder="email@contoh.com"
                    >
                    @error('email')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm text-gray-400 mb-1">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="w-full bg-gray-900 border border-gray-700 text-gray-100 rounded-lg px-3 py-2 focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-colors duration-150"
                        placeholder="••••••••"
                    >
                    @error('password')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm text-gray-400 mb-1">Konfirmasi Password</label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        required
                        class="w-full bg-gray-900 border border-gray-700 text-gray-100 rounded-lg px-3 py-2 focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-colors duration-150"
                        placeholder="••••••••"
                    >
                </div>
            </div>

            <button type="submit" class="mt-6 w-full bg-sky-600 hover:bg-sky-500 text-white font-medium rounded-lg py-2.5 transition-colors duration-200">
                Daftar
            </button>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-500">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-sky-400 hover:text-sky-300 transition-colors font-medium ml-1">
                        Masuk
                    </a>
                </p>
            </div>
        </form>

    </div>

</body>
</html>

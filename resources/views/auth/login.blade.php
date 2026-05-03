<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — UKS SMKN X</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center">

    <div class="bg-gray-800 border border-gray-700 rounded-2xl p-8 w-full max-w-sm shadow-xl">

        <div class="text-center mb-8">
            <h1 class="text-xl font-bold text-sky-400">UKS SMKN X</h1>
            <p class="text-sm text-gray-500 mt-1">Sistem Informasi Kesehatan Siswa</p>
        </div>

        @if (session('status'))
            <div class="mb-4 px-4 py-3 bg-green-900 border border-green-700 text-green-300 rounded-lg text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="space-y-5">

                <div>
                    <label for="email" class="block text-sm text-gray-400 mb-1">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full bg-gray-900 border border-gray-700 text-gray-100 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-colors duration-150"
                        placeholder="email@contoh.com"
                    >
                    @error('email')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm text-gray-400 mb-1">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="w-full bg-gray-900 border border-gray-700 text-gray-100 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-colors duration-150"
                        placeholder="••••••••"
                    >
                    @error('password')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input
                        type="checkbox"
                        id="remember"
                        name="remember"
                        class="w-4 h-4 bg-gray-900 border-gray-700 rounded text-sky-500 focus:ring-sky-500 focus:ring-offset-gray-800"
                    >
                    <label for="remember" class="ml-2 text-sm text-gray-400">Ingat Saya</label>
                </div>

            </div>

            <button type="submit" class="mt-6 w-full bg-sky-600 hover:bg-sky-500 text-white font-medium rounded-lg py-2.5 transition-colors duration-200">
                Masuk
            </button>

        </form>

    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email — UKS SMKN X</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center p-6">

    <div class="bg-gray-800 border border-gray-700 rounded-2xl p-8 w-full max-w-sm shadow-xl">

        <div class="flex justify-center mb-6">
            <svg class="w-12 h-12 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
        </div>

        <h1 class="text-xl font-bold text-gray-100 text-center mb-2">Verifikasi Email</h1>
        
        <p class="text-gray-400 text-sm text-center mb-6 leading-relaxed">
            Link verifikasi telah dikirim ke email kamu. Cek inbox atau folder spam.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-6 px-4 py-3 bg-green-900 border border-green-700 text-green-300 text-xs rounded-lg text-center">
                Email verifikasi berhasil dikirim ulang.
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="w-full bg-sky-600 hover:bg-sky-500 text-white font-medium rounded-lg py-2.5 transition-colors duration-200">
                Kirim Ulang Email
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit" class="w-full text-sm text-gray-500 hover:text-gray-300 transition-colors py-2">
                Keluar
            </button>
        </form>

    </div>

</body>
</html>

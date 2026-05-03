<x-app-layout>
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-100">Edit Kelas</h2>
        <a href="{{ route('kelas.index') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-gray-100 font-medium rounded-lg transition-colors duration-200">
            &larr; Kembali
        </a>
    </div>

    <div class="bg-gray-800 border border-gray-700 rounded-xl shadow-lg p-6">
        <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm text-gray-400 mb-1">Nama Kelas</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $kelas->name) }}"
                    required
                    class="w-full bg-gray-800 border border-gray-700 text-gray-100 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-colors duration-150"
                >
                @error('name')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="px-5 py-2 bg-sky-600 hover:bg-sky-500 text-white font-medium rounded-lg transition-colors duration-200">
                    Perbarui
                </button>
            </div>

        </form>
    </div>
</x-app-layout>

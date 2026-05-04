<x-app-layout>
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-100">Tambah Obat</h2>
        <a href="{{ route('medicines.index') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-gray-100 font-medium rounded-lg transition-colors duration-200">
            &larr; Kembali
        </a>
    </div>

    <div class="bg-gray-800 border border-gray-700 rounded-xl shadow-lg p-6">
        <form action="{{ route('medicines.store') }}" method="POST">
            @csrf

            <div class="space-y-5">

                <div>
                    <label for="nama_obat" class="block text-sm text-gray-400 mb-1">Nama Obat</label>
                    <input
                        type="text"
                        id="nama_obat"
                        name="nama_obat"
                        value="{{ old('nama_obat') }}"
                        required
                        class="w-full bg-gray-800 border border-gray-700 text-gray-100 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-colors duration-150"
                        placeholder="Contoh: Paracetamol"
                    >
                    @error('nama_obat')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="stok" class="block text-sm text-gray-400 mb-1">Stok Awal</label>
                    <input
                        type="number"
                        id="stok"
                        name="stok"
                        value="{{ old('stok', 0) }}"
                        min="0"
                        required
                        class="w-full bg-gray-800 border border-gray-700 text-gray-100 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-colors duration-150"
                        placeholder="0"
                    >
                    @error('stok')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="satuan" class="block text-sm text-gray-400 mb-1">Satuan</label>
                    <input
                        type="text"
                        id="satuan"
                        name="satuan"
                        value="{{ old('satuan') }}"
                        required
                        class="w-full bg-gray-800 border border-gray-700 text-gray-100 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-colors duration-150"
                        placeholder="Contoh: tablet, botol, kapsul"
                    >
                    @error('satuan')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="px-5 py-2 bg-sky-600 hover:bg-sky-500 text-white font-medium rounded-lg transition-colors duration-200">
                    Simpan Obat
                </button>
            </div>

        </form>
    </div>
</x-app-layout>

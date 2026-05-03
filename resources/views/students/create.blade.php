<x-app-layout>
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-100">Tambah Siswa</h2>
        <a href="{{ route('students.index') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-gray-100 font-medium rounded-lg transition-colors duration-200">
            &larr; Kembali
        </a>
    </div>

    <div class="bg-gray-800 border border-gray-700 rounded-xl shadow-lg p-6">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="space-y-5">

                <div>
                    <label for="name" class="block text-sm text-gray-400 mb-1">Nama Lengkap</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        class="w-full bg-gray-800 border border-gray-700 text-gray-100 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-colors duration-150"
                        placeholder="Masukkan nama lengkap siswa"
                    >
                    @error('name')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="gender" class="block text-sm text-gray-400 mb-1">Jenis Kelamin</label>
                    <select
                        id="gender"
                        name="gender"
                        required
                        class="w-full bg-gray-800 border border-gray-700 text-gray-100 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-colors duration-150"
                    >
                        <option value="" disabled {{ old('gender') ? '' : 'selected' }}>-- Pilih Jenis Kelamin --</option>
                        <option value="L" {{ old('gender') === 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('gender') === 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('gender')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="kelas_id" class="block text-sm text-gray-400 mb-1">Kelas</label>
                    <select
                        id="kelas_id"
                        name="kelas_id"
                        required
                        class="w-full bg-gray-800 border border-gray-700 text-gray-100 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-colors duration-150"
                    >
                        <option value="" disabled {{ old('kelas_id') ? '' : 'selected' }}>-- Pilih Kelas --</option>
                        @foreach ($kelas as $k)
                            <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
                                {{ $k->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('kelas_id')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="px-5 py-2 bg-sky-600 hover:bg-sky-500 text-white font-medium rounded-lg transition-colors duration-200">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</x-app-layout>

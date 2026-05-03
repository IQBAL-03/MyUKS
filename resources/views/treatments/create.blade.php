<x-app-layout>
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-6 flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-100">Catat Kunjungan Baru</h2>
            <a href="{{ route('treatments.index') }}" class="text-gray-400 hover:text-white transition">
                &larr; Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="mb-6 px-4 py-3 bg-red-900 border border-red-700 text-red-100 rounded-lg shadow-sm">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6 sm:p-8">
            <form action="{{ route('treatments.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Tanggal Kunjungan</label>
                        <input type="date" name="tanggal_kunjungan" value="{{ date('Y-m-d') }}" required
                            class="w-full bg-gray-900 border border-gray-700 text-gray-100 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Nama Siswa</label>
                        <select name="student_id" required
                            class="w-full bg-gray-900 border border-gray-700 text-gray-100 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                            <option value="">-- Pilih Siswa --</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                    {{ $student->nis }} - {{ $student->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-6">

                    <label class="block text-sm font-medium text-gray-300 mb-2">Keluhan / Gejala</label>
                    <textarea name="keluhan" rows="3" required placeholder="Contoh: Pusing dan mual sejak pagi..."
                        class="w-full bg-gray-900 border border-gray-700 text-gray-100 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">{{ old('keluhan') }}</textarea>
                </div>

                <div class="mb-8">

                    <label class="block text-sm font-medium text-gray-300 mb-2">Diagnosa Awal</label>
                    <textarea name="diagnosa" rows="2" required placeholder="Contoh: Masuk angin / Maag"
                        class="w-full bg-gray-900 border border-gray-700 text-gray-100 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">{{ old('diagnosa') }}</textarea>
                </div>


                <div class="mb-8 p-5 bg-gray-900 border border-gray-700 rounded-lg">
                    <div class="flex justify-between items-center mb-4">
                        <label class="block text-sm font-medium text-gray-200">Pemberian Obat (Opsional)</label>
                        <button type="button" onclick="addMedicine()"
                            class="px-3 py-1 bg-green-700 hover:bg-green-600 text-white text-xs font-semibold rounded transition">
                            + Tambah Obat
                        </button>
                    </div>


                    <div id="medicine-container" class="space-y-3">

                        <div class="flex gap-3 items-start medicine-row">
                            <div class="flex-1">
                                <select name="medicines[0][id]"
                                    class="w-full bg-gray-800 border border-gray-700 text-gray-200 rounded text-sm p-2 focus:ring-blue-500">
                                    <option value="">-- Tidak ada obat diberikan --</option>
                                    @foreach($medicines as $med)
                                        <option value="{{ $med->id }}">{{ $med->nama_obat }} (Stok: {{ $med->stok }}
                                            {{ $med->satuan }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-24">
                                <input type="number" name="medicines[0][jumlah]" min="1" placeholder="Jumlah"
                                    class="w-full bg-gray-800 border border-gray-700 text-gray-200 rounded text-sm p-2 focus:ring-blue-500">
                            </div>

                        </div>
                    </div>
                </div>


                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-lg transition duration-200 shadow-md">
                        Simpan Rekam Medis
                    </button>
                </div>
            </form>
        </div>
    </div>


    <script>
        let medicineIndex = 1;

        function addMedicine() {
            const container = document.getElementById('medicine-container');
            const row = document.createElement('div');
            row.className = 'flex gap-3 items-start medicine-row';

            row.innerHTML = `
                <div class="flex-1">
                    <select name="medicines[${medicineIndex}][id]" required class="w-full bg-gray-800 border border-gray-700 text-gray-200 rounded text-sm p-2 focus:ring-blue-500">
                        <option value="">-- Pilih Obat --</option>
                        @foreach($medicines as $med)
                            <option value="{{ $med->id }}">{{ $med->nama_obat }} (Stok: {{ $med->stok }} {{ $med->satuan }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-24">
                    <input type="number" name="medicines[${medicineIndex}][jumlah]" min="1" value="1" required
                           class="w-full bg-gray-800 border border-gray-700 text-gray-200 rounded text-sm p-2 focus:ring-blue-500">
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 bg-red-900/50 hover:bg-red-800 text-red-300 rounded text-sm font-semibold transition">
                    Hapus
                </button>
            `;

            container.appendChild(row);
            medicineIndex++;
        }
    </script>
</x-app-layout>
<x-app-layout>
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-100">Detail Kunjungan</h2>
        <a href="{{ route('treatments.index') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-gray-100 font-medium rounded-lg transition-colors duration-200">
            &larr; Kembali
        </a>
    </div>

    <div class="space-y-6">

        <div class="bg-gray-800 border border-gray-700 rounded-xl shadow-lg p-6">
            <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">Informasi Siswa</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <p class="text-xs text-gray-400 mb-1">Nama Siswa</p>
                    <p class="text-gray-100 font-medium">{{ $treatment->student->nama }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 mb-1">Kelas</p>
                    <p class="text-gray-100 font-medium">{{ $treatment->student->kelas->nama_kelas }}</p>
                </div>
            </div>
        </div>

        <div class="bg-gray-800 border border-gray-700 rounded-xl shadow-lg p-6">
            <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">Detail Kunjungan</h3>
            <div class="divide-y divide-gray-700">
                <div class="py-4 first:pt-0">
                    <p class="text-xs text-gray-400 mb-1">Tanggal Kunjungan</p>
                    <p class="text-gray-100">{{ \Carbon\Carbon::parse($treatment->tanggal_kunjungan)->format('d M Y') }}</p>
                </div>
                <div class="py-4">
                    <p class="text-xs text-gray-400 mb-1">Keluhan</p>
                    <p class="text-gray-100">{{ $treatment->keluhan }}</p>
                </div>
                <div class="py-4 last:pb-0">
                    <p class="text-xs text-gray-400 mb-1">Diagnosis</p>
                    <p class="text-gray-100">{{ $treatment->diagnosa }}</p>
                </div>
            </div>
        </div>

        <div class="bg-gray-800 border border-gray-700 rounded-xl shadow-lg p-6">
            <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">Obat yang Diberikan</h3>
            @if ($treatment->medicines->isEmpty())
                <p class="text-center text-gray-500 py-6">Tidak ada obat yang diberikan.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-800 text-gray-400 text-xs uppercase tracking-wider">
                                <th class="px-4 py-3 border-b border-gray-700 font-semibold w-12">No</th>
                                <th class="px-4 py-3 border-b border-gray-700 font-semibold">Nama Obat</th>
                                <th class="px-4 py-3 border-b border-gray-700 font-semibold">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700 text-sm">
                            @foreach ($treatment->medicines as $index => $medicine)
                                <tr class="hover:bg-gray-700 transition-colors duration-150">
                                    <td class="px-4 py-3 text-gray-400">{{ $index + 1 }}</td>
                                    <td class="px-4 py-3 text-gray-100 font-medium">{{ $medicine->nama_obat }}</td>
                                    <td class="px-4 py-3 text-gray-100">{{ $medicine->pivot->jumlah_obat }} {{ $medicine->satuan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </div>
</x-app-layout>

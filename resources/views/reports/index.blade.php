<x-app-layout>
    @php
        $namaBulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];
    @endphp

    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <h2 class="text-2xl font-bold text-gray-100">Laporan Bulanan</h2>
        <form action="{{ route('reports.index') }}" method="GET" class="flex items-center gap-3">
            <select name="tahun" class="bg-gray-800 border border-gray-700 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-colors duration-150">
                @foreach ($years as $year)
                    <option value="{{ $year }}" {{ request('tahun', date('Y')) == $year ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="px-4 py-2 bg-sky-600 hover:bg-sky-500 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                Filter
            </button>
        </form>
    </div>

    <div class="bg-gray-800 border border-gray-700 rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-800 text-gray-400 text-xs uppercase tracking-wider">
                        <th class="px-6 py-3 border-b border-gray-700 font-semibold w-12">No</th>
                        <th class="px-6 py-3 border-b border-gray-700 font-semibold">Bulan</th>
                        <th class="px-6 py-3 border-b border-gray-700 font-semibold">Tahun</th>
                        <th class="px-6 py-3 border-b border-gray-700 font-semibold">Total Kunjungan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700 text-sm">
                    @forelse ($reports as $index => $report)
                        <tr class="hover:bg-gray-700 transition-colors duration-150">
                            <td class="px-6 py-4 text-gray-400">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-gray-100 font-medium">{{ $namaBulan[$report->bulan] ?? '-' }}</td>
                            <td class="px-6 py-4 text-gray-100">{{ $report->tahun }}</td>
                            <td class="px-6 py-4 text-gray-100">{{ $report->total_kunjungan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                Tidak ada data kunjungan untuk filter ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4 text-right">
        <span class="text-sm text-gray-400">Total seluruh kunjungan: {{ $reports->sum('total_kunjungan') }}</span>
    </div>
</x-app-layout>

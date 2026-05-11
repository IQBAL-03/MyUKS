<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @if(auth()->user()->role === 'admin')
                <div class="bg-blue-900 overflow-hidden shadow-lg sm:rounded-xl text-white transform hover:scale-105 transition-transform duration-300">
                    <div class="p-6 flex items-center justify-between">
                        <div>
                            <div class="text-lg font-semibold text-blue-200">Total Siswa</div>
                            <div class="text-4xl font-bold mt-2">{{ $siswa }}</div>
                        </div>
                        <div class="opacity-80">
                            <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                    </div>
                    <div class="bg-blue-800 px-6 py-3">
                        <a href="{{ route('students.index') }}" class="text-sm font-medium hover:text-blue-300 transition flex items-center justify-between">
                            <span>Lihat Detail</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
                @endif

                <div class="bg-blue-900 overflow-hidden shadow-lg sm:rounded-xl text-white transform hover:scale-105 transition-transform duration-300">
                    <div class="p-6 flex items-center justify-between">
                        <div>
                            <div class="text-lg font-semibold text-blue-200">Total Obat</div>
                            <div class="text-4xl font-bold mt-2">{{ $obat }}</div>
                        </div>
                        <div class="opacity-80">
                            <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                        </div>
                    </div>
                    @if(auth()->user()->role === 'admin')
                    <div class="bg-blue-800 px-6 py-3">
                        <a href="{{ route('medicines.index') }}" class="text-sm font-medium hover:text-blue-300 transition flex items-center justify-between">
                            <span>Lihat Detail</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                    @endif
                </div>

                <div class="bg-blue-900 overflow-hidden shadow-lg sm:rounded-xl text-white transform hover:scale-105 transition-transform duration-300">
                    <div class="p-6 flex items-center justify-between">
                        <div>
                            <div class="text-lg font-semibold text-blue-200">Total Perawatan</div>
                            <div class="text-4xl font-bold mt-2">{{ $perawatan }}</div>
                        </div>
                        <div class="opacity-80">
                            <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </div>
                    </div>
                    <div class="bg-blue-800 px-6 py-3">
                        <a href="{{ route('treatments.index') }}" class="text-sm font-medium hover:text-blue-300 transition flex items-center justify-between">
                            <span>Lihat Detail</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>

                @if(auth()->user()->role === 'admin')
                <div class="bg-blue-900 overflow-hidden shadow-lg sm:rounded-xl text-white transform hover:scale-105 transition-transform duration-300">
                    <div class="p-6 flex items-center justify-between">
                        <div>
                            <div class="text-lg font-semibold text-blue-200">Total Kelas</div>
                            <div class="text-4xl font-bold mt-2">{{ $kelas }}</div>
                        </div>
                        <div class="opacity-80">
                            <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                    </div>
                    <div class="bg-blue-800 px-6 py-3">
                        <a href="{{ route('kelas.index') }}" class="text-sm font-medium hover:text-blue-300 transition flex items-center justify-between">
                            <span>Lihat Detail</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
                @endif
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-xl border border-gray-100 dark:border-gray-700">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100">Kunjungan UKS Terbaru</h3>
                        <a href="{{ route('treatments.index') }}" class="px-4 py-2 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-sm font-medium rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/50 transition">
                            Lihat Semua →
                        </a>
                    </div>

                    <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 dark:bg-gray-700/50 text-gray-600 dark:text-gray-300 text-sm uppercase tracking-wider">
                                    <th class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 font-semibold">Tanggal</th>
                                    <th class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 font-semibold">NIS</th>
                                    <th class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 font-semibold">Nama Siswa</th>
                                    <th class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 font-semibold">Keluhan</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 dark:text-gray-300 text-sm divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($recent_treatments as $treatment)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30 transition duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                {{ \Carbon\Carbon::parse($treatment->tanggal_kunjungan)->format('d M Y') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400">
                                            {{ $treatment->student->nis ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100 whitespace-nowrap">
                                            {{ $treatment->student->nama ?? 'Siswa Terhapus' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="inline-block truncate max-w-[200px] md:max-w-xs" title="{{ $treatment->keluhan }}">
                                                {{ $treatment->keluhan }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                            <div class="flex flex-col items-center justify-center">
                                                <svg class="w-12 h-12 text-gray-300 dark:text-gray-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                <span>Belum ada data kunjungan terbaru.</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

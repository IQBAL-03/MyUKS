<x-app-layout>
    <!-- Header Halaman -->
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <h2 class="text-2xl font-bold text-gray-100">Daftar Kunjungan UKS</h2>


        <a href="{{ route('treatments.create') }}"
            class="px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white font-medium rounded-lg transition duration-200 shadow-md">
            + Catat Kunjungan
        </a>
    </div>


    @if (session('success'))
        <div class="mb-6 px-4 py-3 bg-green-900 border border-green-700 text-green-100 rounded-lg shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-700 text-gray-300 text-sm uppercase tracking-wider">
                        <th class="px-6 py-4 border-b border-gray-600 font-semibold">Tanggal</th>
                        <th class="px-6 py-4 border-b border-gray-600 font-semibold">Nama Siswa</th>
                        <th class="px-6 py-4 border-b border-gray-600 font-semibold">Keluhan</th>
                        <th class="px-6 py-4 border-b border-gray-600 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-300 text-sm divide-y divide-gray-700">
                    @forelse ($treatments as $item)
                        <tr class="hover:bg-gray-700/50 transition duration-150">

                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($item->tanggal_kunjungan)->format('d M Y') }}
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-100 whitespace-nowrap">
                                {{ $item->student->nama ?? 'Siswa Terhapus' }}
                            </td>

                            <td class="px-6 py-4 truncate max-w-xs">
                                {{ $item->keluhan }}
                            </td>

                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <a href="{{ route('treatments.show', $item->id) }}"
                                    class="inline-block px-3 py-1 bg-gray-700 hover:bg-gray-600 text-blue-400 rounded transition text-xs font-medium mr-2">
                                    Detail
                                </a>


                                @if(auth()->user()->role === 'admin')
                                    <form action="{{ route('treatments.destroy', $item->id) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data kunjungan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-block px-3 py-1 bg-red-900/50 hover:bg-red-900 text-red-400 rounded transition text-xs font-medium">
                                            Hapus
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                Belum ada data kunjungan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
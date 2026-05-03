<x-app-layout>
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-100">Daftar Kelas</h2>
        <a href="{{ route('kelas.create') }}" class="px-4 py-2 bg-sky-600 hover:bg-sky-500 text-white font-medium rounded-lg transition-colors duration-200">
            + Tambah Kelas
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 px-4 py-3 bg-green-900 border border-green-700 text-green-300 rounded-lg shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-gray-800 border border-gray-700 rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-800 text-gray-400 text-xs uppercase tracking-wider">
                        <th class="px-6 py-3 border-b border-gray-700 font-semibold w-12">No</th>
                        <th class="px-6 py-3 border-b border-gray-700 font-semibold">Nama Kelas</th>
                        <th class="px-6 py-3 border-b border-gray-700 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700 text-sm">
                    @forelse ($kelas as $index => $item)
                        <tr class="hover:bg-gray-700 transition-colors duration-150">
                            <td class="px-6 py-4 text-gray-400">
                                {{ $kelas instanceof \Illuminate\Pagination\LengthAwarePaginator ? $kelas->firstItem() + $index : $index + 1 }}
                            </td>
                            <td class="px-6 py-4 text-gray-100 font-medium">{{ $item->nama_kelas }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <a href="{{ route('kelas.edit', $item->id) }}" class="inline-block px-3 py-1 bg-sky-600 hover:bg-sky-500 text-white rounded transition-colors duration-150 text-xs font-medium mr-2">
                                    Edit
                                </a>
                                <form action="{{ route('kelas.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-700 hover:bg-red-600 text-white rounded transition-colors duration-150 text-xs font-medium">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-10 text-center text-gray-500">
                                Belum ada data kelas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if ($kelas instanceof \Illuminate\Pagination\LengthAwarePaginator && $kelas->hasPages())
        <div class="mt-6">
            {{ $kelas->links() }}
        </div>
    @endif
</x-app-layout>

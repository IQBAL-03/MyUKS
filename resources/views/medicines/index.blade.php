<x-app-layout>
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-100">Daftar Obat</h2>
        <a href="{{ route('medicines.create') }}" class="px-4 py-2 bg-sky-600 hover:bg-sky-500 text-white font-medium rounded-lg transition-colors duration-200">
            + Tambah Obat
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
                        <th class="px-6 py-3 border-b border-gray-700 font-semibold">Nama Obat</th>
                        <th class="px-6 py-3 border-b border-gray-700 font-semibold">Stok</th>
                        <th class="px-6 py-3 border-b border-gray-700 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700 text-sm">
                    @forelse ($medicines as $index => $medicine)
                        <tr class="hover:bg-gray-700 transition-colors duration-150">
                            <td class="px-6 py-4 text-gray-400">
                                {{ $medicines instanceof \Illuminate\Pagination\LengthAwarePaginator ? $medicines->firstItem() + $index : $index + 1 }}
                            </td>
                            <td class="px-6 py-4 text-gray-100 font-medium">{{ $medicine->name }}</td>
                            <td class="px-6 py-4 text-gray-100">{{ $medicine->stock }} {{ $medicine->unit }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <a href="{{ route('medicines.edit', $medicine->id) }}" class="inline-block px-3 py-1 bg-sky-600 hover:bg-sky-500 text-white rounded transition-colors duration-150 text-xs font-medium mr-2">
                                    Edit
                                </a>
                                <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus obat ini?');">
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
                            <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                Belum ada data obat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if ($medicines instanceof \Illuminate\Pagination\LengthAwarePaginator && $medicines->hasPages())
        <div class="mt-6">
            {{ $medicines->links() }}
        </div>
    @endif
</x-app-layout>

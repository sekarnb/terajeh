@extends('layouts.app', ['title' => 'Kategori'])

@section('content')
<div class="mt-12 p-4 border border-gray-300 rounded-xl">
    <div class="flex justify-end">
        <button onclick="document.getElementById('create-modal').classList.remove('hidden')" type="button" class="bg-secondary hover:bg-secondary-dark cursor-pointer text-white px-6 py-2 rounded-2xl transition-colors">
            tambah
        </button>
    </div>

    <hr class="mt-4 mb-8 border-t border-gray-300" />

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-500">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left font-medium tracking-wider">No</th>
                    <th class="px-6 py-3 text-left font-medium tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left font-medium tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($categories as $category)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                        {{ $categories->firstItem() + $loop->index }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{ $category->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                        <div class="flex items-center gap-2">
                            <button onclick="document.getElementById('edit-modal-{{ $category->id }}').classList.remove('hidden')" type="button" class="text-gray-500 hover:text-gray-700 transition-colors cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <button onclick="document.getElementById('delete-modal-{{ $category->id }}').classList.remove('hidden')" type="button" class="text-red-500 hover:text-red-700 transition-colors cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">Tidak ada kategori ditemukan</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>
</div>

{{-- create modal --}}
<div id="create-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg px-6 py-8 max-w-sm w-full">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg mb-2">Tambah Kategori</h2>
            </div>
            <div onclick="document.getElementById('create-modal').classList.add('hidden')" class="cursor-pointer -mt-4 p-1 text-red-500 bg-red-200 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>
        </div>
        <form action="{{ route('categories.store') }}" method="post">
            @csrf

            <div class="flex flex-col gap-1">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name" required class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Masukkan nama kategori" value="{{ old('name') }}">
            </div>

            <div class="mt-6 flex gap-4">
                <button onclick="document.getElementById('create-modal').classList.add('hidden')" type="button" class="w-full cursor-pointer border border-secondary text-secondary px-4 py-3 rounded-xl">Batal</button>
                <button type="submit" class="w-full cursor-pointer bg-secondary hover:bg-secondary-dark text-white px-4 py-3 rounded-xl">Tambah</button>
            </div>
        </form>
    </div>
</div>

{{-- edit modal --}}
@forelse ($categories as $category)
<div id="edit-modal-{{ $category->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg px-6 py-8 max-w-sm w-full">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg mb-2">Edit Kategori</h2>
            </div>
            <div onclick="document.getElementById('edit-modal-{{ $category->id }}').classList.add('hidden')" class="cursor-pointer -mt-4 p-1 text-red-500 bg-red-200 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>
        </div>
        <form action="{{ route('categories.update', $category->id) }}" method="post">
            @csrf
            @method('put')

            <div class="flex flex-col gap-1">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name" required class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Masukkan nama kategori" value="{{ old('name') ?? $category->name }}">
            </div>

            <div class="mt-6 flex gap-4">
                <button onclick="document.getElementById('edit-modal-{{ $category->id }}').classList.add('hidden')" type="button" class="w-full cursor-pointer border border-secondary text-secondary px-4 py-3 rounded-xl">Batal</button>
                <button type="submit" class="w-full cursor-pointer bg-secondary hover:bg-secondary-dark text-white px-4 py-3 rounded-xl">Simpan</button>
            </div>
        </form>
    </div>
</div>
@empty
@endforelse

{{-- delete modal --}}
@forelse ($categories as $category)
<div id="delete-modal-{{ $category->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg px-6 py-8 max-w-sm w-full">
        <div class="text-lg flex items-center justify-center text-center mb-4">
            Apakah Anda yakin ingin menghapusnya?
        </div>
        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
            @csrf
            @method('delete')

            <div class="mt-6 flex gap-4">
                <button onclick="document.getElementById('delete-modal-{{ $category->id }}').classList.add('hidden')" type="button" class="w-full cursor-pointer border border-red-500 text-red-500 px-4 py-3 rounded-xl">Batal</button>
                <button type="submit" class="w-full cursor-pointer bg-red-500 hover:bg-red-700 text-white px-4 py-3 rounded-xl">Simpan</button>
            </div>
        </form>
    </div>
</div>
@empty
@endforelse

@endsection

@extends('layouts.app', ['title' => 'Daftar Menu'])

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
                    <th class="px-6 py-3 text-left font-medium tracking-wider">Foto</th>
                    <th class="px-6 py-3 text-left font-medium tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left font-medium tracking-wider">Kategori</th>
                    <th class="px-6 py-3 text-left font-medium tracking-wider">harga</th>
                    <th class="px-6 py-3 text-left font-medium tracking-wider">Deskripsi</th>
                    <th class="px-6 py-3 text-left font-medium tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($menu as $m)
                <tr>
                    <td class="px-6 py-4 text-gray-500">
                        {{ $menu->firstItem() + $loop->index }}
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        <div class="w-14 h-14">
                            <img class="rounded-md object-cover w-full h-full" src="{{ $m->foto() }}" alt="{{ $m->nama }}">
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        {{ $m->nama }}
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        {{ $m->category->name }}
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        Rp. {{ number_format($m->harga, 2) }},-
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        {{ str($m->deskripsi)->limit(20) }}
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        <div class="flex items-center gap-2">
                            <button onclick="document.getElementById('edit-modal-{{ $m->id }}').classList.remove('hidden')" type="button" class="text-gray-500 hover:text-gray-700 transition-colors cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <button onclick="document.getElementById('delete-modal-{{ $m->id }}').classList.remove('hidden')" type="button" class="text-red-500 hover:text-red-700 transition-colors cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">Tidak ada menu ditemukan</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $menu->links() }}
        </div>
    </div>
</div>

{{-- create menu --}}
<div id="create-modal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-md">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg mb-2">Tambah Menu</h2>
            </div>
            <div onclick="document.getElementById('create-modal').classList.add('hidden')" class="cursor-pointer -mt-4 p-1 text-red-500 bg-red-200 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>
        </div>

        <form action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Menu</label>
                    <div class="mt-1 flex items-center">
                        <label for="menuImage" class="flex justify-center cursor-pointer w-full border-2 border-dashed border-gray-300 rounded-lg p-8">
                            <span id="imageContainer" class="w-32 h-28 rounded-lg flex items-center justify-center bg-gray-300">
                                <svg id="uploadIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                                </svg>
                                <img id="imagePreview" class="hidden w-full h-full object-contain" src="" alt="Preview">
                            </span>
                            <input id="menuImage" type="file" name="foto" accept="image/*" class="hidden">
                        </label>
                    </div>
                    @error('foto')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                    <input type="text" name="nama" placeholder="Masukkan Menu" class="w-full px-3 py-2.5 border border-gray-200 rounded-lg">
                    @error('nama')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select id="category" name="category_id" class="w-full px-3 py-2.5 border border-gray-200 rounded-lg">
                        <option selected disabled>Pilih Kategori</option>
                        @forelse($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                        <option disabled>Tidak ada kategori</option>
                        @endforelse
                    </select>
                    @error('category_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                    <input type="number" name="harga" placeholder="0" min="1" class="w-full px-3 py-2.5 border border-gray-200 rounded-lg">
                    @error('harga')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" placeholder="Tulis disini..." class="w-full px-3 py-2.5 border border-gray-200 rounded-lg h-24"></textarea>
                    @error('deskripsi')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mt-6 flex gap-4">
                <button onclick="document.getElementById('create-modal').classList.add('hidden')" type="button" class="w-full cursor-pointer border border-secondary text-secondary px-4 py-3 rounded-xl">Batal</button>
                <button type="submit" class="w-full cursor-pointer bg-secondary hover:bg-secondary-dark text-white px-4 py-3 rounded-xl">Tambah</button>
            </div>
        </form>
    </div>
</div>

{{-- edit menu --}}
@forelse ($menu as $m)
<div id="edit-modal-{{ $m->id }}" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-md">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg mb-2">Edit Menu</h2>
            </div>
            <div onclick="document.getElementById('edit-modal-{{ $m->id }}').classList.add('hidden')" class="cursor-pointer -mt-4 p-1 text-red-500 bg-red-200 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>
        </div>

        <form action="{{ route('menu.update', $m->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Menu</label>
                    <div class="mt-1 flex items-center">
                        <label for="menuImageEdit-{{ $m->id }}" class="flex justify-center cursor-pointer w-full border-2 border-dashed border-gray-300 rounded-lg p-8">
                            <span id="imageContainerEdit-{{ $m->id }}" class="w-32 h-28 rounded-lg flex items-center justify-center bg-gray-300">
                                <svg id="uploadIconEdit-{{ $m->id }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                                </svg>
                                <img id="imagePreviewEdit-{{ $m->id }}" class="hidden w-full h-full object-contain" src="{{ $m->foto() }}" alt="Preview">
                            </span>
                            <input id="menuImageEdit-{{ $m->id }}" type="file" name="foto" accept="image/*" class="hidden">
                        </label>
                        @error('foto')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                    <input type="text" name="nama" value="{{ $m->nama }}" placeholder="Masukkan Menu" class="w-full px-3 py-2.5 border border-gray-200 rounded-lg">
                    @error('nama')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select id="category" name="category_id" class="w-full px-3 py-2.5 border border-gray-200 rounded-lg">
                        <option selected disabled>Pilih Kategori</option>
                        @forelse($categories as $category)
                        <option @selected($m->category_id === $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                        <option disabled>Tidak ada kategori</option>
                        @endforelse
                    </select>
                    @error('category_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                    <input type="number" name="harga" value="{{ $m->harga }}" placeholder="0" min="1" class="w-full px-3 py-2.5 border border-gray-200 rounded-lg">
                    @error('harga')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" placeholder="Tulis disini..." class="w-full px-3 py-2.5 border border-gray-200 rounded-lg h-24">{{ $m->deskripsi }}</textarea>
                    @error('deskripsi')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mt-6 flex gap-4">
                <button onclick="document.getElementById('edit-modal-{{ $m->id }}').classList.add('hidden')" type="button" class="w-full cursor-pointer border border-secondary text-secondary px-4 py-3 rounded-xl">Batal</button>
                <button type="submit" class="w-full cursor-pointer bg-secondary hover:bg-secondary-dark text-white px-4 py-3 rounded-xl">Simpan</button>
            </div>
        </form>
    </div>
</div>
@empty
@endforelse

{{-- delete menu --}}
@forelse ($menu as $m)
<div id="delete-modal-{{ $m->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg px-6 py-8 max-w-sm w-full">
        <div class="text-lg flex items-center justify-center text-center mb-4">
            Apakah Anda yakin ingin menghapusnya?
        </div>
        <form action="{{ route('menu.destroy', $m->id) }}" method="post">
            @csrf
            @method('delete')

            <div class="mt-6 flex gap-4">
                <button onclick="document.getElementById('delete-modal-{{ $m->id }}').classList.add('hidden')" type="button" class="w-full cursor-pointer border border-red-500 text-red-500 px-4 py-3 rounded-xl">Batal</button>
                <button type="submit" class="w-full cursor-pointer bg-red-500 hover:bg-red-700 text-white px-4 py-3 rounded-xl">Hapus</button>
            </div>
        </form>
    </div>
</div>
@empty
@endforelse
@endsection

@push('scripts')
<script>
    const imageInput = document.getElementById('menuImage');
    const imagePreview = document.getElementById('imagePreview');
    const imageContainer = document.getElementById('imageContainer');
    const uploadIcon = document.getElementById('uploadIcon');

    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(event) {
                imagePreview.src = event.target.result;

                imagePreview.classList.remove('hidden');
                imageContainer.classList.remove('bg-gray-300');
                uploadIcon.classList.add('hidden');
            }

            reader.readAsDataURL(file);
        } else {
            uploadIcon.classList.remove('hidden');
            imageContainer.classList.add('bg-gray-300');
        }
    });

    @forelse($menu as $m)
    imageInputEdit = document.getElementById('menuImageEdit-{{ $m->id }}');
    imagePreviewEdit = document.getElementById('imagePreviewEdit-{{ $m->id }}');
    imageContainerEdit = document.getElementById('imageContainerEdit-{{ $m->id }}');
    uploadIconEdit = document.getElementById('uploadIconEdit-{{ $m->id }}');

    imagePreviewEdit.src = '{{ $m->foto() }}';
    imagePreviewEdit.classList.remove('hidden');
    uploadIconEdit.classList.add('hidden');
    imageContainerEdit.classList.remove('bg-gray-300');

    imageInputEdit.addEventListener('change', function(e) {
        file = e.target.files[0];
        if (file) {
            reader = new FileReader();

            reader.onload = function(event) {
                imagePreviewEdit.src = event.target.result;

                imagePreviewEdit.classList.remove('hidden');
                imageContainerEdit.classList.remove('bg-gray-300');
                uploadIconEdit.classList.add('hidden');
            }

            reader.readAsDataURL(file);
        }
    });
    @empty
    @endforelse
</script>
@endpush

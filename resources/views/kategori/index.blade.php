@extends('layouts.app')

@section('content')
<div class="content-body">
    <div style="font-size:14px; color:#969BA0; margin-bottom:8px;">
    Beranda / <span style="color:#464255; font-weight:600;">Kategori</span>
    </div>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 class="welcome-message">Kategori</h1>
        <button id="btn-tambah" style="background: #2D3832; color: white; padding: 10px 20px; border-radius: 8px; border: none;">
            <i class="fas fa-plus" style="margin-right: 8px;"></i>Tambah
        </button>
    </div>

    <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
        <thead>
            <tr style="background: #F5F5F5;">
                <th style="padding: 12px; border: 1px solid #ddd;">No</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Kategori</th>
                <th style="padding: 12px; border: 1px solid #ddd; width: 120px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategoris as $index => $kategori)
            <tr>
                <td style="padding: 12px; border: 1px solid #ddd;">{{ $index + 1 }}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">{{ $kategori->nama_kategori }}</td>
                <td style="padding: 12px; border: 1px solid #ddd; text-align: center;">
                    <button class="btn-edit"
                            data-id="{{ $kategori->id }}"
                            data-nama="{{ $kategori->nama_kategori }}"
                            style="background: none; border: none; cursor: pointer; margin-right: 8px;">
                        <i class="fas fa-pen-to-square" style="color: #2D3832;"></i>
                    </button>
                    <button class="btn-delete"
                            data-id="{{ $kategori->id }}"
                            style="background: none; border: none; cursor: pointer;">
                        <i class="fas fa-trash" style="color: #d11a2a;"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Create/Edit -->
<div id="modal-kategori" style="display:none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.4); z-index: 9999; justify-content: center; align-items: center;">
    <div style="background: #fff; border-radius: 12px; width: 400px; padding: 24px; position: relative;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
            <h2 id="modal-title" style="margin: 0; font-size: 18px;">Tambah Kategori</h2>
            <button id="modal-close" style="background: none; border: none; font-size: 24px; line-height: 1; cursor: pointer;">&times;</button>
        </div>
        <form id="form-kategori" method="POST">
            @csrf
            <div style="display: flex; flex-direction: column; gap: 8px; margin-bottom: 16px;">
                <label for="nama_kategori" style="font-size: 14px; font-weight: 500; color: #323639;">Nama Kategori</label>
                <input type="text" id="nama_kategori" name="nama_kategori" required
                       style="padding: 10px 12px; border-radius: 8px; border: 1px solid #BEC1BF; font-size: 14px; color: #323639;">
            </div>
            <button type="submit" id="btn-simpan"
                    style="width: 100%; background: #2D3832; color: white; padding: 10px; border: none; border-radius: 8px; font-size: 14px;">
                Tambah
            </button>
        </form>
    </div>
</div>

<!-- SweetAlert2 & Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const tambahBtn      = document.getElementById('btn-tambah');
    const modal          = document.getElementById('modal-kategori');
    const form           = document.getElementById('form-kategori');
    const inputNama      = document.getElementById('nama_kategori');
    const modalTitle     = document.getElementById('modal-title');
    const simpanBtn      = document.getElementById('btn-simpan');
    const closeModalBtn  = document.getElementById('modal-close');

    // Buka modal untuk Create
    tambahBtn.addEventListener('click', () => {
        form.reset();
        form.action = "{{ route('kategori.store') }}";
        modalTitle.textContent = 'Tambah Kategori';
        simpanBtn.textContent  = 'Tambah';
        // Hapus input _method jika ada
        form.querySelector('input[name="_method"]')?.remove();
        modal.style.display = 'flex';
    });

    // Buka modal untuk Edit
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', () => {
            const id   = btn.dataset.id;
            const nama = btn.dataset.nama;

            form.action = `/kategori/${id}`;
            modalTitle.textContent = 'Edit Kategori';
            simpanBtn.textContent  = 'Simpan';
            inputNama.value        = nama;

            // tambahkan method PUT
            let methodInput = form.querySelector('input[name="_method"]');
            if (!methodInput) {
                methodInput = document.createElement('input');
                methodInput.type  = 'hidden';
                methodInput.name  = '_method';
                methodInput.value = 'PUT';
                form.appendChild(methodInput);
            } else {
                methodInput.value = 'PUT';
            }

            modal.style.display = 'flex';
        });
    });

    // Hapus modal
    closeModalBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Konfirmasi & proses Delete
    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.id;
            Swal.fire({
                title: 'Yakin ingin dihapus?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#d11a2a',
                cancelButtonColor: '#888'
            }).then(result => {
                if (result.isConfirmed) {
                    const delForm = document.createElement('form');
                    delForm.method = 'POST';
                    delForm.action = `/kategori/${id}`;
                    delForm.innerHTML = `
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                    `;
                    document.body.appendChild(delForm);
                    delForm.submit();
                }
            });
        });
    });
});
</script>
@if(session('success'))
<script>
  document.addEventListener('DOMContentLoaded', function(){
    Swal.fire({
      icon: 'success',
      title: 'Sukses',
      text: '{{ session("success") }}',
      timer: 2000,
      showConfirmButton: false
    });
  });
</script>
@endif
@endsection

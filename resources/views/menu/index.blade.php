@extends('layouts.app')

@section('content')
  <!-- STYLE MODAL -->
  <style>
    #modal-menu {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0,0,0,0.4);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }
  </style>

  <div class="content-body">
    <div style="font-size:14px; color:#969BA0; margin-bottom:8px;">
    Beranda / <span style="color:#464255; font-weight:600;">Daftar Menu</span>
    </div>
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
      <h1>Menu</h1>
      <button id="btn-tambah"
              style="background:#2D3832;color:#fff;padding:8px 16px;border-radius:6px;border:none;">
        + Tambah
      </button>
    </div>

    <table style="width:100%;border-collapse:collapse;font-size:14px;">
      <thead>
        <tr style="background:#F5F5F5;">
          <th style="padding:8px;border:1px solid #ddd;">No</th>
          <th style="padding:8px;border:1px solid #ddd;">Foto</th>
          <th style="padding:8px;border:1px solid #ddd;">Nama Menu</th>
          <th style="padding:8px;border:1px solid #ddd;">Kategori</th>
          <th style="padding:8px;border:1px solid #ddd;">Harga</th>
          <th style="padding:8px;border:1px solid #ddd;">Deskripsi</th>
          <th style="padding:8px;border:1px solid #ddd;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($menus as $i => $menu)
          <tr>
            <td style="padding:8px;border:1px solid #ddd;">{{ $i+1 }}</td>
            <td style="padding:8px;border:1px solid #ddd;">
              <img src="{{ asset('storage/'.$menu->foto) }}"
                   alt="" style="width:60px; height:60px; object-fit:cover; border-radius:4px;">
            </td>
            <td style="padding:8px;border:1px solid #ddd;">{{ $menu->nama_menu }}</td>
            <td style="padding:8px;border:1px solid #ddd;">
              {{ optional($menu->kategori)->nama_kategori }}
            </td>
            <td style="padding:8px;border:1px solid #ddd;">{{ $menu->harga }}</td>
            <td style="padding:8px;border:1px solid #ddd;">{{ $menu->deskripsi }}</td>
            <td style="padding:8px;border:1px solid #ddd; text-align:center;">
              <button class="btn-edit"
                      data-id="{{ $menu->id }}"
                      data-nama="{{ $menu->nama_menu }}"
                      data-kategori-id="{{ $menu->kategori_id }}"
                      data-harga="{{ $menu->harga }}"
                      data-deskripsi="{{ $menu->deskripsi }}"
                      style="background:none;border:none;cursor:pointer;margin-right:6px;">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn-delete"
                      data-id="{{ $menu->id }}"
                      style="background:none;border:none;cursor:pointer;color:#d11a2a;">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" style="text-align:center;padding:16px;">Belum ada data menu.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- MODAL CREATE / EDIT -->
  <div id="modal-menu">
    <div style="background:#fff;border-radius:12px;width:400px;max-width:90%;padding:24px;position:relative;">
      <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;">
        <h2 id="modal-title">Tambah Menu</h2>
        <button id="modal-close" style="background:none;border:none;font-size:24px;cursor:pointer">&times;</button>
      </div>
      <form id="form-menu" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Upload Foto -->
        <div style="text-align:center;margin-bottom:16px;">
          <label for="foto"
                 style="display:inline-block;width:140px;height:140px;border:2px dashed #DDD;border-radius:8px;position:relative;cursor:pointer;">
            <input type="file" id="foto" name="foto" accept="image/*"
                   style="position:absolute;top:0;left:0;width:100%;height:100%;opacity:0;cursor:pointer;">
            <div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);color:#555;">
              <i class="fas fa-upload" style="font-size:24px;"></i><br>
              <small>Upload Foto</small>
            </div>
          </label>
          @error('foto')
            <div class="text-red-600 text-sm">{{ $message }}</div>
          @enderror
        </div>

        <!-- Fields -->
        <div style="display:flex;flex-direction:column;gap:12px;margin-bottom:16px;">
          <div>
            <label for="nama_menu">Nama Menu</label>
            <input type="text" id="nama_menu" name="nama_menu" required
                   style="width:100%;padding:8px;border:1px solid #BEC1BF;border-radius:6px;">
          </div>
          <div>
            <label for="kategori_id">Kategori</label>
            <select id="kategori_id" name="kategori_id" required
                    style="width:100%;padding:8px;border:1px solid #BEC1BF;border-radius:6px;">
              <option value="">-- Pilih --</option>
              @foreach($kategoris as $kat)
                <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
              @endforeach
            </select>
            @error('kategori_id')
              <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
          </div>
          <div>
            <label for="harga">Harga</label>
            <input type="text" id="harga" name="harga" placeholder="0" required
                   style="width:100%;padding:8px;border:1px solid #BEC1BF;border-radius:6px;">
          </div>
          <div>
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="3" required
                      style="width:100%;padding:8px;border:1px solid #BEC1BF;border-radius:6px;"></textarea>
          </div>
        </div>

        <button type="submit"
                style="width:100%;padding:10px;background:#2D3832;color:#fff;border:none;border-radius:6px;">
          <span id="btn-simpan-text">Tambah</span>
        </button>
      </form>
    </div>
  </div>

  <!-- SWEETALERT2 & SCRIPT CRUD -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const modal        = document.getElementById('modal-menu');
      const btnTambah    = document.getElementById('btn-tambah');
      const btnClose     = document.getElementById('modal-close');
      const form         = document.getElementById('form-menu');
      const title        = document.getElementById('modal-title');
      const btnText      = document.getElementById('btn-simpan-text');
      const namaInput    = document.getElementById('nama_menu');
      const kategoriSel  = document.getElementById('kategori_id');
      const hargaInput   = document.getElementById('harga');
      const deskripsiInp = document.getElementById('deskripsi');

      // OPEN CREATE
      btnTambah.addEventListener('click', () => {
        form.reset();
        form.action         = "{{ route('menu.store') }}";
        title.textContent   = 'Tambah Menu';
        btnText.textContent = 'Tambah';
        form.querySelector('input[name="_method"]')?.remove();
        modal.style.display = 'flex';
      });

      // OPEN EDIT
      document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', () => {
          const id        = btn.dataset.id;
          const nama      = btn.dataset.nama;
          const kategori  = btn.dataset.kategoriId;
          const harga     = btn.dataset.harga;
          const deskripsi = btn.dataset.deskripsi;

          form.action         = `/menu/${id}`;
          title.textContent   = 'Edit Menu';
          btnText.textContent = 'Simpan';
          namaInput.value     = nama;
          kategoriSel.value   = kategori;
          hargaInput.value    = formatRupiah(harga, '');
          deskripsiInp.value  = deskripsi;

          let methodInput = form.querySelector('input[name="_method"]');
          if (!methodInput) {
            methodInput = document.createElement('input');
            methodInput.type  = 'hidden';
            methodInput.name  = '_method';
            form.appendChild(methodInput);
          }
          methodInput.value = 'PUT';

          modal.style.display = 'flex';
        });
      });

      // CLOSE MODAL
      btnClose.addEventListener('click', () => modal.style.display = 'none');

      // DELETE
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
          }).then(res => {
            if (res.isConfirmed) {
              const delForm = document.createElement('form');
              delForm.method = 'POST';
              delForm.action = `/menu/${id}`;
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

      // FORMAT RUPIAH ON INPUT
      hargaInput.addEventListener('input', () => {
        hargaInput.value = formatRupiah(hargaInput.value);
        hargaInput.setSelectionRange(hargaInput.value.length, hargaInput.value.length);
      });

      // NOTIFIKASI SUKSES via Swal
      @if(session('success'))
        Swal.fire({
          icon: 'success',
          title: 'Berhasil',
          text: '{{ session('success') }}',
          showConfirmButton: false,
          timer: 2000
        });
      @endif
    });

    function formatRupiah(angka, prefix = 'Rp ') {
      let numberString = angka.toString().replace(/[^,\d]/g, '');
      const split = numberString.split(',');
      let sisa = split[0].length % 3;
      let rupiah = split[0].substr(0, sisa);
      const ribuan = split[0].substr(sisa).match(/\d{3}/gi);
      if (ribuan) {
        const sep = sisa ? '.' : '';
        rupiah += sep + ribuan.join('.');
      }
      rupiah = split[1] !== undefined
        ? rupiah + ',' + split[1]
        : rupiah;
      return prefix + rupiah;
    }
  </script>
@endsection

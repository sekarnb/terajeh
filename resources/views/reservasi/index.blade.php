@extends('layouts.app')

@section('content')
{{-- Load SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="content-body" style="padding: 30px 40px;">
  {{-- Breadcrumb --}}
  <div style="font-size:14px; color:#969BA0; margin-bottom:8px;">
    Beranda / <span style="color:#464255; font-weight:600;">Data Reservasi</span>
  </div>
  <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
      <h1>Data Reservasi</h1>
  </div>

  {{-- Card --}}
  <div style="background:#FFF; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.05); overflow:hidden;">

    {{-- Tabel --}}
    <div style="padding: 0 30px 30px;">
      <table style="width:100%; border-collapse:collapse; margin-top:16px; font-size:14px;">
        <thead>
          <tr style="background:#F5F5F5; text-align:left;">
            <th style="padding:12px; border-bottom:1px solid #DDD; width:40px;">No.</th>
            <th style="padding:12px; border-bottom:1px solid #DDD;">Cust</th>
            <th style="padding:12px; border-bottom:1px solid #DDD;">No. HP</th>
            <th style="padding:12px; border-bottom:1px solid #DDD;">Tamu</th>
            <th style="padding:12px; border-bottom:1px solid #DDD;">Tgl</th>
            <th style="padding:12px; border-bottom:1px solid #DDD;">Waktu</th>
            <th style="padding:12px; border-bottom:1px solid #DDD;">Total Bayar</th>
            <th style="padding:12px; border-bottom:1px solid #DDD;">Status</th>
            <th style="padding:12px; border-bottom:1px solid #DDD;">Bukti</th>
            <th style="padding:12px; border-bottom:1px solid #DDD; text-align:center; width:140px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($reservasis as $i => $r)
          <tr>
            <td style="padding:12px; border-bottom:1px solid #EEE;">{{ $i+1 }}</td>
            <td style="padding:12px; border-bottom:1px solid #EEE;">{{ $r->nama_customer }}</td>
            <td style="padding:12px; border-bottom:1px solid #EEE;">{{ $r->nomor_hp }}</td>
            <td style="padding:12px; border-bottom:1px solid #EEE;">{{ $r->jumlah_tamu }} orang</td>
            <td style="padding:12px; border-bottom:1px solid #EEE;">{{ $r->tanggal->format('d/m/Y') }}</td>
            <td style="padding:12px; border-bottom:1px solid #EEE;">{{ $r->waktu }}</td>
            <td style="padding:12px; border-bottom:1px solid #EEE;">Rp {{ number_format($r->total_bayar,0,',','.') }},-</td>
            <td style="padding:12px; border-bottom:1px solid #EEE;">
              @if($r->status=='pending')
                <span style="background:#FBEAC9; color:#926F2A; padding:4px 8px; border-radius:12px; font-size:12px;">Pending</span>
              @else
                <span style="background:#DBF8E8; color:#2A6F48; padding:4px 8px; border-radius:12px; font-size:12px;">Selesai</span>
              @endif
            </td>
            <td style="padding:12px; border-bottom:1px solid #EEE;">
              <button class="btn-bukti"
                      data-bukti="{{ asset('storage/bukti/'.$r->bukti) }}"
                      style="background:none;border:none;cursor:pointer;color:#2D3832;">
                Tinjau
              </button>
            </td>
            <td style="padding:12px; border-bottom:1px solid #EEE; text-align:center;">
              <button class="btn-action"
                      data-id="{{ $r->id }}"
                      style="background:#2D3832; color:#FFF; border:none; padding:6px 12px; border-radius:8px; margin-right:6px;">
                {{ $r->status=='pending' ? 'Tinjau' : 'Lihat' }}
              </button>
              <button class="btn-view"
                      data-json='@json($r)'
                      style="background:none;border:none;cursor:pointer;">
                <i class="fas fa-eye" style="color:#2D3832;"></i>
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{-- pagination --}}
      <div style="margin-top:16px; text-align:right;">
        {{ $reservasis->links() }}
      </div>
    </div>
  </div>
</div>

{{-- Modal Detail Reservasi --}}
<div id="modal-reservasi" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.4); z-index:1000; justify-content:center; align-items:center;">
  <div style="background:#FFF; border-radius:12px; width:500px; padding:24px; position:relative;">
    <button id="modal-close" style="position:absolute; top:12px; right:12px; background:none; border:none; font-size:24px; cursor:pointer;">×</button>
    <h3 style="margin-top:0; font-size:18px; font-weight:600;">Detail Reservasi</h3>
    <table style="width:100%; font-size:14px; margin-top:12px;">
      <tr><td>Nama</td><td>: <span id="d-nama"></span></td></tr>
      <tr><td>No. HP</td><td>: <span id="d-hp"></span></td></tr>
      <tr><td>Jumlah Tamu</td><td>: <span id="d-tamu"></span></td></tr>
      <tr><td>Tanggal</td><td>: <span id="d-tgl"></span></td></tr>
      <tr><td>Waktu</td><td>: <span id="d-waktu"></span></td></tr>
      <tr><td>Total Bayar</td><td>: <span id="d-bayar"></span></td></tr>
      <tr><td>Status</td><td>: <span id="d-status"></span></td></tr>
    </table>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  // SweetAlert pop-up bukti transfer
  document.querySelectorAll('.btn-bukti').forEach(btn => {
    btn.addEventListener('click', () => {
      const url = btn.dataset.bukti;
      Swal.fire({
        title: 'Bukti Transfer',
        imageUrl: url,
        imageAlt: 'Bukti Transfer',
        showCloseButton: true,
        showConfirmButton: false,
        width: 'auto',
      });
    });
  });

  // Tombol Tinjau / Lihat: misal ubah status via modal atau langsung redirect
  document.querySelectorAll('.btn-action').forEach(btn => {
    btn.addEventListener('click', () => {
      const id = btn.dataset.id;
      // contoh: konfirmasi ubah status pending→selesai
      @if(request()->has('filter') && request('filter')=='all')
      if (btn.textContent.trim()==='Tinjau') {
        Swal.fire({
          title: 'Tandai sebagai selesai?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonText: 'Ya',
          cancelButtonText: 'Batal',
        }).then(res => {
          if (res.isConfirmed) {
            window.location = `/reservasi/${id}/selesai`;
          }
        });
      }
      @endif
    });
  });

  // Modal Detail Reservasi
  const modal = document.getElementById('modal-reservasi');
  const close = document.getElementById('modal-close');

  document.querySelectorAll('.btn-view').forEach(btn => {
    btn.addEventListener('click', () => {
      const data = JSON.parse(btn.dataset.json);
      document.getElementById('d-nama').textContent   = data.nama_customer;
      document.getElementById('d-hp').textContent     = data.nomor_hp;
      document.getElementById('d-tamu').textContent   = data.jumlah_tamu + ' orang';
      document.getElementById('d-tgl').textContent    = new Date(data.tanggal).toLocaleDateString();
      document.getElementById('d-waktu').textContent  = data.waktu;
      document.getElementById('d-bayar').textContent  = 'Rp ' + Number(data.total_bayar).toLocaleString() + ',-';
      document.getElementById('d-status').textContent = data.status.charAt(0).toUpperCase() + data.status.slice(1);
      modal.style.display = 'flex';
    });
  });

  close.addEventListener('click', () => modal.style.display = 'none');
});
</script>
@endsection

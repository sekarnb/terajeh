@extends('layouts.app', ['title' => 'Data Reservasi'])

@section('content')
<div class="mt-12 p-4 border border-gray-300 rounded-xl">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-500">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left font-medium tracking-wider">No</th>
                    <th class="px-6 py-3 text-left font-medium tracking-wider">Cust</th>
                    <th class="px-6 py-3 text-left font-medium tracking-wider">No. HP</th>
                    <th class="px-6 py-3 text-left font-medium tracking-wider">Tamu</th>
                    <th class="px-6 py-3 text-left font-medium tracking-wider">Tgl</th>
                    <th class="px-6 py-3 text-left font-medium tracking-wider">Waktu</th>
                    <th class="px-6 py-3 text-left font-medium tracking-wider">Total Bayar</th>
                    <th class="px-6 py-3 text-left font-medium tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left font-medium tracking-wider">Bukti</th>
                    <th class="px-6 py-3 text-left font-medium tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($reservasi as $r)
                <tr>
                    <td class="px-6 py-4 text-gray-500">
                        {{ $reservasi->firstItem() + $loop->index }}
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        {{ $r->nama_customer }}
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        {{ $r->no_hp }}
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        {{ $r->jumlah_tamu }}
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        {{ $r->tanggal->format('d F Y') }}
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        {{ $r->jam->format('H.i') }}
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        Rp. {{ number_format($r->total_bayar, 2) }},-
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        <span class="{{ $r->status->bgColor() }} {{ $r->status->textColor() }} px-2 py-1 rounded-full text-xs">
                            {{ $r->status->label() }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        <button onclick="document.getElementById('preview-modal-{{ $r->id }}').classList.remove('hidden')" type="button" class="bg-secondary text-white px-3 py-1 rounded-xl transition-colors cursor-pointer">
                            {{ $r->status === \App\Enums\ReservasiStatus::PENDING ? 'Tinjau' : 'Lihat' }}
                        </button>
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('reservasi.show', $r->id) }}" class="text-gray-500 hover:text-gray-700 transition-colors cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="px-6 py-4 text-center text-gray-500">Tidak ada menu ditemukan</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $reservasi->links() }}
        </div>
    </div>
</div>


{{-- preview image --}}
@forelse ($reservasi as $r)
<div id="preview-modal-{{ $r->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg px-6 py-8 max-w-sm w-full">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg mb-2">Bukti TF</h2>
            </div>
            <div onclick="document.getElementById('preview-modal-{{ $r->id }}').classList.add('hidden')" class="cursor-pointer -mt-4 p-1 text-red-500 bg-red-200 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>
        </div>

        <div class="text-lg flex items-center justify-center text-center mb-4">
            @if($r->bukti_bayar)
            <img src="{{ $r->bukti_bayar() }}" alt="{{ $r->nama_customer }}">
            @else
            <span class="text-red-500">Bukti pembayaran tidak tersedia</span>
            @endif
        </div>
        <form action="{{ route('reservasi.update', $r->id) }}" method="post">
            @csrf
            @method('put')

            <div class="mt-6 flex gap-4">
                @if($r->status === \App\Enums\ReservasiStatus::PENDING)
                <button type="submit" name="status" value="{{ \App\Enums\ReservasiStatus::DITOLAK }}" class="w-full cursor-pointer bg-red-500 hover:bg-red-700 text-white px-4 py-3 rounded-xl">Tolak</button>
                <button type="submit" name="status" value="{{ \App\Enums\ReservasiStatus::SELESAI }}" class="w-full cursor-pointer bg-green-500 hover:bg-green-700 text-white px-4 py-3 rounded-xl">Terima</button>
                @else
                <button type="button" onclick="document.getElementById('preview-modal-{{ $r->id }}').classList.add('hidden')" class="w-full cursor-pointer bg-secondary hover:bg-secondary-dark text-white px-4 py-3 rounded-xl">Selesai</button>
                @endif
            </div>
        </form>
    </div>
</div>
@empty
@endforelse
@endsection

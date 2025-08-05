@extends('layouts.app', ['breadcrumb' => 'Data Reservasi', 'title' => 'Detail Reservasi'])

@section('content')
<div class="mt-12 p-8 border border-gray-300 rounded-xl">
    <div class="grid grid-cols-2">
        <div class="grid grid-cols-2 text-lg gap-8">
            <span>Nama Pelanggan:</span>
            <span>{{ $reservasi->nama_customer }}</span>

            <span>No. HP:</span>
            <span>{{ $reservasi->no_hp }}</span>

            <span>Jumlah Tamu:</span>
            <span>{{ $reservasi->jumlah_tamu }}</span>

            <span>Tanggal Reservasi:</span>
            <span>{{ $reservasi->tanggal->format('d F Y') }}</span>

            <span>Jam:</span>
            <span>{{ $reservasi->jam->format('H:i') }}</span>
        </div>
    </div>

    <div class="mt-8">
        <p class="mb-6 text-lg">Pesanan:</p>

        <div class="gap-8 mt-4 bg-[#FAF9F7] px-6 py-8 overflow-x-auto">
            <div class="min-w-full flow-root sm:mx-0">
                <table class="min-w-full whitespace-nowrap border-separate border-spacing-x-8">
                    <colgroup>
                        <col class="w-full sm:w-1/2">
                        <col class="sm:w-1/6">
                        <col class="sm:w-1/6">
                        <col class="sm:w-1/6">
                        <col class="sm:w-1/6">
                        <col class="sm:w-1/6">
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="text-left py-4 text-secondary/50">No.</th>
                            <th class="text-left py-4 text-secondary/50">Menu</th>
                            <th class="text-right py-4 text-secondary/50">Harga</th>
                            <th class="text-right py-4 text-secondary/50">Jumlah</th>
                            <th class="text-right py-4 text-secondary/50">Keterangan</th>
                            <th class="text-right py-4 text-secondary/50">Subtotal</th>
                        </tr>
                    </thead>

                    <tbody id="order-items">
                        @forelse($reservasi->orders as $order)
                            <tr>
                                <td class="py-6">{{ $loop->iteration }}</td>
                                <td class="py-6">{{ $order->menu->nama }}</td>
                                <td class="py-6 text-right">Rp. {{ number_format($order->menu->harga, 0, ',', '.') }}</td>
                                <td class="py-6 text-right">{{ $order->jumlah }}</td>
                                <td class="py-6 text-right">{{ $order->notes ?? '-' }}</td>
                                <td class="py-6 text-right">Rp. {{ number_format($order->menu->harga * $order->jumlah, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center">Tidak ada menu yang dipesan.</td>
                            </tr>
                        @endforelse
                    </tbody>

                    <tfoot>
                        <tr>
                            <th scope="row" colspan="4" class="font-bold pt-8 text-right text-amber-950">Total</th>
                            <td class="pt-8 text-right" colspan="2">Rp. {{ number_format($totalPrice, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="my-8">
    <a href="{{ route('reservasi.index') }}" class="border border-secondary text-xl rounded-lg px-12 py-4">kembali</a>
</div>
@endsection

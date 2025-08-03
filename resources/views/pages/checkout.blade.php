@extends('layouts.main', ['title' => 'Reservasi'])

@section('content')
<div class="mt-32 lg:mt-0 flex flex-col items-center justify-center text-primary bg-secondary">
    <h1 class="text-4xl lg:text-6xl leading-loose tracking-wider py-6">Reservasi</h1>
</div>

<div class="mt-8 container-default flex justify-center lg:flex-none">
    <a href="{{ url()->previous() }}" class="border border-secondary px-16 py-2">Kembali</a>
</div>

<div class="mt-32 container-default">
    <div class="flex flex-col items-center gap-6">
        <span class="text-amber-950 text-2xl lg:text-4xl font-bold">Pastikan pesanan Anda sudah benar</span>
    </div>

    <div class="mt-16">
        <div class="flex justify-between gap-8">
            <span>Data Customer</span>
            <a href="{{ route('pages.reservasi', [
                'nama' => request('nama'),
                'no_hp' => request('no_hp'),
                'jumlah_tamu' => request('jumlah_tamu'),
                'tanggal' => request('tanggal'),
                'jam' => request('jam'),
            ]) }}" class="underline">Edit</a>
        </div>

        <div class="flex justify-between whitespace-nowrap gap-8 mt-4 bg-white p-6 overflow-x-auto">
            <div class="flex flex-col gap-2">
                <span class="text-secondary/50">Nama Pelanggan</span>
                <span class="text-secondary font-medium">{{ request('nama') }}</span>
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-secondary/50">No. HP</span>
                <span class="text-secondary font-medium">{{ request('no_hp') }}</span>
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-secondary/50">Jumlah Tamu</span>
                <span class="text-secondary font-medium">{{ request('jumlah_tamu') }} Orang</span>
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-secondary/50">Hari/Tanggal</span>
                <span class="text-secondary font-medium">{{ \Carbon\Carbon::parse(request('tanggal'))->translatedFormat('d F Y') }}</span>
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-secondary/50">Jam</span>
                <span class="text-secondary font-medium">{{ \Carbon\Carbon::parse(request('jam'))->format('H:i') }}</span>
            </div>
        </div>
    </div>

    <div class="mt-16">
        <div class="flex justify-between gap-8">
            <span>Detail Pesanan</span>
            <a href="{{ route('pages.order', [
                'nama' => request('nama'),
                'no_hp' => request('no_hp'),
                'jumlah_tamu' => request('jumlah_tamu'),
                'tanggal' => request('tanggal'),
                'jam' => request('jam'),
            ]) }}" class="underline">Tambah Menu</a>
        </div>

        <div class="gap-8 mt-4 bg-white px-6 py-8 overflow-x-auto">
            <div class="min-w-full flow-root sm:mx-0">
                <table class="min-w-full whitespace-nowrap border-separate border-spacing-x-8">
                    <colgroup>
                        <col class="w-full sm:w-1/2">
                        <col class="sm:w-1/6">
                        <col class="sm:w-1/6">
                        <col class="sm:w-1/6">
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="text-left py-4 text-secondary/50">Menu yang Dipesan</th>
                            <th class="text-right py-4 text-secondary/50">Harga</th>
                            <th class="text-right py-4 text-secondary/50">Jumlah</th>
                            <th class="text-right py-4 text-secondary/50">Subtotal</th>
                        </tr>
                    </thead>

                    <tbody id="order-items">
                        @forelse($menuItems as $item)
                            <tr>
                                <td class=""py-6>
                                    <div class="flex flex-col">
                                        <span class="text-lg">{{ $item['name'] }}</span>
                                        <span class="text-sm italic text-secondary/80">{{ $item['notes'] }}</span>
                                    </div>
                                </td>
                                <td class="py-6 text-right">Rp. {{ number_format($item['price'], 0, ',', '.') }}</td>
                                <td class="py-6 text-right">{{ $item['quantity'] }}x</td>
                                <td class="py-6 text-right">Rp. {{ number_format($item['total'], 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center">Tidak ada menu yang dipesan.</td>
                            </tr>
                        @endforelse
                    </tbody>

                    <tfoot>
                        <tr>
                            <th scope="row" colspan="3" class="font-bold pt-6 text-right text-amber-950">Total</th>
                            <td class="pt-6 text-right sm:pr-0">Rp. {{ number_format($totalPrice, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-16 flex justify-center">
        <form action="{{ route('pages.checkout', [
            'nama' => request('nama'),
            'no_hp' => request('no_hp'),
            'jumlah_tamu' => request('jumlah_tamu'),
            'tanggal' => request('tanggal'),
            'jam' => request('jam'),
            'menuItems' => $menuItems,
        ]) }}"
        method="post"
        >
            @csrf

            <input type="hidden" name="nama" value="{{ request('nama') }}">
            <input type="hidden" name="no_hp" value="{{ request('no_hp') }}">
            <input type="hidden" name="jumlah_tamu" value="{{ request('jumlah_tamu') }}">
            <input type="hidden" name="tanggal" value="{{ request('tanggal') }}">
            <input type="hidden" name="jam" value="{{ request('jam') }}">
            <input type="hidden" name="menuItems" value="{{ json_encode($menuItems) }}">

            <button type="submit" class="bg-secondary hover:bg-secondary-dark cursor-pointer text-white py-2 px-28 lg:px-56 text-xl">Konfirmasi</button>
        </form>
    </div>
</div>
@endsection

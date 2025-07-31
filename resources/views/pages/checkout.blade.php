@extends('layouts.main', ['title' => 'Reservasi'])

@section('content')
<div class="flex flex-col items-center justify-center text-primary bg-secondary">
    <h1 class="text-6xl leading-loose tracking-wider py-6">Reservasi</h1>
</div>

<div class="mt-8 max-w-6xl mx-auto">
    <a href="{{ route('pages.reservasi') }}" class="border border-secondary px-16 py-2">Kembali</a>
</div>

<div class="mt-32 max-w-6xl mx-auto">
    <div class="flex flex-col items-center gap-6">
        <span class="text-amber-950 text-4xl font-bold">Pastikan pesanan Anda sudah benar</span>
    </div>

    <div class="mt-16">
        <div class="flex justify-between gap-8">
            <span>Data Customer</span>
            <span class="underline">Edit</span>
        </div>

        <div class="flex justify-between gap-8 mt-4 bg-white p-6">
            <div class="flex flex-col gap-2">
                <span class="text-secondary/50">Nama Pelanggan</span>
                <span class="text-secondary font-medium">Cece Zela</span>
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-secondary/50">No. HP</span>
                <span class="text-secondary font-medium">081234567890</span>
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-secondary/50">Jumlah Tamu</span>
                <span class="text-secondary font-medium">2 Orang</span>
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-secondary/50">Hari/Tanggal</span>
                <span class="text-secondary font-medium">2 Juli 2025</span>
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-secondary/50">Jam</span>
                <span class="text-secondary font-medium">13:00</span>
            </div>
        </div>
    </div>

    <div class="mt-16">
        <div class="flex justify-between gap-8">
            <span>Detail Pesanan</span>
            <span class="underline">Tambah Menu</span>
        </div>

        <div class="gap-8 mt-4 bg-white p-6 flow-root">
            <div class="-mx-4 mt-8 flow-root sm:mx-0">
                <table class="min-w-full">
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

                    <tbody>
                        <tr>
                            <td class="py-6">
                                <div class="flex flex-col">
                                    <span class="text-lg">Original Terajeh Steak</span>
                                    <span class="text-sm italic">Medium Well, Blackpaper</span>
                                </div>
                            </td>
                            <td class="py-6 text-right">Rp. 90,000</td>
                            <td class="py-6 text-right">2x</td>
                            <td class="py-6 text-right">Rp. 180,000</td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th scope="row" colspan="3" class="font-bold pl-4 pr-3 pt-6 text-right text-amber-950">Total</th>
                            <td class="pl-3 pr-6 pt-6 text-right sm:pr-0">Rp. 180,000</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-16 flex justify-center">
        <a href="{{ route('pages.payment') }}" class="bg-secondary hover:bg-secondary-dark cursor-pointer text-white py-2 px-56 text-xl">Konfirmasi</a>
    </div>
</div>
@endsection

@extends('layouts.main', ['title' => 'Reservasi'])

@section('content')
<div class="mt-32 lg:mt-0 flex flex-col items-center justify-center text-primary bg-secondary">
    <h1 class="text-4xl lg:text-6xl leading-loose tracking-wider py-6">Reservasi</h1>
</div>

<div class="mt-8 container-default flex justify-center lg:flex-none">
    <a href="{{ route('pages.order', [
        'nama' => request('nama'),
        'no_hp' => request('no_hp'),
        'jumlah_tamu' => request('jumlah_tamu'),
        'tanggal' => request('tanggal'),
        'jam' => request('jam'),
    ]) }}" class="border border-secondary px-16 py-2">Kembali</a>
</div>

<div class="mt-32 container-default">
    <div class="flex flex-col items-center gap-6">
        <span class="text-amber-950 text-2xl lg:text-4xl font-bold">Pastikan pesanan Anda sudah benar</span>
    </div>

    <div class="mt-16">
        <div class="flex justify-between gap-8">
            <span>Data Customer</span>
            <button type="button" class="underline">Edit</button>
        </div>

        <div class="flex justify-between whitespace-nowrap gap-8 mt-4 bg-white p-6 overflow-x-auto">
            <div class="flex flex-col gap-2">
                <span class="text-secondary/50">Nama Pelanggan</span>
                <span id="data-customer-nama" class="text-secondary font-medium"></span>
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-secondary/50">No. HP</span>
                <span id="data-customer-no_hp" class="text-secondary font-medium"></span>
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-secondary/50">Jumlah Tamu</span>
                <span id="data-customer-jumlah_tamu" class="text-secondary font-medium"></span>
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-secondary/50">Hari/Tanggal</span>
                <span id="data-customer-tanggal" class="text-secondary font-medium"></span>
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-secondary/50">Jam</span>
                <span id="data-customer-jam" class="text-secondary font-medium"></span>
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
                            <td class="" py-6>
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
        ]) }}" method="post">
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

{{-- modal edit --}}
<div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50" id="editModal">
    <div class="bg-[#FAF9F7] flex flex-col gap-4 p-4 min-w-xs lg:min-w-md">
        <div class="flex items-center justify-between gap-4">
            <h2 class="text-2xl font-bold">Edit Data Customer</h2>
            <button type="button" class="cursor-pointer p-1 bg-primary rounded" onclick="document.getElementById('editModal').classList.add('hidden')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form id="editCustomerForm" onsubmit="updateCustomerRequest(event)">
            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-2">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="w-full border border-secondary/30 rounded p-2" value="{{ request('nama') }}" required>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="no_hp">No. HP</label>
                    <div class="flex items-center">
                        <span class="border-y border-l border-secondary/30 rounded-s p-3">
                            <svg class="size-4" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.3 12C9.91111 12 8.53889 11.6973 7.18333 11.092C5.82778 10.4867 4.59444 9.62822 3.48333 8.51667C2.37222 7.40511 1.514 6.17178 0.908667 4.81667C0.303333 3.46156 0.000444444 2.08933 0 0.7C0 0.5 0.0666666 0.333333 0.2 0.2C0.333333 0.0666666 0.5 0 0.7 0H3.4C3.55556 0 3.69444 0.0528888 3.81667 0.158667C3.93889 0.264444 4.01111 0.389333 4.03333 0.533333L4.46667 2.86667C4.48889 3.04444 4.48333 3.19444 4.45 3.31667C4.41667 3.43889 4.35556 3.54444 4.26667 3.63333L2.65 5.26667C2.87222 5.67778 3.136 6.07489 3.44133 6.458C3.74667 6.84111 4.08289 7.21067 4.45 7.56667C4.79444 7.91111 5.15556 8.23067 5.53333 8.52533C5.91111 8.82 6.31111 9.08933 6.73333 9.33333L8.3 7.76667C8.4 7.66667 8.53067 7.59178 8.692 7.542C8.85333 7.49222 9.01156 7.47822 9.16667 7.5L11.4667 7.96667C11.6222 8.01111 11.75 8.09178 11.85 8.20867C11.95 8.32556 12 8.456 12 8.6V11.3C12 11.5 11.9333 11.6667 11.8 11.8C11.6667 11.9333 11.5 12 11.3 12ZM2.01667 4L3.11667 2.9L2.83333 1.33333H1.35C1.40556 1.78889 1.48333 2.23889 1.58333 2.68333C1.68333 3.12778 1.82778 3.56667 2.01667 4ZM7.98333 9.96667C8.41667 10.1556 8.85844 10.3056 9.30867 10.4167C9.75889 10.5278 10.2116 10.6 10.6667 10.6333V9.16667L9.1 8.85L7.98333 9.96667Z" fill="#202020" />
                            </svg>
                        </span>
                        <input type="text" name="no_hp" id="no_hp" class="w-full border-y border-r border-secondary/30 rounded-e p-2" value="{{ request('no_hp') }}" required>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="jumlah_tamu">Jumlah Tamu</label>
                    <div class="flex items-center">
                        <span class="border-y border-l border-secondary/30 rounded-s p-3">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 3.33398C7.38116 3.33398 6.78767 3.57982 6.35008 4.0174C5.9125 4.45499 5.66667 5.04848 5.66667 5.66732C5.66667 6.28616 5.9125 6.87965 6.35008 7.31723C6.78767 7.75482 7.38116 8.00065 8 8.00065C8.61884 8.00065 9.21233 7.75482 9.64992 7.31723C10.0875 6.87965 10.3333 6.28616 10.3333 5.66732C10.3333 5.04848 10.0875 4.45499 9.64992 4.0174C9.21233 3.57982 8.61884 3.33398 8 3.33398ZM8 4.66732C8.26522 4.66732 8.51957 4.77267 8.70711 4.96021C8.89464 5.14775 9 5.4021 9 5.66732C9 5.93253 8.89464 6.18689 8.70711 6.37442C8.51957 6.56196 8.26522 6.66732 8 6.66732C7.73478 6.66732 7.48043 6.56196 7.29289 6.37442C7.10536 6.18689 7 5.93253 7 5.66732C7 5.4021 7.10536 5.14775 7.29289 4.96021C7.48043 4.77267 7.73478 4.66732 8 4.66732ZM3.66667 5.33398C3.22464 5.33398 2.80072 5.50958 2.48816 5.82214C2.17559 6.1347 2 6.55862 2 7.00065C2 7.62732 2.35333 8.16732 2.86 8.45398C3.1 8.58732 3.37333 8.66732 3.66667 8.66732C3.96 8.66732 4.23333 8.58732 4.47333 8.45398C4.72 8.31398 4.92667 8.11398 5.08 7.87398C4.59432 7.24103 4.33178 6.46513 4.33333 5.66732V5.48065C4.13333 5.38732 3.90667 5.33398 3.66667 5.33398ZM12.3333 5.33398C12.0933 5.33398 11.8667 5.38732 11.6667 5.48065V5.66732C11.6667 6.46732 11.4067 7.24065 10.92 7.87398C11 8.00065 11.0867 8.10065 11.1867 8.20065C11.494 8.49884 11.9051 8.66613 12.3333 8.66732C12.6267 8.66732 12.9 8.58732 13.14 8.45398C13.6467 8.16732 14 7.62732 14 7.00065C14 6.55862 13.8244 6.1347 13.5118 5.82214C13.1993 5.50958 12.7754 5.33398 12.3333 5.33398ZM8 9.33398C6.44 9.33398 3.33333 10.114 3.33333 11.6673V12.6673H12.6667V11.6673C12.6667 10.114 9.56 9.33398 8 9.33398ZM3.14 9.70065C1.85333 9.85398 0 10.5073 0 11.6673V12.6673H2V11.3807C2 10.7073 2.46 10.1473 3.14 9.70065ZM12.86 9.70065C13.54 10.1473 14 10.7073 14 11.3807V12.6673H16V11.6673C16 10.5073 14.1467 9.85398 12.86 9.70065ZM8 10.6673C9.02 10.6673 10.16 11.0007 10.82 11.334H5.18C5.84 11.0007 6.98 10.6673 8 10.6673Z" fill="#202020" />
                            </svg>
                        </span>
                        <input type="text" name="jumlah_tamu" id="jumlah_tamu" class="w-full border-y border-r border-secondary/30 rounded-e p-2" value="{{ request('jumlah_tamu') }}" required>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="tanggal">Tanggal</label>
                    <div class="flex items-center">
                        <span class="border-y border-l border-secondary/30 rounded-s p-3">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.33333 9.33398C5.14444 9.33398 4.98622 9.26998 4.85867 9.14198C4.73111 9.01398 4.66711 8.85576 4.66667 8.66732C4.66622 8.47887 4.73022 8.32065 4.85867 8.19265C4.98711 8.06465 5.14533 8.00065 5.33333 8.00065C5.52133 8.00065 5.67978 8.06465 5.80867 8.19265C5.93756 8.32065 6.00133 8.47887 6 8.66732C5.99867 8.85576 5.93467 9.01421 5.808 9.14265C5.68133 9.2711 5.52311 9.33487 5.33333 9.33398ZM8 9.33398C7.81111 9.33398 7.65289 9.26998 7.52533 9.14198C7.39778 9.01398 7.33378 8.85576 7.33333 8.66732C7.33289 8.47887 7.39689 8.32065 7.52533 8.19265C7.65378 8.06465 7.812 8.00065 8 8.00065C8.188 8.00065 8.34644 8.06465 8.47533 8.19265C8.60422 8.32065 8.668 8.47887 8.66667 8.66732C8.66533 8.85576 8.60133 9.01421 8.47467 9.14265C8.348 9.2711 8.18978 9.33487 8 9.33398ZM10.6667 9.33398C10.4778 9.33398 10.3196 9.26998 10.192 9.14198C10.0644 9.01398 10.0004 8.85576 10 8.66732C9.99956 8.47887 10.0636 8.32065 10.192 8.19265C10.3204 8.06465 10.4787 8.00065 10.6667 8.00065C10.8547 8.00065 11.0131 8.06465 11.142 8.19265C11.2709 8.32065 11.3347 8.47887 11.3333 8.66732C11.332 8.85576 11.268 9.01421 11.1413 9.14265C11.0147 9.2711 10.8564 9.33487 10.6667 9.33398ZM2 14.6673V2.66732H4V1.33398H5.33333V2.66732H10.6667V1.33398H12V2.66732H14V14.6673H2ZM3.33333 13.334H12.6667V6.66732H3.33333V13.334ZM3.33333 5.33398H12.6667V4.00065H3.33333V5.33398Z" fill="#202020" />
                            </svg>
                        </span>
                        <input type="date" name="tanggal" id="tanggal" class="w-full border-y border-r border-secondary/30 rounded-e p-2" value="{{ \Carbon\Carbon::parse(request('tanggal'))->format('Y-m-d') }}" required>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="jam">Jam</label>
                    <div class="flex items-center">
                        <span class="border-y border-l border-secondary/30 rounded-s p-3">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1313_3291)">
                                    <path d="M8.0013 13.9993C8.78923 13.9993 9.56945 13.8442 10.2974 13.5426C11.0254 13.2411 11.6868 12.7991 12.2439 12.242C12.8011 11.6848 13.2431 11.0234 13.5446 10.2954C13.8461 9.5675 14.0013 8.78728 14.0013 7.99935C14.0013 7.21142 13.8461 6.4312 13.5446 5.70325C13.2431 4.97529 12.8011 4.31386 12.2439 3.75671C11.6868 3.19956 11.0254 2.7576 10.2974 2.45607C9.56945 2.15454 8.78923 1.99935 8.0013 1.99935C6.41 1.99935 4.88388 2.63149 3.75866 3.75671C2.63344 4.88193 2.0013 6.40805 2.0013 7.99935C2.0013 9.59065 2.63344 11.1168 3.75866 12.242C4.88388 13.3672 6.41 13.9993 8.0013 13.9993ZM15.3346 7.99935C15.3346 12.0493 12.0513 15.3327 8.0013 15.3327C3.9513 15.3327 0.667969 12.0493 0.667969 7.99935C0.667969 3.94935 3.9513 0.666016 8.0013 0.666016C12.0513 0.666016 15.3346 3.94935 15.3346 7.99935ZM10.0013 10.942L7.33463 8.27535V3.66602H8.66797V7.72335L10.944 9.99935L10.0013 10.942Z" fill="#202020" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_1313_3291">
                                        <rect width="16" height="16" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>
                        <input type="time" name="jam" id="jam" class="w-full border-y border-r border-secondary/30 rounded-e p-2" value="{{ \Carbon\Carbon::parse(request('jam'))->format('H:i') }}" required>
                    </div>
                </div>
            </div>

            <div class="w-full mt-4">
                <button type="submit" class="w-full text-lg cursor-pointer bg-secondary hover:bg-secondary-dark text-primary py-2 px-4" onclick="updateCustomerRequest(event)">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // initialize the data customer
        const nama = document.getElementById('data-customer-nama');
        const noHp = document.getElementById('data-customer-no_hp');
        const jumlahTamu = document.getElementById('data-customer-jumlah_tamu');
        const tanggal = document.getElementById('data-customer-tanggal');
        const jam = document.getElementById('data-customer-jam');

        nama.textContent = '{{ request('nama') }}';
        noHp.textContent = '{{ request('no_hp') }}';
        jumlahTamu.textContent = '{{ request('jumlah_tamu') }} Orang';
        tanggal.textContent = '{{ \Carbon\Carbon::parse(request('tanggal'))->translatedFormat('d F Y') }}';
        jam.textContent = '{{ \Carbon\Carbon::parse(request('jam'))->format('H:i') }}';

        const editButton = document.querySelector('button.underline');
        const editModal = document.getElementById('editModal');

        editButton.addEventListener('click', function() {
            editModal.classList.toggle('hidden');
        });

        window.updateCustomerRequest = function(event) {
            event.preventDefault();

            const form = document.getElementById('editCustomerForm');
            const formData = new FormData(form);

            nama.textContent = formData.get('nama');
            noHp.textContent = formData.get('no_hp');
            jumlahTamu.textContent = formData.get('jumlah_tamu') + ' Orang';
            tanggal.textContent = new Date(formData.get('tanggal')).toLocaleDateString('id-ID', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });
            jam.textContent = formData.get('jam');


            const params = new URLSearchParams(formData).toString();
            const url = new URL(window.location.href);
            url.search = params;

            history.pushState({}, '', url);

            editModal.classList.add('hidden');
        };
    });

</script>
@endpush

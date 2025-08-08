@extends('layouts.main', ['title' => 'Reservasi'])

@section('content')
<div class="mt-32 lg:mt-0 flex justify-center text-white bg-secondary">
    <h1 class="text-4xl lg:text-6xl leading-loose tracking-wider py-6">Reservasi</h1>
</div>

<div class="mt-32 container-default">
    <div class="flex flex-col items-center gap-6">
        <span class="text-amber-950 text-2xl lg:text-4xl font-bold">Syarat dan Ketentuan Reservasi</span>
        <span class="text-base lg:text-xl text-amber-950/75">Berikut adalah ketentuan penting yang perlu diperhatikan sebelum melakukan reservasi</span>
    </div>

    <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-4 ">
        <div class="flex flex-col items-start gap-4 p-6 bg-white border border-secondary">
            <div>
                <svg width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="36" cy="36" r="36" fill="#2D3832" />
                    <path d="M57.795 23.2497C57.5791 23.115 57.3324 23.0374 57.0781 23.0242C56.8239 23.0111 56.5706 23.0629 56.3419 23.1747C48.2925 27.1122 42.5438 25.2672 36.4669 23.321C30.0919 21.2791 23.4825 19.1697 14.3513 23.6285C14.0961 23.7509 13.8808 23.9429 13.7302 24.1825C13.5796 24.422 13.4998 24.6993 13.5 24.9822V47.4691C13.5 47.7236 13.5647 47.974 13.6881 48.1965C13.8115 48.4191 13.9895 48.6067 14.2053 48.7415C14.4212 48.8763 14.6678 48.954 14.9219 48.9673C15.1761 48.9805 15.4294 48.9289 15.6581 48.8172C23.7075 44.8797 29.4562 46.7247 35.5425 48.671C39.15 49.8241 42.825 50.9997 46.98 50.9997C50.1844 50.9997 53.6794 50.3022 57.6506 48.3635C57.9029 48.2403 58.1155 48.0489 58.2643 47.8109C58.4131 47.5729 58.4922 47.2979 58.4925 47.0172V24.5304C58.4948 24.2752 58.4319 24.0237 58.3098 23.7996C58.1878 23.5755 58.0106 23.3863 57.795 23.2497ZM55.5 46.0629C47.8875 49.4697 42.3281 47.6922 36.4575 45.8154C32.85 44.6622 29.175 43.4866 25.02 43.4866C22.1008 43.5008 19.2113 44.0736 16.5075 45.1741V25.9366C24.12 22.5297 29.6794 24.3072 35.55 26.1841C41.4206 28.061 47.4637 29.9997 55.5 26.8291V46.0629ZM36 29.9997C34.8133 29.9997 33.6533 30.3516 32.6666 31.0109C31.6799 31.6702 30.9108 32.6073 30.4567 33.7036C30.0026 34.8 29.8838 36.0064 30.1153 37.1703C30.3468 38.3342 30.9182 39.4033 31.7574 40.2424C32.5965 41.0815 33.6656 41.6529 34.8295 41.8845C35.9933 42.116 37.1997 41.9971 38.2961 41.543C39.3925 41.0889 40.3295 40.3199 40.9888 39.3332C41.6481 38.3465 42 37.1864 42 35.9997C42 34.4084 41.3679 32.8823 40.2426 31.7571C39.1174 30.6319 37.5913 29.9997 36 29.9997ZM36 38.9997C35.4067 38.9997 34.8266 38.8238 34.3333 38.4942C33.8399 38.1645 33.4554 37.696 33.2284 37.1478C33.0013 36.5996 32.9419 35.9964 33.0576 35.4145C33.1734 34.8325 33.4591 34.298 33.8787 33.8784C34.2982 33.4589 34.8328 33.1731 35.4147 33.0574C35.9967 32.9416 36.5999 33.001 37.1481 33.2281C37.6962 33.4552 38.1648 33.8397 38.4944 34.333C38.8241 34.8264 39 35.4064 39 35.9997C39 36.7954 38.6839 37.5585 38.1213 38.1211C37.5587 38.6837 36.7956 38.9997 36 38.9997ZM22.5 29.9997V38.9997C22.5 39.3976 22.342 39.7791 22.0607 40.0604C21.7794 40.3417 21.3978 40.4997 21 40.4997C20.6022 40.4997 20.2206 40.3417 19.9393 40.0604C19.658 39.7791 19.5 39.3976 19.5 38.9997V29.9997C19.5 29.6019 19.658 29.2204 19.9393 28.9391C20.2206 28.6578 20.6022 28.4997 21 28.4997C21.3978 28.4997 21.7794 28.6578 22.0607 28.9391C22.342 29.2204 22.5 29.6019 22.5 29.9997ZM49.5 41.9997V32.9997C49.5 32.6019 49.658 32.2204 49.9393 31.9391C50.2206 31.6578 50.6022 31.4997 51 31.4997C51.3978 31.4997 51.7794 31.6578 52.0607 31.9391C52.342 32.2204 52.5 32.6019 52.5 32.9997V41.9997C52.5 42.3976 52.342 42.7791 52.0607 43.0604C51.7794 43.3417 51.3978 43.4997 51 43.4997C50.6022 43.4997 50.2206 43.3417 49.9393 43.0604C49.658 42.7791 49.5 42.3976 49.5 41.9997Z" fill="white" />
                </svg>
            </div>

            <div class="flex flex-col items-start gap-2">
                <span class="text-xl font-medium text-amber-950">Pembayaran Penuh di Awal</span>
                <span class="text-lg text-amber-950/75">Reservasi hanya akan diproses setelah pembayaran penuh dilakukan di awal.</span>
            </div>
        </div>
        <div class="flex flex-col items-start gap-4 p-6 bg-white border border-secondary">
            <div>
                <svg width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="36" cy="36" r="36" fill="#2D3832" />
                    <path d="M22 22V54L28 50L32 54L36 50L40 54L44 50L50 54V50.02M26 18H46C47.0609 18 48.0783 18.4214 48.8284 19.1716C49.5786 19.9217 50 20.9391 50 22V42M34 26H42M30 34H34M38 42H42M42 34V34.02M18 18L54 54" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>

            <div class="flex flex-col items-start gap-2">
                <span class="text-xl font-medium text-amber-950">Tidak Bisa Refund</span>
                <span class="text-lg text-amber-950/75">Pembatalan reservasi tidak dapat dilakukan dan tidak ada pengembalian dana.</span>
            </div>
        </div>
        <div class="flex flex-col items-start gap-4 p-6 bg-white border border-secondary">
            <div>
                <svg width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="36" cy="36" r="36" fill="#2D3832" />
                    <path d="M43.502 54.5V56C43.502 56.4404 43.3579 56.7865 43.0723 57.0723C42.7866 57.3579 42.4412 57.501 42.0029 57.5H16.002C15.5615 57.5 15.2158 57.3564 14.9316 57.0713C14.682 56.8208 14.5409 56.5241 14.5088 56.1592L14.502 55.999V54.5H43.502ZM41.8447 42.5L55.0938 55.749L52.9512 57.8926L44.502 49.4434V45.5H40.5586L37.5586 42.5H41.8447ZM40.1445 46.5L43.1445 49.5H14.502V46.5H40.1445ZM43.502 46.5V48.4434L41.5586 46.5H43.502ZM47.502 14.5V22.5H57.4492L54.8584 48.3994L52.1221 45.6631L54.0986 26.0498L54.1543 25.5H34.9434L34.5684 22.5H44.502V14.5H47.502ZM37.8447 38.5L40.8447 41.5H36.5586L33.5586 38.5H37.8447ZM27.2344 33.5898C25.8526 33.733 24.5234 34.0475 23.249 34.5332C21.422 35.2296 19.9797 36.2841 18.9473 37.7061L18.3711 38.5H32.1445L35.1445 41.5H14.5107C14.6343 37.874 16.1169 35.197 18.9463 33.3975C20.734 32.2605 22.6308 31.4609 24.6377 30.9932L27.2344 33.5898ZM36.8447 37.5H32.5586L29.5859 34.5273C29.7685 34.5415 29.9405 34.5498 30.1016 34.5498H30.6016V31.2568L36.8447 37.5ZM29.002 30.5C29.1516 30.5 29.3205 30.5081 29.5088 30.5244C29.54 30.5271 29.571 30.528 29.6016 30.5303V33.5254C29.5993 33.5252 29.597 33.5256 29.5947 33.5254C29.4885 33.5162 29.3856 33.5102 29.2861 33.5059L29.002 33.5C28.8554 33.5 28.7089 33.5013 28.5635 33.5049L25.8164 30.7578C26.6325 30.6232 27.4659 30.5403 28.3174 30.5117L29.002 30.5ZM28.8457 29.502C27.5105 29.5119 26.2148 29.6449 24.958 29.8994L14.0586 19L16.2012 16.8564L28.8457 29.502Z" fill="white" stroke="white" />
                </svg>
            </div>

            <div class="flex flex-col items-start gap-2">
                <span class="text-xl font-medium text-amber-950">Larangan Bawa Makanan/Minuman</span>
                <span class="text-lg text-amber-950/75">Dilarang membawa makanan dan minuman dari luar ke dalam cafe</span>
            </div>
        </div>
    </div>
</div>

<div class="mt-32 container-default">
    <div class="flex flex-col items-center gap-6">
        <span class="text-amber-950 text-2xl lg:text-4xl font-bold">Amankan Tempat Anda Sekarang!</span>
        <span class="text-base lg:text-xl text-amber-950/75">Nikmati kepastian dan kenyamanan di tempat favorit</span>
    </div>

    <form action="{{ route('pages.reservasi') }}" method="post" class="mt-8 flex flex-col items-center justify-center lg:w-1/2 gap-6 mx-auto">
        @csrf

        <div class="w-full flex flex-col items-start gap-2">
            <label for="nama" class="font-medium text-amber-950">Nama</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') ?? request('nama') }}" placeholder="Masukan Nama Anda" class="w-full border bg-white border-none px-3 py-2.5" />
            @error('nama')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full flex flex-col items-start gap-2">
            <label for="no_hp" class="font-medium text-amber-950">No. HP</label>
            <div class="flex items-center w-full">
                <span class="border-y border-l border-none bg-white rounded-s p-3.5">
                    <svg class="size-4" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.3 12C9.91111 12 8.53889 11.6973 7.18333 11.092C5.82778 10.4867 4.59444 9.62822 3.48333 8.51667C2.37222 7.40511 1.514 6.17178 0.908667 4.81667C0.303333 3.46156 0.000444444 2.08933 0 0.7C0 0.5 0.0666666 0.333333 0.2 0.2C0.333333 0.0666666 0.5 0 0.7 0H3.4C3.55556 0 3.69444 0.0528888 3.81667 0.158667C3.93889 0.264444 4.01111 0.389333 4.03333 0.533333L4.46667 2.86667C4.48889 3.04444 4.48333 3.19444 4.45 3.31667C4.41667 3.43889 4.35556 3.54444 4.26667 3.63333L2.65 5.26667C2.87222 5.67778 3.136 6.07489 3.44133 6.458C3.74667 6.84111 4.08289 7.21067 4.45 7.56667C4.79444 7.91111 5.15556 8.23067 5.53333 8.52533C5.91111 8.82 6.31111 9.08933 6.73333 9.33333L8.3 7.76667C8.4 7.66667 8.53067 7.59178 8.692 7.542C8.85333 7.49222 9.01156 7.47822 9.16667 7.5L11.4667 7.96667C11.6222 8.01111 11.75 8.09178 11.85 8.20867C11.95 8.32556 12 8.456 12 8.6V11.3C12 11.5 11.9333 11.6667 11.8 11.8C11.6667 11.9333 11.5 12 11.3 12ZM2.01667 4L3.11667 2.9L2.83333 1.33333H1.35C1.40556 1.78889 1.48333 2.23889 1.58333 2.68333C1.68333 3.12778 1.82778 3.56667 2.01667 4ZM7.98333 9.96667C8.41667 10.1556 8.85844 10.3056 9.30867 10.4167C9.75889 10.5278 10.2116 10.6 10.6667 10.6333V9.16667L9.1 8.85L7.98333 9.96667Z" fill="#202020" />
                    </svg>
                </span>
                <input type="number" id="no_hp" name="no_hp" value="{{ old('no_hp') ?? request('no_hp') }}" placeholder="Masukan No. HP Anda" class="w-full border-y border-r border bg-white border-none px-3 py-2.5" />
            </div>
            @error('no_hp')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full flex flex-col items-start gap-2">
            <label for="jumlah_tamu" class="font-medium text-amber-950">Jumlah Tamu</label>
            <div class="flex items-center w-full">
                <span class="border-y border-l border-none bg-white rounded-s p-3.5">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 3.33398C7.38116 3.33398 6.78767 3.57982 6.35008 4.0174C5.9125 4.45499 5.66667 5.04848 5.66667 5.66732C5.66667 6.28616 5.9125 6.87965 6.35008 7.31723C6.78767 7.75482 7.38116 8.00065 8 8.00065C8.61884 8.00065 9.21233 7.75482 9.64992 7.31723C10.0875 6.87965 10.3333 6.28616 10.3333 5.66732C10.3333 5.04848 10.0875 4.45499 9.64992 4.0174C9.21233 3.57982 8.61884 3.33398 8 3.33398ZM8 4.66732C8.26522 4.66732 8.51957 4.77267 8.70711 4.96021C8.89464 5.14775 9 5.4021 9 5.66732C9 5.93253 8.89464 6.18689 8.70711 6.37442C8.51957 6.56196 8.26522 6.66732 8 6.66732C7.73478 6.66732 7.48043 6.56196 7.29289 6.37442C7.10536 6.18689 7 5.93253 7 5.66732C7 5.4021 7.10536 5.14775 7.29289 4.96021C7.48043 4.77267 7.73478 4.66732 8 4.66732ZM3.66667 5.33398C3.22464 5.33398 2.80072 5.50958 2.48816 5.82214C2.17559 6.1347 2 6.55862 2 7.00065C2 7.62732 2.35333 8.16732 2.86 8.45398C3.1 8.58732 3.37333 8.66732 3.66667 8.66732C3.96 8.66732 4.23333 8.58732 4.47333 8.45398C4.72 8.31398 4.92667 8.11398 5.08 7.87398C4.59432 7.24103 4.33178 6.46513 4.33333 5.66732V5.48065C4.13333 5.38732 3.90667 5.33398 3.66667 5.33398ZM12.3333 5.33398C12.0933 5.33398 11.8667 5.38732 11.6667 5.48065V5.66732C11.6667 6.46732 11.4067 7.24065 10.92 7.87398C11 8.00065 11.0867 8.10065 11.1867 8.20065C11.494 8.49884 11.9051 8.66613 12.3333 8.66732C12.6267 8.66732 12.9 8.58732 13.14 8.45398C13.6467 8.16732 14 7.62732 14 7.00065C14 6.55862 13.8244 6.1347 13.5118 5.82214C13.1993 5.50958 12.7754 5.33398 12.3333 5.33398ZM8 9.33398C6.44 9.33398 3.33333 10.114 3.33333 11.6673V12.6673H12.6667V11.6673C12.6667 10.114 9.56 9.33398 8 9.33398ZM3.14 9.70065C1.85333 9.85398 0 10.5073 0 11.6673V12.6673H2V11.3807C2 10.7073 2.46 10.1473 3.14 9.70065ZM12.86 9.70065C13.54 10.1473 14 10.7073 14 11.3807V12.6673H16V11.6673C16 10.5073 14.1467 9.85398 12.86 9.70065ZM8 10.6673C9.02 10.6673 10.16 11.0007 10.82 11.334H5.18C5.84 11.0007 6.98 10.6673 8 10.6673Z" fill="#202020" />
                    </svg>
                </span>
                <input type="number" id="jumlah_tamu" name="jumlah_tamu" value="{{ old('jumlah_tamu') ?? request('jumlah_tamu') }}" placeholder="Masukan Jumlah Tamu" class="w-full border-y border-r border bg-white border-none px-3 py-2.5" />
            </div>
            @error('jumlah_tamu')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full flex justify-between gap-6">
            <div class="w-full flex flex-col items-start gap-2">
                <label for="tanggal" class="font-medium text-amber-950">Hari/Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" value="{{ \Carbon\Carbon::parse(old('tanggal'))->format('Y-m-d') ?? \Carbon\Carbon::parse(request('tanggal'))->format('Y-m-d') }}" class="w-full border bg-white border-none px-3 py-2.5" />
                @error('tanggal')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full flex flex-col items-start gap-2">
                <label for="jam" class="font-medium text-amber-950">Jam</label>
                <input type="time" id="jam" name="jam" value="{{ \Carbon\Carbon::parse(old('jam'))->format('H:i') ?? \Carbon\Carbon::parse(request('jam'))->format('H:i') }}" class="w-full border bg-white border-none px-3 py-2.5" />
                @error('jam')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mt-8 w-full">
            <button type="submit" class="cursor-pointer w-full bg-secondary hover:bg-secondary-dark text-white py-2 text-xl tracking-wider">Next</button>
        </div>
    </form>
</div>
@endsection

@extends('layouts.main', ['title' => 'Reservasi'])

@section('content')
<div class="flex justify-center text-white bg-secondary">
    <h1 class="text-6xl leading-loose tracking-wider py-6">Reservasi</h1>
</div>

<div class="mt-32 max-w-6xl mx-auto">
    <div class="flex flex-col items-center gap-6">
        <span class="text-amber-950 text-4xl font-bold">Syarat dan Ketentuan Reservasi</span>
        <span class="text-xl text-amber-950/75">Berikut adalah ketentuan penting yang perlu diperhatikan sebelum melakukan reservasi</span>
    </div>

    <div class="mt-8 grid grid-cols-3 gap-4 ">
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

<div class="mt-32 max-w-6xl mx-auto">
    <div class="flex flex-col items-center gap-6">
        <span class="text-amber-950 text-4xl font-bold">Amankan Tempat Anda Sekarang!</span>
        <span class="text-xl text-amber-950/75">Nikmati kepastian dan kenyamanan di tempat favorit</span>
    </div>

    <form action="{{ route('pages.reservasi') }}" method="post" class="mt-8 flex flex-col items-center justify-center w-1/2 gap-6 mx-auto">
        @csrf

        <div class="w-full flex flex-col items-start gap-2">
            <label for="nama" class="font-medium text-amber-950">Nama</label>
            <input type="text" id="nama" name="nama" placeholder="Masukan Nama Anda" class="w-full border bg-white border-none px-3 py-2.5" />
            @error('nama')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full flex flex-col items-start gap-2">
            <label for="no_hp" class="font-medium text-amber-950">No. HP</label>
            <input type="number" id="no_hp" name="no_hp" placeholder="Masukan No. HP Anda" class="w-full border bg-white border-none px-3 py-2.5" />
            @error('no_hp')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full flex flex-col items-start gap-2">
            <label for="jumlah_tamu" class="font-medium text-amber-950">Jumlah Tamu</label>
            <input type="number" id="jumlah_tamu" name="jumlah_tamu" placeholder="Masukan Jumlah Tamu" class="w-full border bg-white border-none px-3 py-2.5" />
            @error('jumlah_tamu')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full flex justify-between gap-6">
            <div class="w-full flex flex-col items-start gap-2">
                <label for="tanggal" class="font-medium text-amber-950">Hari/Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="w-full border bg-white border-none px-3 py-2.5" />
                @error('tanggal')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full flex flex-col items-start gap-2">
                <label for="jam" class="font-medium text-amber-950">Jam</label>
                <input type="time" id="jam" name="jam" class="w-full border bg-white border-none px-3 py-2.5" />
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

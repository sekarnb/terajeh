@extends('layouts.main', ['title' => 'Home'])

@section('content')
<div id="hero" class="relative w-full h-screen overflow-hidden">
    <div class="relative w-full h-full">
        <img class="hero-image opacity-0 transition-opacity ease-in-out duration-300 absolute object-cover w-full h-full" src="{{ asset('assets/img/1.png') }}" alt="hero banner">
        <img class="hero-image opacity-0 transition-opacity ease-in-out duration-300 absolute object-cover w-full h-full" src="{{ asset('assets/img/2.png') }}" alt="hero banner">
        <img class="hero-image opacity-0 transition-opacity ease-in-out duration-300 absolute object-cover w-full h-full" src="{{ asset('assets/img/3.png') }}" alt="hero banner">
    </div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 bg-gradient-to-t from-primary via-transparent to-transparent w-full h-screen flex justify-center items-center">
        <div class="absolute top-1/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <div class="w-72 lg:w-80 xl:w-96 h-auto">
                <img class="w-full h-full" src="{{ asset('assets/img/logo-white.png') }}" alt="overlay">
            </div>
            <div class="-mt-4 text-center">
                <a href="{{ route('pages.reservasi') }}" class="capitalize bg-secondary hover:bg-secondary-dark px-12 py-4 text-white text-lg lg:text-xl">reservasi sekarang</a>
            </div>
        </div>
    </div>
</div>

<div id="tentang" class="mt-32 container-default scroll-mt-36">
    <div class="flex flex-col gap-8 text-center text-secondary">
        <span class="text-2xl lg:text-4xl font-bold text-amber-950">Sejak 2015</span>
        <span class="text-5xl lg:text-7xl">Ten years Still Grilling</span>
    </div>

    <div class="mt-16 text-justify md:text-center text-amber-950 px-0 lg:px-28">
        <p class="text-xl lg:text-2xl font-medium">
            Terajeh Coffee & Steak House adalah tempat di mana kopi spesial dan steak lezat
            berpadu sempurna dalam suasana hangat yang mengundang kamu untuk bersantai dan
            menikmati momen istimewa bersama keluarga maupun teman. Dengan bahan berkualitas
            dan cita rasa autentik, setiap sajian kami dirancang untuk memanjakan lidah
            sekaligus menciptakan pengalaman kuliner yang tak terlupakan.
        </p>
    </div>

    <div class="mt-20 w-full grid grid-cols-1 xl:grid-cols-3 gap-6">
        <div class="w-full h-[550px] hover:scale-105 transition duration-300 ease-in-out">
            <img class="w-full h-full object-cover" src="{{ asset('assets/img/about/1.jpg') }}" alt="image 1">
        </div>
        <div class="w-full h-[550px] hover:scale-105 transition duration-300 ease-in-out">
            <img class="w-full h-full object-cover" src="{{ asset('assets/img/about/2.jpg') }}" alt="image 2">
        </div>
        <div class="w-full h-[550px] hover:scale-105 transition duration-300 ease-in-out">
            <img class="w-full h-full object-cover" src="{{ asset('assets/img/about/3.jpg') }}" alt="image 3">
        </div>
    </div>
</div>

<div id="menu" class="mt-32 container-default scroll-mt-36">
    <div class="flex flex-col gap-8 text-center text-secondary">
        <span class="text-4xl lg:text-5xl">MENU KAMI</span>
    </div>

    <div class="mt-16 flex lg:flex-row flex-col gap-6 items-center justify-between text-secondary">
        @forelse ($categories as $category)
        <span data-tab="tab{{ $loop->iteration }}" class="tab-button text-xl lg:text-2xl font-bold">{{ $category->name }}</span>
        @empty
        <span class="text-2xl">Tidak ada kategori menu</span>
        @endforelse
    </div>

    <hr class="mt-8 border-t-2 border-secondary" />

    @forelse ($categories as $category)
    <div id="tab{{ $loop->iteration }}-content" class="tab-panel mt-20 w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 place-content-between gap-8">
        @forelse ($category->menus as $menu)
        <div class="w-full h-fit hover:scale-105 transition duration-300 ease-in-out cursor-pointer">
            <div class="w-full h-[228px]">
                <img class="w-full h-full object-cover" src="{{ $menu->foto() }}" alt="menu 1">
            </div>

            <div class="mt-4 text-2xl text-secondary">
                <p class="line-clamp-1">{{ $menu->nama }}</p>
                <p class="">Rp. {{ number_format($menu->harga, 0, ',', '.') }}</p>
            </div>
        </div>
        @empty
        <div class="mt-20 w-full text-center">
            <p class="text-xl text-gray-500">Tidak ada menu tersedia di kategori ini.</p>
        </div>
        @endforelse
    </div>
    @empty
    <div class="mt-20 w-full text-center">
        <p class="text-xl text-gray-500">Tidak ada menu tersedia.</p>
    </div>
    @endforelse
</div>

<div class="mt-32 container-default">
    <div class="flex flex-col gap-8 text-center text-secondary">
        <span class="text-3xl lg:text-5xl">TINGKAT KEMATANGAN STEAK</span>
    </div>

    <div class="mt-16 flex justify-center">
        <img src="{{ asset('assets/img/doneness.jpeg') }}" alt="Steak Doneness">
    </div>
</div>

<div class="mt-32 bg-secondary py-16">
    <div class="container-default">
        <div class="flex lg:flex-row flex-col items-center justify-center lg:justify-between gap-8">
            <div class="lg:flex-1">
                <span class="text-xl lg:text-3xl text-primary font-bold">Mau tempat nyaman dan makanan lezat? Reservasi sekarang, jangan tunggu lama!</span>
            </div>
            <div class="mt-6 lg:mt-0 w-full lg:w-auto">
                <a href="{{ route('pages.reservasi') }}" class="w-full text-primary text-lg lg:text-xl border hover:border-none border-primary px-8 lg:px-16 py-4">
                    Reservasi Sekarang
                </a>
            </div>
        </div>
    </div>
</div>

<div id="lokasi" class="mt-32 container-default scroll-mt-36">
    <div class="flex flex-col gap-8 text-center text-secondary">
        <span class="text-4xl lg:text-5xl">KONTAK DAN LOKASI</span>
    </div>

    <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-16 text-secondary">
        <div class="flex flex-col items-center gap-4">
            <div class="">
                <svg class="size-8 lg:size-12" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 23C22.6739 23 21.4021 22.4732 20.4645 21.5355C19.5268 20.5979 19 19.3261 19 18C19 16.6739 19.5268 15.4021 20.4645 14.4645C21.4021 13.5268 22.6739 13 24 13C25.3261 13 26.5979 13.5268 27.5355 14.4645C28.4732 15.4021 29 16.6739 29 18C29 18.6566 28.8707 19.3068 28.6194 19.9134C28.3681 20.52 27.9998 21.0712 27.5355 21.5355C27.0712 21.9998 26.52 22.3681 25.9134 22.6194C25.3068 22.8707 24.6566 23 24 23ZM24 4C20.287 4 16.726 5.475 14.1005 8.1005C11.475 10.726 10 14.287 10 18C10 28.5 24 44 24 44C24 44 38 28.5 38 18C38 14.287 36.525 10.726 33.8995 8.1005C31.274 5.475 27.713 4 24 4Z" fill="#202020" />
                </svg>
            </div>
            <span class="text-xl lg:text-2xl">Lokasi</span>
            <a href="https://maps.app.goo.gl/uo6gzt8Y6ifztzRU8" target="_blank" class="underline text-sm lg:text-base text-center">
                Jl. Merdeka No. 57,
                Lemahwungkuk, Kota Cirebon
            </a>
        </div>
        <div class="flex flex-col items-center gap-4">
            <div class="">
                <svg class="size-8 lg:size-12" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M34.5 0H13.5C11.025 0 9 2.025 9 4.5V43.5C9 45.975 11.025 48 13.5 48H34.5C36.975 48 39 45.975 39 43.5V4.5C39 2.025 36.975 0 34.5 0ZM18 2.25H30V3.75H18V2.25ZM24 45C23.2044 45 22.4413 44.6839 21.8787 44.1213C21.3161 43.5587 21 42.7957 21 42C21 41.2043 21.3161 40.4413 21.8787 39.8787C22.4413 39.3161 23.2044 39 24 39C24.7956 39 25.5587 39.3161 26.1213 39.8787C26.6839 40.4413 27 41.2043 27 42C27 42.7957 26.6839 43.5587 26.1213 44.1213C25.5587 44.6839 24.7956 45 24 45ZM36 36H12V6H36V36Z" fill="#202020" />
                </svg>
            </div>
            <span class="text-xl lg:text-2xl">WhatsApp</span>
            <a href="https://wa.me/6282114941212" target="_blank" class="underline text-sm lg:text-base text-center">
                0821 1494 1212
            </a>
        </div>
        <div class="flex flex-col items-center gap-4">
            <div class="">
                <svg class="size-8 lg:size-12" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M26.0571 4C28.3071 4.006 29.4491 4.018 30.4351 4.046L30.8231 4.06C31.2711 4.076 31.7131 4.096 32.2471 4.12C34.3751 4.22 35.8271 4.556 37.1011 5.05C38.4211 5.558 39.5331 6.246 40.6451 7.356C41.6625 8.35546 42.4495 9.56494 42.9511 10.9C43.4451 12.174 43.7811 13.626 43.8811 15.756C43.9051 16.288 43.9251 16.73 43.9411 17.18L43.9531 17.568C43.9831 18.552 43.9951 19.694 43.9991 21.944L44.0011 23.436V26.056C44.006 27.5148 43.9907 28.9736 43.9551 30.432L43.9431 30.82C43.9271 31.27 43.9071 31.712 43.8831 32.244C43.7831 34.374 43.4431 35.824 42.9511 37.1C42.4495 38.4351 41.6625 39.6445 40.6451 40.644C39.6457 41.6614 38.4362 42.4484 37.1011 42.95C35.8271 43.444 34.3751 43.78 32.2471 43.88L30.8231 43.94L30.4351 43.952C29.4491 43.98 28.3071 43.994 26.0571 43.998L24.5651 44H21.9471C20.4877 44.0051 19.0282 43.9898 17.5691 43.954L17.1811 43.942C16.7064 43.924 16.2317 43.9034 15.7571 43.88C13.6291 43.78 12.1771 43.444 10.9011 42.95C9.5668 42.4481 8.35802 41.6611 7.35914 40.644C6.34103 39.6447 5.55336 38.4352 5.05114 37.1C4.55714 35.826 4.22114 34.374 4.12114 32.244L4.06114 30.82L4.05114 30.432C4.01427 28.9736 3.9976 27.5148 4.00114 26.056V21.944C3.9956 20.4852 4.01027 19.0264 4.04514 17.568L4.05914 17.18C4.07514 16.73 4.09514 16.288 4.11914 15.756C4.21914 13.626 4.55514 12.176 5.04914 10.9C5.55253 9.5644 6.34158 8.35487 7.36114 7.356C8.35944 6.3391 9.56751 5.55215 10.9011 5.05C12.1771 4.556 13.6271 4.22 15.7571 4.12C16.2891 4.096 16.7331 4.076 17.1811 4.06L17.5691 4.048C19.0275 4.01247 20.4863 3.99713 21.9451 4.002L26.0571 4ZM24.0011 14C21.349 14 18.8054 15.0536 16.9301 16.9289C15.0547 18.8043 14.0011 21.3478 14.0011 24C14.0011 26.6522 15.0547 29.1957 16.9301 31.0711C18.8054 32.9464 21.349 34 24.0011 34C26.6533 34 29.1968 32.9464 31.0722 31.0711C32.9476 29.1957 34.0011 26.6522 34.0011 24C34.0011 21.3478 32.9476 18.8043 31.0722 16.9289C29.1968 15.0536 26.6533 14 24.0011 14ZM24.0011 18C24.7891 17.9999 25.5693 18.1549 26.2973 18.4563C27.0253 18.7577 27.6868 19.1996 28.2441 19.7567C28.8013 20.3137 29.2434 20.9751 29.545 21.703C29.8467 22.4309 30.002 23.2111 30.0021 23.999C30.0023 24.7869 29.8472 25.5672 29.5458 26.2952C29.2444 27.0232 28.8025 27.6847 28.2455 28.2419C27.6884 28.7992 27.0271 29.2412 26.2992 29.5429C25.5713 29.8445 24.7911 29.9999 24.0031 30C22.4118 30 20.8857 29.3679 19.7605 28.2426C18.6353 27.1174 18.0031 25.5913 18.0031 24C18.0031 22.4087 18.6353 20.8826 19.7605 19.7574C20.8857 18.6321 22.4118 18 24.0031 18M34.5031 11C33.8401 11 33.2042 11.2634 32.7354 11.7322C32.2665 12.2011 32.0031 12.837 32.0031 13.5C32.0031 14.163 32.2665 14.7989 32.7354 15.2678C33.2042 15.7366 33.8401 16 34.5031 16C35.1662 16 35.8021 15.7366 36.2709 15.2678C36.7397 14.7989 37.0031 14.163 37.0031 13.5C37.0031 12.837 36.7397 12.2011 36.2709 11.7322C35.8021 11.2634 35.1662 11 34.5031 11Z" fill="#202020" />
                </svg>
            </div>
            <span class="text-xl lg:text-2xl">Instagram</span>
            <a href="https://www.instagram.com/terajeh_coffee" target="_blank" class="underline text-sm lg:text-base text-center">
                @terajeh_coffee
            </a>
        </div>
        <div class="flex flex-col items-center gap-4">
            <div class="">
                <svg class="size-8 lg:size-12" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M40 8H8C5.8 8 4.02 9.8 4.02 12L4 36C4 38.2 5.8 40 8 40H40C42.2 40 44 38.2 44 36V12C44 9.8 42.2 8 40 8ZM40 16L24 26L8 16V12L24 22L40 12V16Z" fill="#202020" />
                </svg>
            </div>
            <span class="text-xl lg:text-2xl">Email</span>
            <a href="mailto:terajeh_coffee@gmail.com" target="_blank" class="underline text-sm lg:text-base text-center">
                terajeh_coffee@gmail.com
            </a>
        </div>
    </div>

    <div class="mt-16 w-full h-96">
        <iframe class="w-full h-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.5786742410937!2d108.57133640000072!3d-6.723549400004717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee2809414bafd%3A0x534feda7aa067f30!2sTerajeh%20Coffee%20and%20steak%20house!5e0!3m2!1sen!2sid!4v1753899408908!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

<div class="mt-32 container-default">
    <div class="flex flex-col gap-8 text-center text-secondary">
        <span class="text-4xl lg:text-5xl">JAM OPERASIONAL</span>
    </div>

    <div class="mt-16 w-fit mx-auto space-y-16 lg:space-y-8">
        <div class="flex lg:flex-row flex-col items-center justify-start gap-0 lg:gap-28">
            <span class="text-2xl lg:text-4xl">11.00 - 21.00</span>
            <span class="text-2xl lg:text-4xl">Minggu - Jumat</span>
        </div>
        <div class="flex lg:flex-row flex-col items-center justify-start gap-0 lg:gap-28">
            <span class="text-2xl lg:text-4xl">11.00 - 22.00</span>
            <span class="text-2xl lg:text-4xl">Sabtu</span>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const images = document.querySelectorAll('.hero-image');

        let currentIndex = 0;
        let interval = 3000;
        let slideInterval;

        function nextSlide() {
            images[currentIndex].classList.remove('opacity-100');

            currentIndex = (currentIndex + 1) % images.length;

            images[currentIndex].classList.add('opacity-100');
        }

        function startSlideShow() {
            slideInterval = setInterval(nextSlide, interval);
        }

        startSlideShow();
    });

</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tab functionality
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabPanels = document.querySelectorAll('.tab-panel');

        // Function to activate a tab
        const activateTab = (tabId) => {
            // Deactivate all tab buttons and hide all panels
            tabButtons.forEach(button => {
                button.classList.remove('text-secondary');
                button.classList.add('text-secondary/50');
            });

            tabPanels.forEach(panel => {
                panel.classList.add('hidden');
            });

            // Activate the selected tab button and show its panel
            const selectedButton = document.querySelector(`.tab-button[data-tab="${tabId}"]`);
            const selectedPanel = document.getElementById(`${tabId}-content`);

            if (selectedButton && selectedPanel) {
                selectedButton.classList.add('text-secondary');
                selectedButton.classList.remove('text-secondary/50');
                selectedPanel.classList.remove('hidden');
            }
        };

        // Add click event listeners to tab buttons
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const tabId = button.dataset.tab;
                activateTab(tabId);
            });
        });

        // Activate the first tab by default on page load
        if (tabButtons.length > 0) {
            activateTab(tabButtons[0].dataset.tab);
        }
    });

</script>
@endpush

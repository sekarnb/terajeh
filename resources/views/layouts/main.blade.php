<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Terajeh - {{ $title }}</title>

    @vite('resources/css/app.css')
</head>
<body class="font-serif antialiased">
    <div class="fixed top-0 left-0 w-full z-50 bg-secondary text-primary">
        <header class="flex items-center justify-between container-default text-xl">
            <a href="{{ route('pages.index') }}" class="-m-4 w-44 md:w-32 h-auto">
                <img class="w-full h-full" src="{{ asset('assets/img/logo-white.png') }}" alt="Terajeh Logo">
            </a>

            <a href="{{ route('pages.index') }}#hero" class="hidden lg:block hover:underline">Beranda</a>
            <a href="{{ route('pages.index') }}#tentang" class="hidden lg:block hover:underline">Tentang</a>
            <a href="{{ route('pages.index') }}#menu" class="hidden lg:block hover:underline">Menu</a>
            <a href="{{ route('pages.index') }}#lokasi" class="hidden lg:block hover:underline">Lokasi</a>
            <a href="{{ route('pages.reservasi') }}" class="hidden lg:block px-8 py-4 border border-primary hover:border-none">Reservasi</a>

            <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="block lg:hidden border border-primary p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                </svg>
            </button>

            <div id="mobile-menu" class="hidden lg:hidden absolute top-32 right-0 bg-secondary w-full shadow-2xl">
                <div class="flex flex-col items-center gap-10 p-8">
                    <a href="{{ route('pages.index') }}#hero" onclick="document.getElementById('mobile-menu').classList.add('hidden')" class="text-2xl hover:underline">Beranda</a>
                    <a href="{{ route('pages.index') }}#tentang" onclick="document.getElementById('mobile-menu').classList.add('hidden')" class="text-2xl hover:underline">Tentang</a>
                    <a href="{{ route('pages.index') }}#menu" onclick="document.getElementById('mobile-menu').classList.add('hidden')" class="text-2xl hover:underline">Menu</a>
                    <a href="{{ route('pages.index') }}#lokasi" onclick="document.getElementById('mobile-menu').classList.add('hidden')" class="text-2xl hover:underline">Lokasi</a>
                    <a href="{{ route('pages.reservasi') }}" onclick="document.getElementById('mobile-menu').classList.add('hidden')" class="mt-4 text-2xl px-8 py-4 border border-primary hover:border-none">Reservasi</a>
                </div>
            </div>
        </header>
    </div>

    <main class="mt-24 pb-36 lg:mt-24 lg:pb-32 bg-primary">
        @yield('content')
    </main>

    <div class="bg-secondary text-primary">
        <footer class="container-default flex lg:flex-row flex-col gap-8 items-center justify-between py-24 lg:py-20">
            <div class="flex flex-col gap-14">
                <div class="flex flex-col gap-4">
                    <span>Jl. Merdeka No. 57, Lemahwungkuk, Kota Cirebon</span>
                    <span>0821 1494 1212</span>
                </div>
                <span class="text-3xl lg:text-4xl xl:text-5xl">#SteaknyaRasaIndonesia</span>
            </div>

            <div class="mt-16 lg:mt-0 flex lg:flex-row flex-col items-start lg:items-center justify-between gap-0 md:gap-8 lg:gap-32">
                <div class="flex flex-col items-start gap-8 lg:gap-4">
                    <a href="{{ route('pages.index') }}" class="text-xl hover:underline">Beranda</a>
                    <a href="#tentang" class="text-xl hover:underline">Tentang</a>
                    <a href="#menu" class="text-xl hover:underline">Menu</a>
                    <a href="#lokasi" class="text-xl hover:underline">Lokasi</a>
                </div>
                <div class="flex lg:flex-row flex-col items-center gap-4">
                    <img class="xl:w-44" src="{{ asset('assets/img/logo-white.png') }}" alt="">
                    <img class="xl:w-28" src="{{ asset('assets/img/logo-halal.png') }}" alt="">
                </div>
            </div>
        </footer>
    </div>

    @stack('scripts')
</body>
</html>

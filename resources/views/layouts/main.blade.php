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
        <header class="flex items-center justify-between max-w-6xl mx-auto text-xl">
            <a href="{{ route('pages.index') }}" class="-my-4 w-32 h-auto">
                <img class="w-full h-full" src="{{ asset('assets/img/logo-white.png') }}" alt="Terajeh Logo">
            </a>

            <a href="{{ route('pages.index') }}#hero" class="hover:underline">Beranda</a>
            <a href="#tentang" class="hover:underline">Tentang</a>
            <a href="#menu" class="hover:underline">Menu</a>
            <a href="#lokasi" class="hover:underline">Lokasi</a>
            <a href="{{ route('pages.reservasi') }}" class="px-8 py-4 border border-primary hover:border-none">Reservasi</a>
        </header>
    </div>

    <main class="mt-24 pb-32 bg-primary">
        @yield('content')
    </main>

    <div class="bg-secondary text-primary">
        <footer class="mx-auto flex items-center justify-between max-w-6xl py-36">
            <div class="flex flex-col gap-16">
                <div class="flex flex-col gap-4">
                    <span>Jl. Merdeka No. 57, Lemahwungkuk, Kota Cirebon</span>
                    <span>0821 1494 1212</span>
                </div>
                <span class="text-5xl">#SteaknyaRasaIndonesia</span>
            </div>

            <div class="flex items-center justify-between gap-32">
                <div class="flex flex-col gap-4">
                    <a href="{{ route('pages.index') }}" class="text-xl hover:underline">Beranda</a>
                    <a href="#tentang" class="text-xl hover:underline">Tentang</a>
                    <a href="#menu" class="text-xl hover:underline">Menu</a>
                    <a href="#lokasi" class="text-xl hover:underline">Lokasi</a>
                </div>
                <div class="flex items-center gap-4">
                    <img src="{{ asset('assets/img/logo-white.png') }}" alt="">
                    <img src="{{ asset('assets/img/logo-halal.png') }}" alt="">
                </div>
            </div>
        </footer>
    </div>

    @stack('scripts')
</body>
</html>

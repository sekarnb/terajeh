<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Terajeh - {{ $title }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">

    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased">
    <div class="wrapper">
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="main-content !ml-72">
            <div class="bg-[#FAF9F7] text-white p-6 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-[500px] border-l border-y border-gray-500 bg-white rounded-s-lg p-3">
                        <input type="search" name="search" class="w-full border-none outline-none text-sm text-gray-500 bg-transparent" placeholder="Search here">
                    </div>
                    <button class="bg-white text-gray-500 border-r border-y border-gray-500 hover:bg-gray-100 transition-colors rounded-e-lg px-4 py-3 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </div>

                <div class="header-icons">
                    <div class="user-info">
                        <div class="greeting">
                            Hello, <span class="name">{{ auth()->user()->username }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-1 p-6">
                @if (session('success'))
                    <div class="w-full bg-green-100 text-green-800 p-4 rounded-lg mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="w-full bg-red-100 text-red-800 p-4 rounded-lg mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="flex items-center justify-between">
                    <h2 class="text-4xl capitalize">{{ $title }}</h2>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('dashboard') }}" class="text-secondary/50">dashboard</a>
                        @isset($breadcrumb) / <span class="lowercase text-secondary/50">{{ $breadcrumb ?? '' }}</span> @endisset
                        /
                        <span class="lowercase">{{ $title }}</span>
                    </div>
                </div>

                @yield('content')
            </div>
        </div>
    </div>


    @stack('scripts')
</body>
</html>

<!-- Sidebar -->
<div class="sidebar !w-72 !px-0">
    <div class="flex justify-center">
        <img class="-mt-12 w-56 h-auto" src="{{ asset('assets/img/terajeh.png') }}" alt="Logo" />
    </div>

    <div class="w-full flex flex-col gap-4 items-center text-secondary">
        <a href="{{ route('dashboard') }}" class="w-full flex items-center gap-8 {{ request()->routeIs('dashboard') ? 'bg-secondary text-primary' : '' }} hover:bg-secondary hover:text-primary transition-colors px-4 py-3">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
            </div>
            <div class="mt-0.5">
                <span>Dashboard</span>
            </div>
        </a>
    </div>

    <div class="px-4 text-black/25 mt-8 mb-2">Menu Admin</div>

    <div class="w-full flex flex-col gap-4 items-center text-secondary">
        <a href="{{ route('categories.index') }}" class="w-full flex items-center gap-8 {{ request()->routeIs('kategori.*') ? 'bg-secondary text-primary' : '' }} hover:bg-secondary hover:text-primary transition-colors px-4 py-3">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                </svg>
            </div>
            <div class="mt-0.5">
                <span>Daftar Kategori</span>
            </div>
        </a>
        <a href="{{ route('menu.index') }}" class="w-full flex items-center gap-8 {{ request()->routeIs('menu.*') ? 'bg-secondary text-primary' : '' }} hover:bg-secondary hover:text-primary transition-colors px-4 py-3">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 1024 1024" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path fill="currentColor" d="M256 410.56V96a32 32 0 0 1 64 0v314.56A96 96 0 0 0 384 320V96a32 32 0 0 1 64 0v224a160 160 0 0 1-128 156.8V928a32 32 0 1 1-64 0V476.8A160 160 0 0 1 128 320V96a32 32 0 0 1 64 0v224a96 96 0 0 0 64 90.56zm384-250.24V544h126.72c-3.328-78.72-12.928-147.968-28.608-207.744c-14.336-54.528-46.848-113.344-98.112-175.872zM640 608v320a32 32 0 1 1-64 0V64h64c85.312 89.472 138.688 174.848 160 256c21.312 81.152 32 177.152 32 288H640z" />
                </svg>
            </div>
            <div class="mt-0.5">
                <span>Daftar Menu</span>
            </div>
        </a>
        <a href="{{ route('reservasi.index') }}" class="w-full flex items-center gap-8 {{ request()->routeIs('reservasi.*') ? 'bg-secondary text-primary' : '' }} hover:bg-secondary hover:text-primary transition-colors px-4 py-3">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                </svg>
            </div>
            <div class="mt-0.5">
                <span>Daftar Reservasi</span>
            </div>
        </a>
    </div>

    <!-- Logout menu -->
    <div style="margin-top: auto;">
        <form id="logout-form" action="{{ route('logout') }}" method="post">
            @csrf

            <button type="submit" class="cursor-pointer w-full flex items-center gap-8 hover:bg-secondary hover:text-primary transition-colors px-4 py-3">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                    </svg>
                </div>
                <span class="mt-0.5">Logout</span>
            </button>
        </form>
    </div>
</div>

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
            <div class="w-96 h-auto">
                <img class="w-full h-full" src="{{ asset('assets/img/terajeh.png') }}" alt="overlay">
            </div>
            <div class="-mt-4 text-center">
                <a href="{{ route('pages.reservasi') }}" class="capitalize bg-secondary px-12 py-4 text-white text-xl">reservasi sekarang</a>
            </div>
        </div>
    </div>
</div>

<div id="tentang" class="mt-32 max-w-6xl mx-auto scroll-mt-36">
    <div class="flex flex-col gap-8 text-center text-secondary">
        <span class="text-4xl font-bold text-amber-950">Sejak 2015</span>
        <span class="text-7xl">Ten years Still Grilling</span>
    </div>

    <div class="mt-16 text-center text-amber-950 px-28">
        <p class="text-2xl font-medium">
            Terajeh Coffee & Steak House adalah tempat di mana kopi spesial dan steak lezat
            berpadu sempurna dalam suasana hangat yang mengundang kamu untuk bersantai dan
            menikmati momen istimewa bersama keluarga maupun teman. Dengan bahan berkualitas
            dan cita rasa autentik, setiap sajian kami dirancang untuk memanjakan lidah
            sekaligus menciptakan pengalaman kuliner yang tak terlupakan.
        </p>
    </div>

    <div class="mt-20 w-full grid grid-cols-3 gap-6">
        <div class="w-full h-[550px]">
            <img class="w-full h-full object-cover" src="{{ asset('assets/img/about/1.jpg') }}" alt="image 1">
        </div>
        <div class="w-full h-[550px]">
            <img class="w-full h-full object-cover" src="{{ asset('assets/img/about/2.jpg') }}" alt="image 2">
        </div>
        <div class="w-full h-[550px]">
            <img class="w-full h-full object-cover" src="{{ asset('assets/img/about/3.jpg') }}" alt="image 3">
        </div>
    </div>
</div>

<div id="menu" class="mt-32 max-w-6xl mx-auto scroll-mt-36">
    <div class="flex flex-col gap-8 text-center text-secondary">
        <span class="text-5xl">MENU KAMI</span>
    </div>

    <div class="mt-16 flex items-center justify-between text-secondary">
        @forelse ($categories as $category)
        <span data-tab="tab{{ $loop->iteration }}" class="tab-button text-2xl font-bold">{{ $category->name }}</span>
        @empty
        <span class="text-2xl">Tidak ada kategori menu</span>
        @endforelse
    </div>

    <hr class="mt-8 border-t-2 border-secondary" />

    @forelse ($categories as $category)
    <div id="tab{{ $loop->iteration }}-content" class="tab-panel mt-20 w-full grid grid-cols-4 place-content-between gap-8">
        @forelse ($category->menus as $menu)
        <div class="w-full h-fit" onclick="openOrderModal('item{{ $loop->iteration }}', {
                menuId: '{{ $menu->id }}',
                image: '{{ $menu->foto() }}',
                title: '{{ $menu->name }}',
                price: 'Rp. {{ number_format($menu->harga, 0, ',', '.') }}',
                description: '{{ $menu->deskripsi }}'
            })">
            <div class="w-full h-[228px]">
                <img class="w-full h-full object-cover" src="{{ $menu->foto() }}" alt="menu 1">
            </div>

            <div class="mt-4 text-2xl text-secondary">
                <p class="line-clamp-1">{{ $menu->name }}</p>
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

<div class="mt-32 max-w-6xl mx-auto">
    <div class="flex flex-col gap-8 text-center text-secondary">
        <span class="text-5xl">TINGKAT KEMATANGAN STEAK</span>
    </div>

    <div class="mt-16 flex justify-center">
        <img src="{{ asset('assets/img/doneness.jpeg') }}" alt="Steak Doneness">
    </div>
</div>

<div id="lokasi" class="mt-32 max-w-6xl mx-auto scroll-mt-36">
    <div class="flex flex-col gap-8 text-center text-secondary">
        <span class="text-5xl">KONTAK DAN LOKASI</span>
    </div>

    <div class="mt-16 flex items-start justify-between gap-14 text-secondary">
        <div class="flex flex-col items-center gap-4">
            <span class="text-2xl">Lokasi</span>
            <a href="https://maps.app.goo.gl/uo6gzt8Y6ifztzRU8" target="_blank" class="underline text-xl text-center">
                Jl. Merdeka No. 57,
                Lemahwungkuk, Kota Cirebon
            </a>
        </div>
        <div class="flex flex-col items-center gap-4">
            <span class="text-2xl">WhatsApp</span>
            <a href="https://wa.me/6282114941212" target="_blank" class="underline text-xl text-center">
                0821 1494 1212
            </a>
        </div>
        <div class="flex flex-col items-center gap-4">
            <span class="text-2xl">Instagram</span>
            <a href="https://www.instagram.com/terajeh_coffee" target="_blank" class="underline text-xl text-center">
                @terajeh_coffee
            </a>
        </div>
        <div class="flex flex-col items-center gap-4">
            <span class="text-2xl">Email</span>
            <a href="mailto:terajeh_coffee@gmail.com" target="_blank" class="underline text-xl text-center">
                terajeh_coffee@gmail.com
            </a>
        </div>
    </div>

    <div class="mt-16 w-full h-96">
        <iframe class="w-full h-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.5786742410937!2d108.57133640000072!3d-6.723549400004717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee2809414bafd%3A0x534feda7aa067f30!2sTerajeh%20Coffee%20and%20steak%20house!5e0!3m2!1sen!2sid!4v1753899408908!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

<div class="mt-32 max-w-6xl mx-auto">
    <div class="flex flex-col gap-8 text-center text-secondary">
        <span class="text-5xl">JAM OPERASIONAL</span>
    </div>

    <div class="mt-16 w-fit mx-auto space-y-8">
        <div class="flex items-center justify-between gap-28">
            <span class="text-4xl">11.00 - 21.00</span>
            <span class="text-4xl">Minggu - Jumat</span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-4xl">11.00 - 22.00</span>
            <span class="text-4xl">Sabtu</span>
        </div>
    </div>
</div>

{{-- modal add menu --}}
<div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden" id="modal-container">
    <!-- Modal content will be inserted here dynamically -->
</div>

<!-- Template for order modal -->
<template id="order-modal-template">
    <div class="flex items-start gap-4">
        <div class="bg-primary rounded-lg max-w-sm w-80">
            <div class="w-full h-64">
                <img class="w-full h-full object-cover" src="" alt="" id="modal-image">
            </div>

            <div class="px-6 py-4 flex flex-col gap-6 text-amber-950">
                <p class="text-2xl font-bold" id="modal-title"></p>
                <p class="text-xl" id="modal-price"></p>
                <p class="text-sm" id="modal-description"></p>
            </div>

            <div class="mt-6 px-6 py-4 flex items-center justify-evenly gap-4">
                <div class="flex items-center justify-between gap-4">
                    <span class="decrease-btn cursor-pointer px-2 py-1 border border-secondary">-</span>
                    <span class="quantity text-xl">1</span>
                    <span class="increase-btn cursor-pointer px-2 py-1 border border-secondary">+</span>
                </div>
                <div>
                    <button class="add-to-cart-btn cursor-pointer bg-secondary text-white px-8 py-2 rounded-lg hover:bg-secondary/80 transition-colors">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>

        <div class="close-modal-btn cursor-pointer p-1 bg-primary rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </div>
    </div>
</template>

<!-- Cart display (optional) -->
<div id="cart-summary" class="fixed bottom-4 right-4 bg-white p-4 rounded-lg shadow-lg hidden">
    <h3 class="font-bold mb-2">Your Cart</h3>
    <div id="cart-items"></div>
    <div class="mt-3 font-bold" id="cart-total">Total: Rp. 0</div>
    <button id="checkout-btn" class="mt-3 w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">
        Checkout
    </button>
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
    // JavaScript for dynamic modal handling
    document.addEventListener('DOMContentLoaded', function() {
        const modalContainer = document.getElementById('modal-container');
        const modalTemplate = document.getElementById('order-modal-template');

        // Store quantity for each item
        const itemQuantities = {};

        // Function to open modal for a specific item
        window.openOrderModal = function(itemId, itemData) {
            // Clone the template
            const modalContent = modalTemplate.content.cloneNode(true);

            // Populate with item data
            modalContent.getElementById('modal-image').src = itemData.image;
            modalContent.getElementById('modal-title').textContent = itemData.title;
            modalContent.getElementById('modal-price').textContent = itemData.price;
            modalContent.getElementById('modal-description').textContent = itemData.description;

            // Initialize quantity if not exists
            if (!itemQuantities[itemId]) {
                itemQuantities[itemId] = 0;
            }

            // Set initial quantity
            const quantityElement = modalContent.querySelector('.quantity');
            quantityElement.textContent = itemQuantities[itemId];

            // Add event listeners
            modalContent.querySelector('.increase-btn').addEventListener('click', () => {
                itemQuantities[itemId]++;
                quantityElement.textContent = itemQuantities[itemId];
            });

            modalContent.querySelector('.decrease-btn').addEventListener('click', () => {
                if (itemQuantities[itemId] > 0) {
                    itemQuantities[itemId]--;
                    quantityElement.textContent = itemQuantities[itemId];
                }
            });

            modalContent.querySelector('.add-to-cart-btn').addEventListener('click', () => {
                // Add to cart logic here
                console.log(`Added ${itemQuantities[itemId]} of ${itemData.title} to cart`);
                // You might want to reset quantity after adding to cart
                // itemQuantities[itemId] = 0;
                modalContainer.classList.add('hidden');
            });

            modalContent.querySelector('.close-modal-btn').addEventListener('click', () => {
                modalContainer.classList.add('hidden');
            });

            // Clear previous content and add new
            modalContainer.innerHTML = '';
            modalContainer.appendChild(modalContent);

            // Show modal
            modalContainer.classList.remove('hidden');
        };

        // Close modal when clicking outside
        modalContainer.addEventListener('click', (e) => {
            if (e.target === modalContainer) {
                modalContainer.classList.add('hidden');
            }
        });
    });

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

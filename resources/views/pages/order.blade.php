@extends('layouts.main', ['title' => 'Reservasi'])

@section('content')
<div class="mt-32 lg:mt-0 flex flex-col items-center justify-center text-primary bg-secondary">
    <h1 class="text-4xl lg:text-6xl leading-loose tracking-wider py-6">Reservasi</h1>

    <div class="w-full py-8 border-t-2 border-white">
        <div class="flex lg:flex-row flex-col items-center justify-center gap-4 text-primary">
            <span class="text-xl">{{ $nama }}</span>
            <span>
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.625 14.25C13.2217 14.25 13.794 14.0129 14.216 13.591C14.6379 13.169 14.875 12.5967 14.875 12C14.875 11.4033 14.6379 10.831 14.216 10.409C13.794 9.98705 13.2217 9.75 12.625 9.75C12.0283 9.75 11.456 9.98705 11.034 10.409C10.6121 10.831 10.375 11.4033 10.375 12C10.375 12.5967 10.6121 13.169 11.034 13.591C11.456 14.0129 12.0283 14.25 12.625 14.25Z" fill="white" />
                </svg>
            </span>
            <span class="text-xl">{{ $no_hp }}</span>
            <span>
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.625 14.25C13.2217 14.25 13.794 14.0129 14.216 13.591C14.6379 13.169 14.875 12.5967 14.875 12C14.875 11.4033 14.6379 10.831 14.216 10.409C13.794 9.98705 13.2217 9.75 12.625 9.75C12.0283 9.75 11.456 9.98705 11.034 10.409C10.6121 10.831 10.375 11.4033 10.375 12C10.375 12.5967 10.6121 13.169 11.034 13.591C11.456 14.0129 12.0283 14.25 12.625 14.25Z" fill="white" />
                </svg>
            </span>
            <span class="text-xl">{{ $jumlah_tamu }} Orang</span>
            <span>
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.625 14.25C13.2217 14.25 13.794 14.0129 14.216 13.591C14.6379 13.169 14.875 12.5967 14.875 12C14.875 11.4033 14.6379 10.831 14.216 10.409C13.794 9.98705 13.2217 9.75 12.625 9.75C12.0283 9.75 11.456 9.98705 11.034 10.409C10.6121 10.831 10.375 11.4033 10.375 12C10.375 12.5967 10.6121 13.169 11.034 13.591C11.456 14.0129 12.0283 14.25 12.625 14.25Z" fill="white" />
                </svg>
            </span>
            <span class="text-xl">{{ \Carbon\Carbon::parse($jam)->format('H:i') }}</span>
            <span>
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.625 14.25C13.2217 14.25 13.794 14.0129 14.216 13.591C14.6379 13.169 14.875 12.5967 14.875 12C14.875 11.4033 14.6379 10.831 14.216 10.409C13.794 9.98705 13.2217 9.75 12.625 9.75C12.0283 9.75 11.456 9.98705 11.034 10.409C10.6121 10.831 10.375 11.4033 10.375 12C10.375 12.5967 10.6121 13.169 11.034 13.591C11.456 14.0129 12.0283 14.25 12.625 14.25Z" fill="white" />
                </svg>
            </span>
            <span class="text-xl">{{ \Carbon\Carbon::parse($tanggal)->format('d F Y') }}</span>
        </div>
    </div>
</div>

<div class="mt-8 container-default flex justify-center lg:flex-none">
    <a href="{{ url()->previous() }}" class="border border-secondary px-16 py-2">Kembali</a>
</div>

<div class="mt-32 container-default">
    <div class="flex flex-col items-center gap-6 text-center lg:text-left">
        <span class="text-amber-950 text-2xl lg:text-4xl font-bold">Silahkan pilih menu pesanan Anda</span>
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
        <div class="w-full h-fit hover:scale-105 transition duration-300 ease-in-out cursor-pointer" onclick="openOrderModal('item{{ $menu->id }}', {
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

<button id="cart-items-checkout" type="button" class="mt-32 -mb-36 lg:-mb-32 bg-green-700 hover:bg-green-600 transition-colors w-full px-16 py-6 text-white flex justify-between items-center">
    <span class="text-3xl">
        Checkout (<span id="cart-items-count">0</span>)
    </span>
    <span class="text-3xl">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
    </span>
</button>

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

            <div class="px-6 py-4">
                <label for="notes" class="text-sm">Catatan</label>
                <textarea id="notes" name="notes" class="w-full h-24 border border-secondary p-2 text-sm" placeholder="Tambahkan catatan khusus untuk pesanan ini..."></textarea>
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
@endsection

@push('scripts')
<script>
    // JavaScript for dynamic modal handling
    document.addEventListener('DOMContentLoaded', function() {
        const modalContainer = document.getElementById('modal-container');
        const modalTemplate = document.getElementById('order-modal-template');

        // Store quantity for each item
        const itemQuantities = {};
        const cartItems = {};

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
                itemQuantities[itemId] = 1;
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
                console.log(`Added ${itemQuantities[itemId]} of ${itemData.title} to cart`);

                // Add item to cart, if quantity is greater than 0, and if the user select another item, append it to the cart
                if (itemQuantities[itemId] > 0) {
                    cartItems[itemId] = {
                        menuId: itemData.menuId,
                        name: itemData.title,
                        price: parseInt(itemData.price.replace(/[^0-9]/g, '')),
                        quantity: itemQuantities[itemId],
                        notes: document.getElementById('notes').value,
                        total: parseInt(itemData.price.replace(/[^0-9]/g, '')) * itemQuantities[itemId]
                    };
                } else {
                    delete cartItems[itemId]; // Remove item if quantity is 0
                }

                // Update cart items count
                const cartItemsCount = Object.values(cartItems).reduce((total, item) => total + item.quantity, 0);
                document.getElementById('cart-items-count').textContent = cartItemsCount;

                // reset quantity after adding to cart
                itemQuantities[itemId] = 0;

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

            document.getElementById('cart-items-checkout').addEventListener('click', (e) => {
                e.preventDefault();

                // get current url query parameters
                const queryParams = new URLSearchParams(window.location.search);

                // add cart items to query parameters and append the data if the user select more than one item
                Object.keys(cartItems).forEach(itemId => {
                    const item = cartItems[itemId];
                    queryParams.append(`cart[${itemId}][id]`, item.menuId);
                    queryParams.append(`cart[${itemId}][quantity]`, item.quantity);
                    queryParams.append(`cart[${itemId}][name]`, item.name);
                    queryParams.append(`cart[${itemId}][price]`, item.price);
                    queryParams.append(`cart[${itemId}][notes]`, item.notes);
                    queryParams.append(`cart[${itemId}][total]`, item.total);
                });

                window.location.href = "{{ route('pages.checkout') }}?" + queryParams.toString();
            });
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

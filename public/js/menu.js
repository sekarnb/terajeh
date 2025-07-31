// JavaScript for dynamic modal handling
document.addEventListener('DOMContentLoaded', function () {
    const modalContainer = document.getElementById('modal-container');
    const modalTemplate = document.getElementById('order-modal-template');

    // Store quantity for each item
    const itemQuantities = {};

    // Function to open modal for a specific item
    window.openOrderModal = function (itemId, itemData) {
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

document.addEventListener('DOMContentLoaded', function () {
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

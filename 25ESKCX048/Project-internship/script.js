/**
 * CANTEEN STORE - Pure Veg & Party Booking System
 * Owner: Raju Sharma | Contact: +91 98765 43210
 */

// Food Menu Data
const FOOD_MENU = [
    // Breakfast Items
    { id: 1, name: "Special Poha & Chai", price: 45, category: "breakfast", rating: 4.8, prepTime: "5 mins", image: "https://images.unsplash.com/photo-1626777552726-4a6b54c97e46?w=400&auto=format&fit=crop&q=80" },
    { id: 2, name: "Crispy Samosa (2pcs)", price: 30, category: "breakfast", rating: 4.7, prepTime: "3 mins", image: "https://images.unsplash.com/photo-1601050690597-df0568f70950?w=400&auto=format&fit=crop&q=80" },
    { id: 3, name: "Aloo Paratha with Butter", price: 60, category: "breakfast", rating: 4.9, prepTime: "8 mins", image: "https://images.unsplash.com/photo-1626074353765-517a681e40be?w=400&auto=format&fit=crop&q=80" },
    { id: 4, name: "South Indian Masala Dosa", price: 95, category: "breakfast", rating: 4.8, prepTime: "10 mins", image: "https://images.unsplash.com/photo-1589301760014-d929f3979dbc?w=400&auto=format&fit=crop&q=80" },

    // Lunch Items
    { id: 5, name: "Deluxe Pure Veg Thali", price: 140, category: "lunch", rating: 4.9, prepTime: "12 mins", image: "https://images.unsplash.com/photo-1546833999-b9f581a1996d?w=400&auto=format&fit=crop&q=80" },
    { id: 6, name: "Cheese Paneer Burger", price: 80, category: "lunch", rating: 4.6, prepTime: "10 mins", image: "https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=400&auto=format&fit=crop&q=80" },
    { id: 7, name: "Veg Hakka Noodles", price: 110, category: "lunch", rating: 4.6, prepTime: "10 mins", image: "https://images.unsplash.com/photo-1585032226651-759b368d7246?w=400&auto=format&fit=crop&q=80" },

    // Dinner Items
    { id: 8, name: "Special Paneer Butter Masala", price: 160, category: "dinner", rating: 4.8, prepTime: "15 mins", image: "https://images.unsplash.com/photo-1631452180519-c014fe946bc7?w=400&auto=format&fit=crop&q=80" },
    { id: 9, name: "Farmhouse Cheese Pizza", price: 210, category: "dinner", rating: 4.7, prepTime: "18 mins", image: "https://images.unsplash.com/photo-1513104890138-7c749659a591?w=400&auto=format&fit=crop&q=80" },
    { id: 10, name: "Royal Gulab Jamun (2pcs)", price: 50, category: "dinner", rating: 4.9, prepTime: "2 mins", image: "https://tse3.mm.bing.net/th/id/OIP.mhu92ax6fCrVeq9DitktqwHaGX?r=0&rs=1&pid=ImgDetMain&o=7&rm=3" }
];

// 5 PARTY & ROOM PACKAGES (Lowest to Highest Luxury Price)
const PARTY_PACKAGES = [
    {
        id: "pkg-1",
        title: "1. Eco Celebration Package",
        badge: "Lowest Price Choice",
        totalPrice: 2999,
        advancePrice: 1499,
        capacity: "Up to 8 Members",
        details: {
            room: "Standard Private AC Room (2 Hours)",
            cake: "1 KG Chocolate / Vanilla Cake included",
            food: "Samosa / Poha + Cold Drink / Chai + Gulab Jamun",
            decor: "Basic Happy Birthday / Celebration Banner & Balloons"
        }
    },
    {
        id: "pkg-2",
        title: "2. Standard Party Bash",
        badge: "Most Popular",
        totalPrice: 5999,
        advancePrice: 2999,
        capacity: "Up to 15 Members",
        details: {
            room: "Deluxe Party Hall Room (3 Hours)",
            cake: "1.5 KG Custom Design Fresh Cream Cake",
            food: "Paneer Snacks + Veg Burgers + French Fries + Cold Shakes",
            decor: "Full Room Balloon Arch & Lights Decoration"
        }
    },
    {
        id: "pkg-3",
        title: "3. Grand Birthday Feast",
        badge: "Grand Food Special",
        totalPrice: 9999,
        advancePrice: 4999,
        capacity: "Up to 25 Members",
        details: {
            room: "Grand Celebration Suite (4 Hours)",
            cake: "2 KG 2-Tier Designer Theme Cake",
            food: "Full Veg Thali Meal + Paneer Starters + Unlimited Ice Cream",
            decor: "Theme Balloon Decor + LED Name Board + Music Speaker"
        }
    },
    {
        id: "pkg-4",
        title: "4. Luxury Royal Suite Party",
        badge: "Premium Experience",
        totalPrice: 14999,
        advancePrice: 7499,
        capacity: "Up to 40 Members",
        details: {
            room: "VIP Banquet Room (5 Hours)",
            cake: "3 KG Premium Multi-Tier Fondant Cake",
            food: "Unlimited Luxury Buffet (Paneer, Pizza, Chinese, Drinks, Dessert)",
            decor: "Luxury Floral Decor + DJ Sound Setup + Photographer Service"
        }
    },
    {
        id: "pkg-5",
        title: "5. Ultra Platinum VIP Banquet",
        badge: "Highest Luxury Price",
        totalPrice: 24999,
        advancePrice: 12499,
        capacity: "Up to 60+ Members",
        details: {
            room: "Exclusive Hall Reservation (Full Day Access)",
            cake: "5 KG Premium Customized Theme Cake",
            food: "Royal Pure Veg Buffet (50+ Items Unlimited, Live Counters)",
            decor: "Ultra High-End Red Carpet, Professional DJ, Photo-booth & Service Crew"
        }
    }
];

// Global Application State
let state = {
    cart: JSON.parse(localStorage.getItem('canteen_store_cart')) || [],
    currentView: 'all', // 'all', 'breakfast', 'lunch', 'dinner'
    searchQuery: '',
    selectedPartyPackage: null,
    partyBookingDetails: null,
    isPartyCheckout: false,
    userRating: 0
};

// DOM Elements
const foodGrid = document.getElementById('food-grid');
const cartItemsContainer = document.getElementById('cart-items-container');
const navCartBadge = document.getElementById('nav-cart-badge');
const subtotalElem = document.getElementById('subtotal-price');
const cgstElem = document.getElementById('cgst-price');
const sgstElem = document.getElementById('sgst-price');
const grandTotalElem = document.getElementById('grand-total-price');
const searchInput = document.getElementById('search-input');
const clearSearchBtn = document.getElementById('clear-search');
const cartDrawer = document.getElementById('cart-drawer');
const cartToggleBtn = document.getElementById('cart-drawer-toggle');
const closeDrawerBtn = document.getElementById('close-drawer');

// Three-Dots Drawer Menu
const threeDotsModal = document.getElementById('three-dots-modal');
const threeDotsToggle = document.getElementById('three-dots-toggle');
const threeDotsClose = document.getElementById('three-dots-close');

// Party Modals
const partyPackagesModal = document.getElementById('party-packages-modal');
const partyModalClose = document.getElementById('party-modal-close');
const packagesGrid = document.getElementById('packages-grid');

const partyFormModal = document.getElementById('party-form-modal');
const partyFormClose = document.getElementById('party-form-close');

// Owner & Checkout Modals
const ownerModal = document.getElementById('owner-modal');
const ownerTrigger = document.getElementById('owner-info-trigger');
const ownerCloseBtn = document.getElementById('owner-modal-close');

const checkoutModal = document.getElementById('checkout-modal');
const checkoutTrigger = document.getElementById('checkout-trigger');
const modalCloseBtn = document.getElementById('modal-close-btn');
const finalConfirmBtn = document.getElementById('final-confirm-btn');

const feedbackModal = document.getElementById('feedback-modal');
const openFeedbackBtn = document.getElementById('open-feedback-btn');
const closeFeedbackBtn = document.getElementById('feedback-modal-close');
const submitFeedbackBtn = document.getElementById('submit-feedback-btn');

// App Initialization
document.addEventListener('DOMContentLoaded', () => {
    renderMenu();
    updateCartUI();
    setupEventListeners();
    setupStarRating();
    renderPartyPackages();
});

// Event Listeners Setup
function setupEventListeners() {
    // Search
    searchInput.addEventListener('input', (e) => {
        state.searchQuery = e.target.value.toLowerCase().trim();
        clearSearchBtn.style.display = state.searchQuery ? 'block' : 'none';
        renderMenu();
    });

    clearSearchBtn.addEventListener('click', () => {
        searchInput.value = '';
        state.searchQuery = '';
        clearSearchBtn.style.display = 'none';
        renderMenu();
    });

    // Cart Drawer
    cartToggleBtn.addEventListener('click', () => cartDrawer.classList.toggle('active'));
    closeDrawerBtn.addEventListener('click', () => cartDrawer.classList.remove('active'));

    // Three-Dots Menu Toggle
    threeDotsToggle.addEventListener('click', () => threeDotsModal.classList.add('active'));
    threeDotsClose.addEventListener('click', () => threeDotsModal.classList.remove('active'));

    // Party Package Modals
    partyModalClose.addEventListener('click', () => partyPackagesModal.classList.remove('active'));
    partyFormClose.addEventListener('click', () => partyFormModal.classList.remove('active'));

    // Owner Modal
    ownerTrigger.addEventListener('click', () => ownerModal.classList.add('active'));
    ownerCloseBtn.addEventListener('click', () => ownerModal.classList.remove('active'));

    // Checkout Modal
    checkoutTrigger.addEventListener('click', openNormalCheckoutModal);
    modalCloseBtn.addEventListener('click', () => checkoutModal.classList.remove('active'));
    finalConfirmBtn.addEventListener('click', finalizeOrder);

    // Feedback
    openFeedbackBtn.addEventListener('click', () => feedbackModal.classList.add('active'));
    closeFeedbackBtn.addEventListener('click', () => feedbackModal.classList.remove('active'));
    submitFeedbackBtn.addEventListener('click', handleFeedbackSubmit);
}

// Render Menu Cards
function renderMenu() {
    const filtered = FOOD_MENU.filter(item => {
        const matchesCategory = state.currentView === 'all' || item.category === state.currentView;
        const matchesSearch = item.name.toLowerCase().includes(state.searchQuery);
        return matchesCategory && matchesSearch;
    });

    if (filtered.length === 0) {
        foodGrid.innerHTML = `
            <div class="no-results" style="grid-column: 1/-1; text-align: center; padding: 3rem;">
                <i class="fa-solid fa-cookie-bite" style="font-size: 3rem; color: var(--gold-primary); margin-bottom: 10px;"></i>
                <p>No dishes found in this category!</p>
            </div>`;
        return;
    }

    foodGrid.innerHTML = filtered.map(item => `
        <div class="food-card">
            <div class="card-image-wrapper">
                <img src="${item.image}" alt="${item.name}" class="card-food-img" loading="lazy">
                <span class="veg-badge"><i class="fa-solid fa-circle"></i> Pure Veg</span>
                <span class="badge-prep-time"><i class="fa-regular fa-clock"></i> ${item.prepTime}</span>
            </div>
            <div class="card-body-content">
                <div class="card-title-row">
                    <h3>${item.name}</h3>
                    <span class="rating-tag"><i class="fa-solid fa-star"></i> ${item.rating}</span>
                </div>
                <span class="card-category-tag">${item.category}</span>
                <div class="card-footer">
                    <span class="card-price">₹${item.price}</span>
                    <button class="add-cart-btn" onclick="addToCart(${item.id})">
                        <i class="fa-solid fa-plus"></i> Add
                    </button>
                </div>
            </div>
        </div>
    `).join('');
}

// Switch Category View via 3-Dot Drawer Menu
function switchCategoryView(category) {
    state.currentView = category;
    threeDotsModal.classList.remove('active');
    
    // Update Heading Text
    const headingElem = document.getElementById('current-view-heading');
    const subElem = document.getElementById('current-view-sub');

    if (category === 'breakfast') {
        headingElem.innerHTML = `<i class="fa-solid fa-mug-hot"></i> Breakfast Express Menu`;
        subElem.innerText = "Fresh & steaming breakfast delicacies prepared instantly.";
    } else if (category === 'lunch') {
        headingElem.innerHTML = `<i class="fa-solid fa-bowl-rice"></i> Gourmet Lunch Specialities`;
        subElem.innerText = "Full pure veg thalis, paneer bowls and fast food combos.";
    } else if (category === 'dinner') {
        headingElem.innerHTML = `<i class="fa-solid fa-pizza-slice"></i> Royal Dinner Selection`;
        subElem.innerText = "Deluxe pizzas, rich gravies and royal sweet desserts.";
    }

    renderMenu();
}

// Cart Functionality
function addToCart(id) {
    const item = FOOD_MENU.find(f => f.id === id);
    const existing = state.cart.find(c => c.id === id);

    if (existing) {
        existing.quantity += 1;
    } else {
        state.cart.push({ ...item, quantity: 1 });
    }

    saveStateAndSync();
    showToast(`Added <strong>${item.name}</strong> to cart!`);
}

function updateQuantity(id, delta) {
    const index = state.cart.findIndex(c => c.id === id);
    if (index > -1) {
        state.cart[index].quantity += delta;
        if (state.cart[index].quantity <= 0) {
            state.cart.splice(index, 1);
        }
    }
    saveStateAndSync();
}

function saveStateAndSync() {
    localStorage.setItem('canteen_store_cart', JSON.stringify(state.cart));
    updateCartUI();
}

function updateCartUI() {
    const totalCount = state.cart.reduce((sum, item) => sum + item.quantity, 0);
    navCartBadge.innerText = totalCount;

    if (state.cart.length === 0) {
        cartItemsContainer.innerHTML = `
            <div class="empty-cart-state">
                <i class="fa-solid fa-basket-shopping"></i>
                <p>Your bag is empty.<br>Select food items from menu!</p>
            </div>`;
        subtotalElem.innerText = "0.00";
        cgstElem.innerText = "0.00";
        sgstElem.innerText = "0.00";
        grandTotalElem.innerText = "0.00";
        return;
    }

    cartItemsContainer.innerHTML = state.cart.map(item => `
        <div class="cart-item">
            <div class="item-meta">
                <h4>${item.name}</h4>
                <span class="item-price">₹${item.price * item.quantity}</span>
            </div>
            <div class="item-qty-controls">
                <button class="qty-btn" onclick="updateQuantity(${item.id}, -1)">-</button>
                <span>${item.quantity}</span>
                <button class="qty-btn" onclick="updateQuantity(${item.id}, 1)">+</button>
            </div>
        </div>
    `).join('');

    const subtotal = state.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const cgst = subtotal * 0.025;
    const sgst = subtotal * 0.025;
    const grandTotal = subtotal + cgst + sgst;

    subtotalElem.innerText = subtotal.toFixed(2);
    cgstElem.innerText = cgst.toFixed(2);
    sgstElem.innerText = sgst.toFixed(2);
    grandTotalElem.innerText = grandTotal.toFixed(2);
}

// Open Party Flow from 3-Dots
function openPartyBookingFlow() {
    threeDotsModal.classList.remove('active');
    partyPackagesModal.classList.add('active');
}

// Render 5 Party Packages Cards
function renderPartyPackages() {
    packagesGrid.innerHTML = PARTY_PACKAGES.map(pkg => `
        <div class="pkg-card">
            <span class="pkg-badge">${pkg.badge}</span>
            <h3>${pkg.title}</h3>
            <p class="pkg-capacity"><i class="fa-solid fa-users"></i> ${pkg.capacity}</p>
            
            <div class="pkg-price-tag">
                <span class="total-price">₹${pkg.totalPrice.toLocaleString()}</span>
                <span class="adv-tag">50% Advance: ₹${pkg.advancePrice.toLocaleString()}</span>
            </div>

            <div class="pkg-details-list">
                <p><strong><i class="fa-solid fa-door-open"></i> Room:</strong> ${pkg.details.room}</p>
                <p><strong><i class="fa-solid fa-cake-candles"></i> Cake:</strong> ${pkg.details.cake}</p>
                <p><strong><i class="fa-solid fa-utensils"></i> Menu:</strong> ${pkg.details.food}</p>
                <p><strong><i class="fa-solid fa-wand-magic-sparkles"></i> Decor:</strong> ${pkg.details.decor}</p>
            </div>

            <button class="select-pkg-btn" onclick="selectPartyPackage('${pkg.id}')">
                Select Package & Fill Form <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
    `).join('');
}

// Select a Party Package
function selectPartyPackage(pkgId) {
    state.selectedPartyPackage = PARTY_PACKAGES.find(p => p.id === pkgId);
    partyPackagesModal.classList.remove('active');

    // Populate Selected Package Summary Box in Form
    const summaryBox = document.getElementById('selected-package-summary');
    summaryBox.innerHTML = `
        <h4><i class="fa-solid fa-gift"></i> Selected: ${state.selectedPartyPackage.title}</h4>
        <p><strong>Total Price:</strong> ₹${state.selectedPartyPackage.totalPrice} | <strong>50% Advance Payable Now:</strong> ₹${state.selectedPartyPackage.advancePrice}</p>
        <p><strong>Includes:</strong> ${state.selectedPartyPackage.details.cake} & ${state.selectedPartyPackage.details.food}</p>
    `;

    partyFormModal.classList.add('active');
}

// Submit Party Form Handler
function handlePartyFormSubmit(e) {
    e.preventDefault();

    state.partyBookingDetails = {
        name: document.getElementById('cust-name').value,
        phone: document.getElementById('cust-phone').value,
        aadhaar: document.getElementById('cust-aadhaar').value,
        guests: document.getElementById('cust-guests').value,
        occasion: document.getElementById('cust-occasion').value,
        requests: document.getElementById('cust-requests').value
    };

    state.isPartyCheckout = true;
    partyFormModal.classList.remove('active');

    openPartyCheckoutReceiptModal();
}

// Render Receipt Modal for Food Items
function openNormalCheckoutModal() {
    if (state.cart.length === 0) {
        showToast("Please add items to your cart first!");
        return;
    }
    state.isPartyCheckout = false;
    setupReceiptCommonData();

    document.getElementById('bill-cust-name').innerText = "Valued Customer";
    document.getElementById('bill-aadhaar-row').style.display = "none";
    document.getElementById('bill-advance-row').style.display = "none";
    document.getElementById('bill-prep-time').innerText = "CONFIRMED BY RAJU SHARMA";

    // Items list
    const itemsList = document.getElementById('bill-items-list');
    itemsList.innerHTML = state.cart.map(item => `
        <div class="bill-item-row">
            <span>${item.quantity} x ${item.name}</span>
            <span>₹${(item.price * item.quantity).toFixed(2)}</span>
        </div>
    `).join('');

    const subtotal = state.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const cgst = subtotal * 0.025;
    const sgst = subtotal * 0.025;
    const grandTotal = subtotal + cgst + sgst;

    document.getElementById('bill-subtotal').innerText = subtotal.toFixed(2);
    document.getElementById('bill-cgst').innerText = cgst.toFixed(2);
    document.getElementById('bill-sgst').innerText = sgst.toFixed(2);
    document.getElementById('bill-total').innerText = grandTotal.toFixed(2);

    generateUPIQR(grandTotal);
    checkoutModal.classList.add('active');
}

// Render Receipt Modal for Party Room Booking
function openPartyCheckoutReceiptModal() {
    setupReceiptCommonData();

    const form = state.partyBookingDetails;
    const pkg = state.selectedPartyPackage;

    document.getElementById('bill-cust-name').innerText = `${form.name} (${form.phone})`;
    
    // Mask Aadhaar for security
    const maskedAadhaar = form.aadhaar.length >= 4 ? "XXXX-XXXX-" + form.aadhaar.slice(-4) : form.aadhaar;
    document.getElementById('bill-cust-aadhaar').innerText = maskedAadhaar;
    document.getElementById('bill-aadhaar-row').style.display = "flex";

    // Items Breakdown for Party Package
    const itemsList = document.getElementById('bill-items-list');
    itemsList.innerHTML = `
        <div class="bill-item-row">
            <span><strong>PACKAGE:</strong> ${pkg.title}</span>
            <span>₹${pkg.totalPrice.toFixed(2)}</span>
        </div>
        <div class="bill-item-row">
            <span>• Occasion: ${form.occasion} (${form.guests} Guests)</span>
            <span>Included</span>
        </div>
        <div class="bill-item-row">
            <span>• ${pkg.details.cake}</span>
            <span>Included</span>
        </div>
        <div class="bill-item-row">
            <span>• ${pkg.details.room}</span>
            <span>Included</span>
        </div>
        <div class="bill-item-row">
            <span>• ${pkg.details.food}</span>
            <span>Included</span>
        </div>
    `;

    const subtotal = pkg.totalPrice;
    const cgst = subtotal * 0.025;
    const sgst = subtotal * 0.025;
    const grandTotal = subtotal + cgst + sgst;
    const advancePayable = grandTotal / 2;

    document.getElementById('bill-subtotal').innerText = subtotal.toFixed(2);
    document.getElementById('bill-cgst').innerText = cgst.toFixed(2);
    document.getElementById('bill-sgst').innerText = sgst.toFixed(2);
    document.getElementById('bill-total').innerText = grandTotal.toFixed(2);

    document.getElementById('bill-advance').innerText = advancePayable.toFixed(2);
    document.getElementById('bill-advance-row').style.display = "flex";

    generateUPIQR(advancePayable);
    checkoutModal.classList.add('active');
}

function setupReceiptCommonData() {
    const now = new Date();
    document.getElementById('bill-date').innerText = now.toLocaleDateString('en-GB');
    document.getElementById('bill-time').innerText = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

    const tokenNo = "#CS-" + Math.floor(1000 + Math.random() * 9000);
    const receiptNo = "INV-2026-" + Math.floor(1000 + Math.random() * 9000);
    
    document.getElementById('bill-token-no').innerText = tokenNo;
    document.getElementById('bill-receipt-no').innerText = receiptNo;
}

function generateUPIQR(amount) {
    const upiString = `upi://pay?pa=canteenstore@upi&pn=CanteenStore&am=${amount.toFixed(2)}&cu=INR`;
    const qrUrl = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${encodeURIComponent(upiString)}`;
    document.getElementById('upi-qr-image').src = qrUrl;
}

function finalizeOrder() {
    if (state.isPartyCheckout) {
        showToast(`🎉 Room Booking Confirmed! Security details sent to ${state.partyBookingDetails.phone}`);
    } else {
        showToast("🎉 Order Placed! Show token at counter.");
        state.cart = [];
        saveStateAndSync();
    }
    
    checkoutModal.classList.remove('active');
    cartDrawer.classList.remove('active');
}

// Star Rating
function setupStarRating() {
    const stars = document.querySelectorAll('#star-rating .star');
    stars.forEach(star => {
        star.addEventListener('click', (e) => {
            state.userRating = parseInt(e.currentTarget.dataset.rating);
            stars.forEach(s => s.classList.toggle('active', parseInt(s.dataset.rating) <= state.userRating));
        });
    });
}

function handleFeedbackSubmit() {
    if (state.userRating === 0) {
        showToast("Please select a star rating!");
        return;
    }
    showToast("Thank you for your feedback!❤️");
    document.getElementById('feedback-text').value = '';
    state.userRating = 0;
    document.querySelectorAll('#star-rating .star').forEach(s => s.classList.remove('active'));
    feedbackModal.classList.remove('active');
}

// Toast
function showToast(message) {
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.innerHTML = message;
    container.appendChild(toast);

    setTimeout(() => {
        toast.remove();
    }, 3500);
}
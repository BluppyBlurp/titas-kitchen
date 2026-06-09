@extends('layouts.app')

@section('content')

{{-- HEADER --}}
<section class="bg-[#2C1A0E] text-[#FDF6EC] py-14 text-center">
    <p class="text-[#E67E22] uppercase tracking-widest text-xs font-semibold mb-2">Iyong Order</p>
    <h1 class="font-[Playfair_Display] text-5xl font-black">Cart 🛒</h1>
</section>

<section class="max-w-2xl mx-auto px-4 py-12">

    {{-- Empty state --}}
    <div id="empty-cart" class="hidden text-center py-24">
        <div class="text-8xl mb-6">🍽️</div>
        <h2 class="font-[Playfair_Display] text-3xl font-bold mb-4">Walang laman ang cart mo!</h2>
        <p class="text-[#2C1A0E]/60 mb-8">Pumili muna ng pagkain sa aming menu.</p>
        <a href="/menu" class="bg-[#C0392B] text-white font-semibold px-8 py-3 rounded-full hover:bg-[#a93226] transition">
            Tingnan ang Menu →
        </a>
    </div>

    {{-- Cart content — single centered column --}}
    <div id="cart-content">

        {{-- Cart Items --}}
        <div id="cart-items" class="space-y-3 mb-6"></div>

        {{-- Order Summary --}}
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-[#2C1A0E]/5 mb-4">
            <h3 class="font-[Playfair_Display] text-xl font-bold mb-4 text-[#2C1A0E]">Order Summary</h3>
            <div id="summary-items" class="space-y-2 mb-4 text-sm text-[#2C1A0E]/70"></div>
            <div class="border-t border-[#2C1A0E]/10 pt-4 flex justify-between items-center">
                <span class="font-bold text-lg text-[#2C1A0E]">Total</span>
                <span id="grand-total" class="font-black text-2xl text-[#C0392B]">₱0</span>
            </div>
        </div>

        {{-- Special Instructions --}}
        <div class="mb-4">
            <label class="font-semibold text-xs uppercase tracking-wider text-[#2C1A0E]/50 mb-1.5 block">Special Instructions (optional)</label>
            <textarea id="special-instructions"
                      placeholder="Ex: Wag masyadong maanghang, delivery sa gate lang, etc."
                      class="w-full border border-[#2C1A0E]/15 rounded-xl px-4 py-3 text-sm bg-white resize-none h-20 focus:border-[#C0392B] outline-none transition"></textarea>
        </div>

        {{-- Name + Address --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-6">
            <div>
                <label class="font-semibold text-xs uppercase tracking-wider text-[#2C1A0E]/50 mb-1.5 block">Iyong Pangalan *</label>
                <input type="text" id="customer-name"
                       placeholder="Juan dela Cruz"
                       class="w-full border border-[#2C1A0E]/15 rounded-xl px-4 py-3 text-sm bg-white focus:border-[#C0392B] outline-none transition">
            </div>
            <div>
                <label class="font-semibold text-xs uppercase tracking-wider text-[#2C1A0E]/50 mb-1.5 block">Address / Delivery Notes *</label>
                <input type="text" id="customer-address"
                       placeholder="Blk 1 Lot 2, Brgy. ..."
                       class="w-full border border-[#2C1A0E]/15 rounded-xl px-4 py-3 text-sm bg-white focus:border-[#C0392B] outline-none transition">
            </div>
        </div>

        {{-- Send button --}}
        <button onclick="sendOrder()"
                class="w-full bg-[#C0392B] hover:bg-[#a93226] text-white font-bold py-4 rounded-full text-base transition shadow-lg shadow-[#C0392B]/20 active:scale-[0.98] flex items-center justify-center gap-2">
            Send Order via Messenger 💬
        </button>

        {{-- Clear cart --}}
        <button onclick="clearCart()"
                class="mt-3 w-full border border-[#2C1A0E]/10 hover:border-[#C0392B] hover:text-[#C0392B] text-[#2C1A0E]/40 font-medium py-3 rounded-full text-sm transition">
            Clear Cart
        </button>

    </div>

</section>

@endsection

@push('scripts')
<script>
const MESSENGER = '{{ $messenger }}';

function renderCart() {
    const cart = JSON.parse(localStorage.getItem('titas_cart') || '[]');
    const emptyCart = document.getElementById('empty-cart');
    const cartContent = document.getElementById('cart-content');
    const cartItems = document.getElementById('cart-items');
    const summaryItems = document.getElementById('summary-items');
    const grandTotal = document.getElementById('grand-total');

    if (cart.length === 0) {
        emptyCart.classList.remove('hidden');
        cartContent.classList.add('hidden');
        return;
    }
    emptyCart.classList.add('hidden');
    cartContent.classList.remove('hidden');

    cartItems.innerHTML = cart.map((item, i) => `
        <div class="bg-white rounded-2xl px-5 py-4 shadow-sm border border-[#2C1A0E]/5 flex gap-4 items-start">
            <div class="w-10 h-10 bg-[#FFFAF3] rounded-xl flex items-center justify-center text-xl flex-shrink-0">🍲</div>
            <div class="flex-1 min-w-0">
                <div class="flex justify-between items-start gap-2">
                    <div>
                        <h4 class="font-bold text-sm text-[#2C1A0E]">${item.name}</h4>
                        <p class="text-xs text-[#2C1A0E]/50">${item.size}</p>
                        ${item.spice ? `<p class="text-xs text-[#E67E22] mt-0.5">🌶️ ${item.spice}</p>` : ''}
                        ${item.addons.length ? `<p class="text-xs text-[#2C1A0E]/40">+ ${item.addons.map(a => a.label).join(', ')}</p>` : ''}
                    </div>
                    <div class="text-right flex-shrink-0">
                        <p class="font-black text-[#C0392B] text-base">₱${item.total.toLocaleString()}</p>
                        <button onclick="removeItem(${i})" class="text-[10px] text-[#2C1A0E]/30 hover:text-[#C0392B] transition mt-0.5 block ml-auto">Remove</button>
                    </div>
                </div>
                <div class="flex items-center gap-2 mt-2.5">
                    <button onclick="changeItemQty(${i}, -1)"
                            class="w-6 h-6 rounded-full border border-[#2C1A0E]/20 hover:bg-[#C0392B] hover:text-white hover:border-[#C0392B] transition text-sm font-bold leading-none flex items-center justify-center">−</button>
                    <span class="font-bold w-5 text-center text-sm">${item.quantity}</span>
                    <button onclick="changeItemQty(${i}, 1)"
                            class="w-6 h-6 rounded-full border border-[#2C1A0E]/20 hover:bg-[#C0392B] hover:text-white hover:border-[#C0392B] transition text-sm font-bold leading-none flex items-center justify-center">+</button>
                </div>
            </div>
        </div>
    `).join('');

    let total = 0;
    summaryItems.innerHTML = cart.map(item => {
        total += item.total;
        return `<div class="flex justify-between gap-2 text-sm">
            <span class="truncate text-[#2C1A0E]/70">${item.name} x${item.quantity} (${item.size})</span>
            <span class="font-semibold flex-shrink-0">₱${item.total.toLocaleString()}</span>
        </div>`;
    }).join('');
    grandTotal.textContent = '₱' + total.toLocaleString();
}

function changeItemQty(index, delta) {
    const cart = JSON.parse(localStorage.getItem('titas_cart') || '[]');
    cart[index].quantity = Math.max(1, cart[index].quantity + delta);
    cart[index].total = cart[index].unitPrice * cart[index].quantity;
    localStorage.setItem('titas_cart', JSON.stringify(cart));
    updateCartCount();
    renderCart();
}

function removeItem(index) {
    const cart = JSON.parse(localStorage.getItem('titas_cart') || '[]');
    cart.splice(index, 1);
    localStorage.setItem('titas_cart', JSON.stringify(cart));
    updateCartCount();
    renderCart();
}

function clearCart() {
    if (confirm('Clear all items sa cart?')) {
        localStorage.removeItem('titas_cart');
        updateCartCount();
        renderCart();
    }
}

function sendOrder() {
    const name = document.getElementById('customer-name').value.trim();
    const address = document.getElementById('customer-address').value.trim();
    const instructions = document.getElementById('special-instructions').value.trim();
    const cart = JSON.parse(localStorage.getItem('titas_cart') || '[]');

    if (!name) { alert('Ilagay ang iyong pangalan.'); return; }
    if (!address) { alert('Ilagay ang iyong address.'); return; }
    if (!cart.length) { alert('Walang laman ang cart!'); return; }

    let message = `🍲 BAGONG ORDER — Tita's Kitchen\n\n`;
    message += `👤 Pangalan: ${name}\n`;
    message += `📍 Address: ${address}\n\n`;
    message += `📋 ORDER:\n`;

    let total = 0;
    cart.forEach((item, i) => {
        message += `\n${i + 1}. ${item.name}\n`;
        message += `   Size: ${item.size}\n`;
        if (item.spice) message += `   Spice: ${item.spice}\n`;
        if (item.addons.length) message += `   Add-ons: ${item.addons.map(a => a.label).join(', ')}\n`;
        message += `   Qty: ${item.quantity} x ₱${item.unitPrice.toLocaleString()} = ₱${item.total.toLocaleString()}\n`;
        total += item.total;
    });

    message += `\n💰 TOTAL: ₱${total.toLocaleString()}\n`;
    if (instructions) message += `\n📝 Notes: ${instructions}\n`;
    message += `\n(Bayad via GCash after confirmation)`;

    window.open(`https://m.me/${MESSENGER}?text=${encodeURIComponent(message)}`, '_blank');
}

renderCart();
</script>
@endpush

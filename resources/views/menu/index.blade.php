@extends('layouts.app')

@section('content')

{{-- HEADER --}}
<section class="bg-[#2C1A0E] text-[#FDF6EC] py-16 text-center">
    <p class="text-[#E67E22] uppercase tracking-widest text-sm font-medium mb-2">Lutong Bahay</p>
    <h1 class="font-[Playfair_Display] text-5xl font-black">Ang Aming Menu</h1>
</section>

{{-- MENU --}}
<section class="max-w-6xl mx-auto px-4 py-16">

    @foreach($menu as $category => $items)
    <div class="mb-16">
        {{-- Category header --}}
        <div class="flex items-center gap-4 mb-8">
            <h2 class="font-[Playfair_Display] text-3xl font-bold">{{ $category }}</h2>
            <div class="flex-1 h-px bg-[#2C1A0E]/20"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($items as $item)
            <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition">
                {{-- Image --}}
                <div class="h-48 overflow-hidden bg-[#f0e6d3]">
                    @if($item->image_url)
                        <img src="{{ $item->image_url }}" alt="{{ $item->name }}"
                             class="w-full h-full object-cover hover:scale-105 transition duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-6xl">🍲</div>
                    @endif
                </div>

                <div class="p-5">
                    <h3 class="font-[Playfair_Display] text-xl font-bold mb-1">{{ $item->name }}</h3>
                    <p class="text-sm text-[#2C1A0E]/60 mb-4">{{ $item->description }}</p>

                    {{-- Starting price --}}
                    <p class="text-[#C0392B] font-bold mb-4">
                        From ₱{{ number_format($item->sizes[0]['price']) }}
                    </p>

                    {{-- Add to cart button --}}
                    <button
                        onclick="openModal({{ $item->id }})"
                        class="w-full bg-[#C0392B] hover:bg-[#a93226] text-white font-semibold py-2 rounded-full transition">
                        + Add to Cart
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach

</section>

{{-- MODALS — one per item --}}
@foreach($menu->flatten() as $item)
<div id="modal-{{ $item->id }}"
     class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 px-4">
    <div class="bg-[#FDF6EC] rounded-2xl max-w-md w-full p-6 relative max-h-[90vh] overflow-y-auto">

        {{-- Close --}}
        <button onclick="closeModal({{ $item->id }})"
                class="absolute top-4 right-4 text-2xl text-[#2C1A0E]/40 hover:text-[#C0392B]">✕</button>

        {{-- Item info --}}
        <h3 class="font-[Playfair_Display] text-2xl font-bold mb-1">{{ $item->name }}</h3>
        <p class="text-sm text-[#2C1A0E]/60 mb-6">{{ $item->description }}</p>

        {{-- Size selection --}}
        <div class="mb-4">
            <label class="font-semibold text-sm mb-2 block">Piliin ang Size *</label>
            <div class="space-y-2" id="sizes-{{ $item->id }}">
                @foreach($item->sizes as $i => $size)
                <label class="flex items-center justify-between border border-[#2C1A0E]/20 rounded-xl px-4 py-3 cursor-pointer hover:border-[#C0392B] transition">
                    <div class="flex items-center gap-3">
                        <input type="radio" name="size-{{ $item->id }}" value="{{ $i }}"
                               data-price="{{ $size['price'] }}" data-label="{{ $size['label'] }}"
                               onchange="updateTotal({{ $item->id }})"
                               {{ $i === 0 ? 'checked' : '' }}
                               class="accent-[#C0392B]">
                        <span class="text-sm">{{ $size['label'] }}</span>
                    </div>
                    <span class="font-bold text-[#C0392B]">₱{{ number_format($size['price']) }}</span>
                </label>
                @endforeach
            </div>
        </div>

        {{-- Spice level --}}
        @if($item->has_spice_level)
        <div class="mb-4">
            <label class="font-semibold text-sm mb-2 block">Spice Level 🌶️</label>
            <select id="spice-{{ $item->id }}" class="w-full border border-[#2C1A0E]/20 rounded-xl px-4 py-3 bg-white text-sm">
                <option value="Hindi Maanghang">Hindi Maanghang 😊</option>
                <option value="Katamtaman" selected>Katamtaman 🌶️</option>
                <option value="Maanghang">Maanghang 🌶️🌶️</option>
                <option value="Sobrang Anghang">Sobrang Anghang 🌶️🌶️🌶️</option>
            </select>
        </div>
        @endif

        {{-- Add-ons --}}
        @if($item->addons)
        <div class="mb-4">
            <label class="font-semibold text-sm mb-2 block">Add-ons (optional)</label>
            <div class="space-y-2" id="addons-{{ $item->id }}">
                @foreach($item->addons as $addon)
                <label class="flex items-center justify-between border border-[#2C1A0E]/20 rounded-xl px-4 py-3 cursor-pointer hover:border-[#E67E22] transition">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" value="{{ $addon['price'] }}"
                               data-label="{{ $addon['label'] }}"
                               onchange="updateTotal({{ $item->id }})"
                               class="accent-[#E67E22]">
                        <span class="text-sm">{{ $addon['label'] }}</span>
                    </div>
                    <span class="font-bold text-[#E67E22]">+₱{{ number_format($addon['price']) }}</span>
                </label>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Quantity --}}
        <div class="mb-6">
            <label class="font-semibold text-sm mb-2 block">Quantity</label>
            <div class="flex items-center gap-4">
                <button onclick="changeQty({{ $item->id }}, -1)"
                        class="w-10 h-10 rounded-full border border-[#2C1A0E]/20 hover:bg-[#C0392B] hover:text-white hover:border-[#C0392B] transition text-lg font-bold">−</button>
                <span id="qty-{{ $item->id }}" class="text-xl font-bold w-8 text-center">1</span>
                <button onclick="changeQty({{ $item->id }}, 1)"
                        class="w-10 h-10 rounded-full border border-[#2C1A0E]/20 hover:bg-[#C0392B] hover:text-white hover:border-[#C0392B] transition text-lg font-bold">+</button>
            </div>
        </div>

        {{-- Total + Add button --}}
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs text-[#2C1A0E]/50">Total</p>
                <p id="total-{{ $item->id }}" class="text-2xl font-black text-[#C0392B]">
                    ₱{{ number_format($item->sizes[0]['price']) }}
                </p>
            </div>
            <button onclick="addToCart({{ $item->id }}, '{{ addslashes($item->name) }}')"
                    class="bg-[#C0392B] hover:bg-[#a93226] text-white font-semibold px-8 py-3 rounded-full transition">
                Add to Cart 🛒
            </button>
        </div>
    </div>
</div>
@endforeach

@endsection

@push('scripts')
<script>
// Quantities per modal
const quantities = {};

function openModal(id) {
    quantities[id] = 1;
    document.getElementById('modal-' + id).classList.remove('hidden');
    document.getElementById('modal-' + id).classList.add('flex');
    updateTotal(id);
}

function closeModal(id) {
    document.getElementById('modal-' + id).classList.add('hidden');
    document.getElementById('modal-' + id).classList.remove('flex');
}

function changeQty(id, delta) {
    quantities[id] = Math.max(1, (quantities[id] || 1) + delta);
    document.getElementById('qty-' + id).textContent = quantities[id];
    updateTotal(id);
}

function updateTotal(id) {
    // Get selected size price
    const sizeInput = document.querySelector(`input[name="size-${id}"]:checked`);
    const sizePrice = sizeInput ? parseInt(sizeInput.dataset.price) : 0;

    // Get checked add-ons total
    const addonInputs = document.querySelectorAll(`#addons-${id} input:checked`);
    const addonsTotal = Array.from(addonInputs).reduce((sum, el) => sum + parseInt(el.value), 0);

    const qty = quantities[id] || 1;
    const total = (sizePrice + addonsTotal) * qty;

    document.getElementById('total-' + id).textContent = '₱' + total.toLocaleString();
}

function addToCart(id, name) {
    // Get selected size
    const sizeInput = document.querySelector(`input[name="size-${id}"]:checked`);
    const sizePrice = parseInt(sizeInput.dataset.price);
    const sizeLabel = sizeInput.dataset.label;

    // Get add-ons
    const addonInputs = document.querySelectorAll(`#addons-${id} input:checked`);
    const addons = Array.from(addonInputs).map(el => ({
        label: el.dataset.label,
        price: parseInt(el.value)
    }));
    const addonsTotal = addons.reduce((sum, a) => sum + a.price, 0);

    // Get spice level if exists
    const spiceEl = document.getElementById('spice-' + id);
    const spice = spiceEl ? spiceEl.value : null;

    const qty = quantities[id] || 1;
    const unitPrice = sizePrice + addonsTotal;

    // Build cart item object
    const cartItem = {
        id: id + '-' + Date.now(), // unique per entry
        menuId: id,
        name: name,
        size: sizeLabel,
        spice: spice,
        addons: addons,
        unitPrice: unitPrice,
        quantity: qty,
        total: unitPrice * qty
    };

    // Load existing cart, push new item, save back
    const cart = JSON.parse(localStorage.getItem('titas_cart') || '[]');
    cart.push(cartItem);
    localStorage.setItem('titas_cart', JSON.stringify(cart));

    // Update navbar badge
    updateCartCount();
    closeModal(id);

    // Simple feedback
    alert(`"${name}" (${sizeLabel}) added to cart! 🛒`);
}

// Close modal on backdrop click
document.querySelectorAll('[id^="modal-"]').forEach(modal => {
    modal.addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.add('hidden');
            this.classList.remove('flex');
        }
    });
});
</script>
@endpush
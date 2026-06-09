@extends('layouts.app')

@section('content')

<section class="max-w-2xl mx-auto px-4 py-12">
    <div class="flex items-center gap-4 mb-8">
        <a href="/admin" class="text-[#2C1A0E]/40 hover:text-[#C0392B] transition">← Back</a>
        <h1 class="font-[Playfair_Display] text-3xl font-black">Edit: {{ $item->name }}</h1>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-md">
        <form method="POST" action="/admin/menu/{{ $item->id }}">
            @csrf
            @method('PUT')
            @include('admin.partials.item-form')
            <button type="submit"
                    class="w-full bg-[#C0392B] text-white font-semibold py-3 rounded-full hover:bg-[#a93226] transition mt-6">
                Update Item
            </button>
        </form>
    </div>
</section>

@endsection

@push('scripts')
<script>
function addSize() {
    const container = document.getElementById('sizes-container');
    const index = Date.now();
    container.insertAdjacentHTML('beforeend', `
        <div class="flex gap-2 items-center">
            <input type="text" placeholder="Label" id="size-label-${index}"
                   class="flex-1 border border-[#2C1A0E]/20 rounded-xl px-3 py-2 text-sm bg-white">
            <input type="number" placeholder="Price" id="size-price-${index}"
                   class="w-28 border border-[#2C1A0E]/20 rounded-xl px-3 py-2 text-sm bg-white">
            <button type="button" onclick="this.parentElement.remove()"
                    class="text-red-400 hover:text-red-600 text-lg">✕</button>
        </div>
    `);
}

function addAddon() {
    const container = document.getElementById('addons-container');
    const index = Date.now();
    container.insertAdjacentHTML('beforeend', `
        <div class="flex gap-2 items-center">
            <input type="text" placeholder="Label" id="addon-label-${index}"
                   class="flex-1 border border-[#2C1A0E]/20 rounded-xl px-3 py-2 text-sm bg-white">
            <input type="number" placeholder="Price" id="addon-price-${index}"
                   class="w-28 border border-[#2C1A0E]/20 rounded-xl px-3 py-2 text-sm bg-white">
            <button type="button" onclick="this.parentElement.remove()"
                    class="text-red-400 hover:text-red-600 text-lg">✕</button>
        </div>
    `);
}

function syncSizes() {
    const rows = document.getElementById('sizes-container').querySelectorAll('div');
    const sizes = [];
    rows.forEach(row => {
        const label = row.querySelector('[id^="size-label"]')?.value;
        const price = row.querySelector('[id^="size-price"]')?.value;
        if (label && price) sizes.push({ label, price: parseInt(price) });
    });
    document.getElementById('sizes-json').value = JSON.stringify(sizes);
}

function syncAddons() {
    const rows = document.getElementById('addons-container').querySelectorAll('div');
    const addons = [];
    rows.forEach(row => {
        const label = row.querySelector('[id^="addon-label"]')?.value;
        const price = row.querySelector('[id^="addon-price"]')?.value;
        if (label && price) addons.push({ label, price: parseInt(price) });
    });
    document.getElementById('addons-json').value = JSON.stringify(addons);
}

document.querySelector('form').addEventListener('submit', function() {
    syncSizes();
    syncAddons();
});
</script>
@endpush
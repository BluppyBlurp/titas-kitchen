@extends('layouts.app')

@section('content')

<section class="max-w-6xl mx-auto px-4 py-12">
    
    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
        <h1 class="font-[Playfair_Display] text-4xl font-black">Admin Panel</h1>
        <div class="flex gap-3">
            <a href="/admin/settings" class="border border-[#2C1A0E]/20 hover:border-[#C0392B] hover:text-[#C0392B] px-5 py-2 rounded-full text-sm font-medium transition">
                ⚙️ Settings
            </a>
            <button onclick="document.getElementById('add-modal').classList.remove('hidden'); document.getElementById('add-modal').classList.add('flex')"
                    class="bg-[#C0392B] text-white px-5 py-2 rounded-full text-sm font-medium hover:bg-[#a93226] transition">
                + Add Item
            </button>
        </div>
    </div>

    {{-- Success message --}}
    @if(session('success'))
    <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-xl mb-6 text-sm">
        ✅ {{ session('success') }}
    </div>
    @endif

    {{-- Menu items table --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-[#2C1A0E] text-[#FDF6EC]">
                <tr>
                    <th class="text-left px-6 py-4">Item</th>
                    <th class="text-left px-6 py-4">Category</th>
                    <th class="text-left px-6 py-4">Sizes</th>
                    <th class="text-left px-6 py-4">Status</th>
                    <th class="text-left px-6 py-4">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#2C1A0E]/10">
                @forelse($items as $item)
                <tr class="hover:bg-[#FDF6EC] transition">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            @if($item->image_url)
                                <img src="{{ $item->image_url }}" class="w-10 h-10 rounded-lg object-cover">
                            @else
                                <div class="w-10 h-10 rounded-lg bg-[#f0e6d3] flex items-center justify-center text-xl">🍲</div>
                            @endif
                            <div>
                                <p class="font-semibold">{{ $item->name }}</p>
                                <p class="text-[#2C1A0E]/50 text-xs">{{ Str::limit($item->description, 40) }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-[#E67E22] font-medium">{{ $item->category }}</td>
                    <td class="px-6 py-4">
                        @foreach($item->sizes as $size)
                            <span class="text-xs bg-[#f0e6d3] px-2 py-1 rounded-full mr-1">{{ $size['label'] }}</span>
                        @endforeach
                    </td>
                    <td class="px-6 py-4">
                        @if($item->is_available)
                            <span class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full font-medium">Available</span>
                        @else
                            <span class="text-xs bg-red-100 text-red-700 px-3 py-1 rounded-full font-medium">Hidden</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <a href="/admin/menu/{{ $item->id }}/edit"
                               class="text-xs border border-[#2C1A0E]/20 hover:border-[#C0392B] hover:text-[#C0392B] px-3 py-1 rounded-full transition">
                                Edit
                            </a>
                            <form method="POST" action="/admin/menu/{{ $item->id }}"
                                  onsubmit="return confirm('Delete {{ $item->name }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-xs border border-red-200 text-red-400 hover:bg-red-500 hover:text-white hover:border-red-500 px-3 py-1 rounded-full transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-12 text-[#2C1A0E]/40">No menu items yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

{{-- ADD MODAL --}}
<div id="add-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 px-4">
    <div class="bg-[#FDF6EC] rounded-2xl max-w-lg w-full p-6 max-h-[90vh] overflow-y-auto relative">
        <button onclick="document.getElementById('add-modal').classList.add('hidden'); document.getElementById('add-modal').classList.remove('flex')"
                class="absolute top-4 right-4 text-2xl text-[#2C1A0E]/40 hover:text-[#C0392B]">✕</button>

        <h2 class="font-[Playfair_Display] text-2xl font-bold mb-6">Add Menu Item</h2>

        <form method="POST" action="/admin/menu">
            @csrf
            @include('admin.partials.item-form')
            <button type="submit"
                    class="w-full bg-[#C0392B] text-white font-semibold py-3 rounded-full hover:bg-[#a93226] transition mt-6">
                Save Item
            </button>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
// Dynamic sizes builder
function addSize() {
    const container = document.getElementById('sizes-container');
    const index = container.children.length;
    container.insertAdjacentHTML('beforeend', `
        <div class="flex gap-2 items-center">
            <input type="text" placeholder="Label (e.g. Bilao)" id="size-label-${index}"
                   class="flex-1 border border-[#2C1A0E]/20 rounded-xl px-3 py-2 text-sm bg-white">
            <input type="number" placeholder="Price" id="size-price-${index}"
                   class="w-28 border border-[#2C1A0E]/20 rounded-xl px-3 py-2 text-sm bg-white">
            <button type="button" onclick="this.parentElement.remove(); syncSizes()"
                    class="text-red-400 hover:text-red-600 text-lg">✕</button>
        </div>
    `);
}

function syncSizes() {
    const container = document.getElementById('sizes-container');
    const sizes = [];
    container.querySelectorAll('div').forEach((row, i) => {
        const label = row.querySelector(`[id^="size-label"]`)?.value;
        const price = row.querySelector(`[id^="size-price"]`)?.value;
        if (label && price) sizes.push({ label, price: parseInt(price) });
    });
    document.getElementById('sizes-json').value = JSON.stringify(sizes);
}

function addAddon() {
    const container = document.getElementById('addons-container');
    const index = container.children.length;
    container.insertAdjacentHTML('beforeend', `
        <div class="flex gap-2 items-center">
            <input type="text" placeholder="Label (e.g. Extra Sauce)" id="addon-label-${index}"
                   class="flex-1 border border-[#2C1A0E]/20 rounded-xl px-3 py-2 text-sm bg-white">
            <input type="number" placeholder="Price" id="addon-price-${index}"
                   class="w-28 border border-[#2C1A0E]/20 rounded-xl px-3 py-2 text-sm bg-white">
            <button type="button" onclick="this.parentElement.remove(); syncAddons()"
                    class="text-red-400 hover:text-red-600 text-lg">✕</button>
        </div>
    `);
}

function syncAddons() {
    const container = document.getElementById('addons-container');
    const addons = [];
    container.querySelectorAll('div').forEach((row, i) => {
        const label = row.querySelector(`[id^="addon-label"]`)?.value;
        const price = row.querySelector(`[id^="addon-price"]`)?.value;
        if (label && price) addons.push({ label, price: parseInt(price) });
    });
    document.getElementById('addons-json').value = JSON.stringify(addons);
}

// Sync before submit
document.querySelector('form').addEventListener('submit', function() {
    syncSizes();
    syncAddons();
});
</script>
@endpush
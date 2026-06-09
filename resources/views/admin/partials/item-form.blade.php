{{-- Shared form fields for add and edit --}}

<div class="space-y-4">
    <div>
        <label class="font-semibold text-sm mb-1 block">Name *</label>
        <input type="text" name="name" value="{{ $item->name ?? '' }}" required
               class="w-full border border-[#2C1A0E]/20 rounded-xl px-4 py-3 text-sm bg-white">
    </div>

    <div>
        <label class="font-semibold text-sm mb-1 block">Description</label>
        <textarea name="description" rows="2"
                  class="w-full border border-[#2C1A0E]/20 rounded-xl px-4 py-3 text-sm bg-white resize-none">{{ $item->description ?? '' }}</textarea>
    </div>

    <div>
        <label class="font-semibold text-sm mb-1 block">Category *</label>
        <input type="text" name="category" value="{{ $item->category ?? '' }}" required
               placeholder="e.g. Pansit, Ulam, Kakanin"
               class="w-full border border-[#2C1A0E]/20 rounded-xl px-4 py-3 text-sm bg-white">
    </div>

    <div>
        <label class="font-semibold text-sm mb-1 block">Image URL</label>
        <input type="text" name="image_url" value="{{ $item->image_url ?? '' }}"
               placeholder="Paste Supabase Storage public URL"
               class="w-full border border-[#2C1A0E]/20 rounded-xl px-4 py-3 text-sm bg-white">
    </div>

    <div>
        <label class="font-semibold text-sm mb-1 block">Sort Order</label>
        <input type="number" name="sort_order" value="{{ $item->sort_order ?? 0 }}"
               class="w-full border border-[#2C1A0E]/20 rounded-xl px-4 py-3 text-sm bg-white">
    </div>

    {{-- Sizes builder --}}
    <div>
        <label class="font-semibold text-sm mb-2 block">Sizes & Prices *</label>
        <div id="sizes-container" class="space-y-2 mb-2">
            @if(isset($item) && $item->sizes)
                @foreach($item->sizes as $i => $size)
                <div class="flex gap-2 items-center">
                    <input type="text" placeholder="Label" id="size-label-{{ $i }}" value="{{ $size['label'] }}"
                           class="flex-1 border border-[#2C1A0E]/20 rounded-xl px-3 py-2 text-sm bg-white">
                    <input type="number" placeholder="Price" id="size-price-{{ $i }}" value="{{ $size['price'] }}"
                           class="w-28 border border-[#2C1A0E]/20 rounded-xl px-3 py-2 text-sm bg-white">
                    <button type="button" onclick="this.parentElement.remove()"
                            class="text-red-400 hover:text-red-600 text-lg">✕</button>
                </div>
                @endforeach
            @endif
        </div>
        <button type="button" onclick="addSize()"
                class="text-sm text-[#C0392B] hover:underline">+ Add Size</button>
        <input type="hidden" name="sizes" id="sizes-json" value="{{ isset($item) ? json_encode($item->sizes) : '[]' }}">
    </div>

    {{-- Add-ons builder --}}
    <div>
        <label class="font-semibold text-sm mb-2 block">Add-ons (optional)</label>
        <div id="addons-container" class="space-y-2 mb-2">
            @if(isset($item) && $item->addons)
                @foreach($item->addons as $i => $addon)
                <div class="flex gap-2 items-center">
                    <input type="text" placeholder="Label" id="addon-label-{{ $i }}" value="{{ $addon['label'] }}"
                           class="flex-1 border border-[#2C1A0E]/20 rounded-xl px-3 py-2 text-sm bg-white">
                    <input type="number" placeholder="Price" id="addon-price-{{ $i }}" value="{{ $addon['price'] }}"
                           class="w-28 border border-[#2C1A0E]/20 rounded-xl px-3 py-2 text-sm bg-white">
                    <button type="button" onclick="this.parentElement.remove()"
                            class="text-red-400 hover:text-red-600 text-lg">✕</button>
                </div>
                @endforeach
            @endif
        </div>
        <button type="button" onclick="addAddon()"
                class="text-sm text-[#E67E22] hover:underline">+ Add Add-on</button>
        <input type="hidden" name="addons" id="addons-json" value="{{ isset($item) && $item->addons ? json_encode($item->addons) : '' }}">
    </div>

    {{-- Toggles --}}
    <div class="flex gap-6">
        <label class="flex items-center gap-2 text-sm cursor-pointer">
            <input type="checkbox" name="is_available" value="1"
                   {{ (!isset($item) || $item->is_available) ? 'checked' : '' }}
                   class="accent-[#C0392B]">
            Available
        </label>
        <label class="flex items-center gap-2 text-sm cursor-pointer">
            <input type="checkbox" name="has_spice_level" value="1"
                   {{ isset($item) && $item->has_spice_level ? 'checked' : '' }}
                   class="accent-[#E67E22]">
            Has Spice Level
        </label>
    </div>
</div>
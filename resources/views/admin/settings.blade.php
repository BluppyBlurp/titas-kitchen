@extends('layouts.app')

@section('content')

<section class="max-w-2xl mx-auto px-4 py-12">
    <div class="flex items-center gap-4 mb-8">
        <a href="/admin" class="text-[#2C1A0E]/40 hover:text-[#C0392B] transition">← Back</a>
        <h1 class="font-[Playfair_Display] text-3xl font-black">Site Settings</h1>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-xl mb-6 text-sm">
        ✅ {{ session('success') }}
    </div>
    @endif

    <div class="bg-white rounded-2xl p-6 shadow-md">
        <form method="POST" action="/admin/settings">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="font-semibold text-sm mb-1 block">Hero Tagline</label>
                    <input type="text" name="hero_tagline" value="{{ $settings['hero_tagline']->value ?? '' }}"
                           class="w-full border border-[#2C1A0E]/20 rounded-xl px-4 py-3 text-sm bg-white">
                </div>
                <div>
                    <label class="font-semibold text-sm mb-1 block">Hero Subtitle</label>
                    <input type="text" name="hero_sub" value="{{ $settings['hero_sub']->value ?? '' }}"
                           class="w-full border border-[#2C1A0E]/20 rounded-xl px-4 py-3 text-sm bg-white">
                </div>
                <div>
                    <label class="font-semibold text-sm mb-1 block">Tita's Name</label>
                    <input type="text" name="about_name" value="{{ $settings['about_name']->value ?? '' }}"
                           class="w-full border border-[#2C1A0E]/20 rounded-xl px-4 py-3 text-sm bg-white">
                </div>
                <div>
                    <label class="font-semibold text-sm mb-1 block">About Text</label>
                    <textarea name="about_text" rows="4"
                              class="w-full border border-[#2C1A0E]/20 rounded-xl px-4 py-3 text-sm bg-white resize-none">{{ $settings['about_text']->value ?? '' }}</textarea>
                </div>
                <div>
                    <label class="font-semibold text-sm mb-1 block">Tita's Photo URL</label>
                    <input type="text" name="about_image" value="{{ $settings['about_image']->value ?? '' }}"
                           placeholder="Paste Supabase Storage public URL"
                           class="w-full border border-[#2C1A0E]/20 rounded-xl px-4 py-3 text-sm bg-white">
                </div>
                <div>
                    <label class="font-semibold text-sm mb-1 block">Footer Note</label>
                    <input type="text" name="footer_note" value="{{ $settings['footer_note']->value ?? '' }}"
                           class="w-full border border-[#2C1A0E]/20 rounded-xl px-4 py-3 text-sm bg-white">
                </div>
            </div>
            <button type="submit"
                    class="w-full bg-[#C0392B] text-white font-semibold py-3 rounded-full hover:bg-[#a93226] transition mt-6">
                Save Settings
            </button>
        </form>
    </div>
</section>

@endsection
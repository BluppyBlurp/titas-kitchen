@extends('layouts.app')

@section('content')

{{-- ============================================
     HERO SECTION
     ============================================ --}}
<section class="relative bg-[#FFFAF3] pt-16 pb-24 overflow-hidden">
    <div class="absolute top-0 right-0 -translate-y-1/4 translate-x-1/4 w-[600px] h-[600px] bg-[#C0392B]/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 translate-y-1/4 -translate-x-1/4 w-[400px] h-[400px] bg-[#E67E22]/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 relative">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <div class="order-2 lg:order-1">
                <div class="inline-flex items-center gap-2 bg-[#C0392B]/10 text-[#C0392B] px-4 py-2 rounded-full text-xs font-bold tracking-widest uppercase mb-8">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#C0392B] opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-[#C0392B]"></span>
                    </span>
                    Lutong Bahay · Order Online
                </div>

                <h1 class="font-[Playfair_Display] text-5xl md:text-7xl font-black text-[#2C1A0E] leading-tight mb-3">
                    Craving for
                </h1>

                <div class="mb-8 font-[Playfair_Display] text-5xl md:text-7xl font-black italic text-[#C0392B] leading-tight"
                     style="min-height:1.15em; display:flex; flex-wrap:wrap; overflow:hidden;" id="rotating-wrap">
                </div>

                <p class="text-lg text-[#2C1A0E]/70 max-w-lg mb-10 leading-relaxed">
                    {{ $settings['hero_sub'] ?? 'Authentic Filipino home cooking, made with love and ordered straight to your door.' }}
                </p>

                <div class="flex flex-col sm:flex-row gap-4 mb-12">
                    <a href="/menu"
                       class="group bg-[#C0392B] text-white px-10 py-4 rounded-2xl font-bold text-lg hover:bg-[#A93226] transition-all shadow-xl shadow-[#C0392B]/20 flex items-center justify-center gap-3">
                        Mag-Order Na 🛒
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                    <a href="#about"
                       class="bg-white text-[#2C1A0E] border-2 border-[#2C1A0E]/10 px-10 py-4 rounded-2xl font-bold text-lg hover:border-[#C0392B] hover:text-[#C0392B] transition-all text-center">
                        Sino si Tita? 👩‍🍳
                    </a>
                </div>

                {{-- Stats — centered on mobile, left on desktop --}}
                <div class="flex justify-center lg:justify-start pt-4 border-t border-[#2C1A0E]/10">
                    <div class="text-center lg:text-left">
                        <p class="font-[Playfair_Display] text-3xl font-black text-[#C0392B]">100%</p>
                        <p class="text-xs font-bold uppercase tracking-wider text-[#2C1A0E]/50 mt-1">Homemade</p>
                    </div>
                </div>
            </div>

            <div class="order-1 lg:order-2 relative flex justify-center">
                <div class="relative w-80 h-80 md:w-96 md:h-96">
                    <div class="w-full h-full rounded-full overflow-hidden shadow-2xl border-8 border-white">
                        <img src="https://images.unsplash.com/photo-1585032226651-759b368d7246?w=700&q=80"
                             class="w-full h-full object-cover" alt="Filipino Food">
                    </div>
                    <div class="absolute top-4 -right-4 bg-[#C0392B] text-white px-5 py-3 rounded-2xl shadow-xl font-black text-center">
                        <p class="text-2xl leading-none">₱150</p>
                        <p class="text-[10px] opacity-80 mt-0.5">starts at</p>
                    </div>
                    <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 bg-white rounded-2xl shadow-xl px-4 py-2.5 flex items-center gap-3 whitespace-nowrap">
                        <span class="text-2xl">🍲</span>
                        <div>
                            <p class="font-bold text-sm text-[#2C1A0E] leading-none">Sariwang Luto</p>
                            <p class="text-xs text-[#2C1A0E]/50 mt-0.5">Araw-araw</p>
                        </div>
                    </div>
                    <div class="absolute -top-2 -left-6 w-14 h-14 rounded-full overflow-hidden shadow-lg border-4 border-[#FFFAF3]">
                        <img src="https://images.unsplash.com/photo-1567620832903-9fc6debc209f?w=120&q=80" class="w-full h-full object-cover" alt="">
                    </div>
                    <div class="absolute bottom-10 -right-8 w-12 h-12 rounded-full overflow-hidden shadow-lg border-4 border-[#FFFAF3]">
                        <img src="https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?w=120&q=80" class="w-full h-full object-cover" alt="">
                    </div>
                    <div class="absolute top-1/3 -left-10 w-10 h-10 rounded-full overflow-hidden shadow-lg border-4 border-[#FFFAF3]">
                        <img src="https://images.unsplash.com/photo-1604329760661-e71dc83f8f26?w=120&q=80" class="w-full h-full object-cover" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ============================================
     BEST SELLERS
     ============================================ --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div>
                <p class="text-[#E67E22] font-bold tracking-widest uppercase text-sm mb-4">Piling Putahe</p>
                <h2 class="font-[Playfair_Display] text-5xl font-black text-[#2C1A0E]">Ang Aming Best Sellers</h2>
            </div>
            <a href="/menu" class="inline-flex items-center gap-2 text-[#C0392B] font-bold text-lg hover:gap-4 transition-all">
                Tingnan lahat ng putahe
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>

        {{-- Single column on mobile → 2 col on md → 3 col on lg --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($showcase as $item)
            <div class="group bg-[#FFFAF3] rounded-[32px] p-4 transition-all hover:shadow-2xl hover:-translate-y-2">
                <div class="relative h-64 sm:h-72 rounded-[24px] overflow-hidden mb-6">
                    @php $img = $item->image_url ?: 'https://images.unsplash.com/photo-1585032226651-759b368d7246?w=600&q=80'; @endphp
                    <img src="{{ $img }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="{{ $item->name }}">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-4 py-2 rounded-2xl text-[#C0392B] text-xs font-black uppercase tracking-wider">
                        {{ $item->category }}
                    </div>
                </div>
                <div class="px-2 pb-4">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="font-[Playfair_Display] text-2xl font-black text-[#2C1A0E] group-hover:text-[#C0392B] transition-colors">{{ $item->name }}</h3>
                        <p class="font-black text-2xl text-[#C0392B] ml-2 flex-shrink-0">₱{{ number_format($item->sizes[0]['price']) }}</p>
                    </div>
                    <p class="text-[#2C1A0E]/60 mb-6 line-clamp-2 leading-relaxed text-sm">{{ $item->description }}</p>
                    <a href="/menu" class="block w-full bg-[#2C1A0E] text-white text-center py-4 rounded-2xl font-bold transition-all hover:bg-[#C0392B] active:scale-95">
                        Idagdag sa Cart 🛒
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================
     ABOUT SECTION
     ============================================ --}}
<section id="about" class="py-24 bg-[#FFFAF3] overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center gap-20">
            <div class="w-full lg:w-1/2 relative">
                <div class="relative z-10 bg-white p-4 rounded-[40px] shadow-2xl rotate-3">
                    <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=800&q=80" class="w-full h-[500px] object-cover rounded-[32px]" alt="Tita Cooking">
                </div>
                <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 bg-[#E67E22] p-8 rounded-[40px] shadow-2xl -rotate-6 z-0 hidden lg:block">
                    <div class="text-white text-center">
                        <p class="text-5xl font-black mb-1">100%</p>
                        <p class="text-xs font-bold uppercase tracking-widest">Handmade with Love</p>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/2">
                <p class="text-[#E67E22] font-bold tracking-widest uppercase text-sm mb-4">Sino si Tita?</p>
                <h2 class="font-[Playfair_Display] text-5xl lg:text-6xl font-black text-[#2C1A0E] mb-8 leading-tight">
                    Ang Kwento sa <span class="text-[#C0392B]">Likod ng Kawali.</span>
                </h2>
                <div class="space-y-6 text-xl text-[#2C1A0E]/70 leading-relaxed mb-12">
                    <p>{{ $settings['about_text'] }}</p>
                    <p>Mula sa pagpili ng pinakasariwang sangkap hanggang sa mabagal na pagluluto para makuha ang tunay na linamnam—ito ang aming pangako sa inyo.</p>
                </div>

                {{-- Pamilya / Tradisyon — centered on mobile, left on desktop --}}
                <div class="grid grid-cols-2 gap-8 py-8 border-y border-[#2C1A0E]/10 mb-12 text-center lg:text-left">
                    <div>
                        <p class="font-[Playfair_Display] text-4xl font-black text-[#C0392B] mb-2">Pamilya</p>
                        <p class="text-sm font-bold text-[#2C1A0E]/50 uppercase tracking-wider">Ang aming inspirasyon</p>
                    </div>
                    <div>
                        <p class="font-[Playfair_Display] text-4xl font-black text-[#C0392B] mb-2">Tradisyon</p>
                        <p class="text-sm font-bold text-[#2C1A0E]/50 uppercase tracking-wider">Ang aming sekreto</p>
                    </div>
                </div>

                <a href="/menu" class="inline-block bg-[#C0392B] text-white px-10 py-5 rounded-2xl font-bold text-lg hover:bg-[#A93226] transition-all shadow-xl shadow-[#C0392B]/20">
                    Sali na sa aming hapag 🍲
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ============================================
     HOW TO ORDER — modal trigger
     ============================================ --}}
<section class="py-16 bg-white text-center">
    <h2 class="font-[Playfair_Display] text-4xl font-black text-[#2C1A0E] mb-6">Paano Mag-Order?</h2>
    <p class="text-[#2C1A0E]/60 mb-8">Madali lang! Alamin ang steps sa pag-order.</p>
    <button onclick="document.getElementById('how-to-modal').classList.remove('hidden'); document.getElementById('how-to-modal').classList.add('flex')"
            class="inline-flex items-center gap-3 bg-[#C0392B] text-white px-8 py-4 rounded-2xl font-bold text-base hover:bg-[#A93226] transition-all shadow-lg shadow-[#C0392B]/20">
        Tingnan ang Steps sa Pag-Order
    </button>
</section>

{{-- HOW TO ORDER MODAL --}}
<div id="how-to-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm px-4"
     onclick="if(event.target===this){this.classList.add('hidden');this.classList.remove('flex')}">
    <div class="bg-[#FFFAF3] rounded-3xl max-w-lg w-full p-8 relative shadow-2xl">
        <button onclick="document.getElementById('how-to-modal').classList.add('hidden');document.getElementById('how-to-modal').classList.remove('flex')"
                class="absolute top-5 right-5 w-8 h-8 rounded-full bg-[#2C1A0E]/10 hover:bg-[#C0392B] hover:text-white flex items-center justify-center transition text-sm font-bold">✕</button>
        <h3 class="font-[Playfair_Display] text-3xl font-black text-[#2C1A0E] mb-8 text-center">Paano Mag-Order</h3>
        <div class="space-y-6">
            @foreach([
                ['num'=>'1','icon'=>'🍽️','title'=>'Pumili sa Menu','desc'=>'I-browse ang aming mga lutong bahay at piliin ang iyong paborito.'],
                ['num'=>'2','icon'=>'🛒','title'=>'Ilagay sa Cart','desc'=>'Piliin ang size at add-ons na gusto mo para sa mas masarap na kainan.'],
                ['num'=>'3','icon'=>'💬','title'=>'Send via Messenger','desc'=>'Direktang mag-send ng order kay Tita para sa mabilis na confirmation.'],
            ] as $step)
            <div class="flex items-start gap-5">
                <div class="relative flex-shrink-0">
                    <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-3xl shadow-md">{{ $step['icon'] }}</div>
                    <span class="absolute -top-2 -right-2 w-6 h-6 bg-[#C0392B] text-white rounded-full flex items-center justify-center text-xs font-black">{{ $step['num'] }}</span>
                </div>
                <div class="pt-1">
                    <h4 class="font-[Playfair_Display] text-lg font-black text-[#2C1A0E] mb-1">{{ $step['title'] }}</h4>
                    <p class="text-sm text-[#2C1A0E]/60 leading-relaxed">{{ $step['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <a href="/menu" class="mt-8 block w-full bg-[#C0392B] text-white text-center py-4 rounded-2xl font-bold hover:bg-[#A93226] transition-all">Mag-Order Na 🛒</a>
    </div>
</div>

{{-- ============================================
     MENU PREVIEW — flipbook
     ============================================ --}}
<section class="py-24 bg-[#2C1A0E] overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 text-center mb-10">
        <h2 class="font-[Playfair_Display] text-5xl font-black text-white">Ang Aming Menu</h2>
        <p class="text-white/40 mt-3 text-sm">I-flip ang pahina para makita ang mga putahe</p>
    </div>

    @php
        $menuPages = [];
        $menuPages[] = ['type' => 'cover'];
        foreach($menu as $category => $items) {
            $menuPages[] = ['type' => 'category', 'category' => $category, 'items' => $items];
        }
        $totalPages = count($menuPages);
    @endphp

    <div class="relative flex items-center justify-center gap-4 px-4">
        <button id="menu-prev" class="w-11 h-11 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition flex-shrink-0 disabled:opacity-30" onclick="menuFlip(-1)">‹</button>

        <div class="overflow-hidden rounded-[24px] shadow-2xl max-w-[580px] w-full" style="min-height:340px;">
            <div id="menu-track" class="flex transition-transform duration-500 ease-in-out" style="will-change:transform;">
                <div class="menu-page flex-shrink-0 w-full grid grid-cols-2" style="min-height:340px;">
                    <div class="bg-[#C0392B] p-10 flex flex-col justify-center items-center text-white text-center">
                        <h3 class="font-[Playfair_Display] text-5xl font-black italic mb-1">Tita's</h3>
                        <h3 class="font-[Playfair_Display] text-3xl font-black mb-5">Kitchen</h3>
                        <div class="w-12 h-0.5 bg-white/30 mb-5 rounded-full"></div>
                        <p class="font-bold text-[10px] uppercase tracking-[0.2em] opacity-70">Menu 2025</p>
                        <span class="text-4xl mt-6">🍲</span>
                    </div>
                    <div class="bg-[#FFFAF3] p-10 flex flex-col justify-center">
                        <p class="text-[#C0392B] font-black uppercase tracking-widest text-[10px] mb-6">Kategorya</p>
                        <ul class="space-y-4">
                            @foreach($menu as $cat => $items)
                            <li class="flex justify-between items-center border-b border-[#2C1A0E]/10 pb-3">
                                <span class="font-[Playfair_Display] text-lg font-black text-[#2C1A0E]">{{ $cat }}</span>
                                <span class="text-[#C0392B] text-sm">→</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @foreach($menu as $category => $items)
                <div class="menu-page flex-shrink-0 w-full grid grid-cols-2" style="min-height:340px;">
                    <div class="bg-[#C0392B] p-10 flex flex-col justify-center items-center text-white text-center">
                        <h3 class="font-[Playfair_Display] text-5xl font-black italic mb-1">Tita's</h3>
                        <h3 class="font-[Playfair_Display] text-3xl font-black mb-5">Kitchen</h3>
                        <div class="w-12 h-0.5 bg-white/30 mb-5 rounded-full"></div>
                        <p class="font-bold text-[10px] uppercase tracking-[0.2em] opacity-70">Menu 2025</p>
                        <span class="text-4xl mt-6">🍲</span>
                    </div>
                    <div class="bg-[#FFFAF3] p-10 flex flex-col justify-center">
                        <p class="text-[#C0392B] font-black uppercase tracking-widest text-[10px] mb-5">{{ strtoupper($category) }}</p>
                        <ul class="space-y-4 mb-6">
                            @foreach($items as $item)
                            <li class="flex justify-between items-center border-b border-[#2C1A0E]/10 pb-3 gap-3">
                                <span class="font-[Playfair_Display] text-base font-black text-[#2C1A0E]">{{ $item->name }}</span>
                                <span class="font-black text-[#C0392B] text-sm flex-shrink-0">₱{{ number_format($item->sizes[0]['price']) }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <button id="menu-next" class="w-11 h-11 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition flex-shrink-0" onclick="menuFlip(1)">›</button>
    </div>

    <div class="flex justify-center gap-2 mt-6" id="menu-dots">
        @for($p = 0; $p < $totalPages; $p++)
        <button onclick="menuGoTo({{ $p }})" class="menu-dot w-2 h-2 rounded-full transition-all {{ $p === 0 ? 'bg-white scale-125' : 'bg-white/30' }}"></button>
        @endfor
    </div>

    <div class="flex justify-center mt-8">
        <a href="/menu" class="border border-white/30 text-white px-8 py-3.5 rounded-full font-semibold hover:bg-white hover:text-[#2C1A0E] transition-all text-sm">
            Tingnan ang Buong Menu →
        </a>
    </div>
</section>

{{-- ============================================
     REVIEWS SLIDESHOW
     ============================================ --}}
<section class="py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14">
            <p class="text-[#E67E22] font-bold tracking-widest uppercase text-sm mb-4">Mga Feedback</p>
            <h2 class="font-[Playfair_Display] text-5xl font-black text-[#2C1A0E]">Sinasabi ng aming Customers</h2>
        </div>

        @php
        $reviews = [
            ['name'=>'Maria S.','loc'=>'Taguig City','avatar'=>'https://i.pravatar.cc/100?u=maria_tk','food'=>'https://images.unsplash.com/photo-1585032226651-759b368d7246?w=600&q=80','dish'=>'Pancit Bihon','stars'=>5,'text'=>'Ang sarap! Parang niluto ng nanay ko. Lagi na kaming nag-oorder dito tuwing may okasyon.','date'=>'Nov 2024'],
            ['name'=>'Carlo R.','loc'=>'BGC, Taguig','avatar'=>'https://i.pravatar.cc/100?u=carlo_tk','food'=>'https://images.unsplash.com/photo-1604908177453-7462950a6a3b?w=600&q=80','dish'=>'Kare-Kare','stars'=>5,'text'=>'Best kare-kare sa Taguig! Hindi mapantayan. Yung bagoong nila, grabe — perfect ang timpla.','date'=>'Dec 2024'],
            ['name'=>'Jessa T.','loc'=>'Pasay City','avatar'=>'https://i.pravatar.cc/100?u=jessa_tk','food'=>'https://images.unsplash.com/photo-1567620832903-9fc6debc209f?w=600&q=80','dish'=>'Bicol Express','stars'=>5,'text'=>'Sobrang anghang pero sobrang sarap! Kahit malayo ako, worth it pa rin ang pag-order. 10/10!','date'=>'Jan 2025'],
            ['name'=>'Noel B.','loc'=>'Muntinlupa','avatar'=>'https://i.pravatar.cc/100?u=noel_tk','food'=>'https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?w=600&q=80','dish'=>'Adobo','stars'=>5,'text'=>'Hindi ko mapigilan ang sarili ko sa pagkain. Authentic talaga ang lasa, parang luto ng Lola!','date'=>'Feb 2025'],
        ];
        @endphp

        <div class="relative px-8">
            <div class="overflow-hidden">
                <div id="rv-track" class="flex gap-6 transition-transform duration-500 ease-in-out" style="will-change:transform;">
                    @foreach($reviews as $i => $rv)
                    <div class="rv-card flex-shrink-0 w-full sm:w-[440px] bg-[#FFFAF3] rounded-3xl overflow-hidden shadow-lg border border-[#2C1A0E]/5 cursor-pointer select-none"
                         onclick="rvExpand({{ $i }})">
                        <div class="h-48 overflow-hidden relative">
                            <img src="{{ $rv['food'] }}" class="w-full h-full object-cover hover:scale-105 transition duration-700" alt="{{ $rv['dish'] }}">
                            <span class="absolute bottom-3 left-3 bg-black/50 backdrop-blur-sm text-white text-xs font-bold px-3 py-1 rounded-full">{{ $rv['dish'] }}</span>
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-3 mb-3">
                                <img src="{{ $rv['avatar'] }}" class="w-10 h-10 rounded-full border-2 border-white shadow" alt="{{ $rv['name'] }}">
                                <div class="flex-1 min-w-0">
                                    <p class="font-bold text-sm text-[#2C1A0E] leading-none">{{ $rv['name'] }}</p>
                                    <p class="text-xs text-[#2C1A0E]/50 mt-0.5">{{ $rv['loc'] }}</p>
                                </div>
                                <span class="text-xs text-[#2C1A0E]/35 font-medium flex-shrink-0">{{ $rv['date'] }}</span>
                            </div>
                            <div class="flex gap-0.5 mb-3">
                                @for($s = 0; $s < $rv['stars']; $s++)
                                <svg class="w-3.5 h-3.5 fill-[#E67E22]" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                @endfor
                            </div>
                            <p class="text-sm text-[#2C1A0E]/65 leading-relaxed mb-4 line-clamp-2">"{{ $rv['text'] }}"</p>
                            <div class="rv-player bg-white rounded-2xl px-3 py-2.5 flex items-center gap-3 border border-[#2C1A0E]/8 shadow-sm"
                                 onclick="event.stopPropagation(); rvToggleAudio({{ $i }}, this)">
                                <button class="w-8 h-8 rounded-full bg-[#C0392B] text-white flex items-center justify-center flex-shrink-0 hover:bg-[#A93226] transition">
                                    <span class="rv-play-icon text-xs">▶</span>
                                </button>
                                <div class="flex items-center gap-[2px] flex-1 h-7" id="rv-wave-{{ $i }}">
                                    @php $heights = [20,40,60,80,50,90,65,35,75,45,25,70,85,40,65,50,30,75,55,35,80,60,40,70,45,65,50,30]; @endphp
                                    @for($b = 0; $b < 28; $b++)
                                    <div class="rv-bar rounded-full flex-1 transition-all duration-100"
                                         style="height:{{ $heights[$b % 28] }}%; background:#C0392B; opacity:0.22;"></div>
                                    @endfor
                                </div>
                                <span class="text-xs text-[#2C1A0E]/40 flex-shrink-0 font-mono w-8 text-right" id="rv-time-{{ $i }}">0:00</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <button onclick="rvSlide(-1)" class="absolute left-0 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white shadow-lg border border-[#2C1A0E]/10 flex items-center justify-center hover:bg-[#C0392B] hover:text-white hover:border-[#C0392B] transition text-lg font-bold z-10">‹</button>
            <button onclick="rvSlide(1)"  class="absolute right-0 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white shadow-lg border border-[#2C1A0E]/10 flex items-center justify-center hover:bg-[#C0392B] hover:text-white hover:border-[#C0392B] transition text-lg font-bold z-10">›</button>
        </div>

        <div class="flex justify-center gap-2 mt-8" id="rv-dots">
            @foreach($reviews as $i => $rv)
            <button onclick="rvGoTo({{ $i }})" class="rv-dot w-2 h-2 rounded-full transition-all {{ $i === 0 ? 'bg-[#C0392B] scale-125' : 'bg-[#2C1A0E]/20' }}"></button>
            @endforeach
        </div>
    </div>
</section>

{{-- REVIEW EXPAND MODAL --}}
<div id="rv-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm px-4"
     onclick="if(event.target===this)rvCloseModal()">
    <div class="bg-[#FFFAF3] rounded-3xl max-w-md w-full overflow-hidden shadow-2xl relative">
        <button onclick="rvCloseModal()" class="absolute top-4 right-4 z-10 w-8 h-8 rounded-full bg-white/80 backdrop-blur-sm flex items-center justify-center text-sm font-bold hover:bg-[#C0392B] hover:text-white transition shadow">✕</button>
        <div id="rv-modal-img" class="h-56 overflow-hidden"></div>
        <div class="p-7">
            <div class="flex items-center gap-3 mb-4" id="rv-modal-reviewer"></div>
            <div class="flex gap-0.5 mb-3" id="rv-modal-stars"></div>
            <span class="inline-block bg-[#C0392B]/10 text-[#C0392B] text-xs font-bold px-3 py-1 rounded-full mb-4" id="rv-modal-dish"></span>
            <p class="text-sm text-[#2C1A0E]/70 leading-relaxed mb-5" id="rv-modal-text"></p>
            <div class="rv-player bg-white rounded-2xl px-4 py-3 flex items-center gap-3 border border-[#2C1A0E]/8 shadow-sm"
                 onclick="rvToggleAudio('modal', this)">
                <button class="w-9 h-9 rounded-full bg-[#C0392B] text-white flex items-center justify-center flex-shrink-0 hover:bg-[#A93226] transition">
                    <span class="rv-play-icon text-sm">▶</span>
                </button>
                <div class="flex items-center gap-[2px] flex-1 h-8" id="rv-wave-modal">
                    @php $mh = [20,40,60,80,50,90,65,35,75,45,25,70,85,40,65,50,30,75,55,35,80,60,40,70,45,65,50,30,60,45,75,50,35,80,55,40]; @endphp
                    @for($b = 0; $b < 36; $b++)
                    <div class="rv-bar rounded-full flex-1 transition-all duration-100" style="height:{{ $mh[$b % 36] }}%; background:#C0392B; opacity:0.22;"></div>
                    @endfor
                </div>
                <span class="text-xs text-[#2C1A0E]/40 flex-shrink-0 font-mono w-8 text-right" id="rv-time-modal">0:00</span>
            </div>
        </div>
    </div>
</div>

{{-- ============================================
     LOCATION MAP
     ============================================ --}}
<section class="py-24 bg-[#FFFAF3]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-[#E67E22] font-bold tracking-widest uppercase text-sm mb-4">Hanapin Kami</p>
            <h2 class="font-[Playfair_Display] text-5xl font-black text-[#2C1A0E]">Nasaan si Tita?</h2>
            <p class="text-[#2C1A0E]/60 mt-4 text-lg">Delivery coverage area · Taguig, Metro Manila</p>
        </div>
        <div class="rounded-[32px] overflow-hidden shadow-2xl border-4 border-white" style="height:420px;">
            <iframe src="https://www.google.com/maps?q=14.467911,121.056777&z=15&output=embed"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" title="Tita's Kitchen Location"></iframe>
        </div>
        <div class="mt-6 flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6 text-sm text-[#2C1A0E]/60 font-medium text-center">
            <span>📍 Taguig City, Metro Manila</span>
            <span class="hidden sm:block text-[#2C1A0E]/20">|</span>
            <span>🕐 Lun–Linggo, 7AM–8PM</span>
            <span class="hidden sm:block text-[#2C1A0E]/20">|</span>
            <span>💬 Orders via Messenger</span>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<style>
.rt-char  { display:inline-block; overflow:hidden; line-height:1.15em; vertical-align:bottom; }
.rt-inner { display:inline-block; animation: rt-in 0.45s cubic-bezier(0.22,1,0.36,1) both; }
.rt-exit .rt-inner { animation: rt-out 0.35s cubic-bezier(0.55,0,1,0.45) both; }
.rt-space { display:inline-block; width:0.28em; }
@keyframes rt-in  { from { transform:translateY(100%); opacity:0 } to { transform:translateY(0); opacity:1 } }
@keyframes rt-out { from { transform:translateY(0); opacity:1 } to { transform:translateY(-120%); opacity:0 } }
#menu-track { display:flex; }
.menu-page  { min-width:100%; }
</style>

<script>
// ── Menu flipbook ──────────────────────────────
let menuCurrent = 0;
const menuTotal = document.querySelectorAll('.menu-page').length;
const menuTrack = document.getElementById('menu-track');
const menuDots  = document.querySelectorAll('.menu-dot');
function menuGoTo(idx) {
    menuCurrent = Math.max(0, Math.min(idx, menuTotal - 1));
    menuTrack.style.transform = `translateX(-${menuCurrent * 100}%)`;
    menuDots.forEach((d,i) => {
        d.classList.toggle('bg-white',    i === menuCurrent);
        d.classList.toggle('scale-125',   i === menuCurrent);
        d.classList.toggle('bg-white/30', i !== menuCurrent);
    });
    document.getElementById('menu-prev').disabled = menuCurrent === 0;
    document.getElementById('menu-next').disabled = menuCurrent === menuTotal - 1;
}
function menuFlip(dir) { menuGoTo(menuCurrent + dir); }
menuGoTo(0);

// ── Rotating dish text ─────────────────────────
const dishes = [
    @foreach($showcase as $item)"{{ addslashes($item->name) }}",@endforeach
    "Kare-Kare","Pansit","Lutong Bahay"
];
const wrap = document.getElementById('rotating-wrap');
let rtIdx = 0;
const STAGGER = 0.025, INTERVAL = 2000;
function buildChars(text, exiting) {
    const totalChars = Array.from(text).filter(c => c !== ' ').length;
    let ci = 0;
    const frag = document.createDocumentFragment();
    text.split('').forEach(ch => {
        if (ch === ' ') { const sp = document.createElement('span'); sp.className = 'rt-space'; frag.appendChild(sp); return; }
        const outer = document.createElement('span'); outer.className = 'rt-char' + (exiting ? ' rt-exit' : '');
        const inner = document.createElement('span'); inner.className = 'rt-inner';
        inner.style.animationDelay = ((totalChars - 1 - ci) * STAGGER) + 's';
        inner.textContent = ch;
        outer.appendChild(inner); frag.appendChild(outer); ci++;
    });
    return frag;
}
function showText(text) { wrap.innerHTML = ''; wrap.appendChild(buildChars(text, false)); }
function exitThenShow(next) {
    wrap.querySelectorAll('.rt-char').forEach(el => el.classList.add('rt-exit'));
    const chars = Array.from(next).filter(c => c !== ' ').length;
    setTimeout(() => showText(next), (chars * STAGGER + 0.4) * 1000);
}
showText(dishes[0]);
setInterval(() => { rtIdx = (rtIdx + 1) % dishes.length; exitThenShow(dishes[rtIdx]); }, INTERVAL);

// ── Reviews slideshow ──────────────────────────
const rvData = @json($reviews);
let rvCurrent = 0;
let rvAuto = null;
const rvTimers = {};
const rvTrack  = document.getElementById('rv-track');
const rvDotEls = document.querySelectorAll('.rv-dot');

function rvCardWidth() {
    const c = document.querySelector('.rv-card');
    return c ? c.offsetWidth + 24 : 0;
}
function rvGoTo(idx) {
    const total = rvData.length;
    rvCurrent = ((idx % total) + total) % total;
    rvTrack.style.transform = `translateX(-${rvCurrent * rvCardWidth()}px)`;
    rvDotEls.forEach((d,i) => {
        d.classList.toggle('bg-[#C0392B]',    i === rvCurrent);
        d.classList.toggle('scale-125',        i === rvCurrent);
        d.classList.toggle('bg-[#2C1A0E]/20', i !== rvCurrent);
    });
}
function rvSlide(dir) { clearInterval(rvAuto); rvGoTo(rvCurrent + dir); rvStartAuto(); }
function rvStartAuto() { rvAuto = setInterval(() => rvGoTo(rvCurrent + 1), 4500); }
rvStartAuto();
window.addEventListener('resize', () => rvGoTo(rvCurrent));

// ── Audio waveform simulation ──────────────────
function rvToggleAudio(id, playerEl) {
    const playing = playerEl.dataset.playing === '1';
    document.querySelectorAll('.rv-player[data-playing="1"]').forEach(p => { if (p !== playerEl) rvStopPlayer(p, p.dataset.waveId); });
    if (playing) { rvStopPlayer(playerEl, id); return; }
    playerEl.dataset.playing = '1';
    playerEl.dataset.waveId  = id;
    playerEl.querySelector('.rv-play-icon').textContent = '⏸';
    const waveEl = document.getElementById(id === 'modal' ? 'rv-wave-modal' : `rv-wave-${id}`);
    const timeEl = document.getElementById(id === 'modal' ? 'rv-time-modal' : `rv-time-${id}`);
    const bars   = waveEl ? waveEl.querySelectorAll('.rv-bar') : [];
    const dur    = 9;
    let elapsed  = 0;
    clearInterval(rvTimers[id]);
    rvTimers[id] = setInterval(() => {
        elapsed += 0.1;
        if (elapsed >= dur) { rvStopPlayer(playerEl, id); return; }
        const progress = elapsed / dur;
        bars.forEach((bar, i) => { bar.style.opacity = i / bars.length < progress ? '1' : '0.22'; });
        if (timeEl) timeEl.textContent = `0:${String(Math.floor(elapsed)).padStart(2,'0')}`;
    }, 100);
}
function rvStopPlayer(playerEl, id) {
    playerEl.dataset.playing = '0';
    playerEl.querySelector('.rv-play-icon').textContent = '▶';
    clearInterval(rvTimers[id]);
    const waveEl = document.getElementById(id === 'modal' ? 'rv-wave-modal' : `rv-wave-${id}`);
    const timeEl = document.getElementById(id === 'modal' ? 'rv-time-modal' : `rv-time-${id}`);
    if (waveEl) waveEl.querySelectorAll('.rv-bar').forEach(b => b.style.opacity = '0.22');
    if (timeEl) timeEl.textContent = '0:00';
}

// ── Review expand modal ────────────────────────
function rvExpand(idx) {
    const rv = rvData[idx];
    const modal = document.getElementById('rv-modal');
    document.getElementById('rv-modal-img').innerHTML =
        `<img src="${rv.food}" class="w-full h-full object-cover" alt="${rv.dish}">`;
    document.getElementById('rv-modal-reviewer').innerHTML =
        `<img src="${rv.avatar}" class="w-10 h-10 rounded-full border-2 border-white shadow" alt="${rv.name}">
         <div class="flex-1"><p class="font-bold text-sm text-[#2C1A0E]">${rv.name}</p><p class="text-xs text-[#2C1A0E]/50">${rv.loc}</p></div>
         <span class="text-xs text-[#2C1A0E]/35">${rv.date}</span>`;
    const starSvg = `<svg class="w-4 h-4 fill-[#E67E22]" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>`;
    document.getElementById('rv-modal-stars').innerHTML = starSvg.repeat(rv.stars);
    document.getElementById('rv-modal-dish').textContent = rv.dish;
    document.getElementById('rv-modal-text').textContent = `"${rv.text}"`;
    const mp = modal.querySelector('.rv-player');
    if (mp) { mp.dataset.playing = '0'; mp.querySelector('.rv-play-icon').textContent = '▶'; }
    modal.querySelectorAll('#rv-wave-modal .rv-bar').forEach(b => b.style.opacity = '0.22');
    document.getElementById('rv-time-modal').textContent = '0:00';
    modal.classList.remove('hidden'); modal.classList.add('flex');
}
function rvCloseModal() {
    const modal = document.getElementById('rv-modal');
    const mp = modal.querySelector('.rv-player[data-playing="1"]');
    if (mp) rvStopPlayer(mp, 'modal');
    modal.classList.add('hidden'); modal.classList.remove('flex');
}
</script>
@endpush
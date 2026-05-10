<div x-data="{
        scrolled: false,
        init() {
            window.addEventListener('scroll', () => {
                this.scrolled = window.pageYOffset > 20;
            });
            this.scrolled = window.pageYOffset > 20;
        }
    }" 
    class="fixed top-0 inset-x-0 z-50 transition-all duration-500 ease-out pointer-events-none flex justify-center"
    :class="scrolled ? 'pt-2 sm:pt-4 px-2 sm:px-4' : 'pt-0 px-0'">

    {{-- Main Navbar Container --}}
    <nav class="relative flex items-center justify-between transition-all duration-500 ease-out pointer-events-auto w-full"
         :class="scrolled 
             ? 'max-w-6xl bg-[#0f1e3a]/90 backdrop-blur-xl border border-white/10 shadow-[0_8px_30px_rgb(0,0,0,0.5)] rounded-full h-[64px] px-3 sm:px-5' 
             : 'max-w-[1920px] bg-[#0f1e3a]/95 md:bg-slate-900/95 backdrop-blur-md border-b border-white/10 shadow-lg rounded-none h-[72px] px-2 sm:px-8 lg:px-12'">

        {{-- ═══ Logo Area ═══ --}}
        <a href="{{ route('beranda') }}" wire:navigate class="flex items-center justify-center gap-2 shrink-0 mr-1 sm:mr-4 z-50 group">

            <div class="relative flex items-center justify-center transition-all duration-500 shrink-0"
                 :class="scrolled ? 'w-10 h-10 md:w-11 md:h-11 ml-0 md:ml-0' : 'w-12 h-12 md:w-16 md:h-16 ml-0 md:ml-0'">
                 <img src="{{ asset('images/Mahakam_Ulu.webp') }}"
                      alt="Logo Mahulu"
                      class="w-full h-full object-contain filter drop-shadow-md group-hover:scale-110 transition-transform duration-500" />
            </div>
            
            <div class="flex flex-col justify-center transition-all duration-500 overflow-hidden"
                 :class="scrolled ? 'w-0 opacity-0 hidden' : 'hidden md:flex w-auto opacity-100'">
                <h1 class="font-montserrat font-black text-white leading-[1.2] tracking-wider text-[11px] lg:text-[13px] drop-shadow-md whitespace-nowrap">BADAN PERENCANAAN PEMBANGUNAN,<br>PENELITIAN DAN PENGEMBANGAN DAERAH</h1>
                <p class="font-bold text-yellow-400 tracking-[0.2em] uppercase leading-none mt-1.5 text-[9px] lg:text-[10px] drop-shadow whitespace-nowrap">KAB. MAHAKAM ULU</p>
            </div>

            <div class="flex md:hidden flex-col justify-center transition-all duration-500"
                 :class="scrolled ? 'w-0 opacity-0 pointer-events-none overflow-hidden' : 'w-auto opacity-100'">
                <h1 class="font-montserrat font-bold text-white leading-[1.2] tracking-wide text-[8px] drop-shadow-md whitespace-nowrap">BADAN PERENCANAAN PEMBANGUNAN,<br>PENELITIAN DAN PENGEMBANGAN DAERAH</h1>
                <p class="font-bold text-yellow-400 tracking-wider uppercase leading-none mt-1 text-[7px] drop-shadow whitespace-nowrap">KAB. MAHAKAM ULU</p>
            </div>
        </a>

        {{-- ═══ CENTER: Desktop = Menu Nav, Mobile = Tagline ═══ --}}
        <div class="flex-1 flex justify-center items-center h-full relative">

            {{-- ── DESKTOP MENU (tersembunyi di mobile) ── --}}
            @php
                $menuItems = [
                    ['label' => 'Beranda', 'href' => '/', 'icon' => '<svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>'],
                    ['label' => 'Profil', 'type' => 'dropdown', 'icon' => '<svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>', 'items' => [
                        ['label' => 'Visi & Misi', 'href' => '/profil/visi-misi'],
                        ['label' => 'Tujuan & Sasaran', 'href' => '/profil/tujuan-sasaran'],
                        ['label' => 'Profil Pimpinan', 'href' => '/profil/pimpinan'],
                        ['label' => 'Aparatur', 'href' => '/profil/aparatur'],
                        ['label' => 'Motto & Maklumat', 'href' => '/profil/motto'],
                        ['label' => 'Penghargaan', 'href' => '/profil/penghargaan'],
                        ['label' => 'Struktur', 'href' => '/profil/struktur'],
                    ]],
                    ['label' => 'Berita', 'href' => '/berita', 'icon' => '<svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>'],
                    ['label' => 'Regulasi', 'type' => 'dropdown', 'icon' => '<svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg>', 'items' => [
                        ['label' => 'Undang-Undang', 'href' => '/regulasi/undang-undang'],
                        ['label' => 'Peraturan Menteri', 'href' => '/regulasi/peraturan-menteri'],
                        ['label' => 'Peraturan Daerah', 'href' => '/regulasi/peraturan-daerah'],
                        ['label' => 'Peraturan Bupati', 'href' => '/regulasi/peraturan-bupati'],
                        ['label' => 'SK Bupati', 'href' => '/regulasi/sk-bupati'],
                        ['label' => 'SK Kepala', 'href' => '/regulasi/sk-kepala'],
                        ['label' => 'Lain-lain', 'href' => '/regulasi/lain-lain'],
                    ]],
                    ['label' => 'Dokumen', 'type' => 'dropdown', 'icon' => '<svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H7a2 2 0 00-2 2v12z"/></svg>', 'items' => [
                        ['label' => 'RENSTRA', 'href' => '/dokumen/renstra'],
                        ['label' => 'RENJA', 'href' => '/dokumen/renja'],
                        ['label' => 'DPA', 'href' => '/dokumen/dpa'],
                        ['label' => 'IKU', 'href' => '/dokumen/iku'],
                        ['label' => 'SOP', 'href' => '/dokumen/sop'],
                        ['label' => 'Laporan LKjIP', 'href' => '/dokumen/sakip'],
                        ['label' => 'RKPD', 'href' => '/dokumen/rkpd'],
                        ['label' => 'RPJPD', 'href' => '/dokumen/rpjpd'],
                        ['label' => 'RPJMD', 'href' => '/dokumen/rpjmd'],
                    ]],
                    ['label' => 'Layanan', 'type' => 'dropdown', 'icon' => '<svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>', 'items' => [
                        ['label' => 'Pengaduan Publik', 'href' => '/layanan/pengaduan'],
                        ['label' => 'Cek Status Laporan', 'href' => '/layanan/cek-status'],
                        ['label' => 'Survey Kepuasan', 'href' => '/layanan/survey'],
                        ['label' => 'WBS (Whistleblowing)', 'href' => '/layanan/wbs'],
                    ]],
                ];
            @endphp

            <ul class="hidden md:flex items-center justify-center gap-1 sm:gap-2 m-0 h-full w-full px-1">
                @foreach($menuItems as $item)
                    @php
                        $hasDropdown = isset($item['type']) && $item['type'] === 'dropdown';
                        $isActive = request()->is(ltrim($item['href'] ?? '', '/')) || (isset($item['href']) && request()->is('/') && $item['href'] === '/');
                        if ($hasDropdown) {
                            foreach($item['items'] as $sub) {
                                if (request()->is(ltrim($sub['href'], '/')) && $sub['href'] != '#') {
                                    $isActive = true; break;
                                }
                            }
                        }
                    @endphp
                    <li class="h-full flex items-center relative shrink-0"
                        @if($hasDropdown) x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" @click.away="open = false" @endif>

                        @if($hasDropdown)
                            <button @click="open = !open"
                                class="relative flex items-center justify-center gap-1.5 transition-all duration-300 outline-none rounded-full h-10 px-4 shrink-0 cursor-pointer border border-transparent
                                       {{ $isActive ? 'bg-blue-600 text-white shadow-md shadow-blue-900/50' : 'text-slate-300 hover:text-white hover:bg-white/10 hover:border-white/5' }}"
                                aria-label="{{ $item['label'] }}">
                                <span class="font-semibold uppercase tracking-wider text-[11px] lg:text-[13px] whitespace-nowrap">{{ $item['label'] }}</span>
                                <svg class="w-3 h-3 transition-transform duration-300 ml-0.5" :class="open ? 'rotate-180 text-sky-400' : 'opacity-70'" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7" /></svg>
                                @if($isActive)<span class="absolute -bottom-3 left-1/2 -translate-x-1/2 w-6 h-1 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-t-lg" :class="scrolled ? 'opacity-0' : 'opacity-100'"></span>@endif
                            </button>
                        @else
                            <a href="{{ $item['href'] }}" wire:navigate
                                class="relative flex items-center justify-center gap-1.5 transition-all duration-300 outline-none rounded-full h-10 px-4 shrink-0 cursor-pointer border border-transparent
                                       {{ $isActive ? 'bg-blue-600 text-white shadow-md shadow-blue-900/50' : 'text-slate-300 hover:text-white hover:bg-white/10 hover:border-white/5' }}"
                                aria-label="{{ $item['label'] }}">
                                <span class="font-semibold uppercase tracking-wider text-[11px] lg:text-[13px] whitespace-nowrap">{{ $item['label'] }}</span>
                                @if($isActive)<span class="absolute -bottom-3 left-1/2 -translate-x-1/2 w-6 h-1 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-t-lg" :class="scrolled ? 'opacity-0' : 'opacity-100'"></span>@endif
                            </a>
                        @endif

                        @if($hasDropdown)
                            <div x-show="open" x-cloak
                                 x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                 x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 scale-100" x-transition:leave-end="opacity-0 translate-y-4 scale-95"
                                 class="absolute top-[calc(100%+12px)] left-1/2 -translate-x-1/2 min-w-[200px] md:min-w-[240px] bg-[#0b1a35]/95 backdrop-blur-2xl border border-blue-500/20 rounded-2xl shadow-[0_20px_50px_-15px_rgba(0,0,0,0.8)] p-2 z-[60] origin-top w-max"
                                 style="box-shadow: 0 10px 40px -10px rgba(0,0,0,0.8);">
                                 <div class="absolute -top-2 left-1/2 -translate-x-1/2 w-4 h-4 bg-[#0b1a35]/95 border-t border-l border-blue-500/20 rotate-45"></div>
                                 <ul class="flex flex-col gap-1 w-full m-0 p-0 list-none relative z-10">
                                     @foreach($item['items'] as $sub)
                                     <li>
                                         <a href="{{ $sub['href'] }}" wire:navigate @click="open = false"
                                            class="flex items-center px-4 py-2.5 rounded-xl text-[13px] font-medium transition-all whitespace-nowrap {{ request()->is(ltrim($sub['href'], '/')) && $sub['href'] != '#' ? 'bg-blue-500/20 text-blue-400 font-bold' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                                             {{ $sub['label'] }}
                                         </a>
                                     </li>
                                     @endforeach
                                 </ul>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>

            {{-- ── MOBILE CENTER (tersembunyi di desktop) ── --}}
            <div class="md:hidden flex flex-col items-center justify-center transition-all duration-300 relative w-full">

                {{-- Saat TIDAK scroll: tampilkan tagline --}}
                <div class="absolute inset-0 flex flex-col items-center justify-center transition-all duration-300"
                     :class="scrolled ? 'opacity-0 pointer-events-none scale-90' : 'opacity-100 scale-100'">
                    <p class="font-semibold text-white/70 tracking-wide uppercase text-[8px] whitespace-nowrap drop-shadow leading-tight">
                        Perencanaan <span class="text-yellow-400 font-bold">Inovatif</span> &amp; <span class="text-yellow-400 font-bold">Berkelanjutan</span>
                    </p>
                </div>

                <div class="flex flex-col items-center justify-center transition-all duration-300"
                     :class="scrolled ? 'opacity-100 scale-100' : 'opacity-0 pointer-events-none scale-90'">
                    <p class="font-montserrat font-bold text-white text-center text-[7.5px] tracking-wider whitespace-nowrap leading-[1.3] drop-shadow">BADAN PERENCANAAN PEMBANGUNAN,<br>PENELITIAN DAN PENGEMBANGAN DAERAH</p>
                    <p class="font-bold text-yellow-400 text-[6px] tracking-widest uppercase leading-none mt-1 whitespace-nowrap drop-shadow">KAB. MAHAKAM ULU</p>
                </div>

            </div>
        </div>

        {{-- ═══ Right: Desktop = "Akses PPID" text, Mobile = ikon PPID ═══ --}}
        <div class="flex items-center gap-2 shrink-0 ml-1 sm:ml-2 z-50">

            {{-- Desktop --}}
            <a href="/ppid/permohonan" wire:navigate
               class="hidden md:inline-flex items-center justify-center transition-all duration-300 shadow-lg hover:shadow-xl group whitespace-nowrap"
               :class="scrolled
                   ? 'px-5 py-2 rounded-full bg-gradient-to-r from-yellow-400 to-amber-500 text-slate-900 font-bold text-xs hover:scale-105 border border-yellow-300/50'
                   : 'px-6 py-2.5 rounded-full bg-gradient-to-r from-yellow-500 to-amber-500 font-bold text-sm text-slate-900 border border-yellow-300/50 hover:bg-yellow-400 shadow-[0_0_15px_rgba(234,179,8,0.3)]'">
                <span class="group-hover:tracking-wide transition-all duration-300">Akses PPID</span>
            </a>

            <a href="/portal" wire:navigate
               class="hidden md:inline-flex items-center justify-center transition-all duration-300 shadow-lg hover:shadow-xl group whitespace-nowrap"
               :class="scrolled
                   ? 'px-5 py-2 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-bold text-xs hover:scale-105 border border-blue-400/30'
                   : 'px-6 py-2.5 rounded-full bg-gradient-to-r from-blue-600 to-indigo-700 font-bold text-sm text-white border border-blue-400/30 hover:brightness-110 shadow-[0_0_15px_rgba(37,99,235,0.3)]'">
                <span class="group-hover:tracking-wide transition-all duration-300">Menu Portal</span>
            </a>

            {{-- Mobile: pill dengan ikon + label --}}
            <a href="/ppid/permohonan" wire:navigate
               class="md:hidden flex items-center gap-1.5 transition-all duration-300 active:scale-95"
               :class="scrolled
                   ? 'px-2.5 py-1.5 rounded-full bg-gradient-to-r from-yellow-400 to-amber-500 text-slate-900 border border-yellow-300/50 shadow-md'
                   : 'px-2.5 py-1.5 rounded-full bg-gradient-to-r from-yellow-500 to-amber-500 text-slate-900 border border-yellow-300/50 shadow-[0_0_12px_rgba(234,179,8,0.35)]'">
                {{-- Ikon dokumen informasi --}}
                <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                <span class="font-black text-[10px] tracking-widest leading-none">PPID</span>
            </a>

        </div>
    </nav>
</div>

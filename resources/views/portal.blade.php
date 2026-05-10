<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Portal Resmi Bappelitbangda Kabupaten Mahakam Ulu — Akses layanan e-Government, informasi publik, dan sistem digital terintegrasi.">
    <title>Portal — Bappelitbangda Kabupaten Mahakam Ulu</title>
    <link rel="icon" href="{{ asset('images/Mahakam_Ulu.webp') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        :root {
            --portal-bg:      #060f1e;
            --portal-surface: #0a1628;
            --portal-surf2:   #0f2040;
        }
        html, body { background-color: var(--portal-bg); color: #e2e8f0; font-family: 'Inter', sans-serif; margin:0; padding:0; }

        /* Blue-gold stripe */
        .blue-stripe {
            height: 4px;
            background: linear-gradient(90deg,
                #38bdf8 0%,   #38bdf8 25%,
                #f0b429 25%,  #f0b429 50%,
                #1d6fa4 50%,  #1d6fa4 75%,
                #f0b429 75%,  #f0b429 100%
            );
        }

        .portal-card { transition: transform .3s cubic-bezier(0.4,0,.2,1), box-shadow .3s ease; }
        .portal-card:hover { transform: translateY(-5px); }

        .app-card {
            background: var(--portal-surface);
            border: 1px solid rgba(56,189,248,0.08);
            border-radius: 16px;
            transition: all .25s ease;
            cursor: pointer;
        }
        .app-card:hover {
            background: var(--portal-surf2);
            border-color: rgba(56,189,248,0.35);
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(29,111,164,0.3);
        }
        .app-card:hover .app-icon { border-color: rgba(56,189,248,0.4); background: rgba(56,189,248,0.1); }
        .app-icon { background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); transition: all .25s; }

        .cat-pill { border: 1px solid rgba(255,255,255,0.1); color:#94a3b8; background:transparent; transition: all .2s ease; }
        .cat-pill:hover { color:#e2e8f0; border-color:rgba(56,189,248,0.4); }
        .cat-pill.active { background: linear-gradient(135deg,#1d6fa4,#38bdf8); color:white; border-color:transparent; font-weight:700; box-shadow:0 4px 12px rgba(29,111,164,0.4); }

        .ann-dot { background:rgba(255,255,255,0.25); width:8px; height:8px; border-radius:4px; transition:all .3s; }
        .ann-dot.active { background:#38bdf8; width:20px; }

        @keyframes stat-glow { 0%,100%{text-shadow:0 0 20px rgba(56,189,248,0)} 50%{text-shadow:0 0 20px rgba(56,189,248,0.4)} }
        .stat-num { animation: stat-glow 3s ease-in-out infinite; }

        .section-badge { background:rgba(56,189,248,0.08); color:#38bdf8; border:1px solid rgba(56,189,248,0.2); }
        .sec-div { height:3px; background:linear-gradient(90deg,#1d6fa4,#38bdf8,#f0b429); }
    </style>
</head>
<body>

{{-- ══════════════════════════════ HERO: IMAGE SLIDER ══════════════════════════════ --}}
<section class="relative w-full overflow-hidden" style="height:530px;background:#030810;"
    x-data="{
        active:0,
        imgs:[
          'https://images.unsplash.com/photo-1596005554384-d293674c91d7?q=80&w=2600&auto=format&fit=crop',
          'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?q=80&w=2600&auto=format&fit=crop',
          'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=2600&auto=format&fit=crop',
          'https://images.unsplash.com/photo-1465146344425-f00d5f5c8f07?q=80&w=2600&auto=format&fit=crop',
        ],
        init(){setInterval(()=>this.next(),5000)},
        prev(){this.active=(this.active-1+this.imgs.length)%this.imgs.length},
        next(){this.active=(this.active+1)%this.imgs.length},
    }" x-init="init()">

    {{-- images --}}
    <template x-for="(img,i) in imgs" :key="i">
        <div x-show="active===i"
             x-transition:enter="transition-all duration-[1200ms] ease-in-out"
             x-transition:enter-start="opacity-0 scale-[1.06]"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition-all duration-[800ms]"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute inset-0">
            <img :src="img" alt="Mahakam Ulu" class="w-full h-full object-cover">
        </div>
    </template>

    {{-- gradient overlay --}}
    <div class="absolute inset-0 z-10 pointer-events-none"
         style="background:linear-gradient(to bottom,rgba(6,15,30,0.82) 0%,rgba(6,15,30,0.1) 40%,rgba(6,15,30,0.7) 80%,rgba(6,15,30,0.97) 100%)"></div>

    {{-- top stripe --}}
    <div class="blue-stripe absolute top-0 left-0 w-full z-30"></div>

    {{-- topbar --}}
    <div class="relative z-30 w-full border-b" style="background:rgba(6,15,30,0.6);border-color:rgba(56,189,248,0.1);backdrop-filter:blur(12px)">
        <div class="container mx-auto max-w-6xl px-6 h-12 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/Mahakam_Ulu.webp') }}" alt="Logo" class="h-7 w-auto opacity-90">
                <span class="font-montserrat font-black text-white text-sm tracking-wider hidden sm:block">BAPPELITBANGDA</span>
                <span class="text-slate-500 text-xs hidden md:block">Kabupaten Mahakam Ulu</span>
            </div>
            <div class="flex items-center gap-4 text-xs text-slate-400">
                <a href="{{ route('beranda') }}" class="hover:text-sky-400 transition-colors hidden sm:block">Beranda</a>
                <a href="{{ route('ppid.permohonan') }}" class="hover:text-sky-400 transition-colors hidden sm:block">PPID</a>
                <span id="portal-clock" class="font-mono text-slate-500 tabular-nums hidden md:block"></span>
            </div>
        </div>
    </div>

    {{-- bottom overlay --}}
    <div class="absolute bottom-0 left-0 right-0 z-20 pb-7">
        <div class="container mx-auto max-w-6xl px-6 flex flex-col lg:flex-row items-end justify-between gap-6">

            {{-- identity + CTA --}}
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <img src="{{ asset('images/Mahakam_Ulu.webp') }}" alt="Logo" class="h-11 w-auto drop-shadow-2xl">
                    <div class="border-l-2 pl-3" style="border-color:rgba(56,189,248,0.6)">
                        <p class="font-montserrat font-black text-white text-lg tracking-wider leading-none">BAPPELITBANGDA</p>
                        <p class="text-[10px] uppercase tracking-[0.2em] mt-0.5 text-sky-400 font-semibold">Kabupaten Mahakam Ulu</p>
                    </div>
                </div>
                <h1 class="font-montserrat font-black text-white text-3xl sm:text-4xl leading-tight mb-3" style="text-shadow:0 3px 20px rgba(0,0,0,0.9)">
                    Portal Resmi<br><span class="text-sky-300">Pemerintah Daerah</span>
                </h1>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('beranda') }}" class="portal-card inline-flex items-center gap-2 px-6 py-2.5 rounded-full font-bold text-sm text-white"
                       style="background:linear-gradient(135deg,#1d6fa4,#38bdf8);box-shadow:0 6px 18px rgba(29,111,164,0.5)">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Kunjungi Website
                    </a>
                    <a href="{{ route('ppid.permohonan') }}" class="portal-card inline-flex items-center gap-2 px-6 py-2.5 rounded-full font-bold text-sm text-white border"
                       style="background:rgba(255,255,255,0.07);border-color:rgba(56,189,248,0.35);backdrop-filter:blur(8px)">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Akses PPID
                    </a>
                </div>
            </div>

            {{-- stats + controls --}}
            <div class="flex flex-col items-center lg:items-end gap-3">
                <div class="flex flex-wrap gap-2 justify-end">
                    @php $qs=[['num'=>'8','label'=>'Kecamatan','c'=>'#38bdf8'],['num'=>'34K','label'=>'Jiwa','c'=>'#7dd3fc'],['num'=>'26K','label'=>'km² Wilayah','c'=>'#f0b429'],['num'=>'10+','label'=>'Aplikasi','c'=>'#c4b5fd']]; @endphp
                    @foreach($qs as $s)
                    <div class="px-4 py-2 rounded-xl text-center" style="background:rgba(6,15,30,0.65);border:1px solid rgba(255,255,255,0.07);backdrop-filter:blur(8px)">
                        <p class="font-montserrat font-black text-lg text-white leading-none">{{ $s['num'] }}</p>
                        <p class="text-[10px] mt-0.5 font-semibold" style="color:{{ $s['c'] }}">{{ $s['label'] }}</p>
                    </div>
                    @endforeach
                </div>
                <div class="flex items-center gap-3">
                    <button @click="prev()" class="w-8 h-8 rounded-full flex items-center justify-center text-white border transition-all hover:border-sky-400 hover:text-sky-400" style="background:rgba(255,255,255,0.07);border-color:rgba(255,255,255,0.15);backdrop-filter:blur(8px)">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <div class="flex gap-1.5">
                        <template x-for="(x,i) in imgs" :key="i">
                            <button @click="active=i" :class="active===i?'w-5 bg-sky-400':'w-2 bg-white/30 hover:bg-white/60'" class="h-2 rounded-full transition-all duration-300"></button>
                        </template>
                    </div>
                    <button @click="next()" class="w-8 h-8 rounded-full flex items-center justify-center text-white border transition-all hover:border-sky-400 hover:text-sky-400" style="background:rgba(255,255,255,0.07);border-color:rgba(255,255,255,0.15);backdrop-filter:blur(8px)">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                    <span class="text-slate-600 text-xs font-mono"><span x-text="active+1"></span>/<span x-text="imgs.length"></span></span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════ QUICK ACCESS CARDS ══════════════════════════════ --}}
<section class="py-7 px-4" style="background:var(--portal-bg)">
    <div class="container mx-auto max-w-6xl">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

            <a href="{{ route('beranda') }}" class="portal-card group block rounded-2xl p-5 border relative overflow-hidden" style="background:var(--portal-surface);border-color:rgba(56,189,248,0.15)">
                <div class="absolute top-0 right-0 w-36 h-36 rounded-full blur-[60px] opacity-0 group-hover:opacity-20 transition-opacity duration-500 pointer-events-none" style="background:#38bdf8"></div>
                <div class="flex items-start gap-4 relative z-10">
                    <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0" style="background:rgba(56,189,248,0.1);border:1px solid rgba(56,189,248,0.25)">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="#38bdf8" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    </div>
                    <div>
                        <h3 class="font-montserrat font-bold text-white text-base mb-1 group-hover:text-sky-300 transition-colors">Website Resmi</h3>
                        <p class="text-slate-500 text-xs leading-relaxed">Berita, informasi publik & agenda kegiatan dinas</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-1 text-xs font-bold text-sky-500 relative z-10">Kunjungi <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg></div>
            </a>

            <a href="{{ route('ppid.permohonan') }}" class="portal-card group block rounded-2xl p-5 border relative overflow-hidden" style="background:var(--portal-surface);border-color:rgba(240,180,41,0.15)">
                <div class="absolute top-0 right-0 w-36 h-36 rounded-full blur-[60px] opacity-0 group-hover:opacity-20 transition-opacity duration-500 pointer-events-none" style="background:#f0b429"></div>
                <div class="flex items-start gap-4 relative z-10">
                    <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0" style="background:rgba(240,180,41,0.1);border:1px solid rgba(240,180,41,0.25)">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="#f0b429" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-montserrat font-bold text-white text-base mb-1 group-hover:text-yellow-300 transition-colors">PPID</h3>
                        <p class="text-slate-500 text-xs leading-relaxed">Permohonan informasi publik, hak warga atas data</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-1 text-xs font-bold text-yellow-500 relative z-10">Akses PPID <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg></div>
            </a>

            <a href="{{ route('layanan.pengaduan') }}" class="portal-card group block rounded-2xl p-5 border relative overflow-hidden" style="background:var(--portal-surface);border-color:rgba(167,139,250,0.15)">
                <div class="absolute top-0 right-0 w-36 h-36 rounded-full blur-[60px] opacity-0 group-hover:opacity-20 transition-opacity duration-500 pointer-events-none" style="background:#a78bfa"></div>
                <div class="flex items-start gap-4 relative z-10">
                    <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0" style="background:rgba(167,139,250,0.1);border:1px solid rgba(167,139,250,0.25)">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="#a78bfa" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-montserrat font-bold text-white text-base mb-1 group-hover:text-violet-300 transition-colors">Pengaduan</h3>
                        <p class="text-slate-500 text-xs leading-relaxed">Sampaikan aspirasi & keluhan kepada pemerintah daerah</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-1 text-xs font-bold text-violet-400 relative z-10">Sampaikan <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg></div>
            </a>
        </div>
    </div>
</section>

{{-- ══════════════════════════════ SLIDER PENGUMUMAN (dengan gambar) ══════════════════════════════ --}}
<section class="py-10 px-4 border-t" style="background:var(--portal-surface);border-color:rgba(56,189,248,0.07)"
    x-data="{
        active:0, timer:null,
        items:[
            { tag:'Pengumuman', color:'#f0b429', date:'03 Mar 2026',
              img:'https://images.unsplash.com/photo-1577563908411-5077b6923f38?q=80&w=800&auto=format&fit=crop',
              title:'Jadwal Musrenbang Kecamatan Tahun 2026 Telah Ditetapkan',
              desc:'Seluruh kecamatan diundang untuk mengikuti Musrenbang Kecamatan Tahun 2026 sesuai jadwal melalui Surat Keputusan Bupati.' },
            { tag:'Info Terkini', color:'#38bdf8', date:'27 Feb 2026',
              img:'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=800&auto=format&fit=crop',
              title:'Pendaftaran E-Planning Periode Maret 2026 Resmi Dibuka',
              desc:'Bappelitbangda membuka pendaftaran aplikasi E-Planning bagi seluruh OPD di lingkungan Pemkab Mahakam Ulu. Batas: 15 Maret 2026.' },
            { tag:'Unduhan', color:'#a78bfa', date:'20 Feb 2026',
              img:'https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop',
              title:'Laporan RKP Daerah TA 2025 Telah Dipublikasikan',
              desc:'Dokumen RKPD Kabupaten Mahakam Ulu TA 2025 kini tersedia untuk diunduh di halaman Dokumen pada website resmi Bappelitbangda.' },
            { tag:'Rekrutmen', color:'#34d399', date:'15 Feb 2026',
              img:'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=800&auto=format&fit=crop',
              title:'Rekrutmen Pendamping Desa Tahun 2026 Dibuka',
              desc:'Pemkab Mahakam Ulu membuka rekrutmen Pendamping Desa 2026. Silakan periksa persyaratan dan daftarkan diri melalui portal resmi Dinas PMD.' },
        ],
        init()  { this.timer=setInterval(()=>this.next(),6000); },
        stop()  { clearInterval(this.timer); },
        resume(){ this.stop(); this.timer=setInterval(()=>this.next(),6000); },
        next()  { this.active=(this.active+1)%this.items.length; },
        prev()  { this.active=(this.active-1+this.items.length)%this.items.length; },
        goTo(i) { this.active=i; },
    }" x-init="init()">

    <div class="container mx-auto max-w-6xl">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6">
            <div>
                <span class="inline-block px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest section-badge mb-2">Informasi Terkini</span>
                <h2 class="font-montserrat font-black text-white text-2xl sm:text-3xl leading-tight">Pengumuman & Berita</h2>
                <div class="sec-div w-14 rounded-full mt-2"></div>
            </div>
            <a href="{{ route('berita.index') }}" wire:navigate
               class="text-xs font-bold text-sky-400 hover:text-sky-300 border border-sky-400/30 hover:border-sky-400/60 px-4 py-2 rounded-full flex items-center gap-1 transition-all shrink-0">
                Lihat Semua <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        {{-- Slider --}}
        <div class="rounded-2xl overflow-hidden border relative" style="border-color:rgba(56,189,248,0.12);height:220px;"
             @mouseenter="stop()" @mouseleave="resume()">

            <template x-for="(ann,i) in items" :key="i">
                <div x-show="active===i"
                     x-transition:enter="transition duration-500 ease-out"
                     x-transition:enter-start="opacity-0 translate-x-8"
                     x-transition:enter-end="opacity-100 translate-x-0"
                     x-transition:leave="transition duration-300 ease-in"
                     x-transition:leave-start="opacity-100 translate-x-0"
                     x-transition:leave-end="opacity-0 -translate-x-8"
                     class="absolute inset-0 flex">

                    {{-- ─── GAMBAR (kiri) ─── --}}
                    <div class="hidden lg:block relative overflow-hidden shrink-0" style="width:280px;">
                        <img :src="ann.img" :alt="ann.title" class="w-full h-full object-cover">
                        {{-- gradient ke kanan (blend ke konten) --}}
                        <div class="absolute inset-0" style="background:linear-gradient(to right, transparent 60%, rgba(10,22,40,1) 100%)"></div>
                        {{-- tag badge di atas gambar --}}
                        <div class="absolute top-4 left-4">
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-widest"
                                  :style="`background:${ann.color};color:#060f1e;`"
                                  x-text="ann.tag"></span>
                        </div>
                    </div>

                    {{-- ─── KONTEN (kanan) ─── --}}
                    <div class="flex-1 p-6 lg:p-8 flex flex-col justify-center" style="background:var(--portal-surface)">
                        {{-- mobile tag --}}
                        <div class="flex items-center gap-3 mb-3">
                            <span class="lg:hidden inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider"
                                  :style="`background:rgba(255,255,255,0.05);color:${ann.color};`"
                                  x-text="ann.tag"></span>
                            <span class="flex items-center gap-1.5 text-slate-500 text-xs">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span x-text="ann.date"></span>
                            </span>
                            <span class="ml-auto text-[10px] text-slate-600 font-mono"><span x-text="active+1"></span>/<span x-text="items.length"></span></span>
                        </div>

                        <h3 class="font-montserrat font-black text-white text-xl sm:text-2xl leading-snug mb-2.5" x-text="ann.title"></h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-5 line-clamp-2" x-text="ann.desc"></p>

                        <div class="flex items-center justify-between">
                            <a href="{{ route('berita.index') }}" wire:navigate
                               class="inline-flex items-center gap-2 text-sm font-bold transition-all hover:gap-3"
                               :style="`color:${ann.color}`">
                                Baca Selengkapnya
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>

                            {{-- nav controls --}}
                            <div class="flex items-center gap-2">
                                <div class="flex gap-1.5">
                                    <template x-for="(a,j) in items" :key="'d'+j">
                                        <button @click="goTo(j)" :class="active===j?'ann-dot active':'ann-dot'" class="rounded-full cursor-pointer transition-all duration-300"></button>
                                    </template>
                                </div>
                                <button @click="prev()" class="w-7 h-7 rounded-full flex items-center justify-center border text-slate-400 hover:text-white hover:border-sky-400/60 transition-all" style="background:rgba(255,255,255,0.04);border-color:rgba(255,255,255,0.1)">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                </button>
                                <button @click="next()" class="w-7 h-7 rounded-full flex items-center justify-center border text-slate-400 hover:text-white hover:border-sky-400/60 transition-all" style="background:rgba(255,255,255,0.04);border-color:rgba(255,255,255,0.1)">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>

{{-- ══════════════════════════════ e-GOVERNMENT GRID ══════════════════════════════ --}}
<section class="py-12 px-4 border-t" style="background:var(--portal-bg);border-color:rgba(56,189,248,0.07)"
    x-data="{
        activeCategory:'semua',
        categories:[
            {key:'semua',label:'Semua'},{key:'perencanaan',label:'Perencanaan'},
            {key:'keuangan',label:'Keuangan'},{key:'kepegawaian',label:'Kepegawaian'},
            {key:'pengadaan',label:'Pengadaan'},{key:'regulasi',label:'Regulasi'},
        ],
        apps:[
            {name:'SIPD',       desc:'Sistem Informasi Pemerintahan Daerah',       cat:'perencanaan',link:'#',color:'#38bdf8',icon:'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'},
            {name:'SIMEVLAP',   desc:'Monitoring & Evaluasi Lapangan',             cat:'perencanaan',link:'#',color:'#7dd3fc',icon:'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'},
            {name:'MUSRENBANG', desc:'Musyawarah Perencanaan Pembangunan',         cat:'perencanaan',link:'#',color:'#60a5fa',icon:'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'},
            {name:'E-MUSRENBANG',desc:'Musrenbang Digital Terintegrasi',           cat:'perencanaan',link:'#',color:'#93c5fd',icon:'M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z'},
            {name:'E-PLANNING', desc:'Perencanaan Pembangunan Elektronik',         cat:'perencanaan',link:'#',color:'#bfdbfe',icon:'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01'},
            {name:'E-SSH',      desc:'Standar Satuan Harga Elektronik',            cat:'keuangan',   link:'#',color:'#f0b429',icon:'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'},
            {name:'SIMPEG',     desc:'Sistem Informasi Manajemen Kepegawaian',     cat:'kepegawaian',link:'#',color:'#c4b5fd',icon:'M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2'},
            {name:'LPSE',       desc:'Layanan Pengadaan Secara Elektronik',        cat:'pengadaan',  link:'#',color:'#6ee7b7',icon:'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z'},
            {name:'SiRUP',      desc:'Sistem Informasi Rencana Umum Pengadaan',    cat:'pengadaan',  link:'#',color:'#5eead4',icon:'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'},
            {name:'JDIH',       desc:'Jaringan Dokumentasi & Informasi Hukum',     cat:'regulasi',   link:'#',color:'#fca5a5',icon:'M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3'},
        ],
        get filtered(){ return this.activeCategory==='semua'?this.apps:this.apps.filter(a=>a.cat===this.activeCategory); }
    }">
    <div class="container mx-auto max-w-6xl">
        <div class="text-center mb-8">
            <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-3 section-badge">Sistem Digital Pemerintahan</span>
            <h2 class="font-montserrat font-black text-white text-3xl sm:text-4xl mb-2">e-Government</h2>
            <div class="sec-div w-20 mx-auto rounded-full mb-3"></div>
            <p class="text-slate-500 text-sm max-w-xl mx-auto">Layanan digital terintegrasi — akses cepat, transparan, dan terpercaya</p>
        </div>

        <div class="flex flex-wrap justify-center gap-2 mb-8">
            <template x-for="cat in categories" :key="cat.key">
                <button @click="activeCategory=cat.key"
                        :class="activeCategory===cat.key?'cat-pill active':'cat-pill'"
                        class="px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all duration-200"
                        x-text="cat.label"></button>
            </template>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3">
            <template x-for="app in filtered" :key="app.name+activeCategory">
                <a :href="app.link" class="app-card p-5 flex flex-col items-center text-center group"
                   x-transition:enter="transition duration-300 ease-out"
                   x-transition:enter-start="opacity-0 translate-y-4 scale-95"
                   x-transition:enter-end="opacity-100 translate-y-0 scale-100">
                    <div class="app-icon w-14 h-14 rounded-2xl flex items-center justify-center mb-4 shrink-0">
                        <svg class="w-6 h-6 transition-transform duration-200 group-hover:scale-110" fill="none" viewBox="0 0 24 24" :stroke="app.color" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" :d="app.icon"/>
                        </svg>
                    </div>
                    <h3 class="font-montserrat font-bold text-white text-sm mb-1.5 leading-tight group-hover:text-sky-300 transition-colors" x-text="app.name"></h3>
                    <p class="text-slate-600 text-[11px] leading-snug line-clamp-2" x-text="app.desc"></p>
                    <div class="mt-3 opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg class="w-3.5 h-3.5 mx-auto" fill="none" viewBox="0 0 24 24" :stroke="app.color" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </div>
                </a>
            </template>
        </div>
    </div>
</section>

{{-- ══════════════════════════════ STATS BAND ══════════════════════════════ --}}
<section class="py-12 px-4 border-t" style="background:linear-gradient(135deg,var(--portal-surface),#0d2040);border-color:rgba(56,189,248,0.07)">
    <div class="container mx-auto max-w-6xl">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 text-center">
            @php $stats=[['val'=>'92%','label'=>'Capaian Infrastruktur 2025','color'=>'#38bdf8'],['val'=>'88%','label'=>'Capaian Kesehatan 2025','color'=>'#7dd3fc'],['val'=>'10+','label'=>'Aplikasi e-Government','color'=>'#f0b429'],['val'=>'2008','label'=>'Tahun Pembentukan Dinas','color'=>'#c4b5fd']]; @endphp
            @foreach($stats as $st)
            <div>
                <p class="font-montserrat font-black text-4xl sm:text-5xl stat-num" style="color:{{ $st['color'] }}">{{ $st['val'] }}</p>
                <p class="text-slate-500 text-xs sm:text-sm mt-1.5 leading-snug">{{ $st['label'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FOOTER --}}
<footer class="py-5 px-4 border-t" style="background:#030810;border-color:rgba(56,189,248,0.06)">
    <div class="container mx-auto max-w-6xl flex flex-col sm:flex-row items-center justify-between gap-3">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/Mahakam_Ulu.webp') }}" alt="Logo" class="h-7 w-auto opacity-70">
            <span class="text-slate-600 text-xs">&copy; {{ date('Y') }} <span class="text-slate-400 font-semibold">Bappelitbangda Kab. Mahakam Ulu</span></span>
        </div>
        <div class="flex items-center gap-4 text-xs text-slate-600">
            <a href="{{ route('beranda') }}" class="hover:text-sky-400 transition-colors">Beranda</a>
            <span>•</span>
            <a href="{{ route('ppid.permohonan') }}" class="hover:text-sky-400 transition-colors">PPID</a>
            <span>•</span>
            <span>UU KIP No. 14 Tahun 2008</span>
        </div>
    </div>
    <div class="blue-stripe w-full max-w-xs mx-auto mt-4 rounded-full opacity-40"></div>
</footer>

<script>
(function(){
    const el=document.getElementById('portal-clock');
    if(!el)return;
    const d=['Min','Sen','Sel','Rab','Kam','Jum','Sab'];
    const m=['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];
    function tick(){const n=new Date();el.textContent=`${d[n.getDay()]}, ${n.getDate()} ${m[n.getMonth()]} ${n.getFullYear()}  ${String(n.getHours()).padStart(2,'0')}:${String(n.getMinutes()).padStart(2,'0')} WITA`;}
    tick();setInterval(tick,1000);
})();
</script>
</body>
</html>

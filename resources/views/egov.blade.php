<x-layouts.app>
    <x-slot name="pageTitle">
        e-Gov | Bappelitbangda Mahakam Ulu
    </x-slot>

    <x-slot name="metaDescription">
        e-Gov Bappelitbangda Kabupaten Mahakam Ulu. Akses aplikasi pemerintahan digital dan layanan terintegrasi dalam satu halaman.
    </x-slot>

    @php
        $allLinks = collect($allLinks ?? []);
        $serviceCount = $allLinks->count();
        $externalCount = $allLinks->filter(fn ($item) => filled($item['link'] ?? null) && ($item['link'] ?? '#') !== '#')->count();
    @endphp

    <style>
        .egov-card {
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .egov-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.12);
        }

        .egov-grid-card {
            background: linear-gradient(180deg, rgba(255,255,255,0.98) 0%, rgba(248,250,252,0.98) 100%);
        }

        .egov-grid-card:hover {
            border-color: rgba(14, 165, 233, 0.35);
        }
    </style>

    <section class="relative pt-[100px] pb-20 overflow-hidden bg-slate-900">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute inset-0 z-0 opacity-75">
                <img src="{{ asset('images/desamahakamulu.jpg') }}" alt="Mahakam Ulu" class="w-full h-full object-cover">
            </div>
            <img src="{{ asset('images/Desain tanpa judul.svg') }}" alt="" class="absolute inset-0 w-full h-full object-cover z-0 opacity-10 mix-blend-screen" loading="eager">
            <div class="absolute inset-0 bg-gradient-to-br from-slate-950/90 via-sky-950/75 to-sky-700/55 z-10"></div>
            <svg class="absolute inset-0 w-full h-full" viewBox="0 0 1440 400" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="egovFlow" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" stop-color="#FBBF24" stop-opacity="0"/>
                        <stop offset="35%" stop-color="#FBBF24" stop-opacity="0.2"/>
                        <stop offset="65%" stop-color="#38BDF8" stop-opacity="0.22"/>
                        <stop offset="100%" stop-color="#38BDF8" stop-opacity="0"/>
                    </linearGradient>
                </defs>
                <path d="M-80,185 C180,115 360,245 710,155 S1090,95 1510,195" fill="none" stroke="url(#egovFlow)" stroke-width="2"/>
            </svg>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
            <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/5 border border-white/10 text-white text-[10px] font-bold tracking-[0.2em] uppercase backdrop-blur-sm shadow-xl mb-6">
                    <div class="relative flex h-2 w-2 mr-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-sky-500"></span>
                    </div>
                    Sistem Digital Pemerintahan
                </div>

                <h1 class="font-montserrat font-black text-4xl sm:text-5xl lg:text-6xl text-white leading-tight drop-shadow-2xl">
                    Layanan <span class="text-transparent bg-clip-text" style="background-image: linear-gradient(135deg, #FBBF24 0%, #38BDF8 55%, #0EA5E9 100%);">e-Gov</span>
                </h1>

                <div class="mt-8 flex items-center justify-center gap-2 text-sm text-white/50">
                    <a href="{{ route('beranda') }}" class="hover:text-yellow-400 transition-colors">Beranda</a>
                    <span>/</span>
                    <span class="text-yellow-400">e-Gov</span>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 z-20">
            <svg viewBox="0 0 1440 60" preserveAspectRatio="none" class="w-full h-14 fill-instansi-surface">
                <path d="M0,60 C360,0 1080,0 1440,60 L1440,60 L0,60 Z"/>
            </svg>
        </div>
    </section>

    <div class="bg-instansi-surface relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 pb-8">
           
        </div>

        <section class="pb-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div id="daftar-aplikasi" class="bg-white rounded-3xl shadow-xl border border-slate-100 p-8 sm:p-10" data-aos="fade-up">
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
                        @forelse($allLinks as $app)
                            <a href="{{ $app['link'] }}" target="_blank" rel="noopener noreferrer" class="egov-grid-card egov-card group rounded-2xl border border-slate-200 p-6 flex flex-col items-center text-center">
                                <div class="w-20 h-20 rounded-2xl bg-slate-50 border border-slate-200 p-3 flex items-center justify-center mb-4 transition group-hover:border-sky-200 group-hover:bg-sky-50">
                                    <img src="{{ $app['logo'] }}" alt="{{ $app['name'] }}" class="w-full h-full object-contain transition-transform duration-200 group-hover:scale-110">
                                </div>
                                <h3 class="text-base font-bold text-slate-800 leading-snug group-hover:text-sky-700 transition-colors">{{ $app['name'] }}</h3>
                                <p class="mt-2 text-sm text-slate-500 leading-relaxed line-clamp-3">{{ $app['desc'] }}</p>
                                <span class="mt-4 inline-flex items-center gap-2 text-sm font-bold text-sky-700">
                                    Buka Aplikasi
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </span>
                            </a>
                        @empty
                            <div class="col-span-full rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-6 py-12 text-center">
                                <p class="text-lg font-bold text-slate-800">Belum ada aplikasi e-Gov</p>
                                <p class="mt-2 text-sm text-slate-500">Tambahkan data layanan aktif agar daftar aplikasi tampil otomatis pada halaman ini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.app>
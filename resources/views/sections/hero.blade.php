<!-- ============================================ -->
<!-- SECTION 1: SELAMAT DATANG — IDENTITAS MAHULU -->
<!-- ============================================ -->
<style>
    .mask-talawang-inline {
        clip-path: polygon(50% 0%, 100% 15%, 100% 85%, 50% 100%, 0% 85%, 0% 15%);
        transition: clip-path 0.5s ease-in-out;
    }
    .group:hover .mask-talawang-inline-hover {
        clip-path: polygon(50% 0%, 100% 10%, 100% 90%, 50% 100%, 0% 90%, 0% 10%);
    }
    .pattern-dayak-inline {
        background-color: #B45309;
        /* Pattern removed as requested */
    }
    
    /* Custom Smooth Marquee Animation for Ticker */
    .animate-marquee-smooth {
        animation: marquee-smooth 30s linear infinite;
    }
    .group:hover .animate-marquee-smooth {
        animation-play-state: paused;
    }
    @keyframes marquee-smooth {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); } 
    }
    .mask-fade-edges {
        -webkit-mask-image: linear-gradient(to right, transparent 0%, black 24px, black calc(100% - 24px), transparent 100%);
        mask-image: linear-gradient(to right, transparent 0%, black 24px, black calc(100% - 24px), transparent 100%);
    }
</style>

<section class="relative min-h-screen flex flex-col pt-24 pb-12 overflow-hidden bg-slate-900 mt-0">
    <!-- Decorative Background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <!-- Background Image Layer (Tipis) -->
        <div class="absolute inset-0 z-0 mix-blend-overlay opacity-60">
            <img src="{{ asset('images/batucermin.jpg') }}" 
                 alt="Batu Cermin Mahakam Ulu" 
                 class="w-full h-full object-cover">
        </div>
        
        <!-- User Provided Background SVG (Abstract layer) -->
        <img src="{{ asset('images/Desain tanpa judul.svg') }}" 
             alt="" 
             class="absolute inset-0 w-full h-full object-cover z-0 opacity-10 mix-blend-screen"
             loading="eager">
        
        <!-- Gradient Overlay (Navy/Blue for Brand Identity) -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/60 via-sky-900/40 to-sky-800/30 z-10 mix-blend-multiply"></div>

        <!-- River flow SVG curves -->
        <svg class="absolute inset-0 w-full h-full" viewBox="0 0 1440 800" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <!-- (Kept existing river gradients) -->
            <defs>
                <linearGradient id="riverGold1v3" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#FBBF24" stop-opacity="0"/>
                    <stop offset="30%" stop-color="#FBBF24" stop-opacity="0.2"/>
                    <stop offset="100%" stop-color="#FBBF24" stop-opacity="0"/>
                </linearGradient>
            </defs>
            <path d="M-50,350 C200,280 400,450 720,320 S1100,200 1500,380" fill="none" stroke="url(#riverGold1v3)" stroke-width="2" class="river-line"/>
        </svg>
    </div>

    <!-- FLOATING INFO TICKER -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-30 mb-4 sm:mb-6" data-aos="fade-down" data-aos-duration="1000">
        <div class="max-w-6xl mx-auto">
            <!-- Glass Pill Container -->
            <div class="relative bg-slate-800/60 backdrop-blur-xl border border-white/10 rounded-full p-1.5 sm:p-2 shadow-[0_10px_40px_rgba(0,0,0,0.5)] flex items-center group cursor-default">
                
                <!-- Static "Kabar Bapelit" Badge -->
                <div class="relative z-20 shrink-0 bg-gradient-to-r from-sky-500 to-blue-600 rounded-full h-8 sm:h-10 px-4 sm:px-5 flex items-center shadow-lg border border-sky-400/30">
                    <span class="flex relative h-2.5 w-2.5 sm:h-3 sm:w-3 mr-2 sm:mr-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 sm:h-3 sm:w-3 bg-white"></span>
                    </span>
                    <span class="font-bold text-white text-[10px] sm:text-[11px] tracking-widest uppercase">Kabar Bapelit</span>
                </div>

                <!-- Marquee Track Wrapper -->
                <div class="flex-1 overflow-hidden relative ml-2 sm:ml-4 flex items-center h-8 sm:h-10 mask-fade-edges">
                    <!-- Seamless looping container -->
                    <div class="flex animate-marquee-smooth min-w-max items-center h-full">
                        <!-- ORIGINAL CONTENT (Part 1) -->
                        <div class="flex items-center gap-8 sm:gap-14 px-4 sm:px-8">
                            <span class="flex items-center text-slate-200 hover:text-white transition-colors text-xs sm:text-sm">
                                Jadwal Musrenbang Kecamatan Tahun 2026 telah tersedia
                            </span>
                            <span class="text-white/20 text-lg">•</span>
                            <span class="flex items-center text-slate-200 hover:text-white transition-colors text-xs sm:text-sm">
                                Pendaftaran E-Planning periode Maret 2026 dibuka
                            </span>
                            <span class="text-white/20 text-lg">•</span>
                            <span class="flex items-center text-slate-200 hover:text-white transition-colors text-xs sm:text-sm">
                                Laporan RKP Daerah TA 2025 telah dipublikasikan
                            </span>
                            <span class="text-white/20 text-lg">•</span>
                        </div>
                        <!-- DUPLICATED CONTENT (Part 2) -->
                        <div class="flex items-center gap-8 sm:gap-14 px-4 sm:px-8" aria-hidden="true">
                            <span class="flex items-center text-slate-200 hover:text-white transition-colors text-xs sm:text-sm">
                                Jadwal Musrenbang Kecamatan Tahun 2026 telah tersedia
                            </span>
                            <span class="text-white/20 text-lg">•</span>
                            <span class="flex items-center text-slate-200 hover:text-white transition-colors text-xs sm:text-sm">
                                Pendaftaran E-Planning periode Maret 2026 dibuka
                            </span>
                            <span class="text-white/20 text-lg">•</span>
                            <span class="flex items-center text-slate-200 hover:text-white transition-colors text-xs sm:text-sm">
                                Laporan RKP Daerah TA 2025 telah dipublikasikan
                            </span>
                            <span class="text-white/20 text-lg">•</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex-1 flex flex-col justify-center py-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">

            <!-- Text Content (6 cols) -->
            <div class="lg:col-span-6 space-y-8 md:space-y-10">
                <div data-aos="fade-right" data-aos-delay="100" class="inline-flex items-center px-4 py-2 rounded-full bg-white/5 border border-white/10 text-white text-[10px] font-bold tracking-[0.2em] uppercase backdrop-blur-sm shadow-xl">
                    <!-- Glowing dot -->
                    <div class="relative flex h-2 w-2 mr-3">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-500"></span>
                    </div>
                    Portal Resmi Pemerintah
                </div>

                <div data-aos="fade-right" data-aos-delay="200" class="space-y-3">
                    <h1 class="font-montserrat font-medium text-sky-100 text-3xl sm:text-4xl lg:text-[2.5rem] tracking-tight drop-shadow-md">
                        Selamat Datang di
                    </h1>
                    <div class="space-y-1">
                        <span class="block font-montserrat font-black text-4xl sm:text-6xl lg:text-[4rem] text-white leading-[0.9] tracking-tight drop-shadow-2xl">
                                {{ $site?->welcome_title ?: 'BAPPELITBANGDA' }}
                            </span>
                        <span class="block font-montserrat font-black text-4xl sm:text-6xl lg:text-[4rem] text-transparent bg-clip-text leading-[1.05] tracking-tight pb-2" style="background-image: linear-gradient(135deg, #FBBF24 0%, #F59E0B 50%, #D97706 100%); filter: drop-shadow(0 4px 20px rgba(251, 191, 36,0.2));">
                                {{ $site?->name ?: 'MAHAKAM ULU' }}
                        </span>
                    </div>
                </div>

                <div data-aos="fade-right" data-aos-delay="300" class="relative pl-6">
                    <!-- Golden Line border -->
                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-gradient-to-b from-yellow-400 to-yellow-600 rounded-full"></div>
                    <p class="text-sky-50 text-base sm:text-lg leading-relaxed max-w-lg font-medium drop-shadow-md">
                        {{ $site?->welcome_subtitle ?: 'Merajut perencanaan pembangunan yang inovatif dan berkelanjutan berbasis data dan kebutuhan daerah.' }}
                    </p>
                </div>

            </div>

            <!-- Hero Image Card (6 cols) -->
            <div class="lg:col-span-6 relative block" data-aos="fade-left" data-aos-delay="300">
                <div class="relative group w-full max-w-md mx-auto aspect-[4/5]">
                    <!-- Glow effect behind shield -->
                    <div class="absolute inset-0 bg-yellow-500/20 blur-[60px] rounded-full mask-talawang-inline transform scale-90 translate-y-4"></div>

                    <!-- Border Frame (Gold/Terracotta) -->
                    <div class="absolute inset-0 bg-gradient-to-br from-yellow-400 via-yellow-600 to-yellow-900 mask-talawang-inline p-[4px]">
                        <!-- Main Image Container -->
                        <div class="w-full h-full bg-instansi-surface mask-talawang-inline relative overflow-hidden group-hover:mask-talawang-inline-hover transition-all duration-500">
                            <div class="absolute inset-0 shimmer-bg z-10"></div>
                               <img src="{{ $leader?->photo ? asset('storage/' . ltrim($leader->photo, '/')) : asset('images/Gemini_Generated_Image_6n66ll6n66ll6n66.png') }}"
                                 alt="Hutan dan Sungai Kalimantan"
                                 class="w-full h-full object-cover transform scale-110 group-hover:scale-100 transition-transform duration-1000"
                                 loading="lazy">
                            
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 z-20 bg-gradient-to-t from-sky-900/80 via-sky-800/40 to-transparent"></div>
                            
                            <!-- Inner Border pattern (MORE VISIBLE) -->
                            <div class="absolute inset-0 z-30 opacity-60 pointer-events-none border-[12px] border-transparent" style="background-image: url('data:image/svg+xml,%3Csvg width=%2220%22 height=%2220%22 viewBox=%220 0 20 20%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cpath d=%22M0 0h20v20H0V0zm10 17l-7-7 7-7 7 7-7 7z%22 fill=%22%23F59E0B%22 fill-opacity=%220.4%22 fill-rule=%22evenodd%22/%3E%3C/svg%3E'); -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0); -webkit-mask-composite: xor; mask-composite: exclude;"></div>

                            <!-- Name Label -->
                            <div class="absolute bottom-16 left-0 right-0 text-center z-30 flex justify-center">
                                <div class="inline-flex flex-col items-center gap-1 px-6 py-3 rounded-2xl bg-slate-900/75 backdrop-blur-md border border-sky-400/30 shadow-[0_8px_32px_rgba(0,0,0,0.5)]">
                                    <div class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-yellow-400 animate-pulse"></span>
                                        <span class="text-sm font-bold text-sky-50 uppercase tracking-[0.15em]">{{ $leader?->name ?: 'Pimpinan Bappelitbangda' }}</span>
                                    </div>
                                    <div class="w-12 h-[1px] bg-gradient-to-r from-transparent via-sky-400/50 to-transparent my-1"></div>
                                    <span class="text-[9px] text-center font-bold text-yellow-500 uppercase tracking-widest leading-relaxed max-w-[200px]">{{ $leader?->position ?: 'Kepala Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>

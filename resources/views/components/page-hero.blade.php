{{-- 
    Reusable Page Hero Banner Component
    
    Usage:
    @include('components.page-hero', [
        'badge' => 'Profil Instansi',
        'title' => 'Motto',
        'titleHighlight' => '& Maklumat',
        'subtitle' => 'Semangat dan komitmen pelayanan...',
        'breadcrumbs' => [
            ['label' => 'Beranda', 'route' => 'beranda'],
        ],
        'currentPage' => 'Motto & Maklumat',
        'bgImage' => 'desamahakamulu.jpg',     // optional, defaults to desamahakamulu.jpg
        'gradientId' => 'riverGoldDefault',     // optional, unique SVG gradient ID
    ])
--}}

@php
    $bgImage    = $bgImage ?? 'desamahakamulu.jpg';
    $gradientId = $gradientId ?? 'riverGold' . md5($title ?? 'default');
@endphp

<section class="relative pt-[100px] pb-20 overflow-hidden bg-slate-900">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 z-0 opacity-80">
            <img src="{{ asset('images/' . $bgImage) }}"
                 alt="{{ $title ?? 'Mahakam Ulu' }}" class="w-full h-full object-cover">
        </div>
        <img src="{{ asset('images/Desain tanpa judul.svg') }}" alt=""
             class="absolute inset-0 w-full h-full object-cover z-0 opacity-10 mix-blend-screen" loading="eager">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/70 via-sky-800/50 to-sky-700/40 z-10"></div>
        <svg class="absolute inset-0 w-full h-full" viewBox="0 0 1440 400" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="{{ $gradientId }}" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#FBBF24" stop-opacity="0"/>
                    <stop offset="30%" stop-color="#FBBF24" stop-opacity="0.2"/>
                    <stop offset="100%" stop-color="#FBBF24" stop-opacity="0"/>
                </linearGradient>
            </defs>
            <path d="M-50,180 C200,120 400,240 720,160 S1100,80 1500,200" fill="none" stroke="url(#{{ $gradientId }})" stroke-width="2"/>
        </svg>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
            <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/5 border border-white/10 text-white text-[10px] font-bold tracking-[0.2em] uppercase backdrop-blur-sm shadow-xl mb-6">
                <div class="relative flex h-2 w-2 mr-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-500"></span>
                </div>
                {{ $badge ?? 'Informasi' }}
            </div>
            <h1 class="font-montserrat font-black text-4xl sm:text-5xl lg:text-6xl text-white leading-tight drop-shadow-2xl">
                {{ $title ?? '' }} @if(!empty($titleHighlight))<span class="text-transparent bg-clip-text" style="background-image: linear-gradient(135deg, #FBBF24 0%, #F59E0B 50%, #D97706 100%);">{{ $titleHighlight }}</span>@endif
            </h1>
            @if(!empty($subtitle))
            <p class="mt-6 text-sky-200 text-lg font-medium max-w-2xl mx-auto leading-relaxed">
                {{ $subtitle }}
            </p>
            @endif
            @if(!empty($breadcrumbs))
            <div class="mt-8 flex items-center justify-center gap-2 text-sm text-white/50">
                @foreach($breadcrumbs as $crumb)
                    <a href="{{ route($crumb['route']) }}" class="hover:text-yellow-400 transition-colors">{{ $crumb['label'] }}</a>
                    <span>/</span>
                @endforeach
                <span class="text-yellow-400">{{ $currentPage ?? '' }}</span>
            </div>
            @endif
        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0 z-20">
        <svg viewBox="0 0 1440 60" preserveAspectRatio="none" class="w-full h-12 fill-instansi-surface">
            <path d="M0,60 C360,0 1080,0 1440,60 L1440,60 L0,60 Z"/>
        </svg>
    </div>
</section>

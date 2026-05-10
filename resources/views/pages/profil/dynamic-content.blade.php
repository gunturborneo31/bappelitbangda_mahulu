<x-layouts.app>
    @php
        $content = $profilePage->content ?? [];
        $subtitle = $content['subtitle'] ?? $profilePage->meta_desc ?? 'Informasi profil Bappelitbangda Kabupaten Mahakam Ulu.';
        $mainTitle = $profilePage->title;
        $sectionTitle = $content['judul'] ?? $profilePage->title;
        $mainContent = $content['isi_konten'] ?? ($content['content'] ?? null);
    @endphp

    <section class="relative pt-[100px] pb-20 overflow-hidden bg-slate-900">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute inset-0 z-0 opacity-80">
                <img src="{{ asset('images/desamahakamulu.jpg') }}" alt="{{ $mainTitle }}" class="w-full h-full object-cover">
            </div>
            <img src="{{ asset('images/Desain tanpa judul.svg') }}" alt="" class="absolute inset-0 w-full h-full object-cover z-0 opacity-10 mix-blend-screen" loading="eager">
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900/70 via-sky-800/50 to-sky-700/40 z-10"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/5 border border-white/10 text-white text-[10px] font-bold tracking-[0.2em] uppercase backdrop-blur-sm shadow-xl mb-6">
                    <div class="relative flex h-2 w-2 mr-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-500"></span>
                    </div>
                    Profil Instansi
                </div>
                <h1 class="font-montserrat font-black text-4xl sm:text-5xl lg:text-6xl text-white leading-tight drop-shadow-2xl">{{ $mainTitle }}</h1>
                <p class="mt-6 text-sky-200 text-lg font-medium max-w-2xl mx-auto leading-relaxed">{{ $subtitle }}</p>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-8">
        @if($profilePage->template === 'penjelasan_2')
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <section class="bg-white rounded-3xl border border-slate-100 shadow-xl p-8">
                    <h2 class="text-2xl font-bold text-slate-900 mb-5">{{ $content['box_1_title'] ?? 'Panel 1' }}</h2>
                    <div class="prose prose-slate max-w-none">{!! $content['box_1_content'] ?? '' !!}</div>
                </section>
                <section class="bg-white rounded-3xl border border-slate-100 shadow-xl p-8">
                    <h2 class="text-2xl font-bold text-slate-900 mb-5">{{ $content['box_2_title'] ?? 'Panel 2' }}</h2>
                    <div class="prose prose-slate max-w-none">{!! $content['box_2_content'] ?? '' !!}</div>
                </section>
            </div>
        @else
            <section class="bg-white rounded-3xl border border-slate-100 shadow-xl p-8 lg:p-10">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-1.5 h-8 bg-gradient-to-b from-yellow-400 to-yellow-600 rounded-full"></div>
                    <h2 class="text-2xl font-bold text-slate-900">{{ $sectionTitle }}</h2>
                </div>
                <div class="prose prose-slate max-w-none">{!! $mainContent ?: '<p>Konten belum tersedia.</p>' !!}</div>
            </section>
        @endif
    </div>
</x-layouts.app>
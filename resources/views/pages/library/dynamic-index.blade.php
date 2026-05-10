<x-layouts.app>
    @php
        $sectionLabel = match($section) {
            'dokumen' => 'Dokumen',
            'regulasi' => 'Regulasi',
            default => 'PPID',
        };
        $subtitle = $page->description ?: 'Data publik ditampilkan langsung dari backend dan diperbarui dari panel admin.';
    @endphp

    <section class="relative pt-[100px] pb-20 overflow-hidden bg-slate-900">
        <div class="absolute inset-0 z-0 opacity-80"><img src="{{ asset('images/desamahakamulu.jpg') }}" alt="{{ $page->name }}" class="w-full h-full object-cover"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/70 via-sky-800/50 to-sky-700/40 z-10"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-20 text-center">
            <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/5 border border-white/10 text-white text-[10px] font-bold tracking-[0.2em] uppercase backdrop-blur-sm shadow-xl mb-6">{{ $sectionLabel }}</div>
            <h1 class="font-montserrat font-black text-4xl sm:text-5xl lg:text-6xl text-white">{{ $page->name }}</h1>
            <p class="mt-6 text-sky-200 text-lg max-w-3xl mx-auto">{{ $subtitle }}</p>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            @if($section === 'dokumen')
                @include('pages.dokumen._sidebar')
            @elseif($section === 'regulasi')
                @include('pages.regulasi._sidebar')
            @else
                @include('pages.ppid._sidebar')
            @endif

            <main class="lg:col-span-3" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-1.5 h-8 bg-gradient-to-b from-yellow-400 to-yellow-600 rounded-full"></div>
                    <h2 class="text-2xl font-bold text-slate-900">{{ $page->name }}</h2>
                </div>

                @if($section === 'dokumen')
                    @php($dokumenCategory = $slug)
                    @include('pages.dokumen._document-list')
                @elseif($section === 'regulasi')
                    @php($regulasiCategory = $slug)
                    @include('pages.regulasi._regulation-list')
                @elseif($accordions->isNotEmpty())
                    <div class="space-y-4">
                        @foreach($accordions as $accordionIndex => $accordion)
                            <section class="bg-white rounded-3xl border border-slate-100 shadow-lg overflow-hidden" x-data="{ open: {{ $accordionIndex === 0 ? 'true' : 'false' }} }">
                                <button type="button" class="w-full px-6 py-5 flex items-center justify-between text-left" @click="open = !open">
                                    <span class="font-bold text-slate-800">{{ $accordion['title'] }}</span>
                                    <span class="text-slate-400" x-text="open ? '-' : '+'"></span>
                                </button>
                                <div x-show="open" x-cloak class="px-6 pb-6">
                                    @php
                                        $informasi = $accordion['rows'];
                                        $ppidCategory = $slug;
                                    @endphp
                                    @include('pages.ppid._informasi-list')
                                </div>
                            </section>
                        @endforeach
                    </div>
                @else
                    @php($ppidCategory = $slug)
                    @include('pages.ppid._informasi-list')
                @endif
            </main>
        </div>
    </div>
</x-layouts.app>
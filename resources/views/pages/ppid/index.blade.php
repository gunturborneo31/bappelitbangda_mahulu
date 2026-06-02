<x-layouts.app>
    <section class="relative pt-[100px] pb-20 overflow-hidden bg-slate-900">
        <div class="absolute inset-0 z-0 opacity-80">
            <img src="{{ asset('images/desamahakamulu.jpg') }}" alt="PPID Mahakam Ulu" class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/80 via-sky-800/55 to-blue-700/45 z-10"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-20 text-center">
            <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/5 border border-white/10 text-white text-[10px] font-bold tracking-[0.2em] uppercase backdrop-blur-sm shadow-xl mb-6">
                Portal PPID
            </div>
            <h1 class="font-montserrat font-black text-4xl sm:text-5xl lg:text-6xl text-white">Pusat Layanan PPID</h1>
            <p class="mt-6 text-sky-200 text-lg max-w-3xl mx-auto">Akses seluruh layanan PPID dari satu tempat: jenis informasi publik, dokumen per kategori, hingga permohonan dan pelacakan status.</p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            @include('pages.ppid._sidebar')

            <main class="lg:col-span-3 space-y-6">
                @php
                    $ppidFeatures = [
                        [
                            'title' => 'Jenis Informasi PPID',
                            'description' => 'Jelajahi informasi serta merta, setiap saat, berkala, dan informasi dikecualikan.',
                            'href' => route('ppid.informasi'),
                            'cta' => 'Buka Jenis Informasi',
                        ],
                        [
                            'title' => 'Informasi Berkala',
                            'description' => 'Kumpulan informasi rutin yang diumumkan badan publik secara periodik.',
                            'href' => route('ppid.berkala'),
                            'cta' => 'Lihat Informasi Berkala',
                        ],
                        [
                            'title' => 'Informasi Serta Merta',
                            'description' => 'Informasi yang wajib diumumkan segera saat berdampak pada masyarakat luas.',
                            'href' => route('ppid.serta-merta'),
                            'cta' => 'Lihat Informasi Serta Merta',
                        ],
                        [
                            'title' => 'Informasi Setiap Saat',
                            'description' => 'Informasi yang selalu tersedia untuk pemohon informasi publik.',
                            'href' => route('ppid.setiap-saat'),
                            'cta' => 'Lihat Informasi Setiap Saat',
                        ],
                        [
                            'title' => 'Informasi Dikecualikan',
                            'description' => 'Daftar informasi yang dikecualikan sesuai ketentuan peraturan perundang-undangan.',
                            'href' => route('ppid.dikecualikan'),
                            'cta' => 'Lihat Informasi Dikecualikan',
                        ],
                        [
                            'title' => 'Permohonan Informasi',
                            'description' => 'Ajukan permohonan informasi publik dan cek progres tindak lanjutnya.',
                            'href' => route('ppid.permohonan'),
                            'cta' => 'Ajukan Permohonan',
                        ],
                    ];
                @endphp

                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 sm:p-8">
                    <h2 class="text-2xl font-bold text-slate-900">Navigasi Khusus PPID</h2>
                    <p class="mt-2 text-sm text-slate-500">Halaman ini menjadi gerbang khusus untuk seluruh fitur PPID. Gunakan menu di bawah untuk mengakses setiap layanan PPID secara langsung.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">
                    @foreach($ppidFeatures as $feature)
                        <article class="group rounded-2xl border border-slate-200 bg-white shadow-sm hover:shadow-md transition-all duration-200 overflow-hidden">
                            <div class="h-1 bg-gradient-to-r from-sky-500 via-blue-500 to-cyan-500"></div>
                            <div class="p-5 sm:p-6">
                                <h3 class="text-lg font-bold text-slate-900">{{ $feature['title'] }}</h3>
                                <p class="mt-2 text-sm text-slate-600 leading-relaxed">{{ $feature['description'] }}</p>
                                <a href="{{ $feature['href'] }}" wire:navigate class="mt-5 inline-flex items-center gap-2 rounded-xl px-4 py-2.5 bg-sky-50 border border-sky-200 text-sky-700 text-sm font-semibold hover:bg-sky-100 transition-colors">
                                    {{ $feature['cta'] }}
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </main>
        </div>
    </section>
</x-layouts.app>

<x-layouts.app>
    <section class="relative pt-[100px] pb-20 overflow-hidden bg-slate-900">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute inset-0 z-0 opacity-80">
                <img src="{{ asset('images/desamahakamulu.jpg') }}" alt="Dokumen" class="w-full h-full object-cover">
            </div>
            <img src="{{ asset('images/Desain tanpa judul.svg') }}" alt="" class="absolute inset-0 w-full h-full object-cover z-0 opacity-10 mix-blend-screen" loading="eager">
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900/70 via-sky-800/50 to-sky-700/40 z-10"></div>
            <svg class="absolute inset-0 w-full h-full" viewBox="0 0 1440 400" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="dgDP" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#FBBF24" stop-opacity="0"/><stop offset="30%" stop-color="#FBBF24" stop-opacity="0.2"/><stop offset="100%" stop-color="#FBBF24" stop-opacity="0"/></linearGradient></defs><path d="M-50,180 C200,120 400,240 720,160 S1100,80 1500,200" fill="none" stroke="url(#dgDP)" stroke-width="2"/></svg>
        </div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/5 border border-white/10 text-white text-[10px] font-bold tracking-[0.2em] uppercase backdrop-blur-sm shadow-xl mb-6">
                    <div class="relative flex h-2 w-2 mr-3"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-500"></span></div>Dokumen
                </div>
                <h1 class="font-montserrat font-black text-4xl sm:text-5xl lg:text-6xl text-white leading-tight drop-shadow-2xl"><span class="text-transparent bg-clip-text" style="background-image: linear-gradient(135deg, #FBBF24 0%, #F59E0B 50%, #D97706 100%);">D</span>PA</h1>
                <p class="mt-6 text-sky-200 text-lg font-medium max-w-2xl mx-auto leading-relaxed">Dokumen Pelaksanaan Anggaran (DPA) Bapelitbangda Kabupaten Mahakam Ulu — dokumen anggaran pelaksanaan kegiatan.</p>
                <div class="mt-8 flex items-center justify-center gap-2 text-sm text-white/50">
                    <a href="{{ route('beranda') }}" class="hover:text-yellow-400 transition-colors">Beranda</a><span>/</span><span>Dokumen</span><span>/</span><span class="text-yellow-400">DPA</span>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 z-20"><svg viewBox="0 0 1440 60" preserveAspectRatio="none" class="w-full h-12 fill-instansi-surface"><path d="M0,60 C360,0 1080,0 1440,60 L1440,60 L0,60 Z"/></svg></div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            @include('pages.dokumen._sidebar')
            <main class="lg:col-span-3" data-aos="fade-up">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900 flex items-center gap-3">
                            <span class="w-10 h-10 bg-sky-100 rounded-xl flex items-center justify-center text-sky-600"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" /></svg></span>
                            Dokumen DPA
                        </h2>
                        <p class="text-slate-500 text-sm mt-1 ml-[52px]">Dokumen Pelaksanaan Anggaran</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <div class="flex items-center bg-white rounded-xl border border-slate-200 shadow-sm px-3 py-2 focus-within:border-sky-400 focus-within:ring-2 focus-within:ring-sky-100 transition-all">
                            <svg class="w-4 h-4 text-slate-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                            <input type="text" placeholder="Cari dokumen..." class="text-sm border-none outline-none bg-transparent w-40 placeholder:text-slate-400 text-slate-700">
                        </div>
                    </div>
                </div>
                @php
                $dokumenCategory = 'dpa';
                $documents = [
                    ['key' => 'dok_dpa_2026', 'no' => 'DPA TA 2026', 'title' => 'Dokumen Pelaksanaan Anggaran Bapelitbangda Tahun Anggaran 2026', 'year' => '2026', 'type' => 'PDF', 'status' => 'Berlaku'],
                    ['key' => 'dok_dpa_2025', 'no' => 'DPA TA 2025', 'title' => 'Dokumen Pelaksanaan Anggaran Bapelitbangda Tahun Anggaran 2025', 'year' => '2025', 'type' => 'PDF', 'status' => 'Berlaku'],
                    ['key' => 'dok_dpa_2024', 'no' => 'DPA TA 2024', 'title' => 'Dokumen Pelaksanaan Anggaran Bapelitbangda Tahun Anggaran 2024', 'year' => '2024', 'type' => 'PDF', 'status' => 'Berlaku'],
                    ['key' => 'dok_dpa_perubahan_2025', 'no' => 'DPPA TA 2025', 'title' => 'Dokumen Pelaksanaan Perubahan Anggaran Bapelitbangda Tahun Anggaran 2025', 'year' => '2025', 'type' => 'PDF', 'status' => 'Berlaku'],
                ]; @endphp
                @include('pages.dokumen._document-list')
            </main>
        </div>
    </div>
</x-layouts.app>

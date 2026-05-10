<x-layouts.app>
    {{-- ===================== PAGE HERO BANNER ===================== --}}
    <section class="relative pt-[100px] pb-20 overflow-hidden bg-slate-900">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute inset-0 z-0 opacity-80">
                <img src="{{ asset('images/batucermin.jpg') }}" alt="Regulasi" class="w-full h-full object-cover">
            </div>
            <img src="{{ asset('images/Desain tanpa judul.svg') }}" alt="" class="absolute inset-0 w-full h-full object-cover z-0 opacity-10 mix-blend-screen" loading="eager">
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900/70 via-sky-800/50 to-sky-700/40 z-10"></div>
            <svg class="absolute inset-0 w-full h-full" viewBox="0 0 1440 400" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="rgUU" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#FBBF24" stop-opacity="0"/><stop offset="30%" stop-color="#FBBF24" stop-opacity="0.2"/><stop offset="100%" stop-color="#FBBF24" stop-opacity="0"/></linearGradient></defs><path d="M-50,180 C200,120 400,240 720,160 S1100,80 1500,200" fill="none" stroke="url(#rgUU)" stroke-width="2"/></svg>
        </div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/5 border border-white/10 text-white text-[10px] font-bold tracking-[0.2em] uppercase backdrop-blur-sm shadow-xl mb-6">
                    <div class="relative flex h-2 w-2 mr-3"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-500"></span></div>Regulasi
                </div>
                <h1 class="font-montserrat font-black text-4xl sm:text-5xl lg:text-6xl text-white leading-tight drop-shadow-2xl">Undang<span class="text-transparent bg-clip-text" style="background-image: linear-gradient(135deg, #FBBF24 0%, #F59E0B 50%, #D97706 100%);">-</span>Undang</h1>
                <p class="mt-6 text-sky-200 text-lg font-medium max-w-2xl mx-auto leading-relaxed">Kumpulan Undang-Undang yang menjadi dasar hukum pelaksanaan tugas dan fungsi Bapelitbangda Kabupaten Mahakam Ulu.</p>
                <div class="mt-8 flex items-center justify-center gap-2 text-sm text-white/50">
                    <a href="{{ route('beranda') }}" class="hover:text-yellow-400 transition-colors">Beranda</a><span>/</span><span>Regulasi</span><span>/</span><span class="text-yellow-400">Undang-Undang</span>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 z-20"><svg viewBox="0 0 1440 60" preserveAspectRatio="none" class="w-full h-12 fill-instansi-surface"><path d="M0,60 C360,0 1080,0 1440,60 L1440,60 L0,60 Z"/></svg></div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            @include('pages.regulasi._sidebar')
            <main class="lg:col-span-3" data-aos="fade-up">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900 flex items-center gap-3">
                            <span class="w-10 h-10 bg-sky-100 rounded-xl flex items-center justify-center text-sky-600"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V7m0 16H9m3 0h3" /></svg></span>
                            Daftar Undang-Undang
                        </h2>
                        <p class="text-slate-500 text-sm mt-1 ml-[52px]">Regulasi tingkat nasional yang menjadi dasar hukum</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <div class="flex items-center bg-white rounded-xl border border-slate-200 shadow-sm px-3 py-2 focus-within:border-sky-400 focus-within:ring-2 focus-within:ring-sky-100 transition-all">
                            <svg class="w-4 h-4 text-slate-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                            <input type="text" placeholder="Cari regulasi..." class="text-sm border-none outline-none bg-transparent w-40 placeholder:text-slate-400 text-slate-700">
                        </div>
                    </div>
                </div>
                @php
                $regulasiCategory = 'undang-undang';
                $regulations = [
                    ['key' => 'reg_uu_25_2004', 'no' => 'UU No. 25 Tahun 2004', 'title' => 'Sistem Perencanaan Pembangunan Nasional', 'year' => '2004', 'status' => 'Berlaku'],
                    ['key' => 'reg_uu_23_2014', 'no' => 'UU No. 23 Tahun 2014', 'title' => 'Pemerintahan Daerah', 'year' => '2014', 'status' => 'Berlaku'],
                    ['key' => 'reg_uu_17_2003', 'no' => 'UU No. 17 Tahun 2003', 'title' => 'Keuangan Negara', 'year' => '2003', 'status' => 'Berlaku'],
                    ['key' => 'reg_uu_1_2004', 'no' => 'UU No. 1 Tahun 2004', 'title' => 'Perbendaharaan Negara', 'year' => '2004', 'status' => 'Berlaku'],
                    ['key' => 'reg_uu_33_2004', 'no' => 'UU No. 33 Tahun 2004', 'title' => 'Perimbangan Keuangan antara Pemerintah Pusat dan Pemerintahan Daerah', 'year' => '2004', 'status' => 'Berlaku'],
                    ['key' => 'reg_uu_6_2014', 'no' => 'UU No. 6 Tahun 2014', 'title' => 'Desa', 'year' => '2014', 'status' => 'Berlaku'],
                ]; @endphp
                @include('pages.regulasi._regulation-list')
            </main>
        </div>
    </div>
</x-layouts.app>

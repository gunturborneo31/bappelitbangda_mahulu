{{-- ═══════════════════════════════════════════════════════════════
     MOBILE BOTTOM NAVIGATION BAR
     Hanya tampil di layar < md (768px). Desktop tidak terpengaruh.
     ═══════════════════════════════════════════════════════════════ --}}

@php
    $profilActive   = request()->is('profil*');
    $regulasiActive = request()->is('regulasi*');
    $dokumenActive  = request()->is('dokumen*');
    $beritaActive   = request()->is('berita*');
    $ppidActive     = request()->is('ppid*');
    $berandaActive  = request()->is('/');
    $portalActive   = request()->is('portal*');
@endphp

<div class="md:hidden"
     x-data="{ activeSheet: null, toggleSheet(m){ this.activeSheet = this.activeSheet === m ? null : m }, closeSheet(){ this.activeSheet = null } }"
     @keydown.escape.window="closeSheet()">

    {{-- ── Backdrop Overlay ── --}}
    <div
        x-show="activeSheet !== null"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="closeSheet()"
        class="fixed inset-0 bg-black/70 backdrop-blur-sm z-[70]"
        x-cloak
    ></div>

    {{-- ═══ PROFIL SHEET ═══ --}}
    <div
        x-show="activeSheet === 'profil'"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-8"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-8"
        class="fixed bottom-[80px] inset-x-0 z-[80] px-3"
        x-cloak
    >
        <div class="bg-[#060d1f] border border-blue-500/30 rounded-2xl shadow-[0_0_40px_rgba(59,130,246,0.15)] overflow-hidden">
            {{-- Header --}}
            <div class="flex items-center justify-between px-4 py-3 border-b border-blue-500/15">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-blue-500/20 flex items-center justify-center border border-blue-500/30">
                        <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <span class="font-bold text-white text-sm tracking-wide">Menu Profil</span>
                </div>
                <button @click="closeSheet()" class="w-7 h-7 rounded-full bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400 hover:text-white hover:bg-blue-500/30 transition-all">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            {{-- Grid items --}}
            <div class="grid grid-cols-3 gap-2 p-3">
                <a href="/profil/visi-misi" wire:navigate @click="closeSheet()" class="flex flex-col items-center gap-2 p-3.5 rounded-xl bg-blue-500/10 text-blue-400 border border-blue-500/20 hover:bg-blue-500/20 active:scale-95 transition-all">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    <span class="text-[10px] font-semibold text-center text-slate-300 leading-tight">Visi & Misi</span>
                </a>
                <a href="/profil/tujuan-sasaran" wire:navigate @click="closeSheet()" class="flex flex-col items-center gap-2 p-3.5 rounded-xl bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 hover:bg-indigo-500/20 active:scale-95 transition-all">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    <span class="text-[10px] font-semibold text-center text-slate-300 leading-tight">Tujuan & Sasaran</span>
                </a>
                <a href="/profil/pimpinan" wire:navigate @click="closeSheet()" class="flex flex-col items-center gap-2 p-3.5 rounded-xl bg-yellow-500/10 text-yellow-400 border border-yellow-500/20 hover:bg-yellow-500/20 active:scale-95 transition-all">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="text-[10px] font-semibold text-center text-slate-300 leading-tight">Pimpinan</span>
                </a>
                <a href="/profil/aparatur" wire:navigate @click="closeSheet()" class="flex flex-col items-center gap-2 p-3.5 rounded-xl bg-sky-500/10 text-sky-400 border border-sky-500/20 hover:bg-sky-500/20 active:scale-95 transition-all">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span class="text-[10px] font-semibold text-center text-slate-300 leading-tight">Aparatur</span>
                </a>
                <a href="/profil/motto" wire:navigate @click="closeSheet()" class="flex flex-col items-center gap-2 p-3.5 rounded-xl bg-violet-500/10 text-violet-400 border border-violet-500/20 hover:bg-violet-500/20 active:scale-95 transition-all">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                    <span class="text-[10px] font-semibold text-center text-slate-300 leading-tight">Motto</span>
                </a>
                <a href="/profil/penghargaan" wire:navigate @click="closeSheet()" class="flex flex-col items-center gap-2 p-3.5 rounded-xl bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 hover:bg-cyan-500/20 active:scale-95 transition-all">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                    <span class="text-[10px] font-semibold text-center text-slate-300 leading-tight">Penghargaan</span>
                </a>
                <a href="/profil/struktur" wire:navigate @click="closeSheet()" class="flex flex-col items-center gap-2 p-3.5 rounded-xl bg-blue-600/10 text-blue-300 border border-blue-600/20 hover:bg-blue-600/20 active:scale-95 transition-all">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    <span class="text-[10px] font-semibold text-center text-slate-300 leading-tight">Struktur</span>
                </a>
            </div>
        </div>
    </div>

    {{-- ═══ REGULASI SHEET ═══ --}}
    <div
        x-show="activeSheet === 'regulasi'"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-8"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-8"
        class="fixed bottom-[80px] inset-x-0 z-[80] px-3"
        x-cloak
    >
        <div class="bg-[#060d1f] border border-blue-500/30 rounded-2xl shadow-[0_0_40px_rgba(59,130,246,0.15)] overflow-hidden">
            <div class="flex items-center justify-between px-4 py-3 border-b border-blue-500/15">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-blue-500/20 flex items-center justify-center border border-blue-500/30">
                        <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg>
                    </div>
                    <span class="font-bold text-white text-sm tracking-wide">Menu Regulasi</span>
                </div>
                <button @click="closeSheet()" class="w-7 h-7 rounded-full bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400 hover:text-white hover:bg-blue-500/30 transition-all">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="p-2 space-y-1">
                @foreach([
                    ['label' => 'Undang-Undang', 'href' => '/regulasi/undang-undang', 'badge' => 'UU', 'cls' => 'bg-blue-600/20 text-blue-300 border-blue-500/30'],
                    ['label' => 'Peraturan Menteri', 'href' => '/regulasi/peraturan-menteri', 'badge' => 'PM', 'cls' => 'bg-indigo-600/20 text-indigo-300 border-indigo-500/30'],
                    ['label' => 'Peraturan Daerah', 'href' => '/regulasi/peraturan-daerah', 'badge' => 'PD', 'cls' => 'bg-sky-600/20 text-sky-300 border-sky-500/30'],
                    ['label' => 'Peraturan Bupati', 'href' => '/regulasi/peraturan-bupati', 'badge' => 'PB', 'cls' => 'bg-cyan-600/20 text-cyan-300 border-cyan-500/30'],
                    ['label' => 'SK Bupati', 'href' => '/regulasi/sk-bupati', 'badge' => 'SKB', 'cls' => 'bg-blue-500/20 text-blue-400 border-blue-400/30'],
                    ['label' => 'SK Kepala', 'href' => '/regulasi/sk-kepala', 'badge' => 'SKK', 'cls' => 'bg-violet-600/20 text-violet-300 border-violet-500/30'],
                    ['label' => 'Lain-lain', 'href' => '/regulasi/lain-lain', 'badge' => 'Dll', 'cls' => 'bg-slate-500/20 text-slate-300 border-slate-500/30'],
                ] as $sub)
                <a href="{{ $sub['href'] }}" wire:navigate @click="closeSheet()"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-blue-500/10 transition-all active:scale-[0.98] group">
                    <span class="w-9 h-9 rounded-xl {{ $sub['cls'] }} border flex items-center justify-center font-black text-[11px] shrink-0">{{ $sub['badge'] }}</span>
                    <span class="text-sm font-medium text-slate-300 group-hover:text-white flex-1 transition-colors">{{ $sub['label'] }}</span>
                    <svg class="w-4 h-4 text-blue-500/50 group-hover:text-blue-400 group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ═══ DOKUMEN SHEET ═══ --}}
    <div
        x-show="activeSheet === 'dokumen'"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-8"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-8"
        class="fixed bottom-[80px] inset-x-0 z-[80] px-3"
        x-cloak
    >
        <div class="bg-[#060d1f] border border-blue-500/30 rounded-2xl shadow-[0_0_40px_rgba(59,130,246,0.15)] overflow-hidden">
            <div class="flex items-center justify-between px-4 py-3 border-b border-blue-500/15">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-blue-500/20 flex items-center justify-center border border-blue-500/30">
                        <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                    </div>
                    <span class="font-bold text-white text-sm tracking-wide">Menu Dokumen</span>
                </div>
                <button @click="closeSheet()" class="w-7 h-7 rounded-full bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400 hover:text-white hover:bg-blue-500/30 transition-all">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="grid grid-cols-3 gap-2 p-3">
                @foreach([
                    ['label' => 'RENSTRA', 'href' => '/dokumen/renstra', 'cls' => 'bg-blue-500/15 text-blue-300 border-blue-500/25'],
                    ['label' => 'RENJA', 'href' => '/dokumen/renja', 'cls' => 'bg-sky-500/15 text-sky-300 border-sky-500/25'],
                    ['label' => 'DPA', 'href' => '/dokumen/dpa', 'cls' => 'bg-indigo-500/15 text-indigo-300 border-indigo-500/25'],
                    ['label' => 'IKU', 'href' => '/dokumen/iku', 'cls' => 'bg-violet-500/15 text-violet-300 border-violet-500/25'],
                    ['label' => 'SOP', 'href' => '/dokumen/sop', 'cls' => 'bg-cyan-500/15 text-cyan-300 border-cyan-500/25'],
                    ['label' => 'Laporan LKjIP', 'href' => '/dokumen/sakip', 'cls' => 'bg-blue-600/15 text-blue-200 border-blue-600/25'],
                    ['label' => 'RKPD', 'href' => '/dokumen/rkpd', 'cls' => 'bg-sky-600/15 text-sky-200 border-sky-600/25'],
                    ['label' => 'RPJPD', 'href' => '/dokumen/rpjpd', 'cls' => 'bg-indigo-600/15 text-indigo-200 border-indigo-600/25'],
                    ['label' => 'RPJMD', 'href' => '/dokumen/rpjmd', 'cls' => 'bg-slate-500/15 text-slate-300 border-slate-500/25'],
                ] as $sub)
                <a href="{{ $sub['href'] }}" wire:navigate @click="closeSheet()"
                   class="flex flex-col items-center gap-2 p-3.5 rounded-xl {{ $sub['cls'] }} border hover:brightness-125 active:scale-95 transition-all">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span class="text-[10px] font-bold text-center leading-tight">{{ $sub['label'] }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ═══ LAYANAN SHEET ═══ --}}
    <div
        x-show="activeSheet === 'layanan'"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-8"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-8"
        class="fixed bottom-[80px] inset-x-0 z-[80] px-3"
        x-cloak
    >
        <div class="bg-[#060d1f] border border-blue-500/30 rounded-2xl shadow-[0_0_40px_rgba(59,130,246,0.15)] overflow-hidden">
            <div class="flex items-center justify-between px-4 py-3 border-b border-blue-500/15">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-blue-500/20 flex items-center justify-center border border-blue-500/30">
                        <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </div>
                    <span class="font-bold text-white text-sm tracking-wide">Menu Layanan</span>
                </div>
                <button @click="closeSheet()" class="w-7 h-7 rounded-full bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400 hover:text-white hover:bg-blue-500/30 transition-all">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="grid grid-cols-2 gap-2 p-3">
                @foreach([
                    ['label' => 'Pengaduan', 'href' => '/layanan/pengaduan', 'cls' => 'bg-indigo-500/15 text-indigo-300 border-indigo-500/25', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>'],
                    ['label' => 'Cek Status', 'href' => '/layanan/cek-status', 'cls' => 'bg-emerald-500/15 text-emerald-300 border-emerald-500/25', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>'],
                    ['label' => 'Survey', 'href' => '/layanan/survey', 'cls' => 'bg-amber-500/15 text-amber-300 border-amber-500/25', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>'],
                    ['label' => 'WBS', 'href' => '/layanan/wbs', 'cls' => 'bg-red-500/15 text-red-300 border-red-500/25', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>'],
                ] as $sub)
                <a href="{{ $sub['href'] }}" wire:navigate @click="closeSheet()"
                   class="flex flex-col items-center gap-2 p-3.5 rounded-xl {{ $sub['cls'] }} border hover:brightness-125 active:scale-95 transition-all">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">{!! $sub['icon'] !!}</svg>
                    <span class="text-[11px] font-bold text-center leading-tight">{{ $sub['label'] }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════
         BOTTOM NAV BAR — BLUE THEME
         ═══════════════════════════════ --}}
    <nav class="fixed bottom-0 inset-x-0 z-[90]"
         style="height: calc(72px + env(safe-area-inset-bottom)); padding-bottom: env(safe-area-inset-bottom);">

        {{-- Glass Background + Blue Glow --}}
        <div class="absolute inset-0 bg-[#04091a]/97 backdrop-blur-2xl border-t border-blue-500/20"
             style="box-shadow: 0 -4px 40px rgba(59,130,246,0.12), 0 -1px 0 rgba(59,130,246,0.15);"></div>

        {{-- Blue Top Glow Line --}}
        <div class="absolute top-0 inset-x-0 h-[2px] bg-gradient-to-r from-transparent via-blue-500/70 to-transparent"></div>

        {{-- Nav Items --}}
        <div class="relative z-10 flex items-center justify-around h-[72px] px-1">

            {{-- ── BERANDA ── --}}
            <a href="/" wire:navigate
               class="flex flex-col items-center justify-center gap-1.5 w-[52px] h-[68px] px-1 rounded-2xl transition-all duration-200 active:scale-90 relative group
                      {{ $berandaActive ? 'text-blue-400' : 'text-slate-500 hover:text-blue-300' }}">
                @if($berandaActive)
                    <span class="absolute inset-0 bg-blue-500/12 rounded-2xl border border-blue-500/25"
                          style="box-shadow: 0 0 15px rgba(59,130,246,0.2) inset;"></span>
                @endif
                {{-- Icon Container --}}
                <div class="relative w-7 h-7 flex items-center justify-center">
                    @if($berandaActive)
                        <span class="absolute inset-0 bg-blue-500/20 rounded-xl border border-blue-400/30 scale-100"
                              style="box-shadow: 0 0 12px rgba(59,130,246,0.4);"></span>
                    @endif
                    <svg class="w-[20px] h-[20px] relative z-10 transition-transform duration-200 group-hover:scale-110"
                         fill="{{ $berandaActive ? 'currentColor' : 'none' }}"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="{{ $berandaActive ? 0 : 1.7 }}">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <span class="text-[9px] font-bold tracking-wide relative z-10 leading-none">Beranda</span>
            </a>

            {{-- ── BERITA ── --}}
            <a href="/berita" wire:navigate
               class="flex flex-col items-center justify-center gap-1.5 w-[52px] h-[68px] px-1 rounded-2xl transition-all duration-200 active:scale-90 relative group
                      {{ $beritaActive ? 'text-blue-400' : 'text-slate-500 hover:text-blue-300' }}">
                @if($beritaActive)
                    <span class="absolute inset-0 bg-blue-500/12 rounded-2xl border border-blue-500/25"
                          style="box-shadow: 0 0 15px rgba(59,130,246,0.2) inset;"></span>
                @endif
                <div class="relative w-7 h-7 flex items-center justify-center">
                    @if($beritaActive)
                        <span class="absolute inset-0 bg-blue-500/20 rounded-xl border border-blue-400/30"
                              style="box-shadow: 0 0 12px rgba(59,130,246,0.4);"></span>
                    @endif
                    <svg class="w-[20px] h-[20px] relative z-10 transition-transform duration-200 group-hover:scale-110"
                         fill="{{ $beritaActive ? 'currentColor' : 'none' }}"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="{{ $beritaActive ? 0 : 1.7 }}">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                <span class="text-[9px] font-bold tracking-wide relative z-10 leading-none">Berita</span>
            </a>

            {{-- ── PROFIL (dropdown) ── --}}
            @php $profilSheetClass = $profilActive ? 'text-blue-400' : 'text-slate-500 hover:text-blue-300'; @endphp
            <button type="button" @click="toggleSheet('profil')"
               class="flex flex-col items-center justify-center gap-1.5 w-[52px] h-[68px] px-1 rounded-2xl transition-all duration-200 active:scale-90 relative cursor-pointer group {{ $profilSheetClass }}"
               :class="activeSheet === 'profil' ? 'text-blue-400' : ''">
                <span class="absolute inset-0 rounded-2xl transition-all duration-200"
                      :class="activeSheet === 'profil' ? 'bg-blue-500/12 border border-blue-500/25' : '{{ $profilActive ? 'bg-blue-500/12 border border-blue-500/25' : '' }}'"></span>
                <div class="relative w-7 h-7 flex items-center justify-center">
                    <span class="absolute inset-0 rounded-xl transition-all"
                          :class="activeSheet === 'profil' ? 'bg-blue-500/20 border border-blue-400/30' : '{{ $profilActive ? 'bg-blue-500/20 border border-blue-400/30' : '' }}'"></span>
                    <svg class="w-[20px] h-[20px] relative z-10 transition-all duration-200 group-hover:scale-110"
                         :class="activeSheet === 'profil' ? 'rotate-12 scale-110' : ''"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    {{-- Dot badge --}}
                    <span class="absolute -top-0.5 -right-0.5 w-2 h-2 rounded-full bg-blue-400 border-2 border-[#04091a] transition-all duration-200"
                          :class="activeSheet === 'profil' ? 'scale-100 opacity-100' : 'scale-0 opacity-0'"></span>
                </div>
                <span class="text-[9px] font-bold tracking-wide relative z-10 leading-none">Profil</span>
            </button>

            {{-- ── REGULASI (dropdown) ── --}}
            @php $regulasiSheetClass = $regulasiActive ? 'text-blue-400' : 'text-slate-500 hover:text-blue-300'; @endphp
            <button type="button" @click="toggleSheet('regulasi')"
               class="flex flex-col items-center justify-center gap-1.5 w-[52px] h-[68px] px-1 rounded-2xl transition-all duration-200 active:scale-90 relative cursor-pointer group {{ $regulasiSheetClass }}"
               :class="activeSheet === 'regulasi' ? 'text-blue-400' : ''">
                <span class="absolute inset-0 rounded-2xl transition-all"
                      :class="activeSheet === 'regulasi' ? 'bg-blue-500/12 border border-blue-500/25' : '{{ $regulasiActive ? 'bg-blue-500/12 border border-blue-500/25' : '' }}'"></span>
                <div class="relative w-7 h-7 flex items-center justify-center">
                    <span class="absolute inset-0 rounded-xl transition-all"
                          :class="activeSheet === 'regulasi' ? 'bg-blue-500/20 border border-blue-400/30' : '{{ $regulasiActive ? 'bg-blue-500/20 border border-blue-400/30' : '' }}'"></span>
                    <svg class="w-[20px] h-[20px] relative z-10 transition-all duration-200 group-hover:scale-110"
                         :class="activeSheet === 'regulasi' ? 'scale-110' : ''"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                    </svg>
                    <span class="absolute -top-0.5 -right-0.5 w-2 h-2 rounded-full bg-blue-400 border-2 border-[#04091a] transition-all duration-200"
                          :class="activeSheet === 'regulasi' ? 'scale-100 opacity-100' : 'scale-0 opacity-0'"></span>
                </div>
                <span class="text-[9px] font-bold tracking-wide relative z-10 leading-none">Regulasi</span>
            </button>

            {{-- ── DOKUMEN (dropdown) ── --}}
            @php $dokumenSheetClass = $dokumenActive ? 'text-blue-400' : 'text-slate-500 hover:text-blue-300'; @endphp
            <button type="button" @click="toggleSheet('dokumen')"
               class="flex flex-col items-center justify-center gap-1.5 w-[52px] h-[68px] px-1 rounded-2xl transition-all duration-200 active:scale-90 relative cursor-pointer group {{ $dokumenSheetClass }}"
               :class="activeSheet === 'dokumen' ? 'text-blue-400' : ''">
                <span class="absolute inset-0 rounded-2xl transition-all"
                      :class="activeSheet === 'dokumen' ? 'bg-blue-500/12 border border-blue-500/25' : '{{ $dokumenActive ? 'bg-blue-500/12 border border-blue-500/25' : '' }}'"></span>
                <div class="relative w-7 h-7 flex items-center justify-center">
                    <span class="absolute inset-0 rounded-xl transition-all"
                          :class="activeSheet === 'dokumen' ? 'bg-blue-500/20 border border-blue-400/30' : '{{ $dokumenActive ? 'bg-blue-500/20 border border-blue-400/30' : '' }}'"></span>
                    <svg class="w-[20px] h-[20px] relative z-10 transition-all duration-200 group-hover:scale-110"
                         :class="activeSheet === 'dokumen' ? 'scale-110' : ''"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                    </svg>
                    <span class="absolute -top-0.5 -right-0.5 w-2 h-2 rounded-full bg-blue-400 border-2 border-[#04091a] transition-all duration-200"
                          :class="activeSheet === 'dokumen' ? 'scale-100 opacity-100' : 'scale-0 opacity-0'"></span>
                </div>
                <span class="text-[9px] font-bold tracking-wide relative z-10 leading-none">Dokumen</span>
            </button>

            {{-- ── LAYANAN (dropdown) ── --}}
            @php 
                $layananActive = request()->is('layanan*');
                $layananSheetClass = $layananActive ? 'text-blue-400' : 'text-slate-500 hover:text-blue-300'; 
            @endphp
            <button type="button" @click="toggleSheet('layanan')"
               class="flex flex-col items-center justify-center gap-1.5 w-[52px] h-[68px] px-1 rounded-2xl transition-all duration-200 active:scale-90 relative cursor-pointer group {{ $layananSheetClass }}"
               :class="activeSheet === 'layanan' ? 'text-blue-400' : ''">
                <span class="absolute inset-0 rounded-2xl transition-all"
                      :class="activeSheet === 'layanan' ? 'bg-blue-500/12 border border-blue-500/25' : '{{ $layananActive ? 'bg-blue-500/12 border border-blue-500/25' : '' }}'"></span>
                <div class="relative w-7 h-7 flex items-center justify-center">
                    <span class="absolute inset-0 rounded-xl transition-all"
                          :class="activeSheet === 'layanan' ? 'bg-blue-500/20 border border-blue-400/30' : '{{ $layananActive ? 'bg-blue-500/20 border border-blue-400/30' : '' }}'"></span>
                    <svg class="w-[20px] h-[20px] relative z-10 transition-all duration-200 group-hover:scale-110"
                         :class="activeSheet === 'layanan' ? 'scale-110' : ''"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span class="absolute -top-0.5 -right-0.5 w-1.5 h-1.5 rounded-full bg-blue-400 border border-[#04091a] transition-all duration-200"
                          :class="activeSheet === 'layanan' ? 'scale-100 opacity-100' : 'scale-0 opacity-0'"></span>
                </div>
                <span class="text-[9px] font-bold tracking-wide relative z-10 leading-none">Layanan</span>
            </button>

            {{-- ── PPID (special yellow accent) ── --}}
            <a href="/ppid/permohonan" wire:navigate
               class="flex flex-col items-center justify-center gap-1.5 w-[52px] h-[68px] px-1 rounded-2xl transition-all duration-200 active:scale-90 relative group
                      {{ $ppidActive ? 'text-yellow-300' : 'text-yellow-600/80 hover:text-yellow-400' }}">
                @if($ppidActive)
                    <span class="absolute inset-0 bg-yellow-500/10 rounded-2xl border border-yellow-500/30"></span>
                @endif
                <div class="relative w-7 h-7 flex items-center justify-center">
                    @if($ppidActive)
                        <span class="absolute inset-0 bg-yellow-500/20 rounded-xl border border-yellow-400/40"
                              style="box-shadow: 0 0 12px rgba(234,179,8,0.35);"></span>
                    @endif
                    <svg class="w-[20px] h-[20px] relative z-10 transition-transform duration-200 group-hover:scale-110"
                         fill="{{ $ppidActive ? 'currentColor' : 'none' }}"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="{{ $ppidActive ? 0 : 1.7 }}">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <span class="text-[9px] font-bold tracking-wide relative z-10 leading-none">PPID</span>
            </a>

            {{-- ── PORTAL (special blue accent) ── --}}
            <a href="/portal" wire:navigate
               class="flex flex-col items-center justify-center gap-1.5 w-[52px] h-[68px] px-1 rounded-2xl transition-all duration-200 active:scale-90 relative group
                      {{ $portalActive ? 'text-blue-400' : 'text-slate-500 hover:text-blue-300' }}">
                @if($portalActive)
                    <span class="absolute inset-0 bg-blue-500/12 rounded-2xl border border-blue-500/25"
                          style="box-shadow: 0 0 15px rgba(59,130,246,0.2) inset;"></span>
                @endif
                <div class="relative w-7 h-7 flex items-center justify-center">
                    @if($portalActive)
                        <span class="absolute inset-0 bg-blue-500/20 rounded-xl border border-blue-400/30"
                              style="box-shadow: 0 0 12px rgba(59,130,246,0.4);"></span>
                    @endif
                    <svg class="w-[20px] h-[20px] relative z-10 transition-transform duration-200 group-hover:scale-110"
                         fill="{{ $portalActive ? 'currentColor' : 'none' }}"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="{{ $portalActive ? 0 : 1.7 }}">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                    </svg>
                </div>
                <span class="text-[9px] font-bold tracking-wide relative z-10 leading-none">Portal</span>
            </a>

        </div>
    </nav>

    {{-- Spacer agar konten tidak tertutup navbar --}}
    <div class="h-[72px]" aria-hidden="true"></div>

</div>

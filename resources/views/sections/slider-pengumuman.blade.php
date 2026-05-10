        <!-- ============================================ -->
        <!-- SECTION 2: SLIDE BERITA UTAMA & LAYANAN     -->
        <!-- ============================================ -->
        <section class="py-16 relative bg-instansi-surface" x-data="{ currentSlide: 0, totalSlides: {{ count($pengumumanItems ?? []) }}, isModalOpen: false, modalImageSrc: '' }" x-init="setInterval(() => { currentSlide = (currentSlide + 1) % totalSlides }, 5000)" @keydown.escape.window="isModalOpen = false">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- News Slider (2/3 width) -->
                    <div data-aos="fade-right" class="lg:col-span-2 relative rounded-3xl overflow-hidden shadow-2xl shadow-slate-300-dark/20 group border border-slate-300/10
                         aspect-[16/7] sm:aspect-[16/6] lg:aspect-auto lg:min-h-[400px]">
                        <!-- Shimmer skeleton -->
                        <div class="absolute inset-0 shimmer-bg z-0"></div>
                        <!-- Slides -->
                        @foreach($pengumumanItems as $index => $pengumuman)
                        <div class="absolute inset-0 transform-gpu"
                             x-show="currentSlide === {{ $index }}"
                             x-transition:enter="transition-transform duration-[800ms] ease-[cubic-bezier(0.25,1,0.5,1)] z-10"
                             x-transition:enter-start="translate-y-full"
                             x-transition:enter-end="translate-y-0"
                             x-transition:leave="transition-transform duration-[800ms] ease-[cubic-bezier(0.25,1,0.5,1)] z-0"
                             x-transition:leave-start="translate-y-0"
                             x-transition:leave-end="-translate-y-full">
                            <a href="#" @click.prevent="isModalOpen = true; modalImageSrc = '{{ $pengumuman['image'] }}'" class="absolute inset-0 flex items-center justify-center bg-white cursor-zoom-in">
                                <img src="{{ $pengumuman['image'] }}" alt="{{ $pengumuman['title'] }}" class="w-full h-full object-contain transition-transform duration-[2s] ease-out" loading="lazy">
                            </a>
                        </div>
                        @endforeach

                        <!-- Minimalist Vertical Slider Controls -->
                        <div class="absolute right-6 top-1/2 -translate-y-1/2 z-20 flex flex-col items-center gap-5">
                            <button @click="currentSlide = (currentSlide - 1 + totalSlides) % totalSlides" 
                                    class="text-slate-400 hover:text-instansi-action transition-all active:scale-90 p-1"
                                    title="Sebelumnya">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18 15l-6-6-6 6" /></svg>
                            </button>
                            
                            <div class="flex flex-col gap-3">
                                @foreach($pengumumanItems as $index => $pengumuman)
                                <button @click="currentSlide = {{ $index }}" 
                                        class="w-1 rounded-full transition-all duration-500" 
                                        :class="currentSlide === {{ $index }} ? 'bg-instansi-action h-8' : 'bg-slate-300/40 h-1.5 hover:bg-slate-400'"></button>
                                @endforeach
                            </div>

                            <button @click="currentSlide = (currentSlide + 1) % totalSlides" 
                                    class="text-slate-400 hover:text-instansi-action transition-all active:scale-90 p-1"
                                    title="Selanjutnya">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 9l6 6 6-6" /></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Layanan Laporan Sidebar (Ultra-Clean Corporate Aesthetic) -->
                    <div class="lg:col-span-1 flex flex-col h-full gap-3 md:gap-4" data-aos="fade-left" data-aos-delay="200">
                        
                        <!-- 1. Layanan Pengaduan -->
                        <a href="{{ route('layanan.pengaduan') }}" wire:navigate class="group relative flex-1 flex flex-col justify-center px-6 py-5 bg-white border border-slate-200/80 rounded-2xl overflow-hidden hover:border-sky-500/30 hover:shadow-[0_8px_30px_rgb(0,0,0,0.04)] transition-all duration-300">
                            <!-- Subtle Highlight Line on Hover -->
                            <div class="absolute left-0 top-0 bottom-0 w-1 bg-sky-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <div class="relative z-10 flex items-start gap-4">
                                <div class="w-12 h-12 shrink-0 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-slate-600 group-hover:bg-sky-50 group-hover:text-sky-600 group-hover:border-sky-100 transition-all duration-300">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" /></svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-montserrat font-bold text-[15px] text-slate-800 mb-1 group-hover:text-sky-600 transition-colors">Layanan Pengaduan</h3>
                                    <p class="text-slate-500 text-xs leading-relaxed font-medium">Sistem Informasi Pengaduan Kemasyarakatan</p>
                                </div>
                                <div class="w-8 h-8 shrink-0 flex items-center justify-center text-slate-300 group-hover:translate-x-1 group-hover:text-sky-600 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                                </div>
                            </div>
                        </a>

                        <!-- 2. Cek Status Laporan -->
                        <a href="{{ route('layanan.cek-status') }}" wire:navigate class="group relative flex-1 flex flex-col justify-center px-6 py-5 bg-white border border-slate-200/80 rounded-2xl overflow-hidden hover:border-sky-500/30 hover:shadow-[0_8px_30px_rgb(0,0,0,0.04)] transition-all duration-300">
                            <!-- Subtle Highlight Line on Hover -->
                            <div class="absolute left-0 top-0 bottom-0 w-1 bg-sky-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <div class="relative z-10 flex items-start gap-4">
                                <div class="w-12 h-12 shrink-0 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-slate-600 group-hover:bg-sky-50 group-hover:text-sky-600 group-hover:border-sky-100 transition-all duration-300">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-montserrat font-bold text-[15px] text-slate-800 mb-1 group-hover:text-sky-600 transition-colors">Cek Status Laporan</h3>
                                    <p class="text-slate-500 text-xs leading-relaxed font-medium">Lacak alur progres tindak lanjut layanan</p>
                                </div>
                                <div class="w-8 h-8 shrink-0 flex items-center justify-center text-slate-300 group-hover:translate-x-1 group-hover:text-sky-600 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                                </div>
                            </div>
                        </a>

                        <!-- 3. Survey Kepuasan -->
                        <a href="{{ route('layanan.survey') }}" wire:navigate class="group relative flex-1 flex flex-col justify-center px-6 py-5 bg-white border border-slate-200/80 rounded-2xl overflow-hidden hover:border-sky-500/30 hover:shadow-[0_8px_30px_rgb(0,0,0,0.04)] transition-all duration-300">
                            <!-- Subtle Highlight Line on Hover -->
                            <div class="absolute left-0 top-0 bottom-0 w-1 bg-sky-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <div class="relative z-10 flex items-start gap-4">
                                <div class="w-12 h-12 shrink-0 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-slate-600 group-hover:bg-sky-50 group-hover:text-sky-600 group-hover:border-sky-100 transition-all duration-300">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" /></svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-montserrat font-bold text-[15px] text-slate-800 mb-1 group-hover:text-sky-600 transition-colors">Survey Kepuasan</h3>
                                    <p class="text-slate-500 text-xs leading-relaxed font-medium">Bantu isi Indeks Kepuasan Masyarakat (IKM)</p>
                                </div>
                                <div class="w-8 h-8 shrink-0 flex items-center justify-center text-slate-300 group-hover:translate-x-1 group-hover:text-sky-600 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Lightbox Modal -->
            <div x-show="isModalOpen" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-[100] flex items-center justify-center bg-black/90 backdrop-blur-sm p-4 sm:p-8"
                 x-cloak>
                
                <!-- Close Button -->
                <button @click="isModalOpen = false" class="absolute top-6 right-6 text-white/70 hover:text-white bg-white/10 hover:bg-white/20 rounded-full p-2 transition-all duration-300 z-[110]">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>

                <!-- Full Image -->
                <div class="relative max-w-7xl w-full max-h-full flex items-center justify-center" @click.away="isModalOpen = false">
                    <img :src="modalImageSrc" class="max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl ring-1 ring-white/10" alt="Pengumuman Full"
                         x-show="isModalOpen"
                         x-transition:enter="transition ease-out duration-300 transform"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100" />
                </div>
            </div>
        </section>

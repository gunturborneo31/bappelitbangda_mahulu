        <!-- ============================================ -->
        <!-- SECTION 5: APLIKASI & LAYANAN (LIGHT)       -->
        <!-- ============================================ -->
        <section id="layanan" class="py-24 relative overflow-hidden bg-slate-50 border-y border-slate-200/60">
            <!-- Subtle Corporate Grid Background -->
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(rgba(15, 23, 42, 0.8) 1px, transparent 1px); background-size: 32px 32px;"></div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                    <span class="inline-block py-1 px-3 rounded-full bg-blue-100 text-blue-700 font-bold tracking-wider uppercase text-xs mb-3 border border-blue-200">Akses Digital</span>
                    <h2 class="mt-2 font-montserrat font-black text-4xl md:text-5xl leading-tight text-slate-800">
                        Aplikasi & <span class="text-blue-600">Layanan</span>
                    </h2>
                    <p class="mt-4 text-slate-500 text-lg font-medium">Platform digital terintegrasi untuk kemudahan masyarakat Mahakam Ulu</p>
                </div>

                <!-- Infinite Slider Container (Draggable) -->
                <div class="relative w-full overflow-hidden cursor-grab active:cursor-grabbing" 
                     x-data="{ 
                        items: @js($allLinks),
                        isDown: false,
                        startX: 0,
                        scrollLeft: 0,
                        momentumID: null,
                        velX: 0,
                        autoScrollID: null,
                        autoScrollSpeed: 0.8,
                        
                        startDrag(e) {
                            this.isDown = true;
                            if(this.autoScrollID) cancelAnimationFrame(this.autoScrollID);
                            if(this.momentumID) cancelAnimationFrame(this.momentumID);
                            
                            this.startX = (e.pageX || e.touches?.[0]?.pageX) - this.$refs.slider.offsetLeft;
                            this.scrollLeft = this.$refs.slider.scrollLeft;
                        },
                        
                        stopDrag() {
                            this.isDown = false;
                            this.beginMomentum();
                        },
                        
                        onDrag(e) {
                            if(!this.isDown) return;
                            e.preventDefault(); 
                            
                            const x = (e.pageX || e.touches?.[0]?.pageX) - this.$refs.slider.offsetLeft;
                            const walk = (x - this.startX) * 1.5; 
                            
                            const prevScrollLeft = this.$refs.slider.scrollLeft;
                            this.$refs.slider.scrollLeft = this.scrollLeft - walk;
                            this.velX = this.$refs.slider.scrollLeft - prevScrollLeft;
                            this.checkLoop();
                        },

                        checkLoop() {
                            const slider = this.$refs.slider;
                            const track1 = this.$refs.track1;
                            if(!track1) return;
                            const resetWidth = track1.getBoundingClientRect().width + 24; 
                            
                            if (slider.scrollLeft >= resetWidth) {
                                slider.scrollLeft -= resetWidth;
                                this.scrollLeft -= resetWidth;
                            } else if (slider.scrollLeft <= 0) {
                                slider.scrollLeft += resetWidth;
                                this.scrollLeft += resetWidth;
                            }
                        },
                        
                        beginMomentum() {
                            const friction = 0.95; 
                            const step = () => {
                                if(this.isDown) return;

                                if (Math.abs(this.velX) > 0.5) {
                                    this.$refs.slider.scrollLeft += this.velX;
                                    this.velX *= friction;
                                    this.checkLoop();
                                    this.momentumID = requestAnimationFrame(step);
                                } else {
                                    this.velX = 0;
                                    this.startAutoScroll();
                                }
                            };
                            this.momentumID = requestAnimationFrame(step);
                        },

                        startAutoScroll() {
                            if(this.autoScrollID) cancelAnimationFrame(this.autoScrollID);
                            const step = () => {
                                if(!this.isDown && Math.abs(this.velX) < 0.5) {
                                    this.$refs.slider.scrollLeft += this.autoScrollSpeed;
                                    this.checkLoop();
                                }
                                this.autoScrollID = requestAnimationFrame(step);
                            };
                            this.autoScrollID = requestAnimationFrame(step);
                        },

                        init() {
                            this.$nextTick(() => {
                                const track1 = this.$refs.track1;
                                if(track1) {
                                    // Calculate loop width correctly with proper timeout to allow DOM layout
                                    setTimeout(() => {
                                        const resetWidth = track1.getBoundingClientRect().width + 24;
                                        this.$refs.slider.scrollLeft = resetWidth;
                                    }, 100);
                                }
                                this.startAutoScroll();
                            });
                        }
                     }"
                     x-init="init()">
                    
                    <!-- Gradient masks for smooth fade edges -->
                    <div class="absolute left-0 top-0 bottom-0 w-8 md:w-24 bg-gradient-to-r from-slate-50 to-transparent z-10 pointer-events-none"></div>
                    <div class="absolute right-0 top-0 bottom-0 w-8 md:w-24 bg-gradient-to-l from-slate-50 to-transparent z-10 pointer-events-none"></div>

                    <!-- Slider track (Scrollable Container) -->
                    <div x-ref="slider"
                         class="flex overflow-x-hidden scroll-auto select-none py-4"
                         style="scrollbar-width: none; -ms-overflow-style: none;"
                         @mouseleave="if(isDown) stopDrag()"
                         @mousedown="startDrag($event)"
                         @mouseup="stopDrag()"
                         @mousemove="onDrag($event)"
                         @touchstart.passive="startDrag($event)"
                         @touchend.passive="stopDrag()"
                         @touchmove.passive="onDrag($event)">
                        
                        <style>
                            .hide-scrollbar::-webkit-scrollbar { display: none; }
                        </style>

                        <!-- Wrapper for tracks -->
                        <div class="flex gap-6 w-max hide-scrollbar px-6">
                            
                            <!-- 4 Identical Tracks for infinite loop -->
                            <template x-for="i in 4" :key="'group-'+i">
                                <div class="flex items-stretch gap-6 min-w-max pointer-events-auto" :x-ref="i === 1 ? 'track1' : null" :aria-hidden="i !== 1">
                                    <template x-for="(link, index) in items" :key="'link-'+i+'-'+index">
                                        <a :href="link.link" target="_blank"
                                           @click="if(Math.abs(velX) > 5) $event.preventDefault()" 
                                           draggable="false"
                                           class="group relative bg-white border border-slate-200/80 rounded-2xl p-6 transition-all duration-300 hover:border-blue-300 hover:shadow-[0_10px_30px_rgba(37,99,235,0.08)] hover:-translate-y-1 active:scale-[0.98] flex flex-col items-center text-center overflow-hidden w-[320px] shrink-0 h-full">
                                            
                                            <!-- Subtle Blue Hover Accent line -->
                                            <div class="absolute top-0 left-0 right-0 h-1 bg-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                            <!-- Icon Container -->
                                            <div class="w-36 h-36 rounded-3xl bg-slate-50 flex items-center justify-center border border-slate-100 mb-6 group-hover:bg-blue-50/50 group-hover:border-blue-200 transition-all duration-300 shadow-sm">
                                                <img :src="link.logo" :alt="link.name" draggable="false" class="w-28 h-28 object-contain mx-auto filter group-hover:scale-110 transition-transform duration-300" loading="lazy">
                                            </div>

                                            <!-- Text Content -->
                                            <h4 class="font-bold text-slate-800 text-xl group-hover:text-blue-600 transition-colors mb-3 line-clamp-2 w-full leading-snug" x-text="link.name"></h4>
                                            <p class="text-slate-500 text-sm md:text-base line-clamp-3 leading-relaxed w-full flex-1" x-text="link.desc"></p>
                                        </a>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- CTA Banner -->
                <!-- Removed overflow-hidden so the 3D asset can pop out! -->
                <div data-aos="fade-up" data-aos-delay="200" class="group/card mt-24 mb-12 bg-gradient-to-br from-slate-900 to-slate-800 rounded-[2.5rem] p-8 md:p-14 lg:py-12 flex flex-col lg:flex-row items-center justify-between gap-10 shadow-2xl relative ring-1 ring-white/10">
                    <!-- Glass Orbs (need to clip just to the bg if possible, or let them shine) -->
                    <div class="absolute -right-20 -top-20 w-80 h-80 bg-sky-500/20 rounded-full blur-[80px] z-0"></div>
                    <div class="absolute right-40 -bottom-20 w-60 h-60 bg-yellow-400/20 rounded-full blur-[60px] z-0"></div>
                    <div class="absolute -left-10 top-10 w-40 h-40 bg-sky-400/10 rounded-full blur-[40px] z-0"></div>

                    <div class="relative z-10 max-w-2xl text-center lg:text-left flex flex-col lg:items-start items-center">
                        <span class="inline-block py-1 px-3 rounded-full bg-slate-800 text-sky-300 font-semibold tracking-wider uppercase text-[10px] md:text-xs mb-4 border border-white/10 backdrop-blur-md">LAYANAN PUBLIK</span>
                        <h3 class="font-montserrat font-black text-3xl md:text-4xl text-white mb-4 leading-tight">Butuh Data & Informasi?</h3>
                        <p class="text-slate-300 text-base md:text-lg leading-relaxed max-w-xl mb-8">Ajukan permohonan informasi publik secara online melalui platform terpadu kami dengan cepat, transparan, dan terpercaya.</p>
                        
                        <a href="{{ route('ppid.permohonan') }}" class="relative z-10 shrink-0 group inline-flex items-center px-8 py-4 md:px-10 md:py-5 rounded-2xl bg-gradient-to-r from-sky-500 to-blue-600 text-white font-bold hover:from-sky-400 hover:to-blue-500 transition-all duration-300 shadow-[0_0_40px_rgba(14,165,233,0.4)] hover:shadow-[0_0_60px_rgba(14,165,233,0.5)] hover:-translate-y-1 active:scale-95">
                            <span class="text-base md:text-lg">Ajukan Permohonan</span>
                            <div class="ml-4 w-8 h-8 rounded-full bg-white/20 flex items-center justify-center group-hover:bg-white group-hover:text-blue-500 transition-colors">
                                <svg class="w-5 h-5 ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                            </div>
                        </a>
                    </div>
                    
                    <!-- 3D Phone Image popping out -->
                    <!-- 'clip-path' ensures the image is cleanly cut at the bottom exactly where the box ends, but the top can overflow -->
                    <div class="relative z-20 w-full lg:w-[350px] flex-shrink-0 flex justify-center lg:justify-end lg:absolute lg:right-8 lg:bottom-0 pointer-events-none"
                         style="clip-path: inset(-150% -50% 0 -50%);">
                        <!-- Origin set to bottom so scaling happens upwards. Starts shifted down by 3rem (translate-y-12) and hidden by clip-path, then rises up to 0 on hover -->
                        <img src="{{ asset('images/3d_pns_mahulu_logo_clean.png') }}" 
                             alt="Permohonan Informasi App PNS" 
                             class="w-[280px] lg:w-[350px] lg:origin-bottom -mt-20 lg:mt-0 translate-y-12 lg:translate-y-16 drop-shadow-[0_-10px_30px_rgba(14,165,233,0.3)] transform group-hover/card:translate-y-0 lg:group-hover/card:translate-y-0 group-hover/card:rotate-1 group-hover/card:scale-105 transition-all duration-700 pointer-events-auto ease-out">
                    </div>
                </div>
            </div>
        </section>

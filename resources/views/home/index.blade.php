@extends('layouts.app')

@section('content')
{{-- PREMIUM CAROUSEL SLIDER --}}
@if($heroSlides && $heroSlides->count() > 0)
<section id="hero-carousel" class="relative h-[500px] md:h-[700px] overflow-hidden bg-gradient-to-br from-mint via-electric-purple/10 to-hot-pink/10">
    {{-- Carousel Slides --}}
    @foreach($heroSlides as $index => $slide)
    <div class="carousel-slide absolute inset-0 {{ $index === 0 ? 'active' : '' }}" style="display: {{ $index === 0 ? 'block' : 'none' }};">
        <div class="relative h-full">
            {{-- Background Image with Overlay --}}
            <div class="absolute inset-0">
                <img src="{{ asset('storage/' . $slide->image) }}" 
                     alt="{{ $slide->title }}" 
                     class="w-full h-full object-cover">
                {{-- Futuristic Gradient Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-br from-electric-purple/70 via-hot-pink/50 to-electric-purple/70"></div>
                {{-- Grid Pattern --}}
                <div class="absolute inset-0 grid-pattern opacity-20"></div>
            </div>
            
            {{-- Content --}}
            <div class="relative z-10 h-full flex items-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="max-w-3xl" data-aos="fade-up" data-aos-duration="800">
                        {{-- Glass Container --}}
                        <div class="glass-strong p-8 md:p-12 rounded-3xl border border-white/30">
                            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold mb-6 text-white neon-text-purple">
                                {{ $slide->title }}
                            </h1>
                            <p class="text-xl md:text-2xl mb-8 text-white/90 leading-relaxed">
                                {{ $slide->subtitle }}
                            </p>
                            @if($slide->cta_text)
                            <a href="{{ $slide->cta_link ?: ($slide->slug ? route('promo.show', $slide->slug) : '#packages') }}" 
                               class="btn-futuristic inline-flex items-center gap-3 group">
                                <span>{{ $slide->cta_text }}</span>
                                <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Navigation Arrows --}}
    <button class="carousel-prev absolute left-4 md:left-8 top-1/2 -translate-y-1/2 glass-strong hover:bg-white/30 text-white p-4 rounded-full transition-all z-20 group neon-purple">
        <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"/>
        </svg>
    </button>
    <button class="carousel-next absolute right-4 md:right-8 top-1/2 -translate-y-1/2 glass-strong hover:bg-white/30 text-white p-4 rounded-full transition-all z-20 group neon-purple">
        <svg class="w-6 h-6 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/>
        </svg>
    </button>

    {{-- Dots Navigation --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-3 z-20">
        @foreach($heroSlides as $index => $slide)
        <button class="carousel-dot w-3 h-3 rounded-full transition-all {{ $index === 0 ? 'active bg-white w-8' : 'bg-white/50 hover:bg-white/80' }}"></button>
        @endforeach
    </div>
</section>
@endif


{{-- FUTURISTIC HERO SECTION WITH WAVE BACKGROUND --}}
<section class="relative min-h-screen overflow-hidden bg-gradient-to-br from-mint via-mint-100 to-white">
    {{-- Animated Wave Background --}}
    <div class="wave-container absolute inset-0 opacity-40">
        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="url(#gradient1)" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,165.3C384,171,480,149,576,133.3C672,117,768,107,864,122.7C960,139,1056,181,1152,186.7C1248,192,1344,160,1392,144L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            <defs>
                <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#B153D7;stop-opacity:0.3" />
                    <stop offset="50%" style="stop-color:#F375C2;stop-opacity:0.2" />
                    <stop offset="100%" style="stop-color:#B153D7;stop-opacity:0.3" />
                </linearGradient>
            </defs>
        </svg>
        
        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" style="margin-top: -100px;">
            <path fill="url(#gradient2)" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            <defs>
                <linearGradient id="gradient2" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#F375C2;stop-opacity:0.2" />
                    <stop offset="50%" style="stop-color:#B153D7;stop-opacity:0.3" />
                    <stop offset="100%" style="stop-color:#F0FFDF;stop-opacity:0.1" />
                </linearGradient>
            </defs>
        </svg>
    </div>

    {{-- Floating Particles Container --}}
    <div id="particle-container" class="absolute inset-0 pointer-events-none"></div>

    {{-- Grid Pattern Overlay --}}
    <div class="absolute inset-0 grid-pattern opacity-30"></div>

    {{-- Hero Content --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            {{-- Left Column: Content --}}
            <div class="text-center lg:text-left space-y-8" data-aos="fade-right" data-aos-duration="1000">
                {{-- Premium Badge --}}
                <div class="inline-flex items-center gap-3 px-6 py-3 rounded-full glass-strong border border-electric-purple/30" data-aos="zoom-in" data-aos-delay="200">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-electric-purple opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-hot-pink"></span>
                    </span>
                    <span class="text-sm font-bold text-gradient-futuristic">
                        #1 Premium Internet Provider 🚀
                    </span>
                </div>

                {{-- Main Headline --}}
                <h1 class="text-5xl lg:text-7xl font-extrabold leading-tight" data-aos="fade-up" data-aos-delay="300">
                    <span class="text-gray-900">Internet</span>
                    <br>
                    <span class="text-gradient-rainbow inline-block">
                        Kecepatan Cahaya
                    </span>
                    <br>
                    <span class="text-gray-900">untuk Masa Depan</span>
                </h1>

                {{-- Description --}}
                <p class="text-xl text-gray-700 leading-relaxed max-w-2xl mx-auto lg:mx-0" data-aos="fade-up" data-aos-delay="400">
                    Rasakan revolusi internet dengan teknologi <span class="font-bold text-electric-purple neon-text-purple">fiber optic</span> tercanggih dari <span class="font-bold text-gradient-futuristic">Indah Internet</span>. Streaming 4K, gaming tanpa lag, bekerja tanpa batas.
                </p>

                {{-- Stats Cards --}}
                <div class="grid grid-cols-3 gap-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="glass p-4 rounded-2xl text-center hover-glow">
                        <div class="text-3xl font-black text-gradient-futuristic" data-counter="1000">0</div>
                        <div class="text-xs text-gray-600 mt-1">Mbps</div>
                    </div>
                    <div class="glass p-4 rounded-2xl text-center hover-glow">
                        <div class="text-3xl font-black text-gradient-futuristic" data-counter="300">0</div>
                        <div class="text-xs text-gray-600 mt-1">Users+</div>
                    </div>
                    <div class="glass p-4 rounded-2xl text-center hover-glow">
                        <div class="text-3xl font-black text-gradient-futuristic" data-counter="24">0</div>
                        <div class="text-xs text-gray-600 mt-1">Support</div>
                    </div>
                </div>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4" data-aos="fade-up" data-aos-delay="600">
                    {{-- Primary Button --}}
                    <a href="#packages" class="btn-futuristic group flex items-center gap-3">
                        <span>Pilih Paket Sekarang</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>

                    {{-- WhatsApp Button --}}
                    <a href="https://wa.me/6285814578401?text=Halo%20Indah%20Internet!%20Saya%20tertarik%20dengan%20layanan%20internet%20premium%20Anda" 
                       target="_blank"
                       class="btn-outline-futuristic group flex items-center gap-3">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 448 512">
                            <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                        </svg>
                        <span>Konsultasi Gratis</span>
                    </a>
                </div>

                {{-- Trust Indicators --}}
                <div class="flex items-center justify-center lg:justify-start gap-6 text-sm" data-aos="fade-up" data-aos-delay="700">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-electric-purple" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold text-gray-700">Instalasi Gratis</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-electric-purple" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold text-gray-700">Garansi 30 Hari</span>
                    </div>
                </div>
            </div>

            {{-- Right Column: Visual --}}
            <div class="relative" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
                {{-- Main Image with Glassmorphism --}}
                <div class="relative float-element">
                    {{-- Decorative Glow --}}
                    <div class="absolute -inset-8 bg-gradient-to-r from-electric-purple/30 via-hot-pink/30 to-electric-purple/30 rounded-full blur-3xl opacity-60 animate-gradient"></div>
                    
                    {{-- Image Container --}}
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl transform hover:scale-[1.02] transition-transform duration-500 neon-purple">
                        <img src="{{ asset('img/indah.jpeg') }}" alt="Indah Internet - Premium Fiber Optic" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-electric-purple/30 via-transparent to-transparent"></div>
                    </div>

                    {{-- Floating Speed Card --}}
                    <div class="absolute -bottom-6 -left-6 glass-strong p-6 rounded-2xl shadow-2xl transform hover:-translate-y-2 transition-transform neon-purple" data-aos="zoom-in" data-aos-delay="800">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-electric-purple to-hot-pink rounded-xl flex items-center justify-center animate-glow">
                                <span class="text-3xl">⚡</span>
                            </div>
                            <div>
                                <div class="text-sm text-gray-600 font-medium">Kecepatan Maksimal</div>
                                <div class="text-3xl font-black text-gradient-futuristic">
                                    1 Gbps
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Floating Customer Card --}}
                    <div class="absolute -top-6 -right-6 glass-strong p-4 rounded-xl shadow-xl transform hover:-translate-y-2 transition-transform" data-aos="zoom-in" data-aos-delay="900">
                        <div class="flex items-center gap-3">
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-hot-pink to-electric-purple border-2 border-white"></div>
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-electric-purple to-hot-pink border-2 border-white"></div>
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-hot-pink to-mint border-2 border-white"></div>
                            </div>
                            <div>
                                <div class="text-lg font-bold text-gray-900">300+</div>
                                <div class="text-xs text-gray-600">Happy Users</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- PREMIUM PACKAGES SECTION --}}
<section id="packages" class="py-20 bg-white relative overflow-hidden">
    {{-- Decorative Background --}}
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 left-10 w-96 h-96 bg-electric-purple rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-hot-pink rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-block px-4 py-2 rounded-full bg-mint-200 text-electric-purple font-semibold text-sm mb-4">
                ✨ Premium Packages
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                Paket <span class="text-gradient-futuristic">Terbaik</span> untuk Anda
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Pilih paket internet premium dengan kecepatan super dan harga terjangkau
            </p>
        </div>

        {{-- Package Cards Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredPackages as $index => $package)
            <div class="card-glass hover-glow relative group" 
                 data-aos="fade-up" 
                 data-aos-delay="{{ $index * 100 }}">
                
                {{-- Discount Badge --}}
                @if($package->discount_percentage > 0)
                <div class="absolute -top-3 -right-3 px-4 py-2 rounded-full bg-gradient-to-r from-hot-pink to-electric-purple text-black text-sm font-bold shadow-xl neon-pink z-10">
                    Save {{ $package->discount_percentage }}%
                </div>
                @endif

                {{-- Package Content --}}
                <div class="p-8">
                    {{-- Icon --}}
                    <div class="w-20 h-20 bg-gradient-to-br from-electric-purple to-hot-pink rounded-2xl flex items-center justify-center mb-6 neon-purple transform group-hover:scale-110 transition-transform">
                        <span class="text-4xl">{{ $package->category->icon ?? '📡' }}</span>
                    </div>

                    {{-- Package Info --}}
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $package->name }}</h3>
                    <p class="text-electric-purple font-semibold mb-6">{{ $package->category->name }}</p>

                    {{-- Speed --}}
                    <div class="mb-6">
                        <div class="text-5xl font-black text-gradient-futuristic mb-1">{{ $package->speed }}</div>
                        <p class="text-gray-600">Kecepatan Internet</p>
                    </div>

                    {{-- Price --}}
                    <div class="mb-6">
                        @if($package->original_price)
                        <p class="text-gray-400 line-through text-sm">{{ $package->formatted_original_price }}</p>
                        @endif
                        <div class="text-4xl font-black text-gray-900">{{ $package->formatted_price }}</div>
                        <p class="text-gray-600">/bulan</p>
                    </div>

                    {{-- Features --}}
                    @if($package->features)
                    <ul class="space-y-3 mb-8">
                        @foreach($package->features as $feature)
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-electric-purple mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700 font-medium">{{ $feature }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif

                    {{-- CTA Buttons --}}
                    <div class="space-y-3">
                        <a href="{{ route('packages.show', $package->slug) }}" class="btn-futuristic w-full text-center block">
                            Lihat Detail
                        </a>
                        
                        @php
                            $whatsappMessage = "Halo Indah Internet! 🌐\n\n";
                            $whatsappMessage .= "Saya tertarik berlangganan:\n";
                            $whatsappMessage .= "📦 *{$package->name}*\n";
                            $whatsappMessage .= "⚡ Kecepatan: {$package->speed}\n";
                            $whatsappMessage .= "💰 Harga: {$package->formatted_price}/bulan\n";
                            if($package->original_price) {
                                $whatsappMessage .= "🎉 Hemat {$package->discount_percentage}%\n";
                            }
                            $whatsappMessage .= "\nMohon info lebih lanjut. Terima kasih! 🙏";
                            $whatsappUrl = 'https://wa.me/6285814578401?text=' . urlencode($whatsappMessage);
                        @endphp
                        
                        <a href="{{ $whatsappUrl }}" target="_blank" class="btn-whatsapp w-full text-center flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 448 512">
                                <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                            </svg>
                            <span>Chat WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- View All Button --}}
        <div class="text-center mt-12" data-aos="fade-up">
            <a href="{{ route('packages.index') }}" class="btn-outline-futuristic inline-block">
                Lihat Semua Paket
            </a>
        </div>
    </div>
</section>

{{-- FEATURES SECTION --}}
<section id="features" class="py-20 bg-gradient-to-br from-mint-100 via-white to-mint-50 relative overflow-hidden">
    {{-- Wave Background --}}
    <div class="absolute top-0 left-0 w-full opacity-20">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="url(#gradient3)" fill-opacity="1" d="M0,160L48,144C96,128,192,96,288,106.7C384,117,480,171,576,181.3C672,192,768,160,864,138.7C960,117,1056,107,1152,117.3C1248,128,1344,160,1392,176L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
            <defs>
                <linearGradient id="gradient3" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#B153D7;stop-opacity:0.3" />
                    <stop offset="100%" style="stop-color:#F375C2;stop-opacity:0.3" />
                </linearGradient>
            </defs>
        </svg>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                Kenapa Pilih <span class="text-gradient-futuristic">Kami?</span>
            </h2>
            <p class="text-xl text-gray-600">
                Keunggulan layanan internet premium kami
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Feature 1 --}}
            <div class="card-futuristic text-center group" data-aos="zoom-in" data-aos-delay="100">
                <div class="text-6xl mb-4 transform group-hover:scale-110 transition-transform">⚡</div>
                <h3 class="text-xl font-bold mb-2 text-gradient-futuristic">Super Cepat</h3>
                <p class="text-gray-600">Kecepatan hingga 1 Gbps untuk streaming dan gaming tanpa lag</p>
            </div>

            {{-- Feature 2 --}}
            <div class="card-futuristic text-center group" data-aos="zoom-in" data-aos-delay="200">
                <div class="text-6xl mb-4 transform group-hover:scale-110 transition-transform">🔒</div>
                <h3 class="text-xl font-bold mb-2 text-gradient-futuristic">Aman & Stabil</h3>
                <p class="text-gray-600">Koneksi fiber optic yang stabil 24/7 dengan keamanan terjamin</p>
            </div>

            {{-- Feature 3 --}}
            <div class="card-futuristic text-center group" data-aos="zoom-in" data-aos-delay="300">
                <div class="text-6xl mb-4 transform group-hover:scale-110 transition-transform">💰</div>
                <h3 class="text-xl font-bold mb-2 text-gradient-futuristic">Harga Terjangkau</h3>
                <p class="text-gray-600">Paket premium mulai dari harga yang sangat kompetitif</p>
            </div>

            {{-- Feature 4 --}}
            <div class="card-futuristic text-center group" data-aos="zoom-in" data-aos-delay="400">
                <div class="text-6xl mb-4 transform group-hover:scale-110 transition-transform">🎧</div>
                <h3 class="text-xl font-bold mb-2 text-gradient-futuristic">Support 24/7</h3>
                <p class="text-gray-600">Customer service profesional siap membantu kapan saja</p>
            </div>
        </div>
    </div>
</section>

{{-- CTA SECTION --}}
<section class="py-20 relative overflow-hidden bg-gradient-to-br from-electric-purple via-hot-pink to-electric-purple">
    {{-- Animated Background --}}
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-10 w-64 h-64 bg-white rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-mint rounded-full blur-3xl animate-float-delayed"></div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="zoom-in">
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6 neon-text-purple">
            Siap Upgrade Internet Anda?
        </h2>
        <p class="text-xl text-white/90 mb-10">
            Bergabunglah dengan 300+ pengguna yang sudah merasakan internet super cepat dari Indah Internet
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('packages.index') }}" class="bg-white text-electric-purple px-10 py-5 rounded-2xl font-bold hover:bg-mint transition-all inline-block shadow-2xl transform hover:scale-105">
                Lihat Semua Paket
            </a>
            <a href="https://wa.me/6285814578401?text=Halo%20Indah%20Internet!%20Saya%20ingin%20upgrade%20internet%20saya" 
               target="_blank"
               class="bg-transparent border-2 border-white text-white px-10 py-5 rounded-2xl font-bold hover:bg-white hover:text-electric-purple transition-all inline-block shadow-2xl transform hover:scale-105">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

{{-- CONTACT SECTION --}}
<section id="contact" class="py-20 bg-white relative overflow-hidden">
    {{-- Decorative Background --}}
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 right-20 w-96 h-96 bg-electric-purple rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-20 w-96 h-96 bg-hot-pink rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-block px-4 py-2 rounded-full bg-mint-200 text-electric-purple font-semibold text-sm mb-4">
                💬 Hubungi Kami
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                Ada Pertanyaan? <span class="text-gradient-futuristic">Kami Siap Membantu!</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Tim customer service kami siap melayani Anda 24/7 untuk konsultasi dan informasi lebih lanjut
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            {{-- Contact Form --}}
            <div class="card-glass" data-aos="fade-right">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Kirim Pesan</h3>
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6" data-validate>
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap *</label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               required
                               class="w-full px-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all"
                               placeholder="Nama Anda">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email *</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               required
                               class="w-full px-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all"
                               placeholder="email@example.com">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">No. Telepon</label>
                        <input type="tel" 
                               id="phone" 
                               name="phone"
                               class="w-full px-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all"
                               placeholder="08xx xxxx xxxx">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Pesan *</label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="5" 
                                  required
                                  class="w-full px-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all resize-none"
                                  placeholder="Tulis pesan atau pertanyaan Anda di sini..."></textarea>
                    </div>

                    <button type="submit" class="btn-futuristic w-full">
                        <span>Kirim Pesan</span>
                        <svg class="w-5 h-5 inline ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </form>
            </div>

            {{-- Contact Info --}}
            <div class="space-y-8" data-aos="fade-left">
                {{-- Quick Contact Cards --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    {{-- WhatsApp --}}
                    <a href="https://wa.me/6285814578401" target="_blank" class="card-futuristic group">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 448 512">
                                    <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">WhatsApp</p>
                                <p class="font-bold text-gray-900">+62 858-1457-8401</p>
                            </div>
                        </div>
                    </a>

                    {{-- Email --}}
                    <a href="mailto:info@indahinternet.com" class="card-futuristic group">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-electric-purple to-hot-pink rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Email</p>
                                <p class="font-bold text-gray-900">info@indahinternet.com</p>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Office Info --}}
                <div class="card-glass">
                    <h4 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-electric-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Kantor Kami
                    </h4>
                    <p class="text-gray-700 mb-4">
                        Jl. Teknologi Informasi No. 123<br>
                        Jakarta Selatan, DKI Jakarta 12345<br>
                        Indonesia
                    </p>
                    <p class="text-sm text-gray-600">
                        <strong>Jam Operasional:</strong><br>
                        Senin - Jumat: 08:00 - 17:00 WIB<br>
                        Sabtu: 09:00 - 14:00 WIB<br>
                        <span class="text-electric-purple font-semibold">Customer Service 24/7 via WhatsApp</span>
                    </p>
                </div>

                {{-- Social Media --}}
                <div class="card-glass">
                    <h4 class="text-xl font-bold text-gray-900 mb-4">Follow Us</h4>
                    <div class="flex gap-4">
                        <a href="#" class="w-12 h-12 bg-gradient-to-br from-electric-purple to-hot-pink rounded-xl flex items-center justify-center hover:scale-110 transition-transform neon-purple">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-gradient-to-br from-electric-purple to-hot-pink rounded-xl flex items-center justify-center hover:scale-110 transition-transform neon-purple">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-gradient-to-br from-electric-purple to-hot-pink rounded-xl flex items-center justify-center hover:scale-110 transition-transform neon-purple">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

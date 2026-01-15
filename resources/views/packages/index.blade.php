@extends('layouts.app')

@section('content')
{{-- FUTURISTIC PAGE HEADER --}}
<section class="relative min-h-[400px] overflow-hidden bg-gradient-to-br from-mint via-electric-purple/20 to-hot-pink/20 flex items-center">
    {{-- Animated Wave Background --}}
    <div class="wave-container absolute inset-0 opacity-30">
        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="url(#gradient-packages)" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,165.3C384,171,480,149,576,133.3C672,117,768,107,864,122.7C960,139,1056,181,1152,186.7C1248,192,1344,160,1392,144L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            <defs>
                <linearGradient id="gradient-packages" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#B153D7;stop-opacity:0.4" />
                    <stop offset="50%" style="stop-color:#F375C2;stop-opacity:0.3" />
                    <stop offset="100%" style="stop-color:#B153D7;stop-opacity:0.4" />
                </linearGradient>
            </defs>
        </svg>
    </div>

    {{-- Grid Pattern --}}
    <div class="absolute inset-0 grid-pattern opacity-20"></div>

    {{-- Content --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
        <div data-aos="fade-up">
            <div class="inline-block px-4 py-2 rounded-full glass-strong border border-electric-purple/30 mb-6">
                <span class="text-sm font-bold text-gradient-futuristic">✨ Premium Internet Packages</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6">
                <span class="text-gray-900">Pilih </span>
                <span class="text-gradient-futuristic">Paket Terbaik</span>
                <br>
                <span class="text-gray-900">untuk Anda</span>
            </h1>
            <p class="text-xl text-gray-700 max-w-2xl mx-auto">
                Temukan paket internet premium dengan kecepatan super dan harga terjangkau
            </p>
        </div>
    </div>
</section>

{{-- FILTER & SEARCH SECTION --}}
<section class="sticky top-16 z-40 glass-strong border-b border-electric-purple/20 backdrop-blur-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
            {{-- Category Filter --}}
            <div class="flex items-center gap-3 flex-wrap">
                <a href="{{ route('packages.index') }}" 
                   class="filter-button {{ !request('category') ? 'active' : '' }}">
                    Semua Paket
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('packages.index', ['category' => $category->slug]) }}" 
                       class="filter-button {{ request('category') == $category->slug ? 'active' : '' }}">
                        {{ $category->icon ?? '📦' }} {{ $category->name }}
                        <span class="ml-1 opacity-75 text-xs">({{ $category->packages_count }})</span>
                    </a>
                @endforeach
            </div>

            {{-- Search Form --}}
            <form method="GET" action="{{ route('packages.index') }}" class="w-full md:w-auto">
                <div class="relative">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}"
                           placeholder="Cari paket internet..." 
                           class="search-input w-full md:w-80 pl-12 pr-4 py-3 glass border-2 border-electric-purple/30 rounded-2xl focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all">
                    <svg class="absolute left-4 top-3.5 h-6 w-6 text-electric-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </form>
        </div>
    </div>
</section>

{{-- PACKAGES GRID SECTION --}}
<section class="py-20 bg-gradient-to-br from-white via-mint-50 to-white relative overflow-hidden">
    {{-- Decorative Background Blobs --}}
    <div class="absolute inset-0 pointer-events-none opacity-10">
        <div class="absolute top-20 left-10 w-96 h-96 bg-electric-purple rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-hot-pink rounded-full blur-3xl animate-float-delayed"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($packages->count() > 0)
            {{-- Results Count --}}
            <div class="mb-8 text-center" data-aos="fade-up">
                <p class="text-gray-600">
                    Menampilkan <span class="font-bold text-electric-purple">{{ $packages->count() }}</span> 
                    @if($packages->total() > $packages->count())
                        dari <span class="font-bold text-electric-purple">{{ $packages->total() }}</span>
                    @endif
                    paket internet
                    @if(request('category'))
                        <span class="font-semibold">di kategori {{ $categories->where('slug', request('category'))->first()?->name }}</span>
                    @endif
                    @if(request('search'))
                        <span class="font-semibold">untuk pencarian "{{ request('search') }}"</span>
                    @endif
                </p>
            </div>

            {{-- Packages Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($packages as $index => $package)
                <div class="card-glass hover-glow relative group" 
                     data-aos="fade-up" 
                     data-aos-delay="{{ $index % 6 * 100 }}">
                    
                    {{-- Discount Badge --}}
                    @if($package->discount_percentage > 0)
                    <div class="absolute -top-3 -right-3 px-4 py-2 rounded-full bg-gradient-to-r from-hot-pink to-electric-purple text-white text-sm font-bold shadow-xl neon-pink z-10 animate-pulse">
                        Hemat {{ $package->discount_percentage }}%
                    </div>
                    @endif

                    <div class="p-8">
                        {{-- Package Image or Icon --}}
                        @if($package->image)
                        <div class="-mx-8 -mt-8 mb-6 h-48 overflow-hidden relative rounded-t-3xl">
                            <img src="{{ asset('storage/' . $package->image) }}" 
                                 alt="{{ $package->name }}" 
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                        </div>
                        @else
                        <div class="w-20 h-20 bg-gradient-to-br from-electric-purple to-hot-pink rounded-2xl flex items-center justify-center mb-6 neon-purple transform group-hover:scale-110 transition-transform">
                            <span class="text-4xl">{{ $package->category->icon ?? '📡' }}</span>
                        </div>
                        @endif

                        {{-- Package Info --}}
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $package->name }}</h3>
                        <p class="text-electric-purple font-semibold mb-6 flex items-center gap-2">
                            <span>{{ $package->category->icon ?? '📦' }}</span>
                            {{ $package->category->name }}
                        </p>

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
                            @foreach(array_slice($package->features, 0, 4) as $feature)
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-electric-purple mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-700 font-medium">{{ $feature }}</span>
                            </li>
                            @endforeach
                            @if(count($package->features) > 4)
                            <li class="text-sm text-electric-purple font-semibold pl-8">
                                + {{ count($package->features) - 4 }} fitur premium lainnya
                            </li>
                            @endif
                        </ul>
                        @endif

                        {{-- CTA Buttons --}}
                        <div class="space-y-3">
                            <a href="{{ route('packages.show', $package->slug) }}" class="btn-futuristic w-full text-center block">
                                Lihat Detail Lengkap
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

            {{-- Pagination --}}
            @if($packages->hasPages())
            <div class="mt-16" data-aos="fade-up">
                <div class="flex justify-center">
                    {{ $packages->links() }}
                </div>
            </div>
            @endif
        @else
            {{-- Empty State --}}
            <div class="text-center py-20" data-aos="zoom-in">
                <div class="glass-strong inline-block p-12 rounded-3xl">
                    <div class="w-24 h-24 bg-gradient-to-br from-electric-purple to-hot-pink rounded-full flex items-center justify-center mx-auto mb-6 opacity-50">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">Tidak Ada Paket Ditemukan</h3>
                    <p class="text-xl text-gray-600 mb-8 max-w-md mx-auto">
                        @if(request('search'))
                            Tidak ada paket yang cocok dengan pencarian <span class="font-bold text-electric-purple">"{{ request('search') }}"</span>
                        @else
                            Belum ada paket internet tersedia untuk kategori ini
                        @endif
                    </p>
                    <a href="{{ route('packages.index') }}" class="btn-futuristic inline-block">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Reset & Lihat Semua Paket
                    </a>
                </div>
            </div>
        @endif
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
            Butuh Bantuan Memilih Paket?
        </h2>
        <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
            Tim customer service kami siap membantu Anda menemukan paket internet terbaik sesuai kebutuhan
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/6285814578401?text=Halo%20Indah%20Internet!%20Saya%20butuh%20bantuan%20memilih%20paket%20internet" 
               target="_blank"
               class="bg-white text-electric-purple px-10 py-5 rounded-2xl font-bold hover:bg-mint transition-all inline-flex items-center justify-center gap-3 shadow-2xl transform hover:scale-105">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 448 512">
                    <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                </svg>
                Konsultasi Gratis via WhatsApp
            </a>
            <a href="{{ route('home') }}" 
               class="bg-transparent border-2 border-white text-white px-10 py-5 rounded-2xl font-bold hover:bg-white hover:text-electric-purple transition-all inline-block shadow-2xl transform hover:scale-105">
                Kembali ke Home
            </a>
        </div>
    </div>
</section>

{{-- Custom Styles for Filter Buttons --}}
<style>
.filter-button {
    @apply px-5 py-2.5 rounded-xl font-semibold transition-all duration-300;
    @apply bg-white/50 border-2 border-electric-purple/20 text-gray-700;
}

.filter-button:hover {
    @apply bg-white border-electric-purple/40 transform -translate-y-0.5;
}

.filter-button.active {
    @apply bg-gradient-to-r from-electric-purple to-hot-pink text-white border-transparent;
    box-shadow: 0 4px 15px rgba(177, 83, 215, 0.4);
}

.search-input::placeholder {
    color: rgba(177, 83, 215, 0.5);
}
</style>
@endsection

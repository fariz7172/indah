@extends('layouts.app')

@section('title', $package->name)

@section('content')
{{-- Hero Section dengan Package Info --}}
<section class="relative min-h-[60vh] overflow-hidden bg-gradient-to-br from-mint via-mint-100 to-white">
    {{-- Wave Background --}}
    <div class="wave-container absolute inset-0 opacity-30">
        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="url(#gradient1)" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,165.3C384,171,480,149,576,133.3C672,117,768,107,864,122.7C960,139,1056,181,1152,186.7C1248,192,1344,160,1392,144L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            <defs>
                <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#B153D7;stop-opacity:0.3" />
                    <stop offset="100%" style="stop-color:#F375C2;stop-opacity:0.2" />
                </linearGradient>
            </defs>
        </svg>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            {{-- Package Image --}}
            <div class="relative" data-aos="fade-right">
                @if($package->image)
                <div class="relative">
                    <img src="{{ asset('storage/' . $package->image) }}" 
                         alt="{{ $package->name }}"
                         class="w-full h-96 object-cover rounded-3xl shadow-2xl">
                    @if($package->is_featured)
                    <div class="absolute top-4 right-4 px-4 py-2 bg-gradient-to-r from-yellow-400 to-orange-500 text-white font-bold rounded-xl shadow-lg">
                        ⭐ Unggulan
                    </div>
                    @endif
                </div>
                @else
                <div class="w-full h-96 bg-gradient-to-br from-electric-purple to-hot-pink rounded-3xl flex items-center justify-center shadow-2xl">
                    <span class="text-8xl">{{ $package->category->icon }}</span>
                </div>
                @endif
            </div>

            {{-- Package Info --}}
            <div data-aos="fade-left">
                {{-- Category Badge --}}
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-mint-200 text-electric-purple rounded-full mb-4">
                    <span class="text-xl">{{ $package->category->icon }}</span>
                    <span class="font-semibold">{{ $package->category->name }}</span>
                </div>

                {{-- Package Name --}}
                <h1 class="text-5xl font-extrabold text-gray-900 mb-4">{{ $package->name }}</h1>

                {{-- Speed --}}
                <div class="flex items-center gap-3 mb-6">
                    <svg class="w-8 h-8 text-electric-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    <span class="text-3xl font-bold text-gradient-futuristic">{{ $package->speed }}</span>
                </div>

                {{-- Description --}}
                @if($package->description)
                <p class="text-lg text-gray-600 mb-8">{{ $package->description }}</p>
                @endif

                {{-- Price --}}
                <div class="glass-strong p-6 rounded-2xl mb-8">
                    <div class="flex items-end gap-3">
                        @if($package->original_price)
                        <span class="text-2xl text-gray-400 line-through">{{ $package->formatted_original_price }}</span>
                        @endif
                        <span class="text-5xl font-black text-gradient-futuristic">{{ $package->formatted_price }}</span>
                        <span class="text-xl text-gray-600">/bulan</span>
                    </div>
                    @if($package->original_price)
                    <div class="mt-3 inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">
                        Hemat {{ number_format((($package->original_price - $package->price) / $package->original_price) * 100) }}%
                    </div>
                    @endif
                </div>

                {{-- CTA Button --}}
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="https://wa.me/6285814578401?text=Halo, saya tertarik dengan paket {{ $package->name }} ({{ $package->speed }}) seharga {{ $package->formatted_price }}/bulan. Mohon info lebih lanjut." 
                       class="flex-1 inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white rounded-2xl font-bold text-lg shadow-lg hover:shadow-xl transition-all"
                       target="_blank">
                        <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        <span>Pesan via WhatsApp</span>
                    </a>
                    
                    <a href="{{ route('packages.index') }}" 
                       class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl font-bold text-lg transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span>Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Features Section --}}
@if($package->features && count($package->features) > 0)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl font-extrabold text-gray-900 mb-4">
                Fitur Paket <span class="text-gradient-futuristic">{{ $package->name }}</span>
            </h2>
            <p class="text-xl text-gray-600">Semua yang Anda butuhkan dalam satu paket</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($package->features as $feature)
            <div class="card-futuristic group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-electric-purple to-hot-pink rounded-xl flex items-center justify-center flex-shrink-0 neon-purple">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-gray-900">{{ $feature }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Related Packages --}}
@if($relatedPackages->count() > 0)
<section class="py-20 bg-gradient-to-br from-mint-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl font-extrabold text-gray-900 mb-4">
                Paket Lainnya di <span class="text-gradient-futuristic">{{ $package->category->name }}</span>
            </h2>
            <p class="text-xl text-gray-600">Pilihan paket lain yang mungkin Anda suka</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedPackages as $related)
            <div class="card-futuristic group" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                @if($related->image)
                <img src="{{ asset('storage/' . $related->image) }}" 
                     alt="{{ $related->name }}"
                     class="w-full h-48 object-cover rounded-t-2xl">
                @else
                <div class="w-full h-48 bg-gradient-to-br from-electric-purple to-hot-pink rounded-t-2xl flex items-center justify-center">
                    <span class="text-6xl">{{ $related->category->icon }}</span>
                </div>
                @endif

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $related->name }}</h3>
                    <p class="text-electric-purple font-bold mb-4">{{ $related->speed }}</p>
                    <div class="flex items-end gap-2 mb-6">
                        <span class="text-3xl font-black text-gradient-futuristic">{{ $related->formatted_price }}</span>
                        <span class="text-gray-600">/bulan</span>
                    </div>
                    <a href="{{ route('packages.show', $related->slug) }}" class="btn-outline-futuristic w-full text-center block">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

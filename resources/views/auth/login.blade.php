<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - Indah Admin Sales </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gradient-to-br from-mint via-electric-purple/10 to-hot-pink/10 min-h-screen flex items-center justify-center relative overflow-hidden">
    {{-- Animated Wave Background --}}
    <div class="wave-container absolute inset-0 opacity-30">
        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="url(#gradient-login)" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,165.3C384,171,480,149,576,133.3C672,117,768,107,864,122.7C960,139,1056,181,1152,186.7C1248,192,1344,160,1392,144L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            <defs>
                <linearGradient id="gradient-login" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#B153D7;stop-opacity:0.4" />
                    <stop offset="50%" style="stop-color:#F375C2;stop-opacity:0.3" />
                    <stop offset="100%" style="stop-color:#B153D7;stop-opacity:0.4" />
                </linearGradient>
            </defs>
        </svg>
    </div>

    {{-- Grid Pattern --}}
    <div class="absolute inset-0 grid-pattern opacity-20"></div>

    {{-- Floating Particles --}}
    <div id="particle-container" class="absolute inset-0 pointer-events-none"></div>

    {{-- Login Container --}}
    <div class="relative z-10 w-full max-w-md px-4" data-aos="zoom-in">
        {{-- Logo & Title --}}
        <div class="text-center mb-8">
            <div class="inline-block p-4 rounded-3xl glass-strong border border-electric-purple/30 mb-6">
                <div class="w-16 h-16 bg-gradient-to-br from-electric-purple to-hot-pink rounded-2xl flex items-center justify-center neon-purple">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
            </div>
            <h1 class="text-3xl font-extrabold text-gradient-futuristic mb-2">Admin Panel</h1>
            <p class="text-gray-700">Indah Internet Dashboard</p>
        </div>

        {{-- Login Card --}}
        <div class="card-glass p-8">
            {{-- Flash Messages --}}
            @if(session('error'))
            <div class="mb-6 p-4 rounded-xl bg-red-50 border-2 border-red-500">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-sm text-red-800 font-semibold">{{ session('error') }}</p>
                </div>
            </div>
            @endif

            @if($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-orange-50 border-2 border-orange-500">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-orange-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <p class="text-sm font-semibold text-orange-900 mb-1">Terjadi kesalahan:</p>
                        <ul class="text-sm text-orange-800 space-y-1">
                            @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            {{-- Login Form --}}
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                {{-- Email Field --}}
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email Address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-electric-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                        </div>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}"
                               required 
                               autofocus
                               class="w-full pl-12 pr-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all @error('email') border-red-500 @enderror"
                               placeholder="admin@example.com">
                    </div>
                    @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password Field --}}
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-electric-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               required
                               class="w-full pl-12 pr-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all @error('password') border-red-500 @enderror"
                               placeholder="••••••••">
                    </div>
                    @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" 
                               name="remember" 
                               class="w-4 h-4 text-electric-purple border-gray-300 rounded focus:ring-electric-purple focus:ring-2">
                        <span class="ml-2 text-sm text-gray-700">Remember me</span>
                    </label>
                </div>

                {{-- Submit Button --}}
                <button type="submit" class="btn-futuristic w-full group">
                    <span>Sign In</span>
                    <svg class="w-5 h-5 inline ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </button>
            </form>
        </div>

        {{-- Back to Home Link --}}
        <div class="text-center mt-8">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-gray-700 hover:text-electric-purple font-semibold transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Back to Home</span>
            </a>
        </div>

        {{-- Copyright --}}
        <div class="text-center mt-8 text-sm text-gray-600">
            © {{ date('Y') }} Indah Admin Sales. All rights reserved.
        </div>
    </div>
</body>
</html>

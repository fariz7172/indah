<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Admin Panel' }} - Indah Internet</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        {{-- Mobile Sidebar Overlay --}}
        <div id="mobile-sidebar-overlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 md:hidden hidden transition-opacity"></div>

        {{-- Simple Purple Sidebar --}}
        <aside id="sidebar" class="fixed md:sticky w-64 left-0 top-0 h-screen z-50 bg-gradient-to-b from-purple-600 to-purple-700 shadow-2xl transform -translate-x-full md:translate-x-0 transition-transform duration-300">
            <div class="h-full flex flex-col text-white">
                
                {{-- Logo Section --}}
                <div class="p-6 border-b border-white/20">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-bold">Indah Admin</h2>
                        {{-- Close button mobile --}}
                        <button id="close-sidebar" class="md:hidden w-8 h-8 flex items-center justify-center rounded-lg hover:bg-white/10 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Navigation Menu --}}
                <nav class="flex-1 p-4 overflow-y-auto">
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('admin.dashboard') }}" 
                               class="sidebar-menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.categories.index') }}" 
                               class="sidebar-menu-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                <span>Kategori</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.sliders.index') }}" 
                               class="sidebar-menu-item {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>Slider</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.packages.index') }}" 
                               class="sidebar-menu-item {{ request()->routeIs('admin.packages.*') ? 'active' : '' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                                <span>Paket Internet</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.orders.index') }}" 
                               class="sidebar-menu-item {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                                <span>Pesanan</span>
                            </a>
                        </li>
                        <li class="pt-4 mt-4 border-t border-white/20">
                            <a href="{{ route('home') }}" 
                               target="_blank"
                               class="sidebar-menu-item">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                                <span>Lihat Website</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                {{-- User Info Footer --}}
                <div class="p-4 border-t border-white/20">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center text-sm font-bold">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold truncate">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-white/70 truncate">Administrator</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- Top Bar --}}
            <header class="bg-white border-b border-gray-200 sticky top-0 z-30 shadow-sm">
                <div class="px-4 sm:px-6 py-4 flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        {{-- Mobile menu button --}}
                        <button id="open-sidebar" class="md:hidden w-10 h-10 flex items-center justify-center rounded-xl hover:bg-gray-100 transition-colors">
                            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                        <div>
                            <h1 class="text-2xl font-extrabold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                            <p class="text-sm text-gray-600 hidden sm:block">Selamat datang, {{ Auth::user()->name }}!</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        @yield('action-button')
                        
                        {{-- Logout Button --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg font-semibold transition-all flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                <span class="hidden sm:inline">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                {{-- Flash Messages --}}
                @if(session('success'))
                <div class="mb-6 glass-strong p-4 rounded-2xl border-2 border-green-500 bg-green-50/50" data-aos="fade-down">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-500 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-green-900">Success!</p>
                            <p class="text-sm text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if(session('error'))
                <div class="mb-6 glass-strong p-4 rounded-2xl border-2 border-red-500 bg-red-50/50" data-aos="fade-down">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-red-500 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-red-900">Error!</p>
                            <p class="text-sm text-red-800">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Mobile sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const openBtn = document.getElementById('open-sidebar');
        const closeBtn = document.getElementById('close-sidebar');
        const overlay = document.getElementById('mobile-sidebar-overlay');
        
        function toggleMobileSidebar(show) {
            if (show) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }
        }

        openBtn?.addEventListener('click', () => toggleMobileSidebar(true));
        closeBtn?.addEventListener('click', () => toggleMobileSidebar(false));
        overlay?.addEventListener('click', () => toggleMobileSidebar(false));
    </script>

    <style>
    /* Simple Sidebar Menu Styles */
    .sidebar-menu-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        transition: all 0.2s;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
    }

    .sidebar-menu-item:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: white;
    }

    .sidebar-menu-item.active {
        background-color: rgba(255, 255, 255, 0.2);
        color: white;
        font-weight: 600;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .sidebar-menu-item svg {
        flex-shrink: 0;
        width: 1.25rem;
        height: 1.25rem;
    }
    </style>
</body>
</html>

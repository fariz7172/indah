@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
{{-- Welcome Section --}}
<div class="mb-8">
    <div class="glass-strong p-8 rounded-3xl border border-electric-purple/30">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-extrabold text-gradient-futuristic mb-2">Welcome Back! 👋</h1>
                <p class="text-gray-700">Here's what's happening with your internet business today.</p>
            </div>
            <div class="hidden md:block">
                <div class="flex items-center gap-3 px-6 py-3 rounded-2xl glass border border-electric-purple/20">
                    <div class="relative">
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                        <div class="absolute inset-0 bg-green-500 rounded-full animate-ping opacity-75"></div>
                    </div>
                    <span class="text-sm font-semibold text-gray-700">System Online</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Stats Cards Grid --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    {{-- Total Packages Card --}}
    <div class="card-futuristic group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform">
                <span class="text-3xl">📦</span>
            </div>
        </div>
        <p class="text-gray-600 text-sm font-medium mb-1">Total Paket</p>
        <p class="text-4xl font-black text-gradient-futuristic">{{ $stats['total_packages'] }}</p>
    </div>

    {{-- Active Packages Card --}}
    <div class="card-futuristic group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform">
                <span class="text-3xl">✅</span>
            </div>
        </div>
        <p class="text-gray-600 text-sm font-medium mb-1">Paket Aktif</p>
        <p class="text-4xl font-black text-green-600">{{ $stats['active_packages'] }}</p>
    </div>

    {{-- Total Orders Card --}}
    <div class="card-futuristic group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-electric-purple to-hot-pink rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform neon-purple">
                <span class="text-3xl">🛒</span>
            </div>
        </div>
        <p class="text-gray-600 text-sm font-medium mb-1">Total Pesanan</p>
        <p class="text-4xl font-black text-gray-900">{{ $stats['total_orders'] }}</p>
    </div>

    {{-- Pending Orders Card --}}
    <div class="card-futuristic group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform">
                <span class="text-3xl">⏳</span>
            </div>
        </div>
        <p class="text-gray-600 text-sm font-medium mb-1">Pesanan Pending</p>
        <p class="text-4xl font-black text-yellow-600">{{ $stats['pending_orders'] }}</p>
        @if($stats['pending_orders'] > 0)
        <span class="inline-block mt-2 px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-semibold rounded-full">
            Perlu Review
        </span>
        @endif
    </div>
</div>

{{-- Revenue Cards --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    {{-- Total Revenue --}}
    <div class="relative overflow-hidden rounded-3xl p-8 bg-gradient-to-br from-electric-purple via-hot-pink to-electric-purple hover-glow">
        <div class="relative z-10">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-white/20 backdrop-blur rounded-xl flex items-center justify-center">
                    <span class="text-2xl">💰</span>
                </div>
                <p class="text-white/90 text-sm font-semibold">Total Pendapatan</p>
            </div>
            <p class="text-5xl font-black text-white mb-2">Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}</p>
            <p class="text-white/80 text-sm">Dari semua pesanan completed</p>
        </div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
    </div>

    {{-- Monthly Revenue --}}
    <div class="card-glass relative overflow-hidden">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-electric-purple to-hot-pink rounded-xl flex items-center justify-center neon-purple">
                <span class="text-2xl">📈</span>
            </div>
            <p class="text-gray-700 text-sm font-semibold">Pendapatan Bulan Ini</p>
        </div>
        <p class="text-5xl font-black text-gradient-futuristic mb-2">Rp {{ number_format($stats['monthly_revenue'], 0, ',', '.') }}</p>
        <p class="text-gray-600 text-sm">{{ date('F Y') }}</p>
        
        @if($stats['total_revenue'] > 0)
        <div class="mt-4 pt-4 border-t border-gray-200">
            <div class="flex items-center gap-2">
                <div class="flex-1 bg-gray-200 rounded-full h-2 overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-electric-purple to-hot-pink rounded-full" 
                         style="width: {{ $stats['total_revenue'] > 0 ? min(($stats['monthly_revenue'] / $stats['total_revenue']) * 100, 100) : 0 }}%"></div>
                </div>
                <span class="text-xs font-semibold text-gray-600">
                    {{ $stats['total_revenue'] > 0 ? round(($stats['monthly_revenue'] / $stats['total_revenue']) * 100) : 0 }}%
                </span>
            </div>
        </div>
        @endif
    </div>
</div>

{{-- Recent Orders Table --}}
<div class="card-glass mb-8">
    <div class="p-6 border-b border-gray-200 flex items-center justify-between">
        <div>
            <h3 class="text-2xl font-bold text-gray-900">Pesanan Terbaru</h3>
            <p class="text-sm text-gray-600 mt-1">10 pesanan terbaru dari customer</p>
        </div>
        <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 bg-gradient-to-r from-electric-purple to-hot-pink text-white rounded-xl font-semibold hover:shadow-lg transition-shadow text-sm">
            Lihat Semua
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Pelanggan</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Paket</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Total</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($recentOrders as $order)
                <tr class="hover:bg-mint-50 transition-colors">
                    <td class="px-6 py-4">
                        <span class="font-mono text-sm font-bold text-electric-purple">#{{ $order->id }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <div>
                            <p class="font-semibold text-gray-900">{{ $order->customer_name }}</p>
                            <p class="text-xs text-gray-500">{{ $order->customer_phone }}</p>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-medium text-gray-900">{{ $order->package->name }}</p>
                        <p class="text-xs text-gray-500">{{ $order->package->speed }}</p>
                    </td>
                    <td class="px-6 py-4">
                        <span class="font-bold text-gray-900">{{ $order->formatted_total_price }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($order->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800') }}">
                            {{ $order->status_label }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ $order->created_at->format('d M Y') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center gap-3">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                <span class="text-3xl opacity-50">📭</span>
                            </div>
                            <p class="text-gray-500 font-medium">Belum ada pesanan</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Popular Packages --}}
<div class="card-glass">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-2xl font-bold text-gray-900">Paket Populer</h3>
        <p class="text-sm text-gray-600 mt-1">Top 5 paket dengan pesanan terbanyak</p>
    </div>
    <div class="p-6">
        <div class="space-y-4">
            @foreach($popularPackages as $index => $package)
            <div class="flex items-center gap-4 p-5 rounded-2xl {{ $index === 0 ? 'bg-gradient-to-r from-electric-purple/10 to-hot-pink/10 border-2 border-electric-purple/30' : 'bg-mint-50' }} hover:shadow-lg transition-all">
                <div class="w-12 h-12 bg-gradient-to-br from-electric-purple to-hot-pink rounded-xl flex items-center justify-center flex-shrink-0 neon-purple">
                    <span class="text-2xl font-black text-white">{{ $index + 1 }}</span>
                </div>
                <div class="flex-1">
                    <h4 class="font-bold text-gray-900 text-lg">{{ $package->name }}</h4>
                    <p class="text-sm text-gray-600">{{ $package->speed }} • {{ $package->formatted_price }}/bulan</p>
                </div>
                <div class="text-right">
                    <p class="text-3xl font-black text-gradient-futuristic">{{ $package->orders_count }}</p>
                    <p class="text-xs text-gray-600">pesanan</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

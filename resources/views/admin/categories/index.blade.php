@extends('layouts.admin')

@section('page-title', 'Manajemen Kategori')

@section('action-button')
    <a href="{{ route('admin.categories.create') }}" class="btn-futuristic">
        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
        </svg>
        Tambah Kategori
    </a>
@endsection

@section('content')
<div class="card-glass">
    <div class="p-6 border-b border-gray-200">
        <h2 class="text-2xl font-bold text-gray-900">Daftar Kategori</h2>
        <p class="text-sm text-gray-600 mt-1">Kelola kategori paket internet</p>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Nama Kategori</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Slug</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Icon</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Jumlah Paket</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($categories as $category)
                <tr class="hover:bg-mint-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="font-semibold text-gray-900">{{ $category->name }}</div>
                        <div class="text-sm text-gray-500">{{ Str::limit($category->description, 50) }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <code class="px-2 py-1 bg-gray-100 rounded text-sm font-mono text-gray-700">{{ $category->slug }}</code>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-3xl">{{ $category->icon }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-electric-purple/10 text-electric-purple rounded-full text-sm font-semibold">
                            {{ $category->packages_count }} Paket
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold {{ $category->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $category->is_active ? 'Aktif' : 'Non-Aktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.categories.edit', $category) }}" 
                               class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-xl font-semibold transition-colors text-sm">
                                Edit
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus kategori ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-xl font-semibold transition-colors text-sm">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center gap-3">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                <span class="text-3xl opacity-50">📂</span>
                            </div>
                            <p class="text-gray-500 font-medium">Belum ada kategori</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($categories->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $categories->links() }}
    </div>
    @endif
</div>
@endsection

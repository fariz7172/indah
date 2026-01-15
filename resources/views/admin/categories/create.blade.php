@extends('layouts.admin')

@section('page-title', 'Tambah Kategori Baru')

@section('content')
<div class="max-w-3xl">
    <div class="card-glass">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900">Tambah Kategori Baru</h2>
            <p class="text-sm text-gray-600 mt-1">Buat kategori paket internet baru</p>
        </div>

        <form action="{{ route('admin.categories.store') }}" method="POST" class="p-6">
            @csrf

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Kategori *</label>
                    <input type="text" 
                           name="name" 
                           value="{{ old('name') }}"
                           required
                           class="w-full px-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all @error('name') border-red-500 @enderror"
                           placeholder="Contoh: Home Internet">
                    @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" 
                              rows="3"
                              class="w-full px-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all resize-none"
                              placeholder="Deskripsi singkat kategori">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Icon (Emoji)</label>
                    <input type="text" 
                           name="icon" 
                           value="{{ old('icon') }}"
                           class="w-full px-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all"
                           placeholder="📡">
                    <p class="mt-2 text-sm text-gray-500">Tekan Win + . untuk emoji picker</p>
                </div>

                <div class="flex items-center">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" 
                               name="is_active" 
                               value="1" 
                               checked
                               class="w-5 h-5 text-electric-purple border-gray-300 rounded focus:ring-electric-purple focus:ring-2">
                        <span class="text-sm font-semibold text-gray-700">Kategori Aktif</span>
                    </label>
                </div>
            </div>

            <div class="flex gap-3 mt-8 pt-6 border-t border-gray-200">
                <button type="submit" class="btn-futuristic">
                    Simpan Kategori
                </button>
                <a href="{{ route('admin.categories.index') }}" class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white rounded-xl font-semibold transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

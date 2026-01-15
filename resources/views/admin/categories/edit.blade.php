@extends('layouts.admin')

@section('page-title', 'Edit Kategori')

@section('content')
<div class="max-w-3xl">
    <div class="card-glass">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900">Edit Kategori</h2>
            <p class="text-sm text-gray-600 mt-1">Update informasi kategori</p>
        </div>

        <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Kategori *</label>
                    <input type="text" 
                           name="name" 
                           value="{{ old('name', $category->name) }}"
                           required
                           class="w-full px-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all @error('name') border-red-500 @enderror">
                    @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" 
                              rows="3"
                              class="w-full px-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all resize-none">{{ old('description', $category->description) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Icon (Emoji)</label>
                    <input type="text" 
                           name="icon" 
                           value="{{ old('icon', $category->icon) }}"
                           class="w-full px-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all">
                </div>

                <div class="flex items-center">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" 
                               name="is_active" 
                               value="1" 
                               {{ $category->is_active ? 'checked' : '' }}
                               class="w-5 h-5 text-electric-purple border-gray-300 rounded focus:ring-electric-purple focus:ring-2">
                        <span class="text-sm font-semibold text-gray-700">Kategori Aktif</span>
                    </label>
                </div>
            </div>

            <div class="flex gap-3 mt-8 pt-6 border-t border-gray-200">
                <button type="submit" class="btn-futuristic">
                    Update Kategori
                </button>
                <a href="{{ route('admin.categories.index') }}" class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white rounded-xl font-semibold transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

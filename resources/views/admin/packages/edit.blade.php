@extends('layouts.admin')

@section('page-title', 'Edit Paket')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="card-glass">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900">Edit Paket Internet</h2>
            <p class="text-sm text-gray-600 mt-1">Update informasi paket {{ $package->name }}</p>
        </div>

        <form action="{{ route('admin.packages.update', $package) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                {{-- Category & Name --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori *</label>
                        <select name="category_id" 
                                required
                                class="w-full px-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all @error('category_id') border-red-500 @enderror">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $package->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->icon }} {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Paket *</label>
                        <input type="text" 
                               name="name" 
                               value="{{ old('name', $package->name) }}"
                               required
                               class="w-full px-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all @error('name') border-red-500 @enderror"
                               placeholder="Contoh: Paket Ultimate">
                        @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Speed & Sort Order --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kecepatan *</label>
                        <input type="text" 
                               name="speed" 
                               value="{{ old('speed', $package->speed) }}"
                               required
                               class="w-full px-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all @error('speed') border-red-500 @enderror"
                               placeholder="Contoh: 100 Mbps">
                        @error('speed')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Urutan</label>
                        <input type="number" 
                               name="sort_order" 
                               value="{{ old('sort_order', $package->sort_order) }}"
                               class="w-full px-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all"
                               placeholder="0">
                        <p class="mt-2 text-sm text-gray-500">Urutan tampil (lebih kecil = lebih awal)</p>
                    </div>
                </div>

                {{-- Price & Original Price --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Harga *</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-semibold">Rp</span>
                            <input type="number" 
                                   name="price" 
                                   value="{{ old('price', $package->price) }}"
                                   required
                                   class="w-full pl-12 pr-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all @error('price') border-red-500 @enderror"
                                   placeholder="250000">
                        </div>
                        @error('price')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Harga Coret (Opsional)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-semibold">Rp</span>
                            <input type="number" 
                                   name="original_price" 
                                   value="{{ old('original_price', $package->original_price) }}"
                                   class="w-full pl-12 pr-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all"
                                   placeholder="350000">
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Harga sebelum diskon (opsional)</p>
                    </div>
                </div>

                {{-- Description --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" 
                              rows="3"
                              class="w-full px-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all resize-none"
                              placeholder="Deskripsi singkat paket">{{ old('description', $package->description) }}</textarea>
                </div>

                {{-- Features --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Fitur Paket</label>
                    <div id="features-container" class="space-y-3">
                        @foreach($package->features ?? [] as $index => $feature)
                        <div class="flex gap-2">
                            <input type="text" 
                                   name="features[]" 
                                   value="{{ $feature }}"
                                   class="flex-1 px-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all"
                                   placeholder="Contoh: Unlimited Quota">
                            <button type="button" 
                                    onclick="this.parentElement.remove()"
                                    class="px-4 py-3 bg-red-500 hover:bg-red-600 text-white rounded-xl font-semibold transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                        @endforeach
                    </div>
                    <button type="button" 
                            onclick="addFeature()" 
                            class="mt-3 px-4 py-2 bg-electric-purple hover:bg-hot-pink text-white rounded-xl font-semibold transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Tambah Fitur
                    </button>
                </div>

                {{-- Image Upload --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Paket</label>
                    @if($package->image)
                    <div class="mb-4">
                        <div class="relative inline-block">
                            <img src="{{ asset('storage/' . $package->image) }}" 
                                 alt="{{ $package->name }}" 
                                 class="w-48 h-48 object-cover rounded-2xl shadow-lg">
                            <div class="absolute top-2 right-2 px-2 py-1 bg-green-500 text-white text-xs font-semibold rounded-lg">
                                Current
                            </div>
                        </div>
                    </div>
                    @endif
                    <input type="file" 
                           name="image" 
                           accept="image/*"
                           class="w-full px-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-electric-purple file:text-white hover:file:bg-hot-pink">
                    <p class="mt-2 text-sm text-gray-500">Format: JPG, PNG. Max: 2MB</p>
                </div>

                {{-- Checkboxes --}}
                <div class="flex flex-wrap gap-6">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" 
                               name="is_featured" 
                               value="1" 
                               {{ $package->is_featured ? 'checked' : '' }}
                               class="w-5 h-5 text-electric-purple border-gray-300 rounded focus:ring-electric-purple focus:ring-2">
                        <span class="text-sm font-semibold text-gray-700">⭐ Paket Unggulan</span>
                    </label>

                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" 
                               name="is_active" 
                               value="1" 
                               {{ $package->is_active ? 'checked' : '' }}
                               class="w-5 h-5 text-electric-purple border-gray-300 rounded focus:ring-electric-purple focus:ring-2">
                        <span class="text-sm font-semibold text-gray-700">✅ Paket Aktif</span>
                    </label>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex gap-3 mt-8 pt-6 border-t border-gray-200">
                <button type="submit" class="btn-futuristic">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Update Paket
                </button>
                <a href="{{ route('admin.packages.index') }}" class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white rounded-xl font-semibold transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function addFeature() {
    const container = document.getElementById('features-container');
    const div = document.createElement('div');
    div.className = 'flex gap-2';
    div.innerHTML = `
        <input type="text" 
               name="features[]" 
               class="flex-1 px-4 py-3 rounded-xl border-2 border-electric-purple/30 focus:border-electric-purple focus:ring-2 focus:ring-electric-purple/20 transition-all"
               placeholder="Contoh: Unlimited Quota">
        <button type="button" 
                onclick="this.parentElement.remove()"
                class="px-4 py-3 bg-red-500 hover:bg-red-600 text-white rounded-xl font-semibold transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
            </svg>
        </button>
    `;
    container.appendChild(div);
}
</script>
@endsection

@extends('layouts.admin')

@section('title', 'Edit Halaman')

@section('content')
    <div class="p-4 mx-auto max-w-screen-2xl md:p-6">
        <!-- Page Header -->
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Halaman</h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Update konten halaman website</p>
                </div>
                <a href="{{ route('admin.pages.index') }}"
                    class="inline-flex items-center gap-2 rounded-lg border border-gray-300 px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Form Card -->
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <form action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data"
                class="p-6 md:p-8">
                @csrf
                @method('PUT')

                <!-- Basic Information -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informasi Dasar</h3>
                    <div class="grid gap-6 md:grid-cols-2">
                        <!-- Title -->
                        <div class="md:col-span-2">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Judul Halaman <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title', $page->title) }}"
                                required
                                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white @error('title') border-red-500 @enderror"
                                placeholder="Masukkan judul halaman">
                            @error('title')
                                <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Slug (URL)
                            </label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $page->slug) }}"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white @error('slug') border-red-500 @enderror"
                                placeholder="otomatis dari judul">
                            @error('slug')
                                <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Kosongkan untuk generate otomatis</p>
                        </div>

                        <!-- Page Type -->
                        <div>
                            <label for="page_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Tipe Halaman <span class="text-red-500">*</span>
                            </label>
                            <select name="page_type" id="page_type" required
                                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white @error('page_type') border-red-500 @enderror">
                                <option value="">Pilih Tipe</option>
                                @foreach ($pageTypes as $key => $label)
                                    <option value="{{ $key }}"
                                        {{ old('page_type', $page->page_type) == $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('page_type')
                                <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Status <span class="text-red-500">*</span>
                            </label>
                            <select name="status" id="status" required
                                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white @error('status') border-red-500 @enderror">
                                @foreach ($statusOptions as $key => $label)
                                    <option value="{{ $key }}"
                                        {{ old('status', $page->status) == $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                                <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Order -->
                        <div>
                            <label for="order" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Urutan
                            </label>
                            <input type="number" name="order" id="order" value="{{ old('order', $page->order) }}"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white @error('order') border-red-500 @enderror"
                                placeholder="0">
                            @error('order')
                                <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Konten</h3>

                    <!-- Excerpt -->
                    <div class="mb-6">
                        <label for="excerpt" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Ringkasan
                        </label>
                        <textarea name="excerpt" id="excerpt" rows="3"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white @error('excerpt') border-red-500 @enderror"
                            placeholder="Ringkasan singkat halaman">{{ old('excerpt', $page->excerpt) }}</textarea>
                        @error('excerpt')
                            <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Konten Lengkap
                        </label>
                        <textarea name="content" id="content" rows="10"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white @error('content') border-red-500 @enderror"
                            placeholder="Tulis konten lengkap halaman di sini">{{ old('content', $page->content) }}</textarea>
                        @error('content')
                            <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Gambar Utama</h3>

                    @if ($page->featured_image)
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Gambar Saat Ini
                            </label>
                            <img src="{{ asset('storage/' . $page->featured_image) }}" alt="{{ $page->title }}"
                                class="rounded-lg max-w-xs border border-gray-200 dark:border-gray-700">
                        </div>
                    @endif

                    <div>
                        <label for="featured_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Upload Gambar Baru
                        </label>
                        <input type="file" name="featured_image" id="featured_image" accept="image/*"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white @error('featured_image') border-red-500 @enderror">
                        @error('featured_image')
                            <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format: JPG, PNG, GIF. Max 2MB. Kosongkan
                            jika tidak ingin mengubah gambar.</p>
                    </div>
                </div>

                <!-- SEO -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">SEO</h3>
                    <div class="grid gap-6">
                        <!-- Meta Title -->
                        <div>
                            <label for="meta_title"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Meta Title
                            </label>
                            <input type="text" name="meta_title" id="meta_title"
                                value="{{ old('meta_title', $page->meta_title) }}"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white @error('meta_title') border-red-500 @enderror"
                                placeholder="Title untuk mesin pencari">
                            @error('meta_title')
                                <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Meta Description -->
                        <div>
                            <label for="meta_description"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Meta Description
                            </label>
                            <textarea name="meta_description" id="meta_description" rows="3"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white @error('meta_description') border-red-500 @enderror"
                                placeholder="Deskripsi untuk mesin pencari">{{ old('meta_description', $page->meta_description) }}</textarea>
                            @error('meta_description')
                                <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Meta Keywords -->
                        <div>
                            <label for="meta_keywords"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Meta Keywords
                            </label>
                            <input type="text" name="meta_keywords" id="meta_keywords"
                                value="{{ old('meta_keywords', $page->meta_keywords) }}"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white @error('meta_keywords') border-red-500 @enderror"
                                placeholder="keyword1, keyword2, keyword3">
                            @error('meta_keywords')
                                <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Pisahkan dengan koma</p>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end gap-3 border-t border-gray-100 pt-6 dark:border-gray-800">
                    <a href="{{ route('admin.pages.index') }}"
                        class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                        Batal
                    </a>
                    <button type="submit"
                        class="rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                        Update Halaman
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

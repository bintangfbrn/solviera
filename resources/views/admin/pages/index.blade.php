@extends('layouts.admin')

@section('title', 'Manajemen Halaman CMS')

@section('content')
    <div class="p-4 mx-auto max-w-screen-2xl md:p-6">
        <!-- Success Message -->
        @if (session('success'))
            <div
                class="mb-6 flex items-center gap-3 rounded-lg border border-green-200 bg-green-50 p-4 dark:border-green-800 dark:bg-green-900/10">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-500 dark:bg-green-600">
                    <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <p class="text-sm font-medium text-green-800 dark:text-green-400">{{ session('success') }}</p>
            </div>
        @endif

        <!-- Page Header -->
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Halaman CMS</h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Kelola konten halaman website</p>
                </div>
                <a href="{{ route('admin.pages.create') }}"
                    class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Halaman
                </a>
            </div>
        </div>

        <!-- Filters -->
        <form method="GET" action="{{ route('admin.pages.index') }}"
            class="mb-6 overflow-hidden rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="grid gap-4 md:grid-cols-3">
                <div>
                    <label for="page_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Tipe Halaman
                    </label>
                    <select name="page_type" id="page_type"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        <option value="">Semua Tipe</option>
                        @foreach (\App\Models\Page::getPageTypes() as $key => $label)
                            <option value="{{ $key }}" {{ request('page_type') == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Status
                    </label>
                    <select name="status" id="status"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        <option value="">Semua Status</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published
                        </option>
                    </select>
                </div>

                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Cari
                    </label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                        placeholder="Cari halaman..."
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                </div>
            </div>

            <div class="mt-4 flex justify-end gap-2">
                <a href="{{ route('admin.pages.index') }}"
                    class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                    Reset
                </a>
                <button type="submit"
                    class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                    Filter
                </button>
            </div>
        </form>

        <!-- Pages Table -->
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="p-5 sm:p-6">
                <div class="max-w-full overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b border-gray-100 dark:border-gray-800">
                                <th class="px-5 py-3 text-left sm:px-6">
                                    <p class="text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Judul</p>
                                </th>
                                <th class="px-5 py-3 text-left sm:px-6">
                                    <p class="text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Tipe</p>
                                </th>
                                <th class="px-5 py-3 text-left sm:px-6">
                                    <p class="text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Status</p>
                                </th>
                                <th class="px-5 py-3 text-left sm:px-6">
                                    <p class="text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Order</p>
                                </th>
                                <th class="px-5 py-3 text-left sm:px-6">
                                    <p class="text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Dibuat Oleh
                                    </p>
                                </th>
                                <th class="px-5 py-3 text-right sm:px-6">
                                    <p class="text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Actions</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                            @forelse ($pages as $page)
                                <tr class="hover:bg-gray-50 dark:hover:bg-white/5">
                                    <td class="px-5 py-4 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $page->title }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">{{ $page->slug }}</p>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <span
                                            class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">
                                            {{ \App\Models\Page::getPageTypes()[$page->page_type] ?? $page->page_type }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        @if ($page->status == 'published')
                                            <span
                                                class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                                Published
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400">
                                                Draft
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ $page->order }}</p>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <p class="text-sm text-gray-600 dark:text-gray-300">
                                            {{ $page->creator->name ?? '-' }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-4 text-right sm:px-6">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('admin.pages.edit', $page) }}"
                                                class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-blue-600 hover:bg-blue-50 dark:text-blue-400 dark:hover:bg-white/5"
                                                title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('admin.pages.destroy', $page) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-white/5"
                                                    title="Hapus" onclick="return confirm('Yakin hapus halaman ini?')">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-5 py-8 text-center sm:px-6">
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Tidak ada halaman. Klik "Tambah
                                            Halaman" untuk membuat halaman baru.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        @if ($pages->hasPages())
            <div class="mt-6">
                {{ $pages->links() }}
            </div>
        @endif
    </div>
@endsection

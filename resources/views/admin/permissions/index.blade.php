@extends('layouts.admin')

@section('title', 'Manajemen Permission')

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

        <!-- Card -->
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <!-- Card Header -->
            <div
                class="flex items-center justify-between border-b border-gray-100 px-5 py-4 dark:border-gray-800 sm:px-6 sm:py-5">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Manajemen Permission</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola izin akses untuk setiap fitur sistem</p>
                </div>
                <a href="{{ route('admin.permissions.create') }}"
                    class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Permission
                </a>
            </div>

            <!-- Table -->
            <div class="p-5 sm:p-6">
                <div class="max-w-full overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b border-gray-100 dark:border-gray-800">
                                <th class="px-5 py-3 text-left sm:px-6">
                                    <p class="text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Permission
                                        Name</p>
                                </th>
                                <th class="px-5 py-3 text-left sm:px-6">
                                    <p class="text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Display Name
                                    </p>
                                </th>
                                <th class="px-5 py-3 text-left sm:px-6">
                                    <p class="text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Description
                                    </p>
                                </th>
                                <th class="px-5 py-3 text-left sm:px-6">
                                    <p class="text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Roles</p>
                                </th>
                                <th class="px-5 py-3 text-right sm:px-6">
                                    <p class="text-xs font-medium uppercase text-gray-500 dark:text-gray-400">Actions</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                            @forelse ($permissions as $permission)
                                <tr class="hover:bg-gray-50 dark:hover:bg-white/5">
                                    <td class="px-5 py-4 sm:px-6">
                                        <p class="text-sm font-mono font-medium text-gray-900 dark:text-white">
                                            {{ $permission->name }}</p>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <p class="text-sm text-gray-600 dark:text-gray-300">
                                            {{ $permission->display_name ?? '-' }}</p>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <p class="text-sm text-gray-600 dark:text-gray-300">
                                            {{ Str::limit($permission->description ?? '-', 60) }}</p>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <span
                                            class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">
                                            {{ $permission->roles->count() }} roles
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 text-right sm:px-6">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('admin.permissions.edit', $permission) }}"
                                                class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-blue-600 hover:bg-blue-50 dark:text-blue-400 dark:hover:bg-white/5"
                                                title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('admin.permissions.destroy', $permission) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-white/5"
                                                    title="Hapus" onclick="return confirm('Yakin hapus permission ini?')">
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
                                    <td colspan="5" class="px-5 py-8 text-center sm:px-6">
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Tidak ada permission. Klik
                                            "Tambah Permission" untuk membuat permission baru.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        @if ($permissions->hasPages())
            <div class="mt-6">
                {{ $permissions->links() }}
            </div>
        @endif
    </div>
@endsection

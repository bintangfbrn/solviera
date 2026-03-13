@props(['permission' => null, 'isEdit' => false])

<!-- Modal Overlay -->
<div x-show="showPermissionModal" x-cloak @click.self="showPermissionModal = false"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <!-- Modal Content -->
    <div @click.stop
        class="w-full max-w-lg overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-xl dark:border-gray-800 dark:bg-gray-900"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95">

        <!-- Modal Header -->
        <div class="flex items-center justify-between border-b border-gray-100 px-6 py-4 dark:border-gray-800">
            <div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    {{ $isEdit ? 'Edit Permission' : 'Tambah Permission Baru' }}
                </h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    {{ $isEdit ? 'Update permission details' : 'Buat permission baru untuk sistem' }}
                </p>
            </div>
            <button @click="showPermissionModal = false" type="button"
                class="rounded-lg p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-600 dark:hover:bg-gray-800 dark:hover:text-gray-300">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <form action="{{ $isEdit ? route('admin.permissions.update', $permission) : route('admin.permissions.store') }}"
            method="POST" class="p-6">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif

            <!-- Permission Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Permission Name <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" id="name" value="{{ old('name', $permission->name ?? '') }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white @error('name') border-red-500 @enderror"
                    placeholder="e.g., users.create, posts.edit" required>
                @error('name')
                    <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">Use dot notation: resource.action</p>
            </div>

            <!-- Display Name -->
            <div class="mb-4">
                <label for="display_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Display Name
                </label>
                <input type="text" name="display_name" id="display_name"
                    value="{{ old('display_name', $permission->display_name ?? '') }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                    placeholder="e.g., Create Users">
                @error('display_name')
                    <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Description
                </label>
                <textarea name="description" id="description" rows="3"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                    placeholder="Optional description for this permission">{{ old('description', $permission->description ?? '') }}</textarea>
                @error('description')
                    <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end gap-3">
                <button type="button" @click="showPermissionModal = false"
                    class="rounded-lg border border-gray-300 px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                    Batal
                </button>
                <button type="submit"
                    class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                    {{ $isEdit ? 'Update' : 'Simpan' }} Permission
                </button>
            </div>
        </form>
    </div>
</div>

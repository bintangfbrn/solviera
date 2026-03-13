<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode')) || false;
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- TailAdmin Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body x-data="{ page: 'dashboard', 'loaded': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" :class="{ 'bg-gray-900': darkMode === true }" class="font-outfit">

    <!-- Page Wrapper Start -->
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Start -->
        <aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
            class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0">

            <!-- Sidebar Header -->
            <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
                class="flex items-center gap-2 pt-8 sidebar-header pb-7">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <svg class="w-10 h-10" viewBox="0 0 50 52" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M49.626 11.564a.809.809 0 0 1 .028.209v10.972a.8.8 0 0 1-.402.694l-9.209 5.302V39.25c0 .286-.152.55-.4.694L20.42 51.01c-.044.025-.092.041-.14.058-.018.006-.035.017-.054.022a.805.805 0 0 1-.41 0c-.022-.006-.042-.018-.063-.026-.044-.016-.09-.03-.132-.054L.402 39.944A.801.801 0 0 1 0 39.25V6.334c0-.072.01-.142.028-.21.006-.023.02-.044.028-.067.015-.042.029-.085.051-.124.015-.026.037-.047.055-.071.023-.032.044-.065.071-.093.023-.023.053-.04.079-.06.029-.024.055-.05.088-.069h.001l9.61-5.533a.802.802 0 0 1 .8 0l9.61 5.533h.002c.032.02.059.045.088.068.026.02.055.038.078.06.028.029.048.062.072.094.017.024.04.045.054.071.023.04.036.082.052.124.008.023.022.044.028.068a.809.809 0 0 1 .028.209v20.559l8.008-4.611v-10.51c0-.07.01-.141.028-.208.007-.024.02-.045.028-.068.016-.042.03-.085.052-.124.015-.026.037-.047.054-.071.024-.032.044-.065.072-.093.023-.023.052-.04.078-.06.03-.024.056-.05.088-.069h.001l9.611-5.533a.801.801 0 0 1 .8 0l9.61 5.533c.034.02.06.045.09.068.025.02.054.038.077.06.028.029.048.062.072.094.018.024.04.045.054.071.023.039.036.082.052.124.009.023.022.044.028.068zm-1.574 10.718v-9.124l-3.363 1.936-4.646 2.675v9.124l8.01-4.611zm-9.61 16.505v-9.13l-4.57 2.61-13.05 7.448v9.216l17.62-10.144zM1.602 7.719v31.068L19.22 48.93v-9.214l-9.204-5.209-.003-.002-.004-.002c-.031-.018-.057-.044-.086-.066-.025-.02-.054-.036-.076-.058l-.002-.003c-.026-.025-.044-.056-.066-.084-.02-.027-.044-.05-.06-.078l-.001-.003c-.018-.03-.029-.066-.042-.1-.013-.03-.03-.058-.038-.09v-.001c-.01-.038-.012-.078-.016-.117-.004-.03-.012-.06-.012-.09v-.002-21.481L4.965 9.654 1.602 7.72zm8.81-5.994L2.405 6.334l8.005 4.609 8.006-4.61-8.006-4.608zm4.164 28.764l4.645-2.674V7.719l-3.363 1.936-4.646 2.675v20.096l3.364-1.937zM39.243 7.164l-8.006 4.609 8.006 4.609 8.005-4.61-8.005-4.608zm-.801 10.605l-4.646-2.675-3.363-1.936v9.124l4.645 2.674 3.364 1.937v-9.124zM20.02 38.33l11.743-6.704 5.87-3.35-8-4.606-9.211 5.303-8.395 4.833 7.993 4.524z"
                            fill="#465FFF" fill-rule="evenodd" />
                    </svg>
                    <span class="text-xl font-bold text-gray-900 dark:text-white"
                        :class="sidebarToggle ? 'lg:hidden' : ''">
                        {{ config('app.name', 'Laravel') }}
                    </span>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto no-scrollbar" x-data="{ selected: '{{ request()->is('admin/dashboard') ? 'Dashboard' : (request()->is('admin/users*') ? 'Users' : (request()->is('admin/roles*') ? 'Roles' : (request()->is('admin/permissions*') ? 'Permissions' : 'Dashboard'))) }}' }">
                <div>
                    <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400 dark:text-gray-600">
                        <span :class="sidebarToggle ? 'lg:hidden' : ''">MENU</span>
                    </h3>

                    <ul class="flex flex-col gap-2 mb-6">
                        <!-- Dashboard -->
                        <li>
                            <a href="{{ route('admin.dashboard') }}"
                                class="group relative flex items-center gap-3 rounded-lg px-3 py-2.5 font-medium duration-200 ease-in-out {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600 dark:bg-white/5 dark:text-white' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-white/5' }}">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z" />
                                </svg>
                                <span :class="sidebarToggle ? 'lg:hidden' : ''">Dashboard</span>
                            </a>
                        </li>

                        <!-- Divider -->
                        <li class="px-3 py-2">
                            <p class="text-xs font-semibold text-gray-400 dark:text-gray-600 uppercase tracking-wider"
                                :class="sidebarToggle ? 'lg:hidden' : ''">
                                Manajemen Akun
                            </p>
                        </li>

                        <!-- Users -->
                        <li>
                            <a href="{{ route('admin.users.index') }}"
                                class="group relative flex items-center gap-3 rounded-lg px-3 py-2.5 font-medium duration-200 ease-in-out {{ request()->routeIs('admin.users.*') ? 'bg-blue-50 text-blue-600 dark:bg-white/5 dark:text-white' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-white/5' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <span :class="sidebarToggle ? 'lg:hidden' : ''">Users</span>
                            </a>
                        </li>

                        <!-- Roles -->
                        <li>
                            <a href="{{ route('admin.roles.index') }}"
                                class="group relative flex items-center gap-3 rounded-lg px-3 py-2.5 font-medium duration-200 ease-in-out {{ request()->routeIs('admin.roles.*') ? 'bg-blue-50 text-blue-600 dark:bg-white/5 dark:text-white' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-white/5' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <span :class="sidebarToggle ? 'lg:hidden' : ''">Roles</span>
                            </a>
                        </li>

                        <!-- Permissions -->
                        <li>
                            <a href="{{ route('admin.permissions.index') }}"
                                class="group relative flex items-center gap-3 rounded-lg px-3 py-2.5 font-medium duration-200 ease-in-out {{ request()->routeIs('admin.permissions.*') ? 'bg-blue-50 text-blue-600 dark:bg-white/5 dark:text-white' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-white/5' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                <span :class="sidebarToggle ? 'lg:hidden' : ''">Permissions</span>
                            </a>
                        </li>

                        <!-- Divider -->
                        <li class="px-3 py-2 pt-4">
                            <p class="text-xs font-semibold text-gray-400 dark:text-gray-600 uppercase tracking-wider"
                                :class="sidebarToggle ? 'lg:hidden' : ''">
                                Konten Website
                            </p>
                        </li>

                        <!-- Pages CMS -->
                        <li>
                            <a href="{{ route('admin.pages.index') }}"
                                class="group relative flex items-center gap-3 rounded-lg px-3 py-2.5 font-medium duration-200 ease-in-out {{ request()->routeIs('admin.pages.*') ? 'bg-blue-50 text-blue-600 dark:bg-white/5 dark:text-white' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-white/5' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span :class="sidebarToggle ? 'lg:hidden' : ''">Halaman CMS</span>
                            </a>
                        </li>

                        <!-- Divider -->
                        <li class="px-3 py-2 pt-4">
                            <p class="text-xs font-semibold text-gray-400 dark:text-gray-600 uppercase tracking-wider"
                                :class="sidebarToggle ? 'lg:hidden' : ''">
                                Settings
                            </p>
                        </li>

                        <!-- Profile Settings -->
                        <li>
                            <a href="{{ route('profile.edit') }}"
                                class="group relative flex items-center gap-3 rounded-lg px-3 py-2.5 font-medium duration-200 ease-in-out {{ request()->routeIs('profile.*') ? 'bg-blue-50 text-blue-600 dark:bg-white/5 dark:text-white' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-white/5' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span :class="sidebarToggle ? 'lg:hidden' : ''">Profile Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- User Profile -->
            <div class="border-t border-gray-200 dark:border-gray-800 p-4">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0" :class="sidebarToggle ? 'lg:hidden' : ''">
                        <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ Auth::user()->name }}
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Sidebar End -->

        <!-- Content Area Start -->
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            <!-- Small Device Overlay -->
            <div :class="sidebarToggle ? 'block' : 'hidden'" class="fixed inset-0 z-9998 bg-black/40 lg:hidden"
                @click="sidebarToggle = false"></div>

            <!-- Header Start -->
            <header
                class="sticky top-0 z-99999 flex w-full border-b border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
                <div class="flex grow flex-col items-center justify-between lg:flex-row lg:px-6">
                    <div
                        class="flex w-full items-center justify-between gap-2 px-3 py-3 sm:gap-4 lg:justify-normal lg:px-0 lg:py-4">
                        <!-- Hamburger Toggle BTN -->
                        <button
                            :class="sidebarToggle ? 'lg:bg-transparent dark:lg:bg-transparent bg-gray-100 dark:bg-gray-800' : ''"
                            class="z-99999 flex h-10 w-10 items-center justify-center rounded-lg border border-gray-200 text-gray-500 lg:h-11 lg:w-11 dark:border-gray-800 dark:text-gray-400"
                            @click.stop="sidebarToggle = !sidebarToggle">
                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.25 6C3.25 5.58579 3.58579 5.25 4 5.25L20 5.25C20.4142 5.25 20.75 5.58579 20.75 6C20.75 6.41421 20.4142 6.75 20 6.75L4 6.75C3.58579 6.75 3.25 6.41422 3.25 6ZM3.25 18C3.25 17.5858 3.58579 17.25 4 17.25L20 17.25C20.4142 17.25 20.75 17.5858 20.75 18C20.75 18.4142 20.4142 18.75 20 18.75L4 18.75C3.58579 18.75 3.25 18.4142 3.25 18ZM4 11.25C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75L12 12.75C12.4142 12.75 12.75 12.4142 12.75 12C12.75 11.5858 12.4142 11.25 12 11.25L4 11.25Z" />
                            </svg>
                        </button>

                        <!-- App Title -->
                        <div class="hidden lg:block">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">@yield('title', 'Dashboard')</h2>
                        </div>
                    </div>

                    <div class="flex items-center px-3 py-3 gap-3 sm:gap-4 lg:px-0 lg:py-4">
                        <!-- Dark Mode Toggle -->
                        <label
                            class="relative flex h-10 w-10 items-center justify-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 cursor-pointer">
                            <input type="checkbox" x-model="darkMode" class="sr-only">
                            <svg :class="darkMode ? 'hidden' : 'block'" class="w-5 h-5 text-gray-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                            <svg :class="darkMode ? 'block' : 'hidden'" class="w-5 h-5 text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </label>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="flex h-10 w-10 items-center justify-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-400"
                                title="Logout">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </header>
            <!-- Header End -->

            <!-- Main Content Start -->
            <main class="bg-gray-50 dark:bg-gray-900 min-h-screen">
                @yield('content')
            </main>
            <!-- Main Content End -->
        </div>
        <!-- Content Area End -->
    </div>
    <!-- Page Wrapper End -->

    <!-- Alpine.js + TailAdmin Scripts -->
    <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>

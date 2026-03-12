<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-4xl w-full">
        <!-- Auth Navigation -->
        @if (Route::has('login'))
            <div class="absolute top-6 right-6">
                @auth
                    <a href="{{ route('admin.dashboard') }}"
                        class="inline-block px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors duration-200">
                        Dashboard
                    </a>
                @else
                    <div class="flex gap-3">
                        <a href="{{ route('login') }}"
                            class="inline-block px-6 py-2.5 bg-white hover:bg-gray-50 text-gray-700 font-semibold rounded-lg shadow-md transition-all duration-200">
                            Login
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-block px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors duration-200">
                                Register
                            </a>
                        @endif
                    </div>
                @endauth
            </div>
        @endif

        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold text-gray-900 mb-4">Welcome to Solviera</h1>
            <p class="text-xl text-gray-600">Laravel Application with Modern Admin Template</p>
        </div>

        <div class="grid md:grid-cols-2 gap-6 mb-8">
            <div
                class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-3 text-center">Admin Dashboard</h2>
                <p class="text-gray-600 text-center mb-6">Kelola aplikasi Anda dengan dashboard admin yang modern dan
                    intuitif.</p>
                @auth
                    <a href="{{ route('admin.dashboard') }}"
                        class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg text-center transition-colors duration-200">
                        Buka Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg text-center transition-colors duration-200">
                        Login untuk Mengakses
                    </a>
                @endauth
            </div>

            <div
                class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-3 text-center">Dokumentasi</h2>
                <p class="text-gray-600 text-center mb-6">Pelajari lebih lanjut tentang Laravel dan Tailwind CSS untuk
                    membangun aplikasi.</p>
                <a href="https://laravel.com/docs" target="_blank"
                    class="block w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-lg text-center transition-colors duration-200">
                    Lihat Dokumentasi
                </a>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Fitur Admin Template</h3>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 mb-2">Tailwind CSS v4</h4>
                    <p class="text-sm text-gray-600">Framework CSS terbaru dengan konfigurasi modern</p>
                </div>

                <div class="text-center">
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 mb-2">Responsive Design</h4>
                    <p class="text-sm text-gray-600">Tampilan optimal di semua perangkat</p>
                </div>

                <div class="text-center">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 mb-2">Kustomisasi Mudah</h4>
                    <p class="text-sm text-gray-600">Tema dan warna dapat disesuaikan dengan mudah</p>
                </div>
            </div>
        </div>

        <footer class="text-center mt-8 text-gray-600">
            <p>&copy; {{ date('Y') }} Solviera. Built with Laravel & Tailwind CSS.</p>
        </footer>
    </div>
</body>

</html>

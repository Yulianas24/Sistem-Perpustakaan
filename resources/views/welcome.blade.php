<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Perpustakaan Sekolah</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset(Storage::url($setting->favicon ?? 'favicons/favicon.ico')) }}" type="image/x-icon">
    <!-- Styles -->
    <link rel="stylesheet" href="/assets/app.css">

</head>
<body class="min-h-screen w-screen flex flex-col justify-between p-5 bg-gray-100">
    <div class="fixed flex justify-center items-center z-0  w-full h-screen ">
        <img class="opacity-20" src="/assets/logo.jpg" alt="">
    </div>

    <div class="relative flex flex-col md:flex-row justify-between items-center">
        <a href="/" class="flex items-center">
            <x-application-logo class="w-20 h-20 fill-current text-black" />
        </a>
        <div class="flex items-center space-x-4 mt-4 md:mt-0">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Masuk</a>
            @endauth
        </div>
    </div>

    <div class="relative flex flex-col items-center mt-16">
        <h1 class="text-3xl font-semibold mb-6 text-center text-gray-800 dark:text-white">Selamat datang di Sistem Informasi Perpustakaan Sekolah</h1>
        <h2 class="text-3xl font-semibold mb-6 text-red-400">SD Negeri 6 Pekanbaru</h2>
        <p class="text-center max-w-md text-gray-800 dark:text-white">Masuk untuk mengakses layanan perpustakaan secara online.</p>
        <div class="flex flex-col md:flex-row mt-8 space-y-4 md:space-y-0 md:space-x-4">
            <a href="{{ route('login') }}" class="bg-white shadow-lg rounded-lg p-4 flex items-center justify-center space-x-2 transition duration-300 hover:shadow-xl w-full md:w-auto">
                <div class="w-12 h-12 bg-red-50 rounded-full flex items-center justify-center">
                    <img src="https://www.svgrepo.com/show/408745/login-sign-in-user-entrance-account.svg" alt="Login Icon" class="w-8 h-8">
                </div>
                <span class="text-xl font-semibold text-gray-900">Masuk</span>
            </a>
        </div>
    </div>

    <div class="relative flex justify-between items-center mt-16">
        <p class="text-sm text-black">© {{ date('Y') }} Sistem Informasi Perpustakaan Sekolah.</p>
        <p class="text-sm text-black">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
    </div>

</body>
<script src="/assets/app.js"></script>


</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Acceso denegado') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gradient-to-b from-gray-50 to-gray-100 min-h-screen flex items-center justify-center p-4">
        <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8 text-center">
            <div class="flex justify-center">
                <div class="bg-yellow-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-yellow-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9.9 2.1L5 5l-.6 8.4c-.2 2.3.8 4.6 2.7 5.9 1.8 1.3 4.3 1.7 6.6.8s3.6-2.9 3.7-5.1L20 5l-4.9-2.9c-.7-.4-1.6-.4-2.3 0L9.9 2.1z"></path>
                        <path d="M15 11h.01"></path>
                        <path d="M9 11h.01"></path>
                        <path d="M9.5 16a3.5 3.5 0 0 1 5 0"></path>
                    </svg>
                </div>
            </div>
            <h1 class="mt-6 text-3xl font-bold text-gray-900">Página Expirada</h1>
            <p class="mt-4 text-gray-600">Lo sentimos, pero esta página ha expirado debido a inactividad. Por favor, actualiza la página e intenta nuevamente.</p>
            <div class="mt-8">
                <a href="/" class="inline-flex items-center px-6 py-3 text-base font-medium text-black bg-yellow-600 hover:bg-yellow-700 rounded-lg transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="black" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M19 12H5"></path>
                        <path d="m12 19-7-7 7-7"></path>
                    </svg>
                    Volver Atrás
                </a>
            </div>
            <p class="mt-6 text-sm text-gray-500">Código de Error: 419</p>
        </div>
    </body>
       
</html>

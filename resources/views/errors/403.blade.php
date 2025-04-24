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
    <body>
        <div id="root">
            <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 flex items-center justify-center p-4">
                <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8 text-center">
                    <div class="flex justify-center">
                        <div class="bg-red-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-x w-12 h-12 text-red-500">
                                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                                <path d="m14.5 9.5-5 5"></path>
                                <path d="m9.5 9.5 5 5"></path>
                            </svg>
                        </div>
                    </div>
                    <h1 class="mt-6 text-3xl font-bold text-gray-900">Acceso Prohibido</h1>
                    <p class="mt-4 text-gray-600">Lo sentimos, pero no tienes permiso para acceder a esta página. Por favor, verifica tus credenciales o contacta al administrador.</p>
                    <div class="mt-8">
                        <button class="inline-flex items-center px-6 py-3 text-base font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors duration-200" onclick="location.href='/'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left w-5 h-5 mr-2">
                                <path d="m12 19-7-7 7-7"></path>
                                <path d="M19 12H5"></path>
                            </svg>
                            Volver Atrás
                        </button>
                    </div>
                    <p class="mt-6 text-sm text-gray-500">Código de Error: 403</p>
                </div>
            </div>
        </div>
        
    </body>
</html>

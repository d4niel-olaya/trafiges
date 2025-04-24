<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Sistema de gestion') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="flex h-screen">
            <!-- Sidebar -->
            <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white transform -translate-x-full md:translate-x-0 md:relative transition-transform z-40">
                <div class="px-4 py-6">
                    <h2 class="text-2xl font-bold text-center mb-6">Menú</h2>
                    <ul>
                        <li class="mb-4">
                            <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-sm font-medium text-gray-200 hover:bg-gray-700 rounded">
                                <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m12 10h-7m0 0l-3 3m3-3l3-3"/>
                                </svg>
                                Caja Diaria
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('inventario.productos.index') }}" class="flex items-center p-2 text-sm font-medium text-gray-200 hover:bg-gray-700 rounded">
                                <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 21V8a2 2 0 00-2-2H6a2 2 0 00-2 2v13m16 0H4m16 0l-2-2m-12 2l2-2"/>
                                </svg>
                                Productos
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
    
            <!-- Main Content -->
            <div class="flex-1 flex flex-col">
                <!-- Navbar -->
                <nav class="fixed z-30 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <div class="px-3 py-3 lg:px-5 lg:pl-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <!-- Hamburger for sidebar -->
                                <button id="toggleSidebarMobile" class="p-2 text-gray-600 rounded lg:hidden hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 5h14M3 10h14M3 15h14" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <!-- Branding -->
                                <a href="{{ url('/') }}" class="flex ml-2">
                                    <img src="/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
                                    <span class="self-center text-xl font-semibold sm:text-2xl dark:text-white">Flowbite</span>
                                </a>
                            </div>
                            <!-- User Profile -->
                            <div class="flex items-center">
                                <div class="relative">
                                    <button id="profile-dropdown-toggle" class="flex items-center text-sm font-medium text-gray-700 hover:bg-gray-100 rounded p-2 dark:text-white">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <div id="profile-dropdown" class="hidden absolute right-0 z-10 bg-white rounded shadow w-44 mt-2">
                                        <ul class="py-2 text-sm text-gray-700">
                                            <li><a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Mi perfil</a></li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-100">Cerrar sesión</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
    
                <!-- Page Content -->
                <main class="flex-1 overflow-y-auto p-6 mt-16">
                    @yield('content')
                </main>
            </div>
        </div>
    
        <script type="module">
            document.addEventListener('DOMContentLoaded', () => {
                const sidebar = document.getElementById('sidebar');
                const toggleSidebarMobile = document.getElementById('toggleSidebarMobile');
                toggleSidebarMobile.addEventListener('click', () => {
                    sidebar.classList.toggle('-translate-x-full');
                });
            });
        </script>
        @stack("scripts")
    </body>
    </html>

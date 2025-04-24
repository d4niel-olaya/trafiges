<!DOCTYPE html>
<html lang="en">
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

    <!-- Sidebar and Toggle Button -->
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                {{-- ADMINISTRADOR --}}
                @if(Auth::user()->hasRole('administrador'))
                    <li><x-nav-item route="dashboard" icon="home" label="Dashboard" /></li>
                    <li><x-nav-item route="informes.index" icon="file-text" label="Gestión de Informes" /></li>
                    <li><x-nav-item route="plantillas.index" icon="file" label="Plantillas de Documentos" /></li>
                    <li><x-nav-item route="clientes.index" icon="users" label="Gestión de Clientes" /></li>
                    <li><x-nav-item route="entidades.index" icon="building" label="Gestión de Entidades" /></li>
                    <li><x-nav-item route="comercial.index" icon="dollar-sign" label="Gestión Comercial" /></li>
                    <li><x-nav-item route="biomecanica.index" icon="activity" label="Gestión Biomecánica" /></li>
                    <li><x-nav-item route="documentacion.index" icon="book-open" label="Documentación" /></li>
                    <li>
                        <x-nav-group label="Mantenimiento" icon="settings">
                            <x-nav-item route="usuarios.index" icon="user-cog" label="Usuarios" />
                            <x-nav-item route="configuracion.index" icon="database" label="Configuración BD" />
                            <x-nav-item route="diagnostico.index" icon="alert-circle" label="Diagnóstico" />
                            <x-nav-item route="logs.index" icon="file-search" label="Logs" />
                            <x-nav-item route="backups.index" icon="save" label="Copias de Seguridad" />
                        </x-nav-group>
                    </li>
                @endif
            
                {{-- PERITO --}}
                @if(Auth::user()->hasRole('perito'))
                    <li><x-nav-item route="informes.index" icon="file-text" label="Mis Informes" /></li>
                    <li><x-nav-item route="clientes.index" icon="users" label="Mis Clientes" /></li>
                    <li><x-nav-item route="documentacion.index" icon="book-open" label="Documentación" /></li>
                @endif
            
                {{-- ASISTENTE --}}
                @if(Auth::user()->hasRole('asistente'))
                    <li><x-nav-item route="usuarios.index" icon="users" label="Usuarios" /></li>
                    <li><x-nav-item route="informes.index" icon="file-text" label="Gestión de Informes" /></li>
                @endif
            
                {{-- Perfil y Logout comunes --}}
                <li><x-nav-item route="profile.edit" icon="user" label="Perfil" /></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 group">
                        @csrf
                        <button type="submit" class="flex items-center w-full">
                            <x-icon name="log-out" />
                            <span class="ms-3">Cerrar sesión</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </aside>

    <main class="p-4 sm:ml-64">
        <div class="p-4  rounded-lg dark:border-gray-700">
            @yield('content', 'Welcome to the dashboard!')
        </div>
    </main>
    @stack('scripts')
</body>
</html>

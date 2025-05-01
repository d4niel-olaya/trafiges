<nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img class="block h-8 w-auto" src="{{ asset('logo.svg') }}" alt="Logo">
                    </a>
                </div>

                <!-- Navigation Links -->
               <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white">
            <div class="px-4 py-6">
                <h1 class="text-2xl font-bold text-center mb-6">Gestión</h1>
                <ul>
                    {{-- <li class="mb-4">
                        <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-sm font-medium text-gray-200 hover:bg-gray-700 rounded">
                            <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m12 10h-7m0 0l-3 3m3-3l3-3"/>
                            </svg>
                            Dashboard
                        </a>
                    </li> --}}
                    <li class="mb-4">
                        <a href="{{ route('users.index') }}" class="flex items-center p-2 text-sm font-medium text-gray-200 hover:bg-gray-700 rounded">
                            <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 21V8a2 2 0 00-2-2H6a2 2 0 00-2 2v13m16 0H4m16 0l-2-2m-12 2l2-2"/>
                            </svg>
                            Usuarios
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('settings') }}" class="flex items-center p-2 text-sm font-medium text-gray-200 hover:bg-gray-700 rounded">
                            <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A7.962 7.962 0 0112 15c4.418 0 8 3.582 8 8M15 12a4 4 0 100-8 4 4 0 000 8zm0 0v8"/>
                            </svg>
                            Configuración
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.292 7.707a1 1 0 011.414 0L10 11.414l3.293-3.707a1 1 0 011.414 0l.586.586a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l.586-.586z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            {{-- <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                {{ __('Usuarios') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('settings')" :active="request()->routeIs('settings')">
                {{ __('Configuración') }}
            </x-responsive-nav-link> --}}
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Cerrar sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

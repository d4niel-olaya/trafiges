@extends('layouts.main_layout')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 flex items-center justify-between">
        <button class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors focus:outline-none" onclick="window.location.href='{{ route('dashboard') }}'">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="lucide lucide-arrow-left mr-2">
                <path d="m12 19-7-7 7-7"></path>
                <path d="M19 12H5"></path>
            </svg>
            Atrás
        </button>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="flex items-start justify-between p-6 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-900">Gestión de Usuarios</h2>
        </div>

        <div class="p-6">
            <div class="w-full">
                <div class="border-b border-gray-200">
                    <nav class="flex overflow-x-auto -mb-px space-x-4 sm:space-x-8" aria-label="Tabs">
                        <button class="tab-button py-4 px-2 border-b-2 font-medium text-sm whitespace-nowrap border-sky-500 text-sky-600" data-tab="usuarios-listado">Listado de Usuarios</button>
                        <button class="tab-button py-4 px-2 border-b-2 font-medium text-sm whitespace-nowrap text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="crear-usuario">Nuevo Usuario</button>
                    </nav>
                </div>

                <div class="py-6 tab-content">
                    {{-- TAB 1 - Listado de usuarios --}}
                    <div id="usuarios-listado" class="tab-panel">
                        <div class="relative overflow-x-auto rounded-lg shadow">
                            <table class="w-full text-sm text-left text-gray-600">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3">Nombre</th>
                                        <th class="px-6 py-3">Email</th>
                                        <th class="px-6 py-3">Roles</th>
                                        <th class="px-6 py-3 text-right">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($usuarios as $usuario)
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="px-6 py-4">{{ $usuario->name }}</td>
                                            <td class="px-6 py-4">{{ $usuario->email }}</td>
                                            <td class="px-6 py-4">
                                                @foreach ($usuario->getRoleNames() as $rol)
                                                    <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded mr-1">
                                                        {{ $rol }}
                                                    </span>
                                                @endforeach
                                            </td>
                                            <td class="px-6 py-4 text-right space-x-2">
                                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="text-blue-600 hover:underline">Editar</a>
                                                {{-- <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="inline">
                                                    @csrf @method('DELETE')
                                                    <button class="text-red-600 hover:underline" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center px-6 py-4">No hay usuarios registrados.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- TAB 2 - Crear usuario (puede ir luego en su propia vista si prefieres) --}}
                    <div id="crear-usuario" class="tab-panel hidden">
                        <div class="py-6">
                                <form action="{{ route('usuarios.store') }}" method="POST">
                                    @csrf
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
                                        <div class="mb-6">
                                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                                            <input type="text" id="name" name="name" required
                                                class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                        </div>

                                        <div class="mb-6">
                                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Correo electrónico</label>
                                            <input type="email" id="email" name="email" required
                                                class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                        </div>

                                        <div class="mb-6">
                                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                                            <input type="password" id="password" name="password" required
                                                class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                        </div>

                                        <div class="mb-6">
                                            <label for="roles" class="block text-sm font-medium text-gray-700 mb-2">Roles</label>
                                            <select id="roles" name="roles"
                                                    class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                                @foreach($roles as $rol)
                                                    <option value="{{ $rol->name }}">{{ ucfirst($rol->name) }}</option>
                                                @endforeach
                                            </select>
                                           
                                        </div>
                                    </div>

                                    <div class="flex justify-end mt-6">
                                        <button type="submit"
                                                class="inline-flex items-center px-4 py-2 bg-sky-600 border border-transparent rounded-md font-semibold text-white hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                                            Crear Usuario
                                        </button>
                                    </div>
                                </form>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabPanels = document.querySelectorAll('.tab-panel');

    function showTab(tabId) {
        tabPanels.forEach(panel => panel.classList.add('hidden'));
        document.getElementById(tabId).classList.remove('hidden');

        tabButtons.forEach(button => {
            button.classList.remove('border-sky-500', 'text-sky-600');
            button.classList.add('text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
        });

        const activeButton = document.querySelector(`.tab-button[data-tab="${tabId}"]`);
        activeButton.classList.add('border-sky-500', 'text-sky-600');
        activeButton.classList.remove('text-gray-500');
    }

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            showTab(button.dataset.tab);
        });
    });

    // Mostrar el primer tab por defecto
    showTab('usuarios-listado');
});
</script>
@endsection

@extends('layouts.main_layout')

@section('title', 'Editar Usuario')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 flex items-center justify-between">
        <button class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors focus:outline-none" onclick="window.location.href='{{ route('usuarios.index') }}'">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="lucide lucide-arrow-left mr-2">
                <path d="m12 19-7-7 7-7"></path>
                <path d="M19 12H5"></path>
            </svg>
            Atrás
        </button>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="flex items-start justify-between p-6 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-900">Editar Usuario</h2>
        </div>

        <div class="p-6">
            <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $usuario->name) }}" required
                            class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Correo electrónico</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $usuario->email) }}" required
                            class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                    </div>

                    <div class="mb-6 hidden">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Nueva contraseña <span class="text-gray-400 text-xs">(opcional)</span></label>
                        <input type="password" id="password" name="password"
                            class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                    </div>

                    <div class="mb-6">
                        <label for="roles" class="block text-sm font-medium text-gray-700 mb-2">Roles</label>
                        <select id="roles" name="roles"
                                class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                            @foreach($roles as $rol)
                                <option value="{{ $rol->name }}" 
                                    {{ $usuario->roles->contains('name', $rol->name) ? 'selected' : '' }}>
                                    {{ ucfirst($rol->name) }}
                                </option>
                            @endforeach
                        </select>
                        
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-sky-600 border border-transparent rounded-md font-semibold text-white hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

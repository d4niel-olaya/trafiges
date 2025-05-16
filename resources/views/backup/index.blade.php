@extends('layouts.main_layout')

@section('title', 'Gestión de Copias de Seguridad')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8 space-y-6">
    <h1 class="text-2xl font-bold text-gray-800">Gestión de Copias de Seguridad</h1>
    <p class="text-sm text-gray-500">Cree, restaure y gestione las copias de seguridad de su base de datos.</p>

    {{-- ALERTAS --}}
    @if(session('success'))
        <div class="p-4 bg-green-100 border border-green-300 text-green-800 rounded-md">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="p-4 bg-red-100 border border-red-300 text-red-800 rounded-md">
            {{ session('error') }}
        </div>
    @endif

    {{-- Pestañas --}}
    <div class="flex space-x-4 border-b">
        <button class="tab-button text-sm px-4 py-2 font-medium text-blue-600 border-b-2 border-blue-600" data-tab="crear">Crear</button>
        <button class="tab-button text-sm px-4 py-2 font-medium text-gray-600 hover:text-blue-600" data-tab="importar">Importar</button>
        <button class="tab-button text-sm px-4 py-2 font-medium text-gray-600 hover:text-blue-600" data-tab="historial">Historial</button>
    </div>

    {{-- CREAR BACKUP --}}
    <div id="crear" class="tab-panel">
        <div class="bg-white p-6 rounded-lg border space-y-4">
            <h2 class="text-lg font-semibold text-gray-800">Crear nueva copia de seguridad</h2>
            <p class="text-sm text-gray-500">Esto generará una copia completa de todos los datos actuales.</p>
            <form action="{{ route('backup.generar') }}" method="POST">
                @csrf
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 text-sm flex items-center gap-2">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Crear copia de seguridad
                </button>
            </form>
        </div>
    </div>

    {{-- IMPORTAR BACKUP --}}
    <div id="importar" class="tab-panel hidden">
        <div class="bg-white p-6 rounded-lg border space-y-4">
            <h2 class="text-lg font-semibold text-gray-800">Importar copia de seguridad</h2>
            <p class="text-sm text-gray-500">Seleccione un archivo `.sql` o `.gz` para restaurar la base de datos.</p>
            <p class="text-sm text-red-600 font-semibold">Advertencia: Este proceso sobrescribirá los datos actuales.</p>

            {{-- Puedes implementar lógica real para importar si deseas --}}
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="archivo" class="w-full rounded border border-gray-300 px-3 py-2 text-sm">
                <button type="submit" disabled class="bg-red-500 opacity-50 text-white mt-4 px-5 py-2 rounded-md text-sm cursor-not-allowed">
                    Importar y restaurar (próximamente)
                </button>
            </form>
        </div>
    </div>

    {{-- HISTORIAL --}}
    <div id="historial" class="tab-panel hidden">
        <div class="bg-white p-6 rounded-lg border space-y-4">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-800">Historial de Copias de Seguridad</h2>
                <a href="{{ route('backup.historial') }}" class="text-blue-600 text-sm hover:underline">Actualizar</a>
            </div>

            <div class="overflow-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-100 border-b">
                        <tr>
                            <th class="px-4 py-2">Archivo</th>
                            <th class="px-4 py-2">Tamaño</th>
                            <th class="px-4 py-2">Fecha</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $backupFiles = \File::glob(base_path('database/backups') . '/*.sql');
                        @endphp
                        @forelse($backupFiles as $archivo)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ basename($archivo) }}</td>
                                <td class="px-4 py-2">{{ round(filesize($archivo) / 1048576, 2) }} MB</td>
                                <td class="px-4 py-2">{{ date('d/m/Y H:i:s', filemtime($archivo)) }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('backup.descargar', basename($archivo)) }}" class="text-blue-600 hover:underline">Descargar</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-gray-500 py-4">No hay copias registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Scripts para tabs --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tabs = document.querySelectorAll('.tab-button');
        const panels = document.querySelectorAll('.tab-panel');

        tabs.forEach(btn => {
            btn.addEventListener('click', () => {
                const tabId = btn.getAttribute('data-tab');
                tabs.forEach(b => b.classList.remove('text-blue-600', 'border-blue-600'));
                btn.classList.add('text-blue-600', 'border-blue-600');

                panels.forEach(p => p.classList.add('hidden'));
                document.getElementById(tabId).classList.remove('hidden');
            });
        });
    });
</script>
@endsection

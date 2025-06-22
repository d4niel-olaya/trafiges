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
            <h2 class="text-xl font-semibold text-gray-900">Plantillas de documentos</h2>
        </div>
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

        @if ($errors->any())
            <div class="p-4 bg-red-100 border border-red-300 text-red-800 rounded-md">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- FIN ALERTAS --}}



        <div class="p-6">
            <div class="w-full">
                <div class="border-b border-gray-200">
                    <nav class="flex overflow-x-auto -mb-px space-x-4 sm:space-x-8" aria-label="Tabs">
                        <button id="tab-plantillas-subir" class="tab-button flex-shrink-0 py-4 px-2 sm:px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 active" data-tab="plantillas-subir-content">Subir Plantillas</button>
                        <button id="tab-plantillas" class="tab-button flex-shrink-0 py-4 px-2 sm:px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="plantillas-content">Lista de Plantillas</button>
                        <button id="tab-datos-adicionales" class="tab-button flex-shrink-0 py-4 px-2 sm:px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="datos-adicionales-content">Asociar Datos a las Plantillas</button>
                    </nav>
                </div>
                <div class="py-6 tab-content">
                    <div id="plantillas-subir-content" class="tab-panel">
                      <div class="py-6">
                            <div class="tab-content">
                                <!-- El formulario envuelve toda la grilla -->
                                 <form id="formSubirPlantilla" enctype="multipart/form-data" action="{{ route('plantillas.store') }}" method="POST">
                                    @csrf("POST")
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
                                    <!-- Titulo -->
                                    <div class="mb-6">
                                    <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">Título</label>
                                    <input type="text" id="titulo" name="titulo" maxlength="100" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                    </div>

                                    <!-- Descripción -->
                                    <div class="mb-6">
                                    <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
                                    <textarea id="descripcion" name="descripcion" rows="4" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"></textarea>
                                    </div>

                                    <!-- Archivo Word -->
                                    <div class="mb-6 md:col-span-2">
                                    <label for="plantilla" class="block text-sm font-medium text-gray-700 mb-2">Archivo Word (.docx)</label>
                                    <input type="file" id="plantilla" name="plantilla" accept=".docx" class="w-full border border-gray-300 rounded-md py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100">
                                    </div>
                                </div>

                                <!-- Botón para enviar -->
                                <div class="mt-6">
                                    <button type="submit" id="BtnSubirPlantilla" class="bg-sky-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-sky-700 transition-colors">Subir Plantilla</button>
                                </div>
                                </form> 
                            </div>
                            </div>

                    </div>
                    

                     <div id="plantillas-content" class="tab-panel hidden">
                        <div class="tab-content">
                            <div class="overflow-auto">
                                <table class="w-full text-sm text-left">
                                    <thead class="bg-gray-100 border-b">
                                        <tr>
                                            <th class="px-4 py-2">Nombre Plantilla</th>
                                            <th class="px-4 py-2">Archivo</th>
                                            <th class="px-4 py-2">Fecha</th>
                                            <th class="px-4 py-2">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($archivos as $archivo)
                                            <tr class="border-b">
                                                <td class="px-4 py-2">{{ $archivo->titulo }}</td>
                                                <td class="px-4 py-2">{{ $archivo->nombre_archivo}}</td>
                                                <td class="px-4 py-2">{{ $archivo->created_at }}</td>
                                                
                                                <td class="px-4 py-2">
                                                    <a href="{{ route('plantillas.descargar', $archivo->nombre_archivo ?? 'plantilla1.docx') }}" class="text-blue-600 hover:underline">Descargar</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-gray-500 py-4">No hay plantillas</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div id="datos-adicionales-content" class="tab-panel hidden">
                        <div class="tab-content">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
                                Aquí se asociaran los datos a las plantillas
                                {{-- <div class="mb-6">
                                    <label for="fechaAccidente" class="block text-sm font-medium text-gray-700 mb-2">Fecha del Accidente</label>
                                    <input type="date" id="fechaAccidente" name="fechaAccidente" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                {{-- <div class="mb-6">
                                    <label for="estatura" class="block text-sm font-medium text-gray-700 mb-2">Estatura (cm)</label>
                                    <input type="number" id="estatura" name="estatura" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                </div>
                                <div class="mb-6">
                                    <label for="peso" class="block text-sm font-medium text-gray-700 mb-2">Peso (kg)</label>
                                    <input type="number" id="peso" name="peso" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                </div>
                                <div class="mb-6">
                                    <label for="antecedentesClinicos" class="block text-sm font-medium text-gray-700 mb-2">Antecedentes Clínicos</label>
                                    <textarea id="antecedentesClinicos" name="antecedentesClinicos" rows="4" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"></textarea>
                                </div>
                                <div class="mb-6">
                                    <label for="antecedentesMedicos" class="block text-sm font-medium text-gray-700 mb-2">Antecedentes Médicos</label>
                                    <textarea id="antecedentesMedicos" name="antecedentesMedicos" rows="4" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"></textarea>
                                </div>
                                <div class="mb-6">
                                    <label for="antecedentesAccidentes" class="block text-sm font-medium text-gray-700 mb-2">Antecedentes en Accidentes</label>
                                    <textarea id="antecedentesAccidentes" name="antecedentesAccidentes" rows="4" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"></textarea>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabPanels = document.querySelectorAll('.tab-panel');

        function showTab(tabId) {
            tabPanels.forEach(panel => {
                panel.classList.add('hidden');
            });
            document.getElementById(tabId).classList.remove('hidden');

            tabButtons.forEach(button => {
                button.classList.remove('active', 'border-sky-500', 'text-sky-600');
                button.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
            });

            const activeButton = document.querySelector(`.tab-button[data-tab="${tabId}"]`);
            if (activeButton) {
                activeButton.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
                activeButton.classList.add('active', 'border-sky-500', 'text-sky-600');
            }
        }

        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const tabToShow = this.getAttribute('data-tab');
                showTab(tabToShow);
            });
        });

        // Mostrar la primera pestaña por defecto
        showTab('plantillas-subir-content');


        
    });
 

</script>
@endsection
@push("scripts")
{{-- @vite('resources/js/plantillas/upload.js') --}}
@endpush
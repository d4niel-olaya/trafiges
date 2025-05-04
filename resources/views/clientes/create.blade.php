
@extends('layouts.main_layout')

@section('title', 'Crear Infomes')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 flex items-center justify-between">
    
        <button class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors focus:outline-none" onclick="window.location.href='/clientes'">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left mr-2">
                <path d="m12 19-7-7 7-7"></path>
                <path d="M19 12H5"></path>
            </svg>
            Atrás
        </button>
    </div>
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="flex items-start justify-betweem p-6 border-b border-gray-200">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Crear Cliente</h2>
            </div>
        </div>
        <div class="p-6">
            <div class="w-full">
                <div class="border-b border-gray-200">
                    <nav class="flex overflow-x-auto -mb-px space-x-4 sm:space-x-8" aria-label="Tabs">
                        <button id="tab-datos-generales" class="tab-button flex-shrink-0 py-4 px-2 sm:px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 active" data-tab="datos-generales-content">Datos Generales</button>
                        <button id="tab-datos-adicionales" class="tab-button flex-shrink-0 py-4 px-2 sm:px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="datos-adicionales-content">Datos adicionales</button>
                       
                    </nav>
                </div>
                <div class="py-6 tab-content">
                    <div id="datos-generales-content" class="tab-panel">
                        <div class="py-6">
                            <div class="tab-content">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
                                    <div class="mb-6">
                                        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                                        <input type="text" id="nombre" name="nombre" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                    </div>
                                    <div class="mb-6">
                                        <label for="apellidos" class="block text-sm font-medium text-gray-700 mb-2">Apellidos</label>
                                        <input type="text" id="apellidos" name="apellidos" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                    </div>
                                    <div class="mb-6">
                                        <label for="dni" class="block text-sm font-medium text-gray-700 mb-2">DNI</label>
                                        <input type="text" id="dni" name="dni" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                    </div>
                                    <div class="mb-6">
                                        <label for="fechaNacimiento" class="block text-sm font-medium text-gray-700 mb-2">Fecha de Nacimiento</label>
                                        <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                    </div>
                                    <div class="mb-6">
                                        <label for="telefono" class="block text-sm font-medium text-gray-700 mb-2">Teléfono</label>
                                        <input type="text" id="telefono" name="telefono" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                    </div>
                                    <div class="mb-6">
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                        <input type="email" id="email" name="email" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                    </div>
                                    <div class="mb-6">
                                        <label for="domicilio" class="block text-sm font-medium text-gray-700 mb-2">Domicilio</label>
                                        <input type="text" id="domicilio" name="domicilio" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                    </div>
                                    <div class="mb-6">
                                        <label for="poblacion" class="block text-sm font-medium text-gray-700 mb-2">Población</label>
                                        <input type="text" id="poblacion" name="poblacion" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                    </div>
                                    <div class="mb-6">
                                        <label for="provincia" class="block text-sm font-medium text-gray-700 mb-2">Provincia</label>
                                        <input type="text" id="provincia" name="provincia" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                    </div>
                                    <div class="mb-6">
                                        <label for="abogadoAsociado" class="block text-sm font-medium text-gray-700 mb-2">Abogado Asociado</label>
                                        <select id="abogadoAsociado" name="abogadoAsociado" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                            <option value="Pedro Sánchez">Pedro Sánchez</option>
                                            <option value="María López">María López</option>
                                            <option value="Carlos Ruiz">Carlos Ruiz</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div id="datos-adicionales-content" class="tab-panel hidden">
                        <div class="tab-content">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
                                <div class="mb-6">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-6 py-4 flex justify-end space-x-3 border-t border-gray-200"><button type="button" class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Cancelar</button><button type="button" id="btnGuardarCambios" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Guardar Cambios</button></div>
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
        showTab('datos-generales-content');


        
    });
 

</script>
@endsection

@push("scripts")
@vite('resources/js/clientes_crear.js')
@endpush
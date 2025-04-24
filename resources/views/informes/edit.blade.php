
@extends('layouts.main_layout')

@section('title', 'Editar Infomes')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">Vista de Informe</h2>
            <p class="text-sm text-gray-500">Visualización de informes mediante pestañas</p>
        </div>
        <button class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors focus:outline-none" onclick="window.history.back()">
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
                <h2 class="text-xl font-semibold text-gray-900">Editar Informe INF-7986</h2>
            </div>
        </div>
        <div class="p-6">
            <div class="w-full">
                <div class="border-b border-gray-200">
                    <nav class="flex overflow-x-auto -mb-px space-x-4 sm:space-x-8" aria-label="Tabs">
                        <button id="tab-datos-generales" class="tab-button flex-shrink-0 py-4 px-2 sm:px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 active" data-tab="datos-generales-content">Datos Generales</button>
                        <button id="tab-vehiculos" class="tab-button flex-shrink-0 py-4 px-2 sm:px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="vehiculos-content">Vehículos</button>
                        <button id="tab-biomecanica-vista" class="tab-button flex-shrink-0 py-4 px-2 sm:px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-sky-500 text-sky-600" aria-current="page" data-tab="biomecanica-content">Biomecánica</button>
                    </nav>
                </div>
                <div class="py-6 tab-content">
                    <div id="datos-generales-content" class="tab-panel">
                        <p>Aquí irá el formulario de Datos Generales.</p>
                    </div>
                    <div id="vehiculos-content" class="tab-panel hidden">
                        <p>Aquí irá el formulario de Vehículos.</p>
                    </div>
                    <div id="biomecanica-content" class="tab-panel">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
                            <div class="mb-6"><label for="tipoLesion" class="block text-sm font-medium text-gray-700 mb-2">Tipo de Lesión</label>
                                <div class="relative"><select id="tipoLesion" name="tipoLesion" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 appearance-none bg-white">
                                        <option value="Latigazo cervical">Latigazo cervical</option>
                                        <option value="Contusión">Contusión</option>
                                        <option value="Fractura">Fractura</option>
                                        <option value="Esguince">Esguince</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"><svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                        </svg></div>
                                </div>
                            </div>
                            <div class="mb-6"><label for="gravedad" class="block text-sm font-medium text-gray-700 mb-2">Gravedad</label>
                                <div class="relative"><select id="gravedad" name="gravedad" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 appearance-none bg-white">
                                        <option value="Leve">Leve</option>
                                        <option value="Moderada">Moderada</option>
                                        <option value="Grave">Grave</option>
                                        <option value="Muy grave">Muy grave</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"><svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                        </svg></div>
                                </div>
                            </div>
                            <div class="mb-6"><label for="velocidadDelta" class="block text-sm font-medium text-gray-700 mb-2">Velocidad Delta</label>
                                <div class="relative"><input type="text" id="velocidadDelta" name="velocidadDelta" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" value="15 km/h"></div>
                            </div>
                            <div class="mb-6"><label for="fuerzasG" class="block text-sm font-medium text-gray-700 mb-2">Fuerzas G</label>
                                <div class="relative"><input type="text" id="fuerzasG" name="fuerzasG" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" value="3.2 G"></div>
                            </div>
                            <div class="mb-6"><label for="aceleracion" class="block text-sm font-medium text-gray-700 mb-2">Aceleración</label>
                                <div class="relative"><input type="text" id="aceleracion" name="aceleracion" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" value="4.8 m/s²"></div>
                            </div>
                            <div class="md:col-span-2"><label for="conclusiones" class="block text-sm font-medium text-gray-700 mb-2">Conclusiones Biomecánicas</label><textarea id="conclusiones" name="conclusiones" rows="4" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">La biomecánica del accidente es compatible con las lesiones descritas. El impacto trasero generó una aceleración suficiente para producir un latigazo cervical de gravedad moderada.</textarea></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-6 py-4 flex justify-end space-x-3 border-t border-gray-200"><button type="button" class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Cancelar</button><button type="button" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Guardar Cambios</button></div>
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
    
@endpush
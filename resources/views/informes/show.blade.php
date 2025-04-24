
@extends('layouts.main_layout')

@section('title', 'Ver Infome')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">Vista de Informe</h2>
            <p class="text-sm text-gray-500">Visualización de informes mediante pestañas</p>
        </div>
        <div class="flex flex-wrap justify-end gap-2">
            <button button onclick="location.href='/informes/1/edit'" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil mr-2 h-4 w-4">
                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"></path>
                    <path d="m15 5 4 4"></path>
                </svg>
                Editar
            </button>
            <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download mr-2 h-4 w-4">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="7 10 12 15 17 10"></polyline>
                    <line x1="12" x2="12" y1="15" y2="3"></line>
                </svg>
                Exportar
            </button>
            <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-printer mr-2 h-4 w-4">
                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                    <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6"></path>
                    <rect x="6" y="14" width="12" height="8" rx="1"></rect>
                </svg>
                Imprimir
            </button>
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
        <div class="flex items-start justify-between p-6 border-b border-gray-200">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Informe INF-7986</h2>
                <p class="mt-1 text-sm text-gray-500">Modifique la información del informe.</p>
            </div>
        </div>
        <div class="p-6">
            <div class="w-full">
                <div class="border-b border-gray-200">
                    <nav class="flex overflow-x-auto -mb-px space-x-4 sm:space-x-8" aria-label="Tabs">
                        <button id="tab-datos-generales" class="tab-button flex-shrink-0 py-4 px-2 sm:px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 active" data-tab="datos-generales-content">Datos Generales</button>
                        <button id="tab-vehiculos" class="tab-button flex-shrink-0 py-4 px-2 sm:px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="vehiculos-content">Vehículos</button>
                        <button id="tab-biomecanica-vista" class="tab-button flex-shrink-0 py-4 px-2 sm:px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-sky-500 text-sky-600" aria-current="page" data-tab="biomecanica-content">Biomecánica</button>
                        <button id="tab-datos-biomecanicos" class="tab-button flex-shrink-0 py-4 px-2 sm:px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="datos-biomecanicos-content">Datos Biomecánicos</button>
                    </nav>
                </div>
                <div class="py-6 tab-content">
                    <div id="datos-generales-content" class="tab-panel">
                        <div class="p-6 pt-0 grid grid-cols-2 gap-4">
                            <div>
                                <h3 class="font-medium text-sm text-muted-foreground mb-1">Matrícula</h3>
                                <p>0245GHJ</p>
                            </div>
                            <div>
                                <h3 class="font-medium text-sm text-muted-foreground mb-1">Fecha de Accidente</h3>
                                <p>11/4/2025</p>
                            </div>
                            <div>
                                <h3 class="font-medium text-sm text-muted-foreground mb-1">Cliente</h3>
                                <p>Juan Pérez</p>
                            </div>
                            <div>
                                <h3 class="font-medium text-sm text-muted-foreground mb-1">Abogado Asociado</h3>
                                <p>Pedro Sánchez</p>
                            </div>
                            <div>
                                <h3 class="font-medium text-sm text-muted-foreground mb-1">Perito Asignado</h3>
                                <p>Laura Fernández</p>
                            </div>
                            <div>
                                <h3 class="font-medium text-sm text-muted-foreground mb-1">Tipo de Informe</h3>
                                <p>Accidente de tráfico</p>
                            </div>
                            <div>
                                <h3 class="font-medium text-sm text-muted-foreground mb-1">Compañía de Seguros</h3>
                                <p>Mutua Madrileña</p>
                            </div>
                            <div>
                                <h3 class="font-medium text-sm text-muted-foreground mb-1">Estado</h3>
                                <div class="flex items-center">
                                    <div class="h-2 w-2 rounded-full bg-amber-500 mr-2"></div>
                                    <p>Pendiente</p>
                                </div>
                            </div>
                        </div>
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
                    <div id="datos-biomecanicos-content" class="tab-panel hidden">
                        <p>Aquí irá el formulario de Datos Biomecánicos adicionales.</p>
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

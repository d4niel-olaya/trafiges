@props(['ocupantes_conductor'=> null,'ocupantes_copiloto'=> null, 'ocupantes_detras_conductor'=> null, 'ocupantes_detras_copiloto'=> null, 'ocupantes_detras_centro'=> null, 'ocupantes_detras_3'=> null, 'ocupantes_detras_4'=> null])
<div class="py-4">
    <div class="tab-content" id="tab-ocupantes-anidada">
        <div class="space-y-2">
            <h2 class="text-xl font-semibold text-gray-900">Información de Ocupantes</h2>
            <div class="w-full">
                <div class="border-b border-gray-200">
                    <nav class="flex overflow-x-auto -mb-px space-x-4 sm:space-x-8" aria-label="Tabs">
                        <button id="tab-conductor" class="tab-button-nested py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-sky-500 text-sky-600" data-target="conductor-content" aria-current="page">Conductor</button>
                        <button id="tab-copiloto" class="tab-button-nested py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-target="copiloto-content">Copiloto</button>
                        <button id="tab-detras-conductor" class="tab-button-nested py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-target="detras-conductor-content">Detrás Conductor</button>
                        <button id="tab-detras-copiloto" class="tab-button-nested py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-target="detras-copiloto-content">Detrás Copiloto</button>
                        <button id="tab-detras-centro" class="tab-button-nested py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-target="detras-centro-content">Detrás Centro</button>
                        <button id="tab-detras-3" class="tab-button-nested py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-target="detras-3-content">Detrás 3</button>
                        <button id="tab-detras-4" class="tab-button-nested py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-target="detras-4-content">Detrás 4</button>
                    </nav>
                </div>

                <div id="conductor-content" class="tab-panel-nested">
                    <div>
                        <x-formularios.ocupantes_edit ocupante="Conductor" tipo="conductor" :ocupantes="$ocupantes_conductor"/>
                    </div>
                </div>

                <div id="copiloto-content" class="tab-panel-nested hidden">
                    <div>
                        <x-formularios.ocupantes_edit ocupante="Copiloto" tipo="copiloto"  :ocupantes="$ocupantes_copiloto"/>
                    </div>
                </div>

                <div id="detras-conductor-content" class="tab-panel-nested hidden">
                    <div>
                        <x-formularios.ocupantes_edit ocupante="Detras Conductor" tipo="detras_conductor" :ocupantes="$ocupantes_detras_conductor" />
                    </div>
                </div>

                <div id="detras-copiloto-content" class="tab-panel-nested hidden">
                    <div>
                        <x-formularios.ocupantes_edit ocupante="Detras Copiloto" tipo="detras_copiloto" :ocupantes="$ocupantes_detras_copiloto" />
                    </div>
                </div>

                <div id="detras-centro-content" class="tab-panel-nested hidden">
                    <div>
                        <x-formularios.ocupantes_edit ocupante="Detras Centro" tipo="detras_centro" :ocupantes="$ocupantes_detras_centro"/>
                    </div>
                </div>

                <div id="detras-3-content" class="tab-panel-nested hidden">
                    <div>
                        <x-formularios.ocupantes_edit ocupante="Detras 3" tipo="detras_3" :ocupantes="$ocupantes_detras_3"/>
                    </div>
                </div>

                <div id="detras-4-content" class="tab-panel-nested hidden">
                    <div>
                        <x-formularios.ocupantes_edit ocupante="Detras 4" tipo="detras_4" :ocupantes="$ocupantes_detras_4"/>
                    </div>
                </div>
                
            </div> <!-- Cierre w-full -->
        </div> <!-- Cierre space-y-2 -->
    </div> <!-- Cierre tab-content -->
</div> <!-- Cierre py-4 -->

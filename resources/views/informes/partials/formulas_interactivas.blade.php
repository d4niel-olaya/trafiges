<div class="space-y-8">
    {{-- <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-900">Constructor de Fórmulas Interactivas</h2><button class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus h-5 w-5">
                <path d="M5 12h14"></path>
                <path d="M12 5v14"></path>
            </svg>Nueva Fórmula</button>
    </div> --}}
    <div class="bg-gradient-to-r from-purple-50 to-indigo-50 p-6 rounded-lg border border-purple-200">
        <h3 class="text-xl font-semibold text-purple-900 mb-4 flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calculator h-6 w-6">
                <rect width="16" height="20" x="4" y="2" rx="2"></rect>
                <line x1="8" x2="16" y1="6" y2="6"></line>
                <line x1="16" x2="16" y1="14" y2="18"></line>
                <path d="M16 10h.01"></path>
                <path d="M12 10h.01"></path>
                <path d="M8 10h.01"></path>
                <path d="M12 14h.01"></path>
                <path d="M8 14h.01"></path>
                <path d="M12 18h.01"></path>
                <path d="M8 18h.01"></path>
            </svg>Constructor de Fórmulas Biomecánicas</h3>
        <p class="text-purple-700">Crea fórmulas personalizadas utilizando las variables del calculador biomecánico. Las fórmulas se actualizan automáticamente cuando cambias los valores de entrada.</p>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h3 class="text-xl font-semibold text-gray-900 mb-6">Fórmulas Creadas</h3>
        <div class="space-y-4" id="formulas-interactivas">

            @foreach ($formulas as $formula)
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 formula" 
                    data-formula-id="{{$formula->id}}" 
                    data-formula-expresion="{{$formula->formula_con_variables}}" 
                    data-campo-destino="{{$formula->campo_destino}}"
                    data-campo-destino-alias="{{$formula->campo_destino_alias}}">
                    
                    <input type="hidden" name="formulas_interactivas[]">

                    <div class="flex justify-between items-start mb-3">
                        <div class="flex-1">
                            <h4 class="text-lg font-medium text-gray-900">{{$formula->nombre}}</h4>
                            {{-- Mostramos el alias justo debajo del nombre --}}
                            @if (!empty($formula->campo_destino_alias))
                               <span class="block sm:inline bg-blue-100 text-blue-700 text-xs sm:text-sm font-medium px-2 py-1 rounded mt-2 sm:mt-0">
                                Campo destino: {{$formula->campo_destino_alias}}
                            </span>

                            @endif
                            <p class="text-sm text-gray-600 mt-1">{{$formula->descripcion}}</p>
                        </div>
                        <div class="flex gap-2"><button class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-200 rounded transition-colors" title="Copiar fórmula"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-copy h-4 w-4">
                                    <rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect>
                                    <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path>
                                </svg></button><button class="p-2 text-blue-500 hover:text-blue-700 hover:bg-blue-100 rounded transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pen-line h-4 w-4">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path>
                                </svg></button><button class="p-2 text-red-500 hover:text-red-700 hover:bg-red-100 rounded transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2 h-4 w-4">
                                    <path d="M3 6h18"></path>
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                    <line x1="10" x2="10" y1="11" y2="17"></line>
                                    <line x1="14" x2="14" y1="11" y2="17"></line>
                                </svg></button>
                        </div>
                    </div>

                    <div class="bg-white p-3 rounded border border-gray-200 mb-3">
                        <div class="text-sm text-gray-600 mb-1">Expresión:</div>
                        <code class="text-sm text-gray-800 font-mono">{{$formula->formula_con_variables}}</code>
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-600">Resultado:</div>
                        <div class="text-xl font-bold text-blue-600" id="resultado-{{$formula->id}}">
                            {{-- @php
                            echo eval("return $formula->formula_sin_variables;");
                            @endphp --}}
                        </div>
                    </div>
                </div>
            @endforeach

            
        </div>
    </div>
</div>
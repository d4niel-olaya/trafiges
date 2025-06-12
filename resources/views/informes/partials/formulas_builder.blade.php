<div class="bg-white rounded-lg shadow-lg p-6 border border-gray-200">
    <h3 class="text-lg font-semibold text-gray-900 mb-6">Crear Nueva Fórmula</h3>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="space-y-4">
            <div><label class="block text-sm font-medium text-gray-700 mb-2">Nombre de la Fórmula</label><input type="text" placeholder="Ej: Fórmula del momento" id="fm-nombre" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value=""></div>
              <div><label class="block text-sm font-medium text-gray-700 mb-2">Campo de resultado biomecánico asociado</label>
                <select  class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" id="campo_asociado">
                </select>
            </div>
            <div><label class="block text-sm font-medium text-gray-700 mb-2">Expresión Matemática</label><textarea id="fm-test" placeholder="Ej: mom1 * v1 + mom2 * v2" rows="4" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 font-mono text-sm"></textarea></div>
            <div><label class="block text-sm font-medium text-gray-700 mb-2">Descripción</label><input type="text" id="fm-descripcion" placeholder="Descripción de la fórmula" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value=""></div>
            <div class="flex gap-2"><button id="btnProbar" class="flex items-center gap-2 px-3 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-play h-4 w-4">
                        <polygon points="5 3 19 12 5 21 5 3"></polygon>
                    </svg>Probar</button><button id="btnGuardarFormula" class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-save h-4 w-4">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                        <polyline points="7 3 7 8 15 8"></polyline>
                    </svg>Guardar</button><button class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">Cancelar</button></div>
        </div>
        <div class="space-y-4">
            <div>
                <h4 class="text-sm font-medium text-gray-700 mb-3">Variables Disponibles</h4>
                <div class="grid grid-cols-1 gap-2 max-h-48 overflow-y-auto" id="variables_formulas">
                    {{-- <button class="text-left p-2 bg-blue-50 hover:bg-blue-100 rounded border border-blue-200 transition-colors">
                        <div class="font-mono text-sm text-blue-700">v1</div>
                        <div class="text-xs text-gray-600">Velocidad vehículo bala (km/h)</div>
                        <div class="text-xs text-blue-600">Valor actual: 12.3</div>
                    </button><button class="text-left p-2 bg-blue-50 hover:bg-blue-100 rounded border border-blue-200 transition-colors">
                        <div class="font-mono text-sm text-blue-700">v2</div>
                        <div class="text-xs text-gray-600">Velocidad vehículo diana (km/h)</div>
                        <div class="text-xs text-blue-600">Valor actual: 0</div>
                    </button><button class="text-left p-2 bg-blue-50 hover:bg-blue-100 rounded border border-blue-200 transition-colors">
                        <div class="font-mono text-sm text-blue-700">mom1</div>
                        <div class="text-xs text-gray-600">Masa vehículo bala (kg)</div>
                        <div class="text-xs text-blue-600">Valor actual: 1375</div>
                    </button><button class="text-left p-2 bg-blue-50 hover:bg-blue-100 rounded border border-blue-200 transition-colors">
                        <div class="font-mono text-sm text-blue-700">mom2</div>
                        <div class="text-xs text-gray-600">Masa vehículo diana (kg)</div>
                        <div class="text-xs text-blue-600">Valor actual: 1502</div>
                    </button><button class="text-left p-2 bg-blue-50 hover:bg-blue-100 rounded border border-blue-200 transition-colors">
                        <div class="font-mono text-sm text-blue-700">coefRestitucion</div>
                        <div class="text-xs text-gray-600">Coeficiente de restitución</div>
                        <div class="text-xs text-blue-600">Valor actual: 0.45</div>
                    </button><button class="text-left p-2 bg-blue-50 hover:bg-blue-100 rounded border border-blue-200 transition-colors">
                        <div class="font-mono text-sm text-blue-700">coefRozamientoLibre</div>
                        <div class="text-xs text-gray-600">Coeficiente rozamiento libre</div>
                        <div class="text-xs text-blue-600">Valor actual: 0.015</div>
                    </button><button class="text-left p-2 bg-blue-50 hover:bg-blue-100 rounded border border-blue-200 transition-colors">
                        <div class="font-mono text-sm text-blue-700">coefRozamientoFreno</div>
                        <div class="text-xs text-gray-600">Coeficiente rozamiento freno</div>
                        <div class="text-xs text-blue-600">Valor actual: 0.7</div>
                    </button> --}}
                </div>
            </div>
            <div class="hidden">
                <h4 class="text-sm font-medium text-gray-700 mb-3">Funciones Matemáticas</h4>
                <div class="grid grid-cols-2 gap-2 max-h-32 overflow-y-auto"><button class="text-left p-2 bg-green-50 hover:bg-green-100 rounded border border-green-200 transition-colors">
                        <div class="font-mono text-xs text-green-700">Math.abs()</div>
                    </button><button class="text-left p-2 bg-green-50 hover:bg-green-100 rounded border border-green-200 transition-colors">
                        <div class="font-mono text-xs text-green-700">Math.sqrt()</div>
                    </button><button class="text-left p-2 bg-green-50 hover:bg-green-100 rounded border border-green-200 transition-colors">
                        <div class="font-mono text-xs text-green-700">Math.pow(x, y)</div>
                    </button><button class="text-left p-2 bg-green-50 hover:bg-green-100 rounded border border-green-200 transition-colors">
                        <div class="font-mono text-xs text-green-700">Math.sin()</div>
                    </button><button class="text-left p-2 bg-green-50 hover:bg-green-100 rounded border border-green-200 transition-colors">
                        <div class="font-mono text-xs text-green-700">Math.cos()</div>
                    </button><button class="text-left p-2 bg-green-50 hover:bg-green-100 rounded border border-green-200 transition-colors">
                        <div class="font-mono text-xs text-green-700">Math.tan()</div>
                    </button><button class="text-left p-2 bg-green-50 hover:bg-green-100 rounded border border-green-200 transition-colors">
                        <div class="font-mono text-xs text-green-700">Math.log()</div>
                    </button><button class="text-left p-2 bg-green-50 hover:bg-green-100 rounded border border-green-200 transition-colors">
                        <div class="font-mono text-xs text-green-700">Math.exp()</div>
                    </button><button class="text-left p-2 bg-green-50 hover:bg-green-100 rounded border border-green-200 transition-colors">
                        <div class="font-mono text-xs text-green-700">Math.max()</div>
                    </button><button class="text-left p-2 bg-green-50 hover:bg-green-100 rounded border border-green-200 transition-colors">
                        <div class="font-mono text-xs text-green-700">Math.min()</div>
                    </button></div>
            </div>
        </div>
    </div>
</div>
<div class="space-y-8">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">Calculadora Biomecánica de Impacto</h1>
            <div class="flex gap-3 hidden"><button class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-ccw h-5 w-5">
                        <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path>
                        <path d="M3 3v5h5"></path>
                    </svg>Resetear</button><button class="flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-save h-5 w-5">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                        <polyline points="7 3 7 8 15 8"></polyline>
                    </svg>Guardar</button><button class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download h-5 w-5">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" x2="12" y1="15" y2="3"></line>
                    </svg>Exportar</button></div>
        </div>
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 rounded-lg border border-blue-200">
            <h2 class="text-xl font-semibold text-blue-900 mb-4 flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calculator h-6 w-6">
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
                </svg>Biomecánica de Impacto (Colisiones por Alcance)</h2>
            <p class="text-blue-700">Calculadora especializada para el análisis biomecánico de colisiones vehiculares por alcance. Incluye estudios con y sin desplazamiento postcolisivo.</p>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-6 border-b border-gray-200 pb-3">Datos Necesarios</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div><label class="block text-sm font-medium text-gray-700 mb-2">V1 (Velocidad de vehículo Bala) - Estimada entre 12-16 [km/h]</label>
                    <input type="number" id="fm-v1" step="0.1" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="0"><span class="text-xs text-gray-500">km/h</span>
                </div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">V2 (Velocidad de vehículo Diana) - Habitualmente detenido [km/h]</label>
                    <input type="number" id="fm-v2" step="0.1" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="0"><span class="text-xs text-gray-500">km/h</span></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">MOM 1 (Masa en Orden de Marcha vehículo Bala) [Kg]</label>
                  
                    @if( request()->is('informes/*'))
                        <input type="number" id="fm-mom1" disabled class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed bg-gray-100" value="0" >
                    @else
                        <input type="number" id="fm-mom1"  class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="0" >
                    @endif
                    <span class="text-xs text-gray-500">Kg</span>
                </div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">MOM 2 (Masa en Orden de Marcha vehículo Diana) [Kg]</label>
                    @if( request()->is('informes/*'))
                        <input type="number" id="fm-mom2" disabled class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed bg-gray-100" value="0">
                    @else
                        <input type="number" id="fm-mom2"  class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="0">
                    @endif
                    <span class="text-xs text-gray-500">Kg</span>
                </div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">Coeficiente de Restitución (e = 0,25-0,45; e medio = 0,31)</label>
                    <input type="number" id="fm-coef_restitucion" step="0.01" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="0.">
                </div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">Coeficiente de Rozamiento Libre (μ = 0,015)</label>
                    <input type="number" id="fm-coef_rozamiento" step="0.001" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="0">
                </div>
                <div class="md:col-span-2"><label class="block text-sm font-medium text-gray-700 mb-2">Coeficiente de Rozamiento con Freno (μ = 0,7)</label>
                    <input type="number" id="fm-coef_rozamiento_freno" step="0.1" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="0">
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-6 border-b border-gray-200 pb-3">Resultados Sin Desplazamiento Postcolisivo</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                 <div class="bg-blue-50 p-4 rounded-lg">
                    <label class="block text-sm font-medium text-blue-900 mb-2">DELTA V1 (Vehículo Bala) [km/h]</label>
                    <input type="number" id="fm-deltav1" readonly class="text-2xl font-bold text-blue-700 bg-transparent border-none p-0 focus:ring-0 focus:outline-none w-full" value="0">
                </div>
                 <div class="bg-red-50 p-4 rounded-lg">
                    <label class="block text-sm font-medium text-red-900 mb-2">DELTA V2 (Vehículo Diana) [km/h]</label>
                    <input type="number" readonly  id="fm-deltav2" class="text-2xl font-bold text-red-700 bg-transparent border-none p-0 focus:ring-0 focus:outline-none w-full" value="0">
                </div>
                <div class="bg-orange-50 p-4 rounded-lg">
                   <label class="block text-sm font-medium text-orange-900 mb-2">Aceleración Máxima [m/seg²]</label>
                    <input type="number" readonly  id="fm-aceleracion-maxima" class="text-2xl font-bold text-orange-700 bg-transparent border-none p-0 focus:ring-0 focus:outline-none w-full" value="0">
                </div>
                <div class="bg-purple-50 p-4 rounded-lg">
                    <label for="fm-aceleracion" class="block text-sm font-medium text-purple-900 mb-2">Aceleración Gravitatoria [g's]</label>
                    <input id="fm-aceleracion" type="number" value="0" readonly 
                            class="w-full text-2xl font-bold text-purple-700 bg-transparent border-none p-0 focus:outline-none cursor-default" />
                 </div>

                <div class="bg-green-50 p-4 rounded-lg">
                <label for="fm-fuerza" class="block text-sm font-medium text-green-900 mb-2">Fuerza de Inercia [N]</label>
                <input id="fm-fuerza" type="number" value="0"
                        class="w-full text-2xl font-bold text-green-700 bg-transparent border-none p-0 focus:outline-none cursor-default" />
                </div>

                <div class="bg-indigo-50 p-4 rounded-lg">
                <label for="fm-peso-cabeza" class="block text-sm font-medium text-indigo-900 mb-2">Aumento Peso Cabeza [kg]</label>
                <input id="fm-peso-cabeza" type="number" value="0"
                        class="w-full text-2xl font-bold text-indigo-700 bg-transparent border-none p-0 focus:outline-none cursor-default" />
                </div>

                <div class="bg-pink-50 p-4 rounded-lg md:col-span-2 lg:col-span-3">
                <label for="fm-nic" class="block text-sm font-medium text-pink-900 mb-2">NIC (Criterio de Lesiones en el Cuello)</label>
                <input id="fm-nic" type="number" value="0" readonly 
                        class="w-full text-2xl font-bold text-pink-700 bg-transparent border-none p-0 focus:outline-none cursor-default" />
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-6 border-b border-gray-200 pb-3">Estudios Con Desplazamiento Postcolisivo</h3>
             <div class="mb-8">
                    <h4 class="text-lg font-medium text-gray-800 mb-4 bg-gray-100 p-3 rounded">
                        Resultados Sin Acción del Freno (Rodadura Libre o Embrague Pisado)
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                    <div class="bg-yellow-50 p-4 rounded-lg">
                    <label for="fm-delta-v2" class="block text-sm font-medium text-yellow-900 mb-2">
                        DELTA V2 Desplazamiento con Embrague [km/h]
                    </label>
                    <input id="fm-delta-v2" type="number" value="0" readonly
                            class="w-full text-xl font-bold text-yellow-700 bg-transparent border-none p-0 focus:outline-none cursor-default" />
                    </div>

                    <div class="bg-yellow-50 p-4 rounded-lg">
                    <label for="fm-aceleracion-max" class="block text-sm font-medium text-yellow-900 mb-2">
                        Aceleración Máxima [m/seg²]
                    </label>
                    <input id="fm-aceleracion-max" type="number" value="0" readonly
                            class="w-full text-xl font-bold text-yellow-700 bg-transparent border-none p-0 focus:outline-none cursor-default" />
                    </div>

                    <div class="bg-yellow-50 p-4 rounded-lg">
                    <label for="fm-aceleracion-g" class="block text-sm font-medium text-yellow-900 mb-2">
                        Aceleración Gravitatoria [g's]
                    </label>
                    <input id="fm-aceleracion-g" type="number" value="0" readonly
                            class="w-full text-xl font-bold text-yellow-700 bg-transparent border-none p-0 focus:outline-none cursor-default" />
                    </div>

                    <div class="bg-yellow-50 p-4 rounded-lg">
                    <label for="fm-fuerza-inercia" class="block text-sm font-medium text-yellow-900 mb-2">
                        Fuerza de Inercia [N]
                    </label>
                    <input id="fm-fuerza-inercia" type="number" value="0" readonly
                            class="w-full text-xl font-bold text-yellow-700 bg-transparent border-none p-0 focus:outline-none cursor-default" />
                    </div>

                    <div class="bg-yellow-50 p-4 rounded-lg">
                    <label for="fm-peso-cabeza-aumento" class="block text-sm font-medium text-yellow-900 mb-2">
                        Aumento Peso Cabeza [kg]
                    </label>
                    <input id="fm-peso-cabeza-aumento" type="number" value="0" readonly
                            class="w-full text-xl font-bold text-yellow-700 bg-transparent border-none p-0 focus:outline-none cursor-default" />
                    </div>

                    <div class="bg-yellow-50 p-4 rounded-lg">
                    <label for="fm-nic-sin-freno" class="block text-sm font-medium text-yellow-900 mb-2">
                        NIC (Sin Freno)
                    </label>
                    <input id="fm-nic-sin-freno" type="number" value="0" readonly
                            class="w-full text-xl font-bold text-yellow-700 bg-transparent border-none p-0 focus:outline-none cursor-default" />
                    </div>

                </div>
            </div>

            <div>
                <h4 class="text-lg font-medium text-gray-800 mb-4 bg-gray-100 p-3 rounded">Resultados Con Acción del Freno</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                    <div class="bg-red-50 p-4 rounded-lg">
                        <label for="fm-delta-v2-freno" class="block text-sm font-medium text-red-900 mb-2">
                        DELTA V2 con Freno Activado [km/h]
                        </label>
                        <input id="fm-delta-v2-freno" type="number" value="0" readonly
                            class="w-full text-xl font-bold text-red-700 bg-transparent border-none p-0 focus:outline-none cursor-default" />
                    </div>

                    <div class="bg-red-50 p-4 rounded-lg">
                        <label for="fm-aceleracion-max-freno" class="block text-sm font-medium text-red-900 mb-2">
                        Aceleración Máxima [m/seg²]
                        </label>
                        <input id="fm-aceleracion-max-freno" type="number" value="0" readonly
                            class="w-full text-xl font-bold text-red-700 bg-transparent border-none p-0 focus:outline-none cursor-default" />
                    </div>

                    <div class="bg-red-50 p-4 rounded-lg">
                        <label for="fm-aceleracion-g-freno" class="block text-sm font-medium text-red-900 mb-2">
                        Aceleración Gravitatoria [g's]
                        </label>
                        <input id="fm-aceleracion-g-freno" type="number" value="0" readonly
                            class="w-full text-xl font-bold text-red-700 bg-transparent border-none p-0 focus:outline-none cursor-default" />
                    </div>

                    <div class="bg-red-50 p-4 rounded-lg">
                        <label for="fm-fuerza-inercia-freno" class="block text-sm font-medium text-red-900 mb-2">
                        Fuerza de Inercia [N]
                        </label>
                        <input id="fm-fuerza-inercia-freno" type="number" value="0" readonly
                            class="w-full text-xl font-bold text-red-700 bg-transparent border-none p-0 focus:outline-none cursor-default" />
                    </div>

                    <div class="bg-red-50 p-4 rounded-lg">
                        <label for="fm-peso-cabeza-freno" class="block text-sm font-medium text-red-900 mb-2">
                        Aumento Peso Cabeza [kg]
                        </label>
                        <input id="fm-peso-cabeza-freno" type="number" value="0" readonly
                            class="w-full text-xl font-bold text-red-700 bg-transparent border-none p-0 focus:outline-none cursor-default" />
                    </div>

                    <div class="bg-red-50 p-4 rounded-lg">
                        <label for="fm-nic-freno" class="block text-sm font-medium text-red-900 mb-2">
                        NIC (Con Freno)
                        </label>
                        <input id="fm-nic-freno" type="number" value="0" readonly
                            class="w-full text-xl font-bold text-red-700 bg-transparent border-none p-0 focus:outline-none cursor-default" />
                    </div>

                    </div>

            </div>
        </div>
    </div>
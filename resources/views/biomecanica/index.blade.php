
@extends('layouts.main_layout')

@section('title', 'Gestion Biomecánica')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <button class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors focus:outline-none" onclick="window.location.href='/clientes'">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left mr-2">
                <path d="m12 19-7-7 7-7"></path>
                <path d="M19 12H5"></path>
            </svg>
            Atrás
        </button>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="flex flex-col sm:flex-row items-start justify-between p-6 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-900">Gestion Biomecánica</h2>
        </div>

        <div class="p-6">
            <div class="w-full">
                <div class="border-b border-gray-200 overflow-x-auto">
                    <nav class="flex -mb-px space-x-4 sm:space-x-8" aria-label="Tabs">
                        <button id="tab-formulas-biomecanicas" class="tab-button flex-shrink-0 py-4 px-2 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 active" data-tab="formulas-biomecanicas-content">Formulas de Cálculo</button>
                        <button id="tab-datos-adicionales" class="tab-button flex-shrink-0 py-4 px-2 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="datos-adicionales-content">Realizar calculos</button>
                    </nav>
                </div>

                <div class="py-6 tab-content">
                    <div id="formulas-biomecanicas-content" class="tab-panel">
                        <div class="p-4 sm:p-6 space-y-6" id="parametrosBiomecanicos">
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                <h2 class="text-2xl font-semibold text-gray-900">Fórmulas Biomecánicas</h2>
                                <button class="w-full sm:w-auto flex items-center justify-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="lucide lucide-square-pen h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                        <path d="M18.375 2.625a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4Z"/>
                                    </svg>
                                    Editar Fórmulas
                                </button>
                            </div>
                            
                                @php
                            $json = $formulas[0]->parametros ?? '{}';

                            $parametros = json_decode($json, true);

                            $aceleracionMaxima = $parametros['aceleracionMaxima'] ?? '';
                            $aceleracionGravitatoria = $parametros['aceleracionGravitatoria'] ?? '';
                            $fuerzaInercia = $parametros['fuerzaInercia'] ?? '';
                            $aumentoPesoCabeza = $parametros['aumentoPesoCabeza'] ?? '';

                            $deltaV2ConFreno = $parametros['deltaV2ConFreno'] ?? '';
                            $aceleracionMaximaConFreno = $parametros['aceleracionMaximaConFreno'] ?? '';
                            $aceleracionGravitatoriaConFreno = $parametros['aceleracionGravitatoriaConFreno'] ?? '';
                            $fuerzaInerciaConFreno = $parametros['fuerzaInerciaConFreno'] ?? '';
                            $aumentoPesoCabezaConFreno = $parametros['aumentoPesoCabezaConFreno'] ?? '';
                            $nicConFreno = $parametros['nicConFreno'] ?? '';
                            $distanciaFrenado = $parametros['distanciaFrenado'] ?? '';
                            $tiempoDesaceleracion = $parametros['tiempoDesaceleracion'] ?? '';

                            $deltaV2ConEmbrague = $parametros['deltaV2ConEmbrague'] ?? '';
                            $aceleracionMaximaConDesplazamiento = $parametros['aceleracionMaximaConDesplazamiento'] ?? '';
                            $fuerzaInerciaConDesplazamiento = $parametros['fuerzaInerciaConDesplazamiento'] ?? '';
                            $aumentoPesoCabezaConDesplazamiento = $parametros['aumentoPesoCabezaConDesplazamiento'] ?? '';
                            $nicConDesplazamiento = $parametros['nicConDesplazamiento'] ?? '';
                        @endphp
                            <div class="p-6 space-y-6">
                                <h2 class="text-xl font-semibold text-gray-900">1. Fórmulas Sin Deslizamiento</h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    {{-- ACELERACIÓN MÁXIMA --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            ACELERACIÓN MÁXIMA (Vehículo 2 Diana) [m/seg²]
                                            <span class="block text-xs font-normal text-gray-500">Utiliza deltaV2 para el cálculo</span>
                                        </label>
                                        <input type="text" value="{{$aceleracionMaxima}}" id="aceleracionMaxima" name="aceleracionMaxima" class="mt-1 w-full text-sm rounded-md border-gray-300 shadow-sm bg-gray-50 px-3 py-2">
                                    </div>

                                    {{-- ACELERACIÓN GRAVITATORIA --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            ACELERACIÓN GRAVITATORIA (Vehículo 2 Diana) [g's]
                                            <span class="block text-xs font-normal text-gray-500">Usa aceleracionMaxima y constante gravitacional</span>
                                        </label>
                                        <input type="text" value="{{$aceleracionGravitatoria}}" id="aceleracionGravitatoria" name="aceleracionGravitatoria" class="mt-1 w-full text-sm rounded-md border-gray-300 shadow-sm bg-gray-50 px-3 py-2">
                                    </div>

                                    {{-- FUERZA DE INERCIA --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            FUERZA DE INERCIA (Vehículo Diana) [N]
                                            <span class="block text-xs font-normal text-gray-500">Basada en la aceleración máxima</span>
                                        </label>
                                        <input type="text" value="{{$fuerzaInercia}}" id="fuerzaInercia" name="fuerzaInercia" class="mt-1 w-full text-sm rounded-md border-gray-300 shadow-sm bg-gray-50 px-3 py-2">
                                    </div>

                                    {{-- AUMENTO PESO CABEZA --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            AUMENTO PESO CABEZA OCUPANTES (Vehículo Diana)
                                            <span class="block text-xs font-normal text-gray-500">Relación entre fuerza y peso</span>
                                        </label>
                                        <input type="text" value="{{$aumentoPesoCabeza}}" id="aumentoPesoCabeza" name="aumentoPesoCabeza" class="mt-1 w-full text-sm rounded-md border-gray-300 shadow-sm bg-gray-50 px-3 py-2">
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 space-y-6">
                                <h2 class="text-xl font-semibold text-gray-900">2. Fórmulas Con Deslizamiento (Freno)</h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    {{-- DELTA V2 --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            DELTA V2 CON DESPLAZAMIENTO FRENO ACTIVADO [Km/h]
                                            <span class="block text-xs font-normal text-gray-500">μ = 0.7 — Considera el coeficiente de rozamiento alto</span>
                                        </label>
                                        <input type="text" value="{{$deltaV2ConFreno}}" id="deltaV2ConFreno" name="deltaV2ConFreno" class="mt-1 w-full text-sm rounded-md border-gray-300 shadow-sm bg-gray-50 px-3 py-2">
                                    </div>

                                    {{-- ACELERACIÓN MÁXIMA --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            ACELERACIÓN MÁXIMA (Vehículo Diana) [m/seg²] PISANDO FRENO
                                            <span class="block text-xs font-normal text-gray-500">Basada en deltaV2ConFreno</span>
                                        </label>
                                        <input type="text" value="{{$aceleracionMaximaConFreno}}"   id="aceleracionMaximaConFreno" name="aceleracionMaximaConFreno"  class="mt-1 w-full text-sm rounded-md border-gray-300 shadow-sm bg-gray-50 px-3 py-2">
                                    </div>

                                    {{-- ACELERACIÓN GRAVITATORIA --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            ACELERACIÓN GRAVITATORIA (Vehículo Diana) PISANDO FRENO
                                            <span class="block text-xs font-normal text-gray-500">Relacionada con la aceleración y constante de gravedad</span>
                                        </label>
                                        <input type="text" id="aceleracionGravitatoriaConFreno" name="aceleracionGravitatoriaConFreno" value="{{$aceleracionGravitatoriaConFreno}}" class="mt-1 w-full text-sm rounded-md border-gray-300 shadow-sm bg-gray-50 px-3 py-2">
                                    </div>

                                    {{-- FUERZA DE INERCIA --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            FUERZA DE INERCIA (Vehículo Diana) PISANDO FRENO
                                            <span class="block text-xs font-normal text-gray-500">Fuerza ajustada con freno activado</span>
                                        </label>
                                        <input type="text" value="{{$fuerzaInerciaConFreno}}"  id="fuerzaInerciaConFreno" name="fuerzaInerciaConFreno" class="mt-1 w-full text-sm rounded-md border-gray-300 shadow-sm bg-gray-50 px-3 py-2">
                                    </div>

                                    {{-- AUMENTO PESO CABEZA --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            AUMENTO PESO CABEZA OCUPANTES (Vehículo Diana) PISANDO FRENO
                                            <span class="block text-xs font-normal text-gray-500">Considera la fuerza con freno activo</span>
                                        </label>
                                        <input type="text" value="{{$aumentoPesoCabezaConFreno}}"  id="aumentoPesoCabezaConFreno" name="aumentoPesoCabezaConFreno" class="mt-1 w-full text-sm rounded-md border-gray-300 shadow-sm bg-gray-50 px-3 py-2">
                                    </div>

                                    {{-- NIC --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            NIC (Lesiones en el Cuello ocupantes Vehículo Diana) PISANDO FRENO
                                            <span class="block text-xs font-normal text-gray-500">Índice crítico con freno activado</span>
                                        </label>
                                        <input type="text" value="{{$nicConFreno}}" id="nicConFreno" name="nicConFreno" class="mt-1 w-full text-sm rounded-md border-gray-300 shadow-sm bg-gray-50 px-3 py-2">
                                    </div>

                                    {{-- NUEVO INPUT 1 --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            DISTANCIA DE FRENADO (Vehículo Diana) [m]
                                            <span class="block text-xs font-normal text-gray-500">Cálculo estimado usando fórmula cinemática</span>
                                        </label>
                                        <input type="text" value="{{$distanciaFrenado}}" id="distanciaFrenado" name="distanciaFrenado" class="mt-1 w-full text-sm rounded-md border-gray-300 shadow-sm bg-gray-50 px-3 py-2">
                                    </div>

                                    {{-- NUEVO INPUT 2 --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            TIEMPO DE DESACELERACIÓN [s]
                                            <span class="block text-xs font-normal text-gray-500">Relación entre deltaV2 y aceleración</span>
                                        </label>
                                        <input type="text" value="{{$tiempoDesaceleracion}}" id="tiempoDesaceleracion" name="tiempoDesaceleracion" class="mt-1 w-full text-sm rounded-md border-gray-300 shadow-sm bg-gray-50 px-3 py-2">
                                    </div>
                                </div>
                            </div>


                            <div class="p-6 space-y-6">
                                <h2 class="text-xl font-semibold text-gray-900">3. Fórmulas Con Deslizamiento (Embrague)</h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    {{-- DELTA V2 EMBRAGUE --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            DELTA V2 DESPLAZAMIENTO CON EMBRAGUE [Km/h]; μ = 0,015
                                            <span class="block text-xs font-normal text-gray-500">Considera el coeficiente de rozamiento bajo</span>
                                        </label>
                                        <input type="text" id="deltaV2ConEmbrague" name="deltaV2ConEmbrague" value="{{$deltaV2ConEmbrague}}" class="mt-1 w-full text-sm rounded-md border-gray-300 shadow-sm bg-gray-50 px-3 py-2">
                                    </div>

                                    {{-- ACELERACIÓN MÁXIMA --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            ACELERACIÓN MÁXIMA (Vehículo Diana) [m/seg²] CON DESPLAZAMIENTO
                                            <span class="block text-xs font-normal text-gray-500">Basada en deltaV2ConEmbrague</span>
                                        </label>
                                        <input type="text" id="aceleracionMaximaConDesplazamiento" name="aceleracionMaximaConDesplazamiento"  value="{{$aceleracionMaximaConDesplazamiento}}" class="mt-1 w-full text-sm rounded-md border-gray-300 shadow-sm bg-gray-50 px-3 py-2">
                                    </div>

                                    {{-- FUERZA DE INERCIA --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            FUERZA DE INERCIA (Vehículo Diana)
                                            <span class="block text-xs font-normal text-gray-500">Ajustada al desplazamiento con embrague</span>
                                        </label>
                                        <input type="text" value="{{$fuerzaInerciaConDesplazamiento}}" id="fuerzaInerciaConDesplazamiento" name="fuerzaInerciaConDesplazamiento" class="mt-1 w-full text-sm rounded-md border-gray-300 shadow-sm bg-gray-50 px-3 py-2">
                                    </div>

                                    {{-- AUMENTO PESO CABEZA --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            AUMENTO PESO CABEZA OCUPANTES (Vehículo Diana)
                                            <span class="block text-xs font-normal text-gray-500">Considera el desplazamiento con embrague</span>
                                        </label>
                                        <input type="text" value="{{$aumentoPesoCabezaConDesplazamiento}}"  id="aumentoPesoCabezaConDesplazamiento" name="aumentoPesoCabezaConDesplazamiento" class="mt-1 w-full text-sm rounded-md border-gray-300 shadow-sm bg-gray-50 px-3 py-2">
                                    </div>

                                    {{-- NIC --}}
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-semibold text-gray-800">
                                            NIC (Criterio de Lesiones en el Cuello ocupantes Vehículo Diana) CON DESPLAZAMIENTO
                                            <span class="block text-xs font-normal text-gray-500">Índice crítico con desplazamiento</span>
                                        </label>
                                        <input type="text" value="{{$nicConDesplazamiento}}" id="nicConDesplazamiento" name="nicConDesplazamiento" class="mt-1 w-full text-sm rounded-md border-gray-300 shadow-sm bg-gray-50 px-3 py-2">
                                    </div>
                                </div>
                            </div>

                        
                        </div>
                    </div>

                    <div id="datos-adicionales-content" class="tab-panel hidden">
                        <div class="tab-content">
                            <div class="p-6 space-y-6 border rounded-lg bg-white shadow-sm">
                                <h2 class="text-xl font-semibold text-gray-900">1. Parámetros de Cálculo</h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    {{-- MOM 1 --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            MOM 1 (Masa en Orden de Marcha vehículo Bala) [Kg]
                                        </label>
                                        <input type="number" id="mom1" value="1350" class="mt-1 w-full rounded-md border-gray-300 bg-gray-50 shadow-sm px-3 py-2 text-sm">
                                    </div>

                                    {{-- MOM 2 --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            MOM 2 (Masa en Orden de Marcha vehículo Diana) [Kg]
                                        </label>
                                        <input type="number" id="mom2" value="1450" class="mt-1 w-full rounded-md border-gray-300 bg-gray-50 shadow-sm px-3 py-2 text-sm">
                                    </div>

                                    {{-- V1 --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            V1 (Velocidad de vehículo Bala) Estimada entre 12–16 [km/h]
                                        </label>
                                        <input type="number" id="v1" value="14" class="mt-1 w-full rounded-md border-gray-300 bg-gray-50 shadow-sm px-3 py-2 text-sm">
                                    </div>

                                    {{-- V2 --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            V2 (Velocidad de vehículo Diana) [Km/h] Habitualmente detenido
                                        </label>
                                        <input type="number" id="v2" value="0" class="mt-1 w-full rounded-md border-gray-300 bg-gray-50 shadow-sm px-3 py-2 text-sm">
                                    </div>

                                    {{-- Coeficiente de Restitución --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            Coeficiente de Restitución e = 0,25–0,45; medio Agu = 0,31
                                        </label>
                                        <input type="number" id="coeficiente_restitucion" step="0.01" value="0.31" class="mt-1 w-full rounded-md border-gray-300 bg-gray-50 shadow-sm px-3 py-2 text-sm">
                                    </div>

                                    {{-- Coeficiente de Rozamiento --}}
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800">
                                            COEFICIENTE DE ROZAMIENTO μ = (LIBRE 0,015; FRENO 0,7)
                                        </label>
                                        <input type="number" id="coeficiente_rozamiento" step="0.001" value="0.015" class="mt-1 w-full rounded-md border-gray-300 bg-gray-50 shadow-sm px-3 py-2 text-sm">
                                    </div>
                                </div>

                                <div class="pt-4">
                                    <button id="btnGenerarFormulas" class="w-full md:w-auto flex items-center justify-center gap-2 px-5 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calculator-icon lucide-calculator"><rect width="16" height="20" x="4" y="2" rx="2"/><line x1="8" x2="16" y1="6" y2="6"/><line x1="16" x2="16" y1="14" y2="18"/><path d="M16 10h.01"/><path d="M12 10h.01"/><path d="M8 10h.01"/><path d="M12 14h.01"/><path d="M8 14h.01"/><path d="M12 18h.01"/><path d="M8 18h.01"/></svg>
                                        Calcular Resultados
                                    </button>
                                </div>
                            </div>
                            



                            <div class="p-6 space-y-6 border rounded-lg bg-white shadow-sm">
                                <h2 class="text-xl font-semibold text-gray-900">2. Guardar como Plantilla</h2>

                                <div class="space-y-4">
                                    <div>
                                        <label for="nombrePlantilla" class="block text-sm font-semibold text-gray-800">
                                            Nombre de la Plantilla
                                        </label>
                                        <input 
                                            type="text" 
                                            id="nombrePlantilla" 
                                            placeholder="Ej: Alcance trasero a baja velocidad"
                                            class="mt-1 w-full rounded-md border border-gray-300 bg-gray-50 shadow-sm px-3 py-2 text-sm"
                                        >
                                        <p class="text-xs text-gray-500 mt-1">Asigna un nombre descriptivo a esta configuración de cálculo</p>
                                    </div>

                                    <div>
                                        <label for="descripcionPlantilla" class="block text-sm font-semibold text-gray-800">
                                            Descripción (opcional)
                                        </label>
                                        <textarea 
                                            id="descripcionPlantilla" 
                                            rows="3"
                                            placeholder="Descripción de la plantilla"
                                            class="mt-1 w-full rounded-md border border-gray-300 bg-gray-50 shadow-sm px-3 py-2 text-sm resize-none"
                                        ></textarea>
                                    </div>

                                    <div>
                                        <button 
                                            type="submit" 
                                            class="w-full flex items-center justify-center gap-2 px-5 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16v4H7v-4M12 12V4m0 0l3.5 3.5M12 4L8.5 7.5" />
                                            </svg>
                                            Guardar Plantilla
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 space-y-6 border rounded-lg bg-white shadow-sm mt-4">
                                    <h2 class="text-xl font-semibold text-gray-900">1. Resultados sin Desplazamiento</h2>

                                <div class="space-y-4">
                                    <h3 class="text-md font-semibold text-gray-800">RESULTADOS SIN DESPLAZAMIENTO POSTCOLISIVO</h3>

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-800">Delta-V Vehículo 1</label>
                                            <input type="text" readonly id="calculos-deltav1" class="w-full mt-1 px-3 py-2 text-sm bg-gray-50 border border-gray-300 rounded-md shadow-sm">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-800">Fuerza G Vehículo 1</label>
                                            <input type="text" readonly  id="calculos-fuerzaGV1" class="w-full mt-1 px-3 py-2 text-sm bg-gray-50 border border-gray-300 rounded-md shadow-sm">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-800">Delta-V Vehículo 2</label>
                                            <input type="text" readonly  id="calculos-deltav2" class="w-full mt-1 px-3 py-2 text-sm bg-gray-50 border border-gray-300 rounded-md shadow-sm">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-800">Fuerza G Vehículo 2</label>
                                            <input type="text" readonly  id="calculos-fuerzaGV2" class="w-full mt-1 px-3 py-2 text-sm bg-gray-50 border border-gray-300 rounded-md shadow-sm">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-800">ACELERACIÓN MÁXIMA (Vehículo 2 Diana) [m/seg²]</label>
                                            <input type="text" readonly  id="calculos-aceleracionMaxima"" class="w-full mt-1 px-3 py-2 text-sm bg-gray-50 border border-gray-300 rounded-md shadow-sm">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-800">ACELERACIÓN GRAVITATORIA (Vehículo 2 Diana) [g's]</label>
                                            <input type="text" readonly   id="calculos-aceleracionGravitatoria" class="w-full mt-1 px-3 py-2 text-sm bg-gray-50 border border-gray-300 rounded-md shadow-sm">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-800">FUERZA DE INERCIA (Vehículo Diana) [N]</label>
                                            <input type="text" readonly  id="calculos-fuerzaInercia"  class="w-full mt-1 px-3 py-2 text-sm bg-gray-50 border border-gray-300 rounded-md shadow-sm">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-800">AUMENTO PESO CABEZA OCUPANTES (Vehículo Diana)</label>
                                            <input type="text" readonly  id="calculos-aumentoPesoCabeza" class="w-full mt-1 px-3 py-2 text-sm bg-gray-50 border border-gray-300 rounded-md shadow-sm">
                                        </div>
                                    </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-800">
                                                NIC (Criterio de Lesiones en el Cuello ocupantes Vehículo Diana)
                                            </label>
                                            <input type="text" readonly   id="calculos-nic" class="w-full mt-1 px-3 py-2 text-sm bg-gray-50 border border-gray-300 rounded-md shadow-sm">
                                        </div>
                                </div>
                            </div>


                            <div class="p-6 space-y-6 border rounded-lg bg-white shadow-sm">
                                <h2 class="text-xl font-semibold text-gray-900">2. Resultados con Desplazamiento</h2>

                                <div class="space-y-4">
                                    <h3 class="text-md font-semibold text-gray-800">ESTUDIOS CON DESPLAZAMIENTO POSTCOLISIVO</h3>

                                    {{-- RESULTADOS SIN ACCIÓN DEL FRENO --}}
                                    <div class="space-y-4 border p-4 rounded-lg bg-gray-50">
                                        <h4 class="text-sm font-semibold text-gray-700">RESULTADOS SIN ACCIÓN DEL FRENO (RODADURA LIBRE O EMBRAGUE PISADO)</h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-800">DELTA V2 DESPLAZAMIENTO CON EMBRAGUE [Km/h]; μ = 0,015</label>
                                                <input type="text" readonly value="No calculado" class="w-full mt-1 px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-800">ACELERACIÓN MÁXIMA (Vehículo Diana) [m/seg²] CON DESPLAZAMIENTO</label>
                                                <input type="text" readonly value="No calculado" class="w-full mt-1 px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-800">FUERZA DE INERCIA (Vehículo Diana)</label>
                                                <input type="text" readonly value="No calculado" class="w-full mt-1 px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-800">AUMENTO PESO CABEZA OCUPANTES (Vehículo Diana)</label>
                                                <input type="text" readonly value="No calculado" class="w-full mt-1 px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm">
                                            </div>
                                            <div class="md:col-span-2">
                                                <label class="block text-sm font-medium text-gray-800">NIC (Criterio de Lesiones en el Cuello ocupantes Vehículo Diana) CON DESPLAZAMIENTO</label>
                                                <input type="text" readonly value="No calculado" class="w-full mt-1 px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- RESULTADOS CON ACCIÓN DEL FRENO --}}
                                    <div class="space-y-4 border p-4 rounded-lg bg-gray-50">
                                        <h4 class="text-sm font-semibold text-gray-700">RESULTADOS CON ACCIÓN DEL FRENO</h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-800">DELTA V2 CON DESPLAZAMIENTO FRENO ACTIVADO [Km/h]; μ = 0,7</label>
                                                <input type="text" readonly value="No calculado" class="w-full mt-1 px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-800">ACELERACIÓN MÁXIMA (Vehículo Diana) [m/seg²] PISANDO FRENO</label>
                                                <input type="text" readonly value="No calculado" class="w-full mt-1 px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-800">ACELERACIÓN GRAVITATORIA (Vehículo Diana) PISANDO FRENO</label>
                                                <input type="text" readonly value="No calculado" class="w-full mt-1 px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-800">FUERZA DE INERCIA (Vehículo Diana) PISANDO FRENO</label>
                                                <input type="text" readonly value="No calculado" class="w-full mt-1 px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-800">AUMENTO PESO CABEZA OCUPANTES (Vehículo Diana) PISANDO FRENO</label>
                                                <input type="text" readonly value="No calculado" class="w-full mt-1 px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-800">NIC (Criterio de Lesiones en el Cuello ocupantes Vehículo Diana) PISANDO FRENO</label>
                                                <input type="text" readonly value="No calculado" class="w-full mt-1 px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>






                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-50 px-6 py-4 flex flex-col sm:flex-row justify-end gap-3 border-t border-gray-200">
            <button type="button" class="w-full sm:w-auto py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Cancelar</button>
            <button type="button" id="btnGuardarCambios" class="w-full sm:w-auto py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Guardar Cambios</button>
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
        showTab('formulas-biomecanicas-content');


        
    });
 

</script>


@endsection

@push("scripts")
@vite('resources/js/biomecanica/create.js') 
@endpush
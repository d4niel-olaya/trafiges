
@extends('layouts.main_layout')

@section('title', 'Crear Infomes')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">Vista de Informe</h2>
            <p class="text-sm text-gray-500">Visualización de informes</p>
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
                <h2 class="text-xl font-semibold text-gray-900">Crear Informe</h2>
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
                        <div class="py-6">
                            <div class="tab-content">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
                                    <div class="mb-6"><label for="matricula" class="block text-sm font-medium text-gray-700 mb-2">Matrícula</label>
                                        <div class="relative"><input type="text" id="matricula" name="matricula" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"  ></div>
                                    </div>
                                    <div class="mb-6"><label for="fechaAccidente" class="block text-sm font-medium text-gray-700 mb-2">Fecha del Accidente</label>
                                        <div class="relative"><input type="date" id="fechaAccidente" name="fechaAccidente" class="w-full rounded-md border border-gray-300 py-2 pl-10 pr-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"  >
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-5 w-5 text-gray-400">
                                                    <path d="M8 2v4"></path>
                                                    <path d="M16 2v4"></path>
                                                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                    <path d="M3 10h18"></path>
                                                </svg></div>
                                        </div>
                                    </div>
                                    <div class="mb-6"><label for="nombreCliente" class="block text-sm font-medium text-gray-700 mb-2">Cliente</label>
                                        <div class="relative"><input type="text" id="nombreCliente" name="nombreCliente" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"  ><button class="absolute inset-y-0 right-10 flex items-center pr-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search h-5 w-5 text-gray-400">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <path d="m21 21-4.3-4.3"></path>
                                                </svg></button><button class="absolute inset-y-0 right-0 flex items-center pr-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus h-5 w-5 text-gray-400">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5v14"></path>
                                                </svg></button></div>
                                    </div>
                                    <div class="mb-6"><label for="abogado" class="block text-sm font-medium text-gray-700 mb-2">Abogado Asociado</label>
                                        <div class="relative"><select id="abogado" name="abogado"  class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 appearance-none bg-white">
                                                <option value="Pedro Sánchez">Pedro Sánchez</option>
                                                <option value="María López">María López</option>
                                                <option value="Carlos Ruiz">Carlos Ruiz</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="mb-6"><label for="peritoAsignado" class="block text-sm font-medium text-gray-700 mb-2">Perito Asignado</label>
                                        <div class="relative"><select id="peritoAsignado" name="peritoAsignado"   class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 appearance-none bg-white">
                                                <option value="Laura Fernández">Laura Fernández</option>
                                                <option value="Javier García">Javier García</option>
                                                <option value="Ana Martínez">Ana Martínez</option>
                                            </select>
                                         
                                        </div>
                                    </div>
                                    <div class="mb-6"><label for="tipoInforme" class="block text-sm font-medium text-gray-700 mb-2">Tipo de Informe</label>
                                        <div class="relative"><select id="tipoInforme" name="tipoInforme"   class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 appearance-none bg-white">
                                                <option value="Accidente de tráfico">Accidente de tráfico</option>
                                                <option value="Daños materiales">Daños materiales</option>
                                                <option value="Lesiones personales">Lesiones personales</option>
                                            </select>
                                           
                                        </div>
                                    </div>
                                    <div class="mb-6"><label for="companiaSeguros" class="block text-sm font-medium text-gray-700 mb-2">Compañía de Seguros</label>
                                        <div class="relative"><input type="text" id="companiaSeguros" name="companiaSeguros" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" value="Mutua Madrileña"><button class="absolute inset-y-0 right-10 flex items-center pr-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search h-5 w-5 text-gray-400">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <path d="m21 21-4.3-4.3"></path>
                                                </svg></button><button class="absolute inset-y-0 right-0 flex items-center pr-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus h-5 w-5 text-gray-400">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5v14"></path>
                                                </svg></button></div>
                                    </div>
                                    <div class="mb-6"><label for="coordenadasGeograficas" class="block text-sm font-medium text-gray-700 mb-2">Coordenadas Geográficas</label>
                                        <div class="relative"><input type="text" id="coordenadasGeograficas" name="coordenadasGeograficas"   class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" value="Ej: 40.416775, -3.703790"></div>
                                    </div>
                                    <div class="mb-6"><label for="fechaEntregaAbogado" class="block text-sm font-medium text-gray-700 mb-2">Fecha Entrega Abogado</label>
                                        <div class="relative"><input type="date" id="fechaEntregaAbogado" name="fechaEntregaAbogado"   class="w-full rounded-md border border-gray-300 py-2 pl-10 pr-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" value="21 de abril de 2025">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-5 w-5 text-gray-400">
                                                    <path d="M8 2v4"></path>
                                                    <path d="M16 2v4"></path>
                                                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                    <path d="M3 10h18"></path>
                                                </svg></div>
                                        </div>
                                    </div>
                                    <div class="mb-6"><label for="fechaEntregaCliente" class="block text-sm font-medium text-gray-700 mb-2">Fecha Entrega Cliente</label>
                                        <div class="relative"><input type="date" id="fechaEntregaCliente" name="fechaEntregaCliente"   class="w-full rounded-md border border-gray-300 py-2 pl-10 pr-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" value="28 de abril de 2025">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-5 w-5 text-gray-400">
                                                    <path d="M8 2v4"></path>
                                                    <path d="M16 2v4"></path>
                                                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                    <path d="M3 10h18"></path>
                                                </svg></div>
                                        </div>
                                    </div>
                                    <div class="mb-6"><label for="tipoColision" class="block text-sm font-medium text-gray-700 mb-2">Tipo de Colisión</label>
                                        <div class="relative">
                                            <select id="tipoColision" name="tipoColision" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 appearance-none bg-white">
                                                <option value="Frontal">Frontal</option>
                                                <option value="Lateral izquierdo">Lateral izquierdo</option>
                                                <option value="Lateral derecho">Lateral derecho</option>
                                                <option value="Trasera">Trasera</option>
                                                <option value="Multiple">Multiple</option>
                                            </select>
                                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div id="vehiculos-content" class="tab-panel hidden">
                        <div class="tab-content">
                            <div>
                                <div class="mb-8">
                                    <h3 class="text-lg font-medium text-gray-900 mb-6">Vehículo 1</h3>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                        <div class="mb-6"><label for="matricula-1" class="block text-sm font-medium text-gray-700 mb-2">Matrícula</label>
                                            <div class="relative"><input type="text"   id="matricula-1" name="matricula-1" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" value=""></div>
                                        </div>
                                        <div class="mb-6"><label for="marca-1" class="block text-sm font-medium text-gray-700 mb-2">Marca</label>
                                            <div class="relative"><input type="text"   id="marca-1" name="marca-1" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" value=""></div>
                                        </div>
                                        <div class="mb-6"><label for="modelo-1" class="block text-sm font-medium text-gray-700 mb-2">Modelo</label>
                                            <div class="relative"><input type="text"   id="modelo-1" name="modelo-1" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" value=""></div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                        <div class="mb-6"><label for="color-1" class="block text-sm font-medium text-gray-700 mb-2">Color</label>
                                            <div class="relative">
                                                <input type="text" id="color-1" name="color-1" 
                                                class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                 >
                                            </div>
                                        </div>
                                        <div class="mb-6"><label for="velocidad-1" class="block text-sm font-medium text-gray-700 mb-2">Velocidad (km/h)</label>
                                            <div class="relative"><input type="number" id="velocidad-1"
                                                 name="velocidad-1" 
                                                 class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                                                 
                                                 ></div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                                        <div class="mb-6"><label for="tara-1" class="block text-sm font-medium text-gray-700 mb-2">Tara (kg)</label>
                                            <div class="relative"><input type="number" id="tara-1"
                                                 name="tara-1" 
                                                 class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                                                  ></div>
                                        </div>
                                        <div class="mb-6"><label for="mom-1" class="block text-sm font-medium text-gray-700 mb-2">M.O.M. (kg)</label>
                                            <div class="relative"><input type="number" id="mom-1"
                                                 name="mom-1" 
                                                 class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                  ></div>
                                        </div>
                                        <div class="mb-6"><label for="ocupantes-1" class="block text-sm font-medium text-gray-700 mb-2">Nº Ocupantes</label>
                                            <div class="relative"><input type="number" 
                                                id="ocupantes-1" name="ocupantes-1" 
                                                class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                 ></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-8">
                                    <h3 class="text-lg font-medium text-gray-900 mb-6">Vehículo 2</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                        <div class="mb-6"><label for="matricula-2" class="block text-sm font-medium text-gray-700 mb-2">Matrícula</label>
                                            <div class="relative"><input type="text" id="matricula-2" name="matricula-2"
                                                 class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                  ></div>
                                        </div>
                                        <div class="mb-6"><label for="marca-2" class="block text-sm font-medium text-gray-700 mb-2">Marca</label>
                                            <div class="relative"><input type="text" id="marca-2" name="marca-2"
                                                 class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                                                  ></div>
                                        </div>
                                        <div class="mb-6"><label for="modelo-2" class="block text-sm font-medium text-gray-700 mb-2">Modelo</label>
                                            <div class="relative">
                                                <input type="text" id="modelo-2" 
                                                name="modelo-2" 
                                                class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                 >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                        <div class="mb-6"><label for="color-2" class="block text-sm font-medium text-gray-700 mb-2">Color</label>
                                            <div class="relative"><input type="text"
                                                 id="color-2" name="color-2" 
                                                 class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                  ></div>
                                        </div>
                                        <div class="mb-6"><label for="velocidad-2" class="block text-sm font-medium text-gray-700 mb-2">Velocidad (km/h)</label>
                                            <div class="relative"><input type="number" 
                                                id="velocidad-2" name="velocidad-2" 
                                                class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                 ></div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                                        <div class="mb-6"><label for="tara-2" class="block text-sm font-medium text-gray-700 mb-2">Tara (kg)</label>
                                            <div class="relative"><input type="number" 
                                                id="tara-2" name="tara-2" 
                                                class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                                                 ></div>
                                        </div>
                                        <div class="mb-6"><label for="mom-2" class="block text-sm font-medium text-gray-700 mb-2">M.O.M. (kg)</label>
                                            <div class="relative"><input type="number" id="mom-2" name="mom-2" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                                                  ></div>
                                        </div>
                                        <div class="mb-6"><label for="ocupantes-2" class="block text-sm font-medium text-gray-700 mb-2">Nº Ocupantes</label>
                                            <div class="relative"><input type="number" 
                                                id="ocupantes-2" name="ocupantes-2" 
                                                class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                 ></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Compañía de Seguros</label>
                                        <div class="relative"><input type="text"
                                             placeholder="Seleccionar compañía de seguros" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" value="">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 space-x-1"><button class="p-1 hover:bg-gray-100 rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search h-5 w-5 text-gray-400">
                                                        <circle cx="11" cy="11" r="8"></circle>
                                                        <path d="m21 21-4.3-4.3"></path>
                                                    </svg></button><button class="p-1 hover:bg-gray-100 rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus h-5 w-5 text-gray-400">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg></button></div>
                                        </div>
                                    </div>
                                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Taller</label>
                                        <div class="relative"><input type="text" placeholder="Seleccionar taller" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" value="">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 space-x-1"><button class="p-1 hover:bg-gray-100 rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search h-5 w-5 text-gray-400">
                                                        <circle cx="11" cy="11" r="8"></circle>
                                                        <path d="m21 21-4.3-4.3"></path>
                                                    </svg></button><button class="p-1 hover:bg-gray-100 rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus h-5 w-5 text-gray-400">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg></button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="biomecanica-content" class="tab-panel">
                        <div class="py-6">
                            <div class="tab-content">
                                <div class="space-y-8">
                                    <h2 class="text-xl font-semibold text-gray-900">Resultados Biomecánicos</h2>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="mb-6"><label for="mom1" class="block text-sm font-medium text-gray-700 mb-2">MOM 1 (Masa en Orden de Marcha vehículo Bala) [Kg]</label>
                                            <div class="relative"><input type="number"
                                                 id="mom1" name="mom1"  class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                 ></div>
                                        </div>
                                        <div class="mb-6"><label for="mom2" class="block text-sm font-medium text-gray-700 mb-2">MOM 2 (Masa en Orden de Marcha vehículo Diana) [Kg]</label>
                                            <div class="relative"><input type="number" 
                                                id="mom2" name="mom2"
                                                 class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                  ></div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="mb-6"><label for="v1" class="block text-sm font-medium text-gray-700 mb-2">V1 (Velocidad de vehículo Bala) Estimada entre 12-16 [km/h]</label>
                                            <div class="relative"><input type="number" id="v1" name="v1" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                 ></div>
                                        </div>
                                        <div class="mb-6"><label for="v2" class="block text-sm font-medium text-gray-700 mb-2">V2 (Velocidad de vehículo Diana) [Km/h] Habitualmente detenido</label>
                                            <div class="relative"><input type="number"
                                                 id="v2" name="v2" 
                                                 class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                                                  ></div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="mb-6"><label for="coefRestitucion" class="block text-sm font-medium text-gray-700 mb-2">Coeficiente de Restitución e= 0,25-0,45; e medio Agu= 0,31</label>
                                            <div class="relative"><input type="text" id="coefRestitucion" name="coefRestitucion"
                                                 class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                  ></div>
                                        </div>
                                        <div class="mb-6"><label for="coefRozamiento" class="block text-sm font-medium text-gray-700 mb-2">COEFICIENTE DE ROZAMIENTO μ = (LIBRE 0,015; FRENO 0,7)</label>
                                            <div class="relative"><input type="text" 
                                                id="coefRozamiento" name="coefRozamiento" 
                                                class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                                                 ></div>
                                        </div>
                                    </div>
                               
                                    <div class="bg-gray-50 p-6 rounded-lg">
                                        <h3 class="text-lg font-medium text-gray-900 mb-4">RESULTADOS SIN DESPLAZAMIENTO POSTCOLISIVO</h3>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                            <div class="mb-6"><label for="deltaV1" class="block text-sm font-medium text-gray-700 mb-2">Delta-V Vehículo 1</label>
                                                <div class="relative"><input type="number" id="deltaV1"
                                                    name="deltaV1" 
                                                    class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                                                     ></div>
                                            </div>
                                            <div class="mb-6"><label for="fuerzaG1" class="block text-sm font-medium text-gray-700 mb-2">Fuerza G Vehículo 1</label>
                                                <div class="relative"><input type="number" 
                                                    id="fuerzaG1" 
                                                    name="fuerzaG1" 
                                                    class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                     ></div>
                                            </div>
                                            <div class="mb-6"><label for="deltaV2" class="block text-sm font-medium text-gray-700 mb-2">Delta-V Vehículo 2</label>
                                                <div class="relative"><input type="number" id="deltaV2" 
                                                    name="deltaV2" 
                                                     
                                                    class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"></div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                                            <div class="mb-6"><label for="aceleracionMaxima" class="block text-sm font-medium text-gray-700 mb-2">ACELERACIÓN MÁXIMA (Vehículo 2 Diana) [m/seg2]</label>
                                                <div class="relative"><input type="number"
                                                    id="aceleracionMaxima" name="aceleracionMaxima"
                                                     class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                      ></div>
                                            </div>
                                            <div class="mb-6"><label for="aceleracionGravitatoria" class="block text-sm font-medium text-gray-700 mb-2">ACELERACIÓN GRAVITATORIA (Vehículo 2 Diana) [g's]</label>
                                                <div class="relative"><input type="number" id="aceleracionGravitatoria" name="aceleracionGravitatoria" 
                                                    class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                     ></div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                                            <div class="mb-6"><label for="fuerzaInercia" class="block text-sm font-medium text-gray-700 mb-2">FUERZA DE INERCIA (Vehículo Diana) N</label>
                                                <div class="relative"><input type="text" id="fuerzaInercia" name="fuerzaInercia" 
                                                    class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                     ></div>
                                            </div>
                                            <div class="mb-6"><label for="aumentoPeso" class="block text-sm font-medium text-gray-700 mb-2">AUMENTO PESO CABEZA OCUPANTES (Vehículo Diana)</label>
                                                <div class="relative"><input type="text"
                                                     id="aumentoPesoCabeza" name="aumentoPesoCabeza"
                                                      class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                       ></div>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="mb-6"><label for="nic" class="block text-sm font-medium text-gray-700 mb-2">NIC (Criterio de Lesiones en el Cuello ocupantes Vehículo Diana)</label>
                                                <div class="relative"><input type="text" id="nic" name="nic" 
                                                    class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                                                     ></div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="bg-gray-50 p-6 rounded-lg">
                                        <h3 class="text-lg font-medium text-gray-900 mb-4">ESTUDIOS CON DESPLAZAMIENTO POSTCOLISIVO</h3>
                                        <div class="mb-6">
                                            <h4 class="text-md font-medium text-gray-800 mb-4">RESULTADOS SIN ACCIÓN DEL FRENO (RODADURA LIBRE O EMBRAGUE PISADO)</h4>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                <div class="mb-6"><label for="deltaV2ConEmbrague" class="block text-sm font-medium text-gray-700 mb-2">DELTA V2 DESPLAZAMIENTO CON EMBRAGUE [km/h]; μ = 0,015</label>
                                                    <div class="relative"><input type="text" id="deltaV2ConEmbrague"
                                                         name="deltaV2ConEmbrague"
                                                          class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                           ></div>
                                                </div>
                                                <div class="mb-6"><label for="aceleracionMaximaConDesplazamiento" class="block text-sm font-medium text-gray-700 mb-2">ACELERACIÓN MÁXIMA (Vehículo Diana) [m/seg2] CON DESPLAZAMIENTO</label>
                                                    <div class="relative"><input type="text" id="aceleracionMaximaConDesplazamiento"
                                                         name="aceleracionMaximaConDesplazamiento" 
                                                         class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                          ></div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                                                <div class="mb-6"><label for="fuerzaInerciaConDesplazamiento" class="block text-sm font-medium text-gray-700 mb-2">FUERZA DE INERCIA (Vehículo Diana)</label>
                                                    <div class="relative"><input type="text" id="fuerzaInerciaConDesplazamiento" name="fuerzaInerciaConDesplazamiento"
                                                         class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                                                          ></div>
                                                </div>
                                                <div class="mb-6"><label for="aumentoPesoCabezaConDesplazamiento" class="block text-sm font-medium text-gray-700 mb-2">AUMENTO PESO CABEZA OCUPANTES (Vehículo Diana)</label>
                                                    <div class="relative"><input type="text" id="aumentoPesoCabezaConDesplazamiento" name="aumentoPesoCabezaConDesplazamiento"   class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" value="-4.22"></div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <div class="mb-6"><label for="nicConDesplazamiento" class="block text-sm font-medium text-gray-700 mb-2">NIC (Criterio de Lesiones en el Cuello ocupantes Vehículo Diana) CON DESPLAZAMIENTO</label>
                                                    <div class="relative"><input type="text" id="nicConDesplazamiento" name="nicConDesplazamiento" 
                                                        class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                         ></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <h4 class="text-md font-medium text-gray-800 mb-4">RESULTADOS CON ACCIÓN DEL FRENO</h4>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                <div class="mb-6"><label for="deltaV2ConFreno" class="block text-sm font-medium text-gray-700 mb-2">DELTA V2 CON DESPLAZAMIENTO FRENO ACTIVADO [Km/h]; μ = 0,7</label>
                                                    <div class="relative"><input type="text" id="deltaV2ConFreno"
                                                         name="deltaV2ConFreno" 
                                                         class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                          ></div>
                                                </div>
                                                <div class="mb-6"><label for="aceleracionMaximaConFreno" class="block text-sm font-medium text-gray-700 mb-2">ACELERACIÓN MÁXIMA (Vehículo Diana) [m/seg2] PISANDO FRENO</label>
                                                    <div class="relative"><input type="text" id="aceleracionMaximaConFreno" name="aceleracionMaximaConFreno" 
                                                        class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                         
                                                        ></div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                                                <div class="mb-6"><label for="aceleracionGravitatoriaconFreno" class="block text-sm font-medium text-gray-700 mb-2">ACELERACIÓN GRAVITATORIA (Vehículo Diana) PISANDO Freno</label>
                                                    <div class="relative"><input type="text" 
                                                        id="aceleracionGravitatoriaconFreno" name="aceleracionGravitatoriaconFreno"

                                                         class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                          ></div>
                                                </div>
                                                <div class="mb-6"><label for="fuerzaInerciaconFreno" class="block text-sm font-medium text-gray-700 mb-2">FUERZA DE INERCIA (Vehículo Diana) PISANDO Freno</label>
                                                    <div class="relative"><input type="text" id="fuerzaInerciaconFreno" name="fuerzaInerciaconFreno" 
                                                        class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                                                         ></div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                                                <div class="mb-6"><label for="aumentoPesoconFreno" class="block text-sm font-medium text-gray-700 mb-2">AUMENTO PESO CABEZA OCUPANTES (Vehículo Diana) PISANDO Freno</label>
                                                    <div class="relative"><input type="text" id="aumentoPesoCabezaconFreno" name="aumentoPesoCabezaconFreno" 
                                                        class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                         ></div>
                                                </div>
                                                <div class="mb-6"><label for="nicconFreno" class="block text-sm font-medium text-gray-700 mb-2">NIC (Criterio de Lesiones en el Cuello ocupantes Vehículo Diana) PISANDO Freno</label>
                                                    <div class="relative"><input type="text"
                                                         id="nicconFreno" name="nicconFreno"
                                                          class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500" 
                                                           ></div>
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
@vite('resources/js/informes.js')
@endpush
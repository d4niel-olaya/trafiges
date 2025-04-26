<div class="py-4">
    <div class="tab-content">
        <div class="space-y-2">
            <h2 class="text-xl font-semibold text-gray-900">Información de Ocupantes</h2>
            <div class="w-full">
                <div class="border-b border-gray-200">
                    <nav class="flex overflow-x-auto -mb-px space-x-4 sm:space-x-8" aria-label="Tabs">
                        <button class="py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-sky-500 text-sky-600" aria-current="page">Conductor</button><button class="py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">Copiloto</button>
                        <button class="py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">Detrás Conductor</button><button class="py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">Detrás Copiloto</button>
                        <button class="py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">Detrás Centro</button><button class="py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">Detrás 3</button>
                        <button class="py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">Detrás 4</button></nav>
                </div>
                <div class="py-6">
                    <div class="tab-content">
                        <div class="space-y-8">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Datos Básicos</h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div><label class="block text-sm font-medium text-gray-700">Posición</label><input type="text" readonly="" class="mt-1 block w-full rounded-md border-gray-300 bg-gray-50 shadow-sm" value="Conductor"></div>
                                    <div><label class="block text-sm font-medium text-gray-700">Sexo</label><select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                                            <option value="">Seleccionar</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select></div>
                                    <div><label class="block text-sm font-medium text-gray-700">Edad</label><input type="number" placeholder="Edad" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500" value=""></div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                                    <div><label class="block text-sm font-medium text-gray-700">Peso (kg)</label><input type="number" placeholder="Peso en kg" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500" value=""></div>
                                    <div><label class="block text-sm font-medium text-gray-700">Altura (cm)</label><input type="number" placeholder="Altura en cm" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500" value=""></div>
                                    <div><label class="block text-sm font-medium text-gray-700">Dominancia</label><select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                                            <option value="">Seleccionar</option>
                                            <option value="diestro">Diestro</option>
                                            <option value="zurdo">Zurdo</option>
                                            <option value="ambidiestro">Ambidiestro</option>
                                        </select></div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                                    <div><label class="block text-sm font-medium text-gray-700">Actividad Laboral</label><input type="text" placeholder="Actividad laboral" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500" value=""></div>
                                    <div><label class="block text-sm font-medium text-gray-700">Actividad Deportiva</label><input type="text" placeholder="Actividad deportiva" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500" value=""></div>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Antecedentes</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div><label class="block text-sm font-medium text-gray-700">Accidentes Previos</label><textarea rows="4" placeholder="Descripción de accidentes previos" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea></div>
                                    <div><label class="block text-sm font-medium text-gray-700">Tratamiento Farmacológico Previo</label><textarea rows="4" placeholder="Descripción de tratamientos farmacológicos previos" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea></div>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Posición en momento del accidente</h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div><label class="block text-sm font-medium text-gray-700">Posición General</label><input type="text" placeholder="Posición general" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></div>
                                    <div><label class="block text-sm font-medium text-gray-700">Posición Cuello</label><select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                                            <option value="">Seleccionar</option>
                                        </select></div>
                                    <div><label class="block text-sm font-medium text-gray-700">Mirada</label><select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                                            <option value="">Seleccionar</option>
                                        </select></div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                                    <div><label class="block text-sm font-medium text-gray-700">Mano Derecha</label><input type="text" placeholder="Posición mano derecha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></div>
                                    <div><label class="block text-sm font-medium text-gray-700">Mano Izquierda</label><input type="text" placeholder="Posición mano izquierda" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></div>
                                    <div><label class="block text-sm font-medium text-gray-700">Pie Derecho</label><input type="text" placeholder="Posición pie derecho" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                                    <div><label class="block text-sm font-medium text-gray-700">Pie Izquierdo</label><input type="text" placeholder="Posición pie izquierdo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></div>
                                    <div><label class="block text-sm font-medium text-gray-700">Pierna Derecha</label><input type="text" placeholder="Posición pierna derecha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></div>
                                    <div><label class="block text-sm font-medium text-gray-700">Pierna Izquierda</label><input type="text" placeholder="Posición pierna izquierda" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></div>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Circunstancias</h3>
                                <div class="space-y-4">
                                    <div><label class="block text-sm font-medium text-gray-700">Descripción de Circunstancias</label><textarea rows="4" placeholder="Descripción de las circunstancias" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea></div>
                                    <div class="flex space-x-6"><label class="flex items-center"><input type="checkbox" class="rounded border-gray-300 text-sky-600 shadow-sm focus:border-sky-500 focus:ring-sky-500"><span class="ml-2 text-sm text-gray-700">Vio venir el impacto</span></label><label class="flex items-center"><input type="checkbox" class="rounded border-gray-300 text-sky-600 shadow-sm focus:border-sky-500 focus:ring-sky-500"><span class="ml-2 text-sm text-gray-700">Estaba desprevenido</span></label></div>
                                    <div><label class="block text-sm font-medium text-gray-700">Musculatura</label><select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                                            <option value="">Seleccionar</option>
                                        </select></div>
                                    <div><label class="block text-sm font-medium text-gray-700">Circunstancias del Vehículo (Cliente)</label><textarea rows="4" placeholder="Circunstancias del vehículo 2 (Cliente)" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea></div>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Lesiones y Tratamientos</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div><label class="block text-sm font-medium text-gray-700">Lesiones</label><textarea rows="4" placeholder="Descripción de lesiones" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea></div>
                                    <div><label class="block text-sm font-medium text-gray-700">Zonas Afectadas</label><textarea rows="4" placeholder="Descripción de zonas afectadas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea></div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                                    <div><label class="block text-sm font-medium text-gray-700">Hospital de Urgencias</label><input type="text" placeholder="Hospital de urgencias" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></div>
                                    <div><label class="block text-sm font-medium text-gray-700">Juicio Clínico Urgencias</label><textarea rows="4" placeholder="Juicio clínico de urgencias" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea></div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                                    <div><label class="block text-sm font-medium text-gray-700">Centro RHB</label><input type="text" placeholder="Centro RHB" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></div>
                                    <div><label class="block text-sm font-medium text-gray-700">Juicio Clínico RHB</label><textarea rows="4" placeholder="Juicio clínico RHB" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea></div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                                    <div><label class="block text-sm font-medium text-gray-700">Fecha Inicio RHB</label>
                                        <div class="relative"><input type="text" placeholder="dd/mm/aaaa" class="mt-1 block w-full rounded-md border-gray-300 pl-10 shadow-sm focus:border-sky-500 focus:ring-sky-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar absolute left-3 top-[calc(50%+0.25rem)] -translate-y-1/2 text-gray-400 h-5 w-5">
                                                <path d="M8 2v4"></path>
                                                <path d="M16 2v4"></path>
                                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                <path d="M3 10h18"></path>
                                            </svg></div>
                                    </div>
                                    <div><label class="block text-sm font-medium text-gray-700">Fecha Fin RHB</label>
                                        <div class="relative"><input type="text" placeholder="dd/mm/aaaa" class="mt-1 block w-full rounded-md border-gray-300 pl-10 shadow-sm focus:border-sky-500 focus:ring-sky-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar absolute left-3 top-[calc(50%+0.25rem)] -translate-y-1/2 text-gray-400 h-5 w-5">
                                                <path d="M8 2v4"></path>
                                                <path d="M16 2v4"></path>
                                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                <path d="M3 10h18"></path>
                                            </svg></div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                                    <div><label class="block text-sm font-medium text-gray-700">Número de Sesiones</label><input type="number" placeholder="Número de sesiones" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></div>
                                    <div><label class="block text-sm font-medium text-gray-700">Fecha Alta</label>
                                        <div class="relative"><input type="text" placeholder="dd/mm/aaaa" class="mt-1 block w-full rounded-md border-gray-300 pl-10 shadow-sm focus:border-sky-500 focus:ring-sky-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar absolute left-3 top-[calc(50%+0.25rem)] -translate-y-1/2 text-gray-400 h-5 w-5">
                                                <path d="M8 2v4"></path>
                                                <path d="M16 2v4"></path>
                                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                <path d="M3 10h18"></path>
                                            </svg></div>
                                    </div>
                                </div>
                                <div class="mt-4"><label class="block text-sm font-medium text-gray-700">Secuelas</label><textarea rows="4" placeholder="Descripción de secuelas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
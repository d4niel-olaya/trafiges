@extends('layouts.main_layout')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 flex items-center justify-between">
        <button class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors focus:outline-none" onclick="window.location.href='{{ route('dashboard') }}'">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="lucide lucide-arrow-left mr-2">
                <path d="m12 19-7-7 7-7"></path>
                <path d="M19 12H5"></path>
            </svg>
            Atrás
        </button>
    </div>
        <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="flex items-start justify-between p-6 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-900">Plantillas de documentos</h2>
        </div>
         {{-- ALERTAS --}}
        @if(session('success'))
            <div class="p-4 bg-green-100 border border-green-300 text-green-800 rounded-md">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="p-4 bg-red-100 border border-red-300 text-red-800 rounded-md">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="p-4 bg-red-100 border border-red-300 text-red-800 rounded-md">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- FIN ALERTAS --}}



        <div class="p-6">
            <div class="w-full">
                <div class="border-b border-gray-200">
                    <nav class="flex overflow-x-auto -mb-px space-x-4 sm:space-x-8" aria-label="Tabs">
                        <button id="tab-plantillas-subir" class="tab-button flex-shrink-0 py-4 px-2 sm:px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 active" data-tab="plantillas-subir-content">Subir Plantillas</button>
                        <button id="tab-plantillas" class="tab-button flex-shrink-0 py-4 px-2 sm:px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="plantillas-content">Lista de Plantillas</button>
                        <button id="tab-datos-adicionales" class="tab-button flex-shrink-0 py-4 px-2 sm:px-1 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200 ease-in-out border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="datos-adicionales-content">Asociar Datos a las Plantillas</button>
                    </nav>
                </div>
                <div class="py-6 tab-content">
                    <div id="plantillas-subir-content" class="tab-panel">
                      <div class="py-6">
                            <div class="tab-content">
                                <!-- El formulario envuelve toda la grilla -->
                                 <form id="formSubirPlantilla" enctype="multipart/form-data" action="{{ route('plantillas.store') }}" method="POST">
                                    @csrf("POST")
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
                                    <!-- Titulo -->
                                    <div class="mb-6">
                                    <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">Título</label>
                                    <input type="text" id="titulo" name="titulo" maxlength="100" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                                    </div>

                                    <!-- Descripción -->
                                    <div class="mb-6">
                                    <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
                                    <textarea id="descripcion" name="descripcion" rows="4" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"></textarea>
                                    </div>

                                    <!-- Archivo Word -->
                                    <div class="mb-6 md:col-span-2">
                                    <label for="plantilla" class="block text-sm font-medium text-gray-700 mb-2">Archivo Word (.docx)</label>
                                    <input type="file" id="plantilla" name="plantilla" accept=".docx" class="w-full border border-gray-300 rounded-md py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100">
                                    </div>
                                </div>

                                <!-- Botón para enviar -->
                                <div class="mt-6">
                                    <button type="submit" id="BtnSubirPlantilla" class="bg-sky-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-sky-700 transition-colors">Subir Plantilla</button>
                                </div>
                                </form> 
                            </div>
                            </div>

                    </div>
                    

                     <div id="plantillas-content" class="tab-panel hidden">
                        <div class="tab-content">
                            <div class="overflow-auto">
                                <table class="w-full text-sm text-left" id="tabla-plantillas">
                                    <thead class="bg-gray-100 border-b">
                                        <tr>
                                            <th class="px-4 py-2">Nombre Plantilla</th>
                                            <th class="px-4 py-2">Archivo</th>
                                            <th class="px-4 py-2">Fecha</th>
                                            <th class="px-4 py-2">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($archivos as $archivo)
                                            <tr class="border-b" data-id="{{$archivo->id}}">
                                                
                                                <td class="px-4 py-2">{{ $archivo->titulo }}</td>
                                                <td class="px-4 py-2">{{ $archivo->nombre_archivo}}</td>
                                                <td class="px-4 py-2">{{ $archivo->created_at }}</td>
                                                
                                                <td class="px-4 py-2">
                                                    <a href="{{ route('plantillas.descargar', $archivo->nombre_archivo ?? 'plantilla1.docx') }}" class="text-blue-600 hover:underline">Descargar</a>
                                                    <br/>
                                                    <button class="text-red-600 hover:underline EliminarPlantilla">Eliminar</button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-gray-500 py-4">No hay plantillas</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div id="datos-adicionales-content" class="tab-panel hidden"> 
                    <div class="tab-content">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
                            <p>Para asociar datos a las plantillas debes escribir en el documento de Word las siguientes palabras clave (respetando las llaves y el formato):</p>
                            <br><br/>
                            <ul class="list-disc pl-5">
                            <!-- INFORME -->
                            <li>${numero_informe} → Número del informe</li>
                            <li>${matricula} → Matrícula del vehículo principal</li>
                            <li>${fechaAccidente} → Fecha del accidente</li>
                            <li>${tipoColision} → Tipo de colisión</li>
                            <li>${marcaVehiculo} → Marca del vehículo principal</li>
                            <li>${modeloVehiculo} → Modelo del vehículo principal</li>
                            <li>${anioVehiculo} → Año del vehículo principal</li>
                            <li>${coordenadasGeograficas} → Coordenadas del accidente</li>
                            <li>${fechaEntregaAbogado} → Fecha de entrega al abogado</li>
                            <li>${fechaEntregaCliente} → Fecha de entrega al cliente</li>
                            <li>${estado} → Estado del informe</li>
                            <li>${meteorologia} → Condiciones meteorológicas</li>
                            <li>${estado_via} → Estado de la vía</li>
                            <li>${estado_via_otros} → Otros estados de la vía</li>
                            <li>${inclinacion_via} → Inclinación de la vía</li>
                            <li>${nombre_testigo} → Nombre del testigo</li>
                            <li>${apellido_testigo} → Apellido del testigo</li>

                            <!-- CLIENTE -->
                            <li>${cliente_nombre} → Nombre del cliente</li>
                            <li>${cliente_apellidos} → Apellidos del cliente</li>
                            <li>${cliente_dni} → DNI del cliente</li>
                            <li>${cliente_telefono} → Teléfono del cliente</li>
                            <li>${cliente_email} → Email del cliente</li>
                            <li>${cliente_direccion} → Dirección del cliente</li>
                            <li>${cliente_fecha_nacimiento} → Fecha de nacimiento del cliente</li>
                            <li>${cliente_poblacion} → Población del cliente</li>
                            <li>${cliente_provincia} → Provincia del cliente</li>
                            <li>${cliente_estatura} → Estatura del cliente</li>
                            <li>${cliente_peso} → Peso del cliente</li>

                            <!-- ABOGADO -->
                            <li>${abogado_nombre} → Nombre del abogado</li>
                            <li>${abogado_apellidos} → Apellidos del abogado</li>
                            <li>${abogado_telefono} → Teléfono del abogado</li>
                            <li>${abogado_email} → Email del abogado</li>
                            <li>${abogado_despacho} → Despacho del abogado</li>
                            <li>${abogado_direccion} → Dirección del abogado</li>
                            <li>${abogado_poblacion} → Población del abogado</li>
                            <li>${abogado_provincia} → Provincia del abogado</li>

                            <!-- PERITO -->
                            <li>${perito_nombre} → Nombre del perito</li>
                            <li>${perito_apellidos} → Apellidos del perito</li>
                            <li>${perito_telefono} → Teléfono del perito</li>
                            <li>${perito_email} → Email del perito</li>
                            <li>${perito_especialidad} → Especialidad del perito</li>
                            <li>${perito_poblacion} → Población del perito</li>
                            <li>${perito_provincia} → Provincia del perito</li>

                            <!-- COMPAÑÍA DE SEGUROS -->
                            <li>${compania_nombre} → Nombre de la compañía de seguros</li>
                            <li>${compania_contacto} → Nombre del contacto</li>
                            <li>${compania_telefono} → Teléfono</li>
                            <li>${compania_email} → Email</li>
                            <li>${compania_direccion} → Dirección</li>

                            <!-- REFERIDO -->
                            <li>${referido_nombre} → Nombre del referido</li>
                            <li>${referido_apellidos} → Apellidos del referido</li>
                            <li>${referido_empresa} → Empresa del referido</li>
                            <li>${referido_telefono} → Teléfono del referido</li>
                            <li>${referido_email} → Email del referido</li>
                            <li>${referido_direccion} → Dirección del referido</li>

                            <!-- RESULTADOS BIOMECÁNICOS -->
                            <li>${velocidad_v1} → Velocidad del vehículo 1</li>
                            <li>${velocidad_v2} → Velocidad del vehículo 2</li>
                            <li>${delta_v1} → Delta V del vehículo 1</li>
                            <li>${delta_v2} → Delta V del vehículo 2</li>
                            <li>${aceleracion_maxima} → Aceleración máxima</li>
                            <li>${aceleracion_gravitatoria} → Aceleración gravitatoria</li>
                            <li>${fuerza_inercia} → Fuerza de inercia</li>
                            <li>${aumento_peso_cabeza} → Aumento del peso de la cabeza</li>
                            <li>${nic} → NIC (criterio de lesión cervical)</li>

                            <!-- OCUPANTES -->
                            <li>${conductor_nombre} → Nombre del conductor</li>
                            <li>${conductor_apellidos} → Apellidos del conductor</li>
                            <li>${conductor_dni} → DNI del conductor</li>

                            <li>${copiloto_nombre} → Nombre del copiloto</li>
                            <li>${copiloto_apellidos} → Apellidos del copiloto</li>
                            <li>${copiloto_dni} → DNI del copiloto</li>

                            <li>${detras_copiloto_nombre} → Nombre del ocupante detrás del copiloto</li>
                            <li>${detras_copiloto_apellidos} → Apellidos del ocupante detrás del copiloto</li>
                            <li>${detras_copiloto_dni} → DNI del ocupante detrás del copiloto</li>

                            <li>${detras_conductor_nombre} → Nombre del ocupante detrás del conductor</li>
                            <li>${detras_conductor_apellidos} → Apellidos del ocupante detrás del conductor</li>
                            <li>${detras_conductor_dni} → DNI del ocupante detrás del conductor</li>

                            <li>${detras_centro_nombre} → Nombre del ocupante en el centro trasero</li>
                            <li>${detras_centro_apellidos} → Apellidos del ocupante en el centro trasero</li>
                            <li>${detras_centro_dni} → DNI del ocupante en el centro trasero</li>

                            <li>${detras_3_nombre} → Nombre del ocupante detrás 3</li>
                            <li>${detras_3_apellidos} → Apellidos del ocupante detrás 3</li>
                            <li>${detras_3_dni} → DNI del ocupante detrás 3</li>

                            <li>${detras_4_nombre} → Nombre del ocupante detrás 4</li>
                            <li>${detras_4_apellidos} → Apellidos del ocupante detrás 4</li>
                            <li>${detras_4_dni} → DNI del ocupante detrás 4</li>

                            <!-- VEHÍCULOS -->
                            <li>${marca_vh1} → Marca del vehículo 1</li>
                            <li>${modelo_vh1} → Modelo del vehículo 1</li>
                            <li>${color_vh1} → Color del vehículo 1</li>
                            <li>${tara_vh1} → Tara del vehículo 1</li>
                            <li>${velocidad_vh1} → Velocidad del vehículo 1</li>
                            <li>${peso_ocupantes_vh1} → Peso ocupantes del vehículo 1</li>

                            <li>${marca_vh2} → Marca del vehículo 2</li>
                            <li>${modelo_vh2} → Modelo del vehículo 2</li>
                            <li>${color_vh2} → Color del vehículo 2</li>
                            <li>${tara_vh2} → Tara del vehículo 2</li>
                            <li>${velocidad_vh2} → Velocidad del vehículo 2</li>
                            <li>${peso_ocupantes_vh2} → Peso ocupantes del vehículo 2</li>
                        </ul>
                    </div>
                </div>
            </div>

                </div>
            </div>
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
        showTab('plantillas-subir-content');


       


        
    });

 

</script>
@endsection
@push("scripts")
@vite('resources/js/plantillas/eliminar.js')
{{-- @vite('resources/js/plantillas/upload.js') --}}
@endpush
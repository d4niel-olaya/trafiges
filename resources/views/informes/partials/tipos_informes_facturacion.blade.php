<!-- partials/_asociar_informes_tabla_responsive.blade.php -->
<div id="informes-container" class="mb-6">
    <label class="block text-sm font-medium text-gray-700 mb-2">Agregar Tipos de Informe</label>
    
    <div class="flex flex-col md:flex-row md:space-x-2 mb-4">
        <select id="tipo-informe-selector" class="flex-1 mb-2 md:mb-0 rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            <option value="">Seleccione un tipo de informe</option>
            @foreach($tiposInformes as $informe)
                <option value="{{ $informe->id }}" data-nombre="{{ $informe->nombre }}" data-precio="{{ $informe->precio }}">
                    {{ $informe->nombre }} - ${{ $informe->precio }}
                </option>
            @endforeach
        </select>
        <button type="button" id="btnAgregarInforme" class="bg-sky-500 text-white px-3 py-2 rounded-md hover:bg-sky-600">Agregar</button>
    </div>
    
    <!-- Contenedor con overflow para tabla en pantallas pequeñas -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-md text-sm">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="py-2 px-4 text-left whitespace-nowrap">Nombre</th>
                    <th class="py-2 px-4 text-left whitespace-nowrap">Precio</th>
                    <th class="py-2 px-4 text-center whitespace-nowrap">Acciones</th>
                </tr>
            </thead>
            <tbody id="tabla-informes-body">
                @if(isset($tipos_informes_asociados))
                 @foreach($tipos_informes_asociados as $tipo_informe)
                    <tr class="border-b border-gray-200">
                        <td class="py-2 px-4">{{ $tipo_informe->nombre }}</td>
                        <td class="py-2 px-4">${{ $tipo_informe->precio }}</td>
                        <td class="py-2 px-4 text-center">
                            <button type="button" class="btnEliminarInforme bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600" data-id="{{ $tipo_informe->id }}">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                @endif
                <!-- Aquí se agregarán dinámicamente las filas -->
            </tbody>
        </table>
    </div>
    
    <input type="hidden" name="informesSeleccionados" id="informesSeleccionados" value="">
</div>


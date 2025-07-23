<div>
    <div class="mb-6">
        <h4 class="text-medium font-bold text-gray-900">Datos Relativos a la Vía</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
        <div class="mb-6"><label for="meteorologia" class="block text-sm font-medium text-gray-700 mb-2">Meteorología</label>
            <div class="relative"><select id="meteorologia" name="meteorologia" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 appearance-none bg-white">
                    <option value="" @selected(old('meteorologia', $meteorologia) == '' )>Seleccione</option>
                    <option value="SOLEADO" @selected(old('meteorologia', $meteorologia) == 'SOLEADO')>Soleado</option>
                    <option value="NUBLADO" @selected(old('meteorologia', $meteorologia) == 'NUBLADO')>Nublado</option>
                    <option value="LLUVIA" @selected(old('meteorologia', $meteorologia) == 'LLUVIA')>Lluvia</option>
                    <option value="NIEVE" @selected(old('meteorologia', $meteorologia) == 'NIEVE')>Nieve</option>
                    <option value="NIEBLA" @selected(old('meteorologia', $meteorologia) == 'NIEBLA')>Niebla</option>
                </select>
            </div>
        </div>
        <div class="mb-6"><label for="estado_via" class="block text-sm font-medium text-gray-700 mb-2">Estado de la via</label>
            <div class="relative"><select id="estado_via" name="estado_via" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 appearance-none bg-white">
                    <option value="" @selected(old('estado_via', $estado_via) == '' )>Seleccione</option>
                    <option value="SECA" @selected(old('estado_via', $estado_via) == 'SECA')>Seca</option>
                    <option value="MOJADA" @selected(old('estado_via', $estado_via) == 'MOJADA')>Mojada</option>
                    <option value="OTROS" @selected(old('estado_via', $estado_via) == 'OTROS')>Otros</option>
                </select>
            </div>
        </div>
        <div class="mb-6 hidden" id="estado_via_otros_wrapper"><label for="estado_via_otros" class="block text-sm font-medium text-gray-700 mb-2">Estado de la via</label>
            <div class="relative">
                <input id="estado_via_otros" value="{{$estado_via_otros ?? '' }}" name="estado_via_otros" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 appearance-none bg-white"/>
            </div>
        </div>
         <div class="mb-6"><label for="inclinacion_via" class="block text-sm font-medium text-gray-700 mb-2">Inclinación de la via</label>
            <div class="relative"><select id="inclinacion_via" name="inclinacion_via" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 appearance-none bg-white">
                    <option value="" @selected(old('inclinacion_via', $inclinacion_via) == '' )>Seleccione</option>
                    <option value="EN LLANO" @selected(old('inclinacion_via', $inclinacion_via) == 'EN LLANO')>En llano</option>
                    <option value="ASCENDENTE" @selected(old('inclinacion_via', $inclinacion_via) == 'ASCENDENTE')>Ascendente</option>
                    <option value="DESCENDENTE" @selected(old('inclinacion_via', $inclinacion_via) == 'DESCENDENTE')>Descendente</option>
                </select>
            </div>
        </div>

         <div class="mb-6"><label for="nombre_testigo" class="block text-sm font-medium text-gray-700 mb-2">Nombre del testigo</label>
            <div class="relative">
                <input id="nombre_testigo" value="{{$nombre_testigo ?? '' }}" name="nombre_testigo" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 appearance-none bg-white"/>
            </div>
        </div>
         <div class="mb-6"><label for="apellido_testigo" class="block text-sm font-medium text-gray-700 mb-2">Apellido del testigo</label>
            <div class="relative">
                <input id="apellido_testigo" value="{{$apellido_testigo ?? '' }}" name="apellido_testigo" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 appearance-none bg-white"/>
            </div>
        </div>
        <div class="mb-6"><label for="direccion" class="block text-sm font-medium text-gray-700 mb-2">Direccion</label>
            <div class="relative">
                <input id="direccion" value="{{$direccion ?? '' }}" name="direccion" maxlength="100"  class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 appearance-none bg-white"/>
            </div>
        </div>
        <div class="mb-6"><label for="poblacion" class="block text-sm font-medium text-gray-700 mb-2">Población</label>
            <div class="relative">
                <input id="poblacion" value="{{$poblacion ?? '' }}" name="poblacion"  maxlength="100"  class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 appearance-none bg-white"/>
            </div>
        </div>
        <div class="mb-6"><label for="cp" class="block text-sm font-medium text-gray-700 mb-2">C.P</label>
            <div class="relative">
                <input id="cp" value="{{$cp ?? '' }}" name="cp" maxlength="100" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 appearance-none bg-white"/>
            </div>
        </div>
        <div class="mb-6"><label for="ciudad" class="block text-sm font-medium text-gray-700 mb-2">Ciudad</label>
            <div class="relative">
                <input id="ciudad" value="{{$ciudad ?? '' }}" name="ciudad"  maxlength="100" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 appearance-none bg-white"/>
            </div>
        </div>
        

    </div>
</div>
@props(['ocupante'=> '', 'tipo' => 'conductor'])
<div class="mb-8 py-4">
        <div class="space-y-8" id="{{$tipo}}-formulario">
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Datos Básicos - {{$ocupante}}</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="posicion">Posición</label>
                        <input type="text" readonly name="{{$tipo}}_posicion" class="mt-1 block w-full rounded-md border-gray-300 bg-gray-50 shadow-sm" value="Conductor">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="sexo">Sexo</label>
                        <select  name="{{$tipo}}_sexo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                            <option value="">Seleccionar</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="edad">Edad</label>
                        <input type="number"  name="{{$tipo}}_edad" placeholder="Edad" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500" value="">
                    </div>
                </div>
            
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="peso">Peso (kg)</label>
                        <input type="number" name="{{$tipo}}_peso" placeholder="Peso en kg" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500" value="">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="altura">Altura (cm)</label>
                        <input type="number"  name="{{$tipo}}_altura" placeholder="Altura en cm" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500" value="">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="dominancia">Dominancia</label>
                        <select  name="{{$tipo}}_dominancia" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                            <option value="">Seleccionar</option>
                            <option value="diestro">Diestro</option>
                            <option value="zurdo">Zurdo</option>
                            <option value="ambidiestro">Ambidiestro</option>
                        </select>
                    </div>
                </div>
            
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="actividad_laboral">Actividad Laboral</label>
                        <input type="text"  name="{{$tipo}}_actividad_laboral" placeholder="Actividad laboral" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500" value="">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="actividad_deportiva">Actividad Deportiva</label>
                        <input type="text"  name="{{$tipo}}_actividad_deportiva" placeholder="Actividad deportiva" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500" value="">
                    </div>
                </div>
            </div>
            
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Antecedentes</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="accidentes_previos">Accidentes Previos</label>
                        <textarea  name="{{$tipo}}_accidentes_previos" rows="4" placeholder="Descripción de accidentes previos" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="tratamiento_farmacologico">Tratamiento Farmacológico Previo</label>
                        <textarea  name="{{$tipo}}_tratamiento_farmacologico" rows="4" placeholder="Descripción de tratamientos farmacológicos previos" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea>
                    </div>
                </div>
            </div>
            
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Posición en momento del accidente</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="posicion_general">Posición General</label>
                        <input type="text"  name="{{$tipo}}_posicion_general" placeholder="Posición general" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="posicion_cuello">Posición Cuello</label>
                        <select  name="{{$tipo}}_posicion_cuello" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                            <option value="">Seleccionar</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="mirada">Mirada</label>
                        <select name="{{$tipo}}_mirada" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                            <option value="">Seleccionar</option>
                        </select>
                    </div>
                </div>
            
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="mano_derecha">Mano Derecha</label>
                        <input type="text"  name="{{$tipo}}_mano_derecha" placeholder="Posición mano derecha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="mano_izquierda">Mano Izquierda</label>
                        <input type="text" name="{{$tipo}}_mano_izquierda" placeholder="Posición mano izquierda" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="pie_derecho">Pie Derecho</label>
                        <input type="text" name="{{$tipo}}_pie_derecho" placeholder="Posición pie derecho" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                    </div>
                </div>
            
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="pie_izquierdo">Pie Izquierdo</label>
                        <input type="text"  name="{{$tipo}}_pie_izquierdo" placeholder="Posición pie izquierdo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="pierna_derecha">Pierna Derecha</label>
                        <input type="text"  name="{{$tipo}}_pierna_derecha" placeholder="Posición pierna derecha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="pierna_izquierda">Pierna Izquierda</label>
                        <input type="text"  name="{{$tipo}}_pierna_izquierda" placeholder="Posición pierna izquierda" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                    </div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Circunstancias</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="descripcion_circunstancias">Descripción de Circunstancias</label>
                        <textarea name="{{$tipo}}_descripcion_circunstancias" rows="4" placeholder="Descripción de las circunstancias" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea>
                    </div>
                    <div class="flex space-x-6">
                        <label class="flex items-center">
                            <input type="checkbox"  name="{{$tipo}}_vio_impacto" class="rounded border-gray-300 text-sky-600 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                            <span class="ml-2 text-sm text-gray-700">Vio venir el impacto</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox"  name="{{$tipo}}_desprevenido" class="rounded border-gray-300 text-sky-600 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                            <span class="ml-2 text-sm text-gray-700">Estaba desprevenido</span>
                        </label>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="musculatura">Musculatura</label>
                        <select name="{{$tipo}}_musculatura" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                            <option value="">Seleccionar</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="circunstancias_vehiculo">Circunstancias del Vehículo (Cliente)</label>
                        <textarea name="{{$tipo}}_circunstancias_vehiculo" rows="4" placeholder="Circunstancias del vehículo 2 (Cliente)" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea>
                    </div>
                </div>
            </div>
            
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Lesiones y Tratamientos</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="lesiones">Lesiones</label>
                        <textarea  name="{{$tipo}}_lesiones" rows="4" placeholder="Descripción de lesiones" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="zonas_afectadas">Zonas Afectadas</label>
                        <textarea  name="{{$tipo}}_zonas_afectadas" rows="4" placeholder="Descripción de zonas afectadas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea>
                    </div>
                </div>
            
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="hospital_urgencias">Hospital de Urgencias</label>
                        <input  name="{{$tipo}}_hospital_urgencias" type="text" placeholder="Hospital de urgencias" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="juicio_urgencias">Juicio Clínico Urgencias</label>
                        <textarea  name="{{$tipo}}_juicio_urgencias" rows="4" placeholder="Juicio clínico de urgencias" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea>
                    </div>
                </div>
            
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="centro_rhb">Centro RHB</label>
                        <input  name="{{$tipo}}_centro_rhb" type="text" placeholder="Centro RHB" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="juicio_rhb">Juicio Clínico RHB</label>
                        <textarea  name="{{$tipo}}_juicio_rhb" rows="4" placeholder="Juicio clínico RHB" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea>
                    </div>
                </div>
            
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="fecha_inicio_rhb">Fecha Inicio RHB</label>
                        <div class="relative">
                            <input  name="{{$tipo}}_fecha_inicio_rhb" type="date" placeholder="dd/mm/aaaa" class="mt-1 block w-full rounded-md border-gray-300 pl-10 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                            <!-- ícono calendario -->
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="fecha_fin_rhb">Fecha Fin RHB</label>
                        <div class="relative">
                            <input name="{{$tipo}}_fecha_fin_rhb" type="date" placeholder="dd/mm/aaaa" class="mt-1 block w-full rounded-md border-gray-300 pl-10 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                            <!-- ícono calendario -->
                        </div>
                    </div>
                </div>
            
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="numero_sesiones">Número de Sesiones</label>
                        <input name="{{$tipo}}_numero_sesiones" type="number" placeholder="Número de sesiones" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="fecha_alta">Fecha Alta</label>
                        <div class="relative">
                            <input name="{{$tipo}}_fecha_alta" type="date" placeholder="dd/mm/aaaa" class="mt-1 block w-full rounded-md border-gray-300 pl-10 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                          
                        </div>
                    </div>
                </div>
                <div class="mt-4"><label class="block text-sm font-medium text-gray-700">Secuelas</label>
                    <textarea rows="4" placeholder="Descripción de secuelas"  name="{{$tipo}}_secuelas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea></div>
            </div>
        </div>
</div>  

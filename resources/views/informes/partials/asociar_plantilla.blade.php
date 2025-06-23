<div class="space-y-8">
    <div class="mb-6">
        <h4 class="text-medium font-bold text-gray-900">Asociar una plantilla para exportar el documento de word</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
        <div class="mb-6"><label for="plantilla_asociada" class="block text-sm font-medium text-gray-700 mb-2">Plantillas</label>
            <div class="relative">
                <select id="plantilla_asociada" name="plantilla_asociada" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 appearance-none bg-white">
                    @if(count($plantillas) > 0)
                        <option value="">Seleccione</option>
                        @foreach($plantillas as $plantilla)

                        <option value="{{ $plantilla->id }}" {{ $plantilla->id == $informe[0]->id_plantilla ? 'selected' : '' }}>
                            {{ $plantilla->titulo }}
                        </option>
                        @endforeach
                    @else
                    <option value="">No hay plantillas asociadas</option>
                    @endif
                </select>
            </div>
        </div>
</div>
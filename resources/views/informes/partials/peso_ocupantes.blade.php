<div x-data="{
        ocupantes: [],
        agregarOcupante() {
            this.ocupantes.push({ peso: 0 });
        },
        eliminarOcupante(index) {
            this.ocupantes.splice(index, 1);
        }
    }"
    x-init="
        let pesosInput = document.getElementById('pesos-ocupantes-vh1');
        try {
            ocupantes = JSON.parse(pesosInput.value || '[{peso: 0}]');
        } catch (error) {
            ocupantes = [];
        }
    "
     x-effect="
    // Asigna la longitud de ocupantes a un input externo con id 'numOcupantesInput'
    document.getElementById('ocupantes-1').value = ocupantes.length || 0;
    document.getElementById('pesos-ocupantes-vh1').value = JSON.stringify(ocupantes) || '[{peso: 0}]';
">
    <div class="border border-gray-300 rounded-md shadow-sm">
        <input type="hidden" id="pesos-ocupantes-vh1" value="{{$pesoOcupantes}}"   />
        <button type="button" @click="$refs.contenido.classList.toggle('hidden')" class="w-full flex justify-between items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-t-md">
            <span class="font-semibold text-gray-700">Peso ocupantes Vehículo 1</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transform transition-transform duration-300" :class="{ 'rotate-180': !$refs.contenido.classList.contains('hidden') }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <div x-ref="contenido" class="hidden px-4 py-2">
            <table class="min-w-full divide-y divide-gray-200 border rounded-md mt-2">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Peso (kg)</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(ocupante, index) in ocupantes" :key="index">
                        <tr class="bg-white border-b">
                            <td class="px-4 py-2 text-sm text-gray-700" x-text="index + 1"></td>
                            <td class="px-4 py-2">
                                <input type="number" :name="'peso_ocupantes[' + index + ']'" x-model="ocupante.peso" class="w-full border rounded-md p-1 text-sm" placeholder="Peso ocupante" />
                            </td>
                            <td class="px-4 py-2 text-right">
                                <button type="button" @click="eliminarOcupante(index)" class="text-red-500 hover:text-red-700 text-sm">✕</button>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
            <div class="mt-2 flex justify-end">
                <button type="button" @click="agregarOcupante()" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 text-sm">
                    Agregar Ocupante
                </button>
            </div>
        </div>
    </div>
</div>

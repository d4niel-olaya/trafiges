{{-- Formulario de Registro de Pago --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
    <div class="mb-6">
        <label for="importe" class="block text-sm font-medium text-gray-700 mb-2">Importe (€)</label>
        <input type="number" step="0.01" id="importe" name="importe"
            class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm
                    focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
            placeholder="0.00">
    </div>

    <div class="mb-6">
        <label for="metodo_pago" class="block text-sm font-medium text-gray-700 mb-2">Método de Pago</label>
        <input type="text" id="metodo_pago" name="metodo_pago"
            class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm
                    focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
            placeholder="Transferencia, Efectivo, etc.">
    </div>

    <div class="mb-6">
        <label for="referencia" class="block text-sm font-medium text-gray-700 mb-2">Referencia (opcional)</label>
        <input type="text" id="referencia" name="referencia"
            class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm
                    focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
            placeholder="Referencia">
    </div>

    <div class="mb-6 md:col-span-2">
        <label for="concepto" class="block text-sm font-medium text-gray-700 mb-2">Concepto</label>
        <input type="text" id="concepto" name="concepto"
            class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm
                    focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
            placeholder="Pago de informe">
    </div>

    <div class="mb-6 md:col-span-2">
        <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-sky-600 border border-transparent rounded-md
                    font-semibold text-white hover:bg-sky-700 focus:outline-none focus:ring-2
                    focus:ring-offset-2 focus:ring-sky-500">
            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M12 5v14M5 12h14"></path>
            </svg>
            Registrar Pago
        </button>
    </div>
</div>

{{-- Tabla de Pagos Registrados --}}
@if(isset($pagos) && count($pagos) > 0)
    <div class="mt-10">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Pagos Registrados</h3>
        <div class="overflow-x-auto border border-gray-200 rounded-lg shadow-sm">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-5 py-3 text-left">Fecha</th>
                        <th class="px-5 py-3 text-left">Concepto</th>
                        <th class="px-5 py-3 text-left">Método</th>
                        <th class="px-5 py-3 text-left">Importe</th>
                        <th class="px-5 py-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach($pagos as $pago)
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-3 whitespace-nowrap">{{ \Carbon\Carbon::parse($pago->fecha)->format('d/m/Y') }}</td>
                            <td class="px-5 py-3">{{ $pago->concepto }}</td>
                            <td class="px-5 py-3">{{ $pago->metodo_pago ?? '-' }}</td>
                            <td class="px-5 py-3 font-semibold">{{ number_format($pago->importe, 2) }} €</td>
                            <td class="px-5 py-3 text-center">
                                <button type="submit" class="text-red-600 hover:text-red-800" title="Eliminar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6l-2 14H7L5 6"></path>
                                        <path d="M10 11v6"></path>
                                        <path d="M14 11v6"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else
    <p class="mt-8 text-sm text-gray-500">No hay pagos registrados.</p>
@endif

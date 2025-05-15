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
        <select id="metodo_pago" name="metodo_pago"
            class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm
                focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
            <option value="" disabled selected>Seleccione una opción</option>
            <option value="Transferencia">Transferencia</option>
            <option value="Efectivo">Efectivo</option>
            <option value="Tarjeta">Tarjeta</option>
            <option value="Bizum">Bizum</option>
           
        </select>
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
                    focus:ring-offset-2 focus:ring-sky-500" id="btnRegistrarPago">
            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M12 5v14M5 12h14"></path>
            </svg>
            Registrar Pago
        </button>
    </div>
</div>

@if(isset($pagos) && count($pagos) > 0)
    <div class="mt-10">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Pagos Registrados</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="pagosList">
            @foreach($pagos as $pago)
                <div class="border border-gray-200 rounded-lg shadow-sm p-4 bg-white hover:shadow-md transition">
                    <div class="text-sm text-gray-500 mb-1">
                        <strong>Fecha:</strong> {{ \Carbon\Carbon::parse($pago->fecha)->format('d/m/Y') }}
                    </div>
                    <div class="text-sm text-gray-700 mb-1">
                        <strong>Concepto:</strong> {{ $pago->concepto }}
                    </div>
                    <div class="text-sm text-gray-700 mb-1">
                        <strong>Método:</strong> {{ $pago->metodo_pago ?? '-' }}
                    </div>
                    <div class="text-sm text-gray-700 mb-3 font-semibold">
                        <strong>Importe:</strong> {{ number_format($pago->importe, 2) }} €
                    </div>
                    <div class="text-right">
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
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
 <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="pagosList">
 </div>
@endif
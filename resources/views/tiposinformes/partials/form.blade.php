<div class="mb-6 hidden">
    <input type="text" hidden name="id" id="id" value="{{ $tipoInforme->id ?? '' }}">
</div>

<div class="mb-6">
    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
    <input type="text" id="nombre" name="nombre" value="{{ $tipoInforme->nombre ?? '' }}" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
</div>

<div class="mb-6">
    <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
    <textarea id="descripcion" name="descripcion" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">{{ $tipoInforme->descripcion ?? '' }}</textarea>
</div>

<div class="mb-6">
    <label for="precio" class="block text-sm font-medium text-gray-700 mb-2">Precio</label>
    <input type="number" step="0.01" id="precio" name="precio" value="{{ $tipoInforme->precio ?? '' }}" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
</div>

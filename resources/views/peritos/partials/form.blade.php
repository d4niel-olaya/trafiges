<div class="mb-6 hidden">
    <input type="text" hidden name="id" id="id" value="{{ $perito->id ?? '' }}">
</div>

<div class="mb-6">
    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
    <input type="text" id="nombre" name="nombre" value="{{ $perito->nombre ?? '' }}" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
</div>

<div class="mb-6">
    <label for="apellidos" class="block text-sm font-medium text-gray-700 mb-2">Apellidos</label>
    <input type="text" id="apellidos" name="apellidos" value="{{ $perito->apellidos ?? '' }}" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
</div>

<div class="mb-6">
    <label for="telefono" class="block text-sm font-medium text-gray-700 mb-2">Teléfono</label>
    <input type="text" id="telefono" name="telefono" value="{{ $perito->telefono ?? '' }}" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
</div>

<div class="mb-6">
    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
    <input type="email" id="email" name="email" value="{{ $perito->email ?? '' }}" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
</div>

<div class="mb-6">
    <label for="especialidad" class="block text-sm font-medium text-gray-700 mb-2">Especialidad</label>
    <input type="text" id="especialidad" name="especialidad" value="{{ $perito->especialidad ?? '' }}" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
</div>

<div class="mb-6">
    <label for="notas" class="block text-sm font-medium text-gray-700 mb-2">Notas</label>
    <textarea id="notas" name="notas" class="w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">{{ $perito->notas ?? '' }}</textarea>
</div>

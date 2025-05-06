@extends('layouts.main_layout')

@section('title', 'Infomes')

@section('content')

<div class="p-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-900">Gestión de Peritos</h1>
        <div class="flex gap-2"><button onclick="location.href='/peritos/create'" class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus h-5 w-5">
                    <path d="M5 12h14"></path>
                    <path d="M12 5v14"></path>
                </svg>Nuevo Peritos</button><button class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download h-5 w-5">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="7 10 12 15 17 10"></polyline>
                    <line x1="12" x2="12" y1="15" y2="3"></line>
                </svg>Exportar</button></div>
    </div>
    <div class="bg-white rounded-lg shadow">
        <div class="p-4 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-2">
                <div class="relative flex-1 max-w-2xl"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg><input type="text" placeholder="Buscar Peritos..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" value=""></div><button class="ml-2 p-2 hover:bg-gray-100 rounded-md"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-filter h-5 w-5 text-gray-600">
                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                    </svg></button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-sm font-medium text-gray-500 border-b border-gray-200">
                        <th class="px-6 py-3 whitespace-nowrap">ID</th>
                        <th class="px-6 py-3 whitespace-nowrap">Nombre</th>
                        <th class="px-6 py-3 whitespace-nowrap">Apellidos</th>
                        <th class="px-6 py-3 whitespace-nowrap">Especialidad</th>
                        <th class="px-6 py-3 whitespace-nowrap">Teléfono</th>
                        <th class="px-6 py-3 whitespace-nowrap">Email</th>
                        <th class="px-6 py-3 whitespace-nowrap">Población</th>
                   
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($peritos as $perito)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-900">{{$perito->id}}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{$perito->nombre}}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{$perito->apellidos}}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{$perito->especialidad}}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{$perito->telefono}}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{$perito->email}}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">-</td>
                        <td class="px-6 py-4 text-sm text-gray-900">-</td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <div class="flex gap-2"><button class="p-1 hover:bg-gray-100 rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-user-round h-5 w-5 text-gray-600">
                                        <path d="M18 20a6 6 0 0 0-12 0"></path>
                                        <circle cx="12" cy="10" r="4"></circle>
                                        <circle cx="12" cy="12" r="10"></circle>
                                    </svg></button><button onclick="location.href='/peritos/{{$perito->id}}/edit'"class="p-1 hover:bg-gray-100 rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil h-5 w-5 text-gray-600">
                                        <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>
                                        <path d="m15 5 4 4"></path>
                                    </svg></button><button class="p-1 hover:bg-gray-100 rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2 h-5 w-5 text-gray-600">
                                        <path d="M3 6h18"></path>
                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                        <line x1="10" x2="10" y1="11" y2="17"></line>
                                        <line x1="14" x2="14" y1="11" y2="17"></line>
                                    </svg></button></div>
                        </td>
                <tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-6 py-4 text-sm text-gray-500 border-t border-gray-200">Lista de Peritos registrados</div>
        </div>
    </div>
</div>
    
@endsection

@push("scripts")
    
@endpush

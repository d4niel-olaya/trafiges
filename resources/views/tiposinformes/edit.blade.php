
@extends('layouts.main_layout')

@section('title', 'Crear Tipos de informes')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 flex items-center justify-between">
    
        <button class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors focus:outline-none" onclick="window.location.href='/tiposinformes'">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left mr-2">
                <path d="m12 19-7-7 7-7"></path>
                <path d="M19 12H5"></path>
            </svg>
            Atrás
        </button>
    </div>
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="flex items-start justify-betweem p-6 border-b border-gray-200">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Editar Tipo de informe</h2>
            </div>
        </div>
        <div class="p-6">
            <div class="w-full">
                <div class="py-6 tab-content">
                    <div id="datos-generales-content">
                        <div class="py-6">
                            <div class="tab-content">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
                                    
                                    @include("tiposinformes.partials.form",["tipoInforme"=>$tipoInforme])
                                    
                                </div>
                            </div>
                        </div>
                    </div>
            
                    
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-6 py-4 flex justify-end space-x-3 border-t border-gray-200"><button type="button" class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Cancelar</button><button type="button" id="btnGuardarCambios" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Guardar Cambios</button></div>
    </div>
</div>

@endsection

@push("scripts")
@vite('resources/js/tiposInformes/edit.js')
@endpush
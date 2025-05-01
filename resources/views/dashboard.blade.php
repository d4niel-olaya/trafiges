@extends('layouts.main_layout')

@section('title', 'Dashboard')

@section('content')
<div class="flex flex-col items-center justify-center text-center bg-blue-50 py-12 px-4 sm:px-6 lg:px-8 rounded-lg shadow-md">
    <img src="{{ asset('/logo.png') }}" alt="Logo Trafiges" class="w-40 h-40 mb-6 border-4 border-teal-600 rounded">
    
    <h1 class="text-2xl sm:text-3xl font-bold text-blue-800">
        Sistema de Gestión de Informes Periciales de Biomecánica
    </h1>

    <p class="mt-4 text-lg text-blue-600 max-w-2xl">
        Plataforma completa para la gestión, análisis y seguimiento de informes periciales de biomecánica en accidentes de tráfico.
    </p>

    <a href="{{ route('dashboard') }}"
       class="mt-6 inline-block bg-blue-600 text-white text-lg font-semibold px-6 py-3 rounded-md hover:bg-blue-700 transition">
        Acceder al Sistema
    </a>
</div>

   
@endsection

@push("scripts")
    
@endpush

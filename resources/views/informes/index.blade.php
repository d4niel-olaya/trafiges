
@extends('layouts.main_layout')

@section('title', 'Infomes')

@section('content')
<div class="space-y-4 p-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <h1 class="text-2xl font-bold tracking-tight">Gestión de Informes</h1>
        <div class="flex flex-wrap gap-2"><button class="inline-flex items-center justify-center gap-2 px-3 h-9 rounded-md border text-sm font-medium bg-background hover:bg-accent hover:text-accent-foreground"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mouse h-4 w-4">
                    <rect x="5" y="2" width="14" height="20" rx="7"></rect>
                    <path d="M12 6v4"></path>
                </svg><span>Inicio</span></button><button onclick="location.href='/informes/create'" class="inline-flex items-center justify-center gap-2 px-4 h-10 rounded-md bg-primary text-primary-foreground hover:bg-primary/90 text-sm font-medium"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus h-4 w-4">
                    <path d="M5 12h14"></path>
                    <path d="M12 5v14"></path>
                </svg>Nuevo Informe</button><button class="inline-flex items-center justify-center gap-2 px-4 h-10 rounded-md border text-sm font-medium bg-background hover:bg-accent hover:text-accent-foreground"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download h-4 w-4">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="7 10 12 15 17 10"></polyline>
                    <line x1="12" x2="12" y1="15" y2="3"></line>
                </svg>Exportar</button><button class="inline-flex items-center justify-center gap-2 px-4 h-10 rounded-md border text-sm font-medium bg-background hover:bg-accent hover:text-accent-foreground"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-output h-4 w-4">
                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                    <path d="M4 7V4a2 2 0 0 1 2-2 2 2 0 0 0-2 2"></path>
                    <path d="M4.063 20.999a2 2 0 0 0 2 1L18 22a2 2 0 0 0 2-2V7l-5-5H6"></path>
                    <path d="m5 11-3 3"></path>
                    <path d="m5 17-3-3h10"></path>
                </svg>Plantillas</button></div>
    </div>
    <div class="flex flex-col sm:flex-row gap-2">
        <div class="relative flex-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-2.5 top-2.5 h-4 w-4 text-muted-foreground">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.3-4.3"></path>
            </svg><input type="search" class="flex h-10 w-full rounded-md border bg-background px-8 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2" placeholder="Buscar informes..." value=""></div><button class="inline-flex items-center justify-center h-10 w-10 rounded-md border bg-background hover:bg-accent hover:text-accent-foreground"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-filter h-4 w-4">
                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
            </svg></button>
    </div>
    <div class="rounded-md border">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <caption class="mt-4 text-sm text-muted-foreground">Lista de informes actuales</caption>
                <thead>
                    <tr class="border-b">
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground"></th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">ID</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">Matrícula</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">Fecha Accidente</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">Cliente</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">Abogado</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">Perito</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">Tipo</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">Cía. Seguros</th>
                        <th class="h-12 px-4 text-right align-middle font-medium text-muted-foreground">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($informes as $informe)
                        <tr class="border-b transition-colors hover:bg-muted/50">
                            <td class="p-4 align-middle">
                                @switch($informe->estado)
                                @case('en_proceso')
                                    <div class="h-4 w-4 rounded-full bg-blue-500 mr-2"></div>
                                    
                                @break
                                @case('finalizado')
                                    <div class="h-4 w-4 rounded-full bg-green-500 mr-2"></div>
                                   
                                @break;
                                @case('urgente')
                                    <div class="h-4 w-4 rounded-full bg-red-500 mr-2"></div>
                                 
                                @break;
                                @default
                                    <div class="h-4 w-4 rounded-full bg-amber-500 mr-2"></div>
                                   
                                @endswitch
                            </td>
                            <td class="p-4 align-middle font-medium">{{$informe->id}}</td>
                            <td class="p-4 align-middle">{{$informe->matricula}}</td>
                            <td class="p-4 align-middle">{{$informe->fechaAccidente}}</td>
                            <td class="p-4 align-middle">{{$informe->nombreCliente}}</td>
                            <td class="p-4 align-middle">{{$informe->abogadoAsociado}}</td>
                            <td class="p-4 align-middle">{{$informe->peritoAsignado}}</td>
                            <td class="p-4 align-middle">{{$informe->tipoInforme}}</td>
                            <td class="p-4 align-middle">{{$informe->companiaSeguros}}</td>
                            <td class="p-4 align-middle">
                                <div class="flex justify-end space-x-2"><button onclick="location.href='/informes/{{$informe->id}}'" class="inline-flex items-center justify-center h-10 w-10 rounded-md hover:bg-accent hover:text-accent-foreground"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text h-4 w-4">
                                            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                            <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                            <path d="M10 9H8"></path>
                                            <path d="M16 13H8"></path>
                                            <path d="M16 17H8"></path>
                                        </svg></button><button onclick="location.href='/informes/{{$informe->id}}/edit'" class="inline-flex items-center justify-center h-10 w-10 rounded-md hover:bg-accent hover:text-accent-foreground"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil h-4 w-4">
                                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>
                                            <path d="m15 5 4 4"></path>
                                        </svg></button></div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push("scripts")
    
@endpush

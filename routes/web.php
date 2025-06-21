<?php

use App\Http\Controllers\AbogadoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\PlantillaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EntidadController;
use App\Http\Controllers\ComercialController;
use App\Http\Controllers\BiomecanicaController;
use App\Http\Controllers\DocumentacionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\WordExportController;
use App\Http\Controllers\PeritoController;
use App\Http\Controllers\SeguroController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\TipoInformeController;    

Route::middleware(['auth'])->group(function () {

    // 🔹 Dashboard
    Route::get('/dashboard', [InicioController::class, 'index'])->name('dashboard');

    // 🔹 Informes
    Route::resource('informes', InformeController::class)->middleware('role:administrador|perito|asistente');
    Route::post('/informes/tipo_informe', [InformeController::class, 'asociarTipoInforme'])->name('informes.asociarTipoInforme')->middleware('role:administrador');
    // 🔹 Plantillas
    Route::resource('plantillas', PlantillaController::class)->middleware('role:administrador|perito');
    Route::get('/plantillas/descargar/{archivo}', [PlantillaController::class, 'descargar'])->name('plantillas.descargar')->middleware('role:administrador|perito');
    // 🔹 Clientes
    Route::resource('clientes', ClienteController::class)->middleware('role:administrador|perito');

    // 🔹 Entidades
    //Route::resource('entidades', EntidadController::class)->middleware('role:administrador');
    
    // 🔹 Abogados
    Route::resource('abogados', AbogadoController::class)->middleware('role:administrador');

    // Peritos

    Route::resource('peritos', PeritoController::class)->middleware('role:administrador');

    Route::resource('recibos', ReciboController::class)->middleware('role:administrador');


    Route::resource('pagos', PagoController::class)->middleware('role:administrador');

    Route::resource('tiposinformes', TipoInformeController::class)->middleware('role:administrador');

    Route::resource('seguros', SeguroController::class)->middleware('role:administrador');
    // 🔹 Comercial
    Route::resource('comercial', ComercialController::class)->middleware('role:administrador');



    // 🔹 Biomecánica
    Route::resource('biomecanica', BiomecanicaController::class)->middleware('role:administrador|perito');

     Route::middleware('role:administrador|perito')->group(function () {
            Route::post("/biomecanica/base", [BiomecanicaController::class, 'store_formula_base']);
            Route::put("/biomecanica/base/{id}", [BiomecanicaController::class, 'update_formula_base']);
     });

    // 🔹 Documentación
    Route::resource('documentacion', DocumentacionController::class);

    // 🔹 Mantenimiento

    Route::middleware('role:administrador|asistente')->group(function () {
        Route::resource('usuarios', UserController::class);
        Route::get('configuracion', [ConfigController::class, 'index'])->name('configuracion.index');
        Route::get('diagnostico', [DiagnosticoController::class, 'index'])->name('diagnostico.index');
        Route::get('logs', [LogController::class, 'index'])->name('logs.index');
        Route::get('backups', [BackupController::class, 'index'])->name('backups.index');

        Route::post('/backup/generar', [BackupController::class, 'generar'])->name('backup.generar');
        Route::get('/backup/descargar/{archivo}', [BackupController::class, 'descargar'])->name('backup.descargar');
        Route::get('/backup/historial', [BackupController::class, 'historial'])->name('backup.historial');
    });


    Route::get('/exportar/{id_informe}', [ExportController::class, 'exportar']);
    Route::get('/exportar/word/{id_informe}', [WordExportController::class, 'exportWordDocument']);
    Route::get('/buscar/informes', [InformeController::class, 'search'])->name('informes.search');
    Route::get('/exportar-informes-csv', [InformeController::class, 'exportarExcel'])->name('informes.exportarCSV');
    //Route::post('/informes/update', [InformeController::class,'update'])->name('informes.update');
});

Route::get('/', function () {
    return redirect()->route('login');
});
Route::post('/clientes/buscar', [ClienteController::class, 'search_autocomplete']);
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

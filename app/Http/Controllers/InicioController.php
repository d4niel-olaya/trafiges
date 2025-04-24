<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        // Definir redirecciones por rol
        $routesByRole = [
            'administrador' => 'dashboard',
            'perito'        => 'informes.index',
            'asistente'     => 'usuarios.index',
        ];

        // Buscar el primer rol del usuario con una ruta asociada
        foreach ($routesByRole as $role => $route) {
            if ($user->hasRole($role)) {
                return redirect()->route($route);
            }
        }

        // Si no tiene un rol permitido
        abort(403, 'No tienes acceso a esta sección');
    }
}

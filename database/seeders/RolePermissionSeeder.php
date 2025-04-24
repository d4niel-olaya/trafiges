<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Definir permisos por módulo
        $permissions = [
            'dashboard.acceder',
            'usuarios.crear',
            'usuarios.editar',
            'usuarios.eliminar',
            'usuarios.ver',
            'informes.crear',
            'informes.ver',
            'informes.editar',
            'clientes.gestionar',
            'configuracion.modificar',
            'copias.crear',
            'copias.restaurar',
        ];

        // Crear permisos si no existen
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Crear roles
        $roles = ['administrador', 'perito', 'asistente'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Asignar permisos al rol administrador (todos)
        $admin = Role::where('name', 'administrador')->first();
        $admin->syncPermissions($permissions);

        // Asignar algunos permisos al rol perito
        $perito = Role::where('name', 'perito')->first();
        $perito->syncPermissions([
            'dashboard.acceder',
            'informes.crear',
            'informes.editar',
            'clientes.gestionar',
        ]);

        // Asignar permisos limitados al asistente
        $asistente = Role::where('name', 'Asistente')->first();
        $asistente->syncPermissions([
            'dashboard.acceder',
            'usuarios.ver',
            'informes.ver', // podrías crear este permiso también
        ]);
    }
}

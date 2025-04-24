<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::firstOrCreate(
            ['email' => 'ejemplo@example.com'], // Cambia esto por tu correo de administrador
            [
                'name' => 'Asistente',
                'username'=> 'Asistente',
                'password' => Hash::make('usuario1953'), // Cambia esto por una contraseña segura
                
            ]
        );
        $user->syncRoles(["administrador"]);

        
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['title' => 'estudiante']);
        Role::create(['title' => 'asesorAcademico']);
        Role::create(['title' => 'presidenteAcademia']);
        Role::create(['title' => 'director']);
        Role::create(['title' => 'asistenteDireccion']);
        Role::create(['title' => 'admin']);
    }
}

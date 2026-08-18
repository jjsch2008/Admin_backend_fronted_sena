<?php

namespace Database\Seeders;

use App\Models\Aprendice;
use App\Models\Area;
use App\Models\Computadore;
use App\Models\Curso;
use App\Models\Teacher;
use App\Models\TrainingCenter;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $areaSistemas = Area::create(['name' => 'Sistemas']);
        $areaGestion = Area::create(['name' => 'Gestión Empresarial']);

        $centro = TrainingCenter::create([
            'name' => 'Centro de Servicios y Gestión Empresarial',
            'location' => 'Bogotá',
        ]);

        $computador1 = Computadore::create(['marca' => 'Dell', 'numero' => 'PC-001']);
        $computador2 = Computadore::create(['marca' => 'HP', 'numero' => 'PC-002']);
        Computadore::create(['marca' => 'Lenovo', 'numero' => 'PC-003']);

        $profesor1 = Teacher::create([
            'name' => 'Carlos Ruiz',
            'email' => 'carlos@example.com',
            'area_id' => $areaSistemas->id,
            'training_center_id' => $centro->id,
        ]);

        $profesor2 = Teacher::create([
            'name' => 'Ana Torres',
            'email' => 'ana@example.com',
            'area_id' => $areaGestion->id,
            'training_center_id' => $centro->id,
        ]);

        $cursoAds = Curso::create([
            'course_number' => '2845001',
            'day' => 'Lunes',
            'area_id' => $areaSistemas->id,
            'training_center_id' => $centro->id,
        ]);
        $cursoAds->teachers()->attach($profesor1->id);

        $cursoGestion = Curso::create([
            'course_number' => '2845002',
            'day' => 'Miércoles',
            'area_id' => $areaGestion->id,
            'training_center_id' => $centro->id,
        ]);
        $cursoGestion->teachers()->attach([$profesor1->id, $profesor2->id]);

        Aprendice::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'cell_number' => '3101112233',
            'curso_id' => $cursoAds->id,
            'computer_id' => $computador1->id,
        ]);

        Aprendice::create([
            'name' => 'María Gómez',
            'email' => 'maria@example.com',
            'cell_number' => '3104445566',
            'curso_id' => $cursoGestion->id,
            'computer_id' => $computador2->id,
        ]);
    }
}

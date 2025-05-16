<?php

namespace Database\Seeders;

use App\Models\Motivocontato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotivocontatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Motivocontato::create([
            'motivo_contato' => 'Duvida'
        ]);
        Motivocontato::create([
            'motivo_contato' => 'Elogio'
        ]);
        Motivocontato::create([
            'motivo_contato' => 'Reclamação'
        ]);
    }
}

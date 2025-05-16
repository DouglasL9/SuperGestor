<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contato = new SiteContato();
        $contato::create([
            'nome' => 'Sistema SG',
            'telefone' => '(85) 98858-0230',
            'email' => 'Supergestao@gmail.com',
            'motivo_contato' => 1,
            'mensagem' => 'Seja bem vindo ao sistema super gestão',
        ]);
    }
}

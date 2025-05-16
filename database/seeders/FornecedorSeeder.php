<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'fornecedor1';
        $fornecedor->site = 'fornecedor1.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'fornecedor1@gmail.com';
        $fornecedor->save();

        $fornecedor::create([
            'nome' => 'fornecedor2',
            'site' => 'fornecedor2.com.br',
            'email' => 'fornecedor2@gmail.com',
            'uf' => 'CE',
        ]);

        DB::table('fornecedores')->insert([
            'nome' => 'fornecedor3',
            'site' => 'fornecedor3.com.br',
            'email' => 'fornecedor3@gmail.com',
            'uf' => 'CE',
        ]);
    }
}

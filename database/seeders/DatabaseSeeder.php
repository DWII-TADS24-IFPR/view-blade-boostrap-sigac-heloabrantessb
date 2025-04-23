<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Aluno;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aluno::create([
            'nome' => 'Cláudio',
            'cpf'=> '11122233344',
            'email' => 'claudio@email.com',
            'telefone' => '41984555555'
        ]);

        Role::create([
            'titulo' => 'Aluno'
        ]);
    }
}

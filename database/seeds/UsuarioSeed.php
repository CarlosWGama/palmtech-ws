<?php

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Usuario::create([
            'nome'  => 'Médico',
            'email' => 'medico@teste.com',
            'senha' => md5('123456'),
            'medico' => true
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Pais;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paises = [
            [
            'name' => 'Angola',
            'abreviacao' => 'AO',
            'user_id' => '1',
        ],

       [
            'name' => 'Portugal',
            'abreviacao' => 'PT',
            'user_id' => '1',
        ],

       [
            'name' => 'Brazil',
            'abreviacao' => 'BR',
            'user_id' => '1',
        ],

    ]; //fim dos paises padrão

    //cria cada pais contido no vector paises
    foreach ($paises as $pais)
        Pais::Create($pais);
    }
}

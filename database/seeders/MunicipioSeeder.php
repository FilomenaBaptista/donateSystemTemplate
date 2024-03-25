<?php

namespace Database\Seeders;

use App\Models\Municipio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipios = [
            [
            'name' => 'Cacuaco',
            'provincia_id' => '11',
            'user_id' => '1',

        ],

         [
            'name' => 'Cazenga',
            'provincia_id' => '11',
            'user_id' => '1',

        ],

         [
            'name' => 'Icolo e Bengo',
            'provincia_id' => '11',
            'user_id' => '1',

        ],

        [
            'name' => 'Kilamba Kiaxi',
            'provincia_id' => '11',
            'user_id' => '1',

        ],

        [
            'name' => 'Luanda',
            'provincia_id' => '11',
            'user_id' => '1',

        ],

        [
            'name' => 'Maianga',
            'provincia_id' => '11',
            'user_id' => '1',

        ],

         [
            'name' => 'Palanca',
            'provincia_id' => '11',
            'user_id' => '1',

        ],

        [
            'name' => 'Quiçama',
            'provincia_id' => '11',
            'user_id' => '1',

        ],

          [
            'name' => 'Samba',
            'provincia_id' => '11',
            'user_id' => '1',

        ],

         [
            'name' => 'Sambizanga',
            'provincia_id' => '11',
            'user_id' => '1',

        ],


         [
            'name' => 'Viana',
            'provincia_id' => '11',
            'user_id' => '1',

        ],


    ]; //fim dos municipios de luanda

    //cria cada municipio contido no vector municipios
    foreach ($municipios as $municipio)
        Municipio::Create($municipio);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Provincia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provincias = [
            [
            'name' => 'Bengo',
            'codigo' => ' ',
            'abreviacao' => 'BO',
            'user_id' => '1',
            'pais_id' => '1'
        ],
            [
            'name' => 'Benguela',
            'codigo' => ' ',
            'abreviacao' => 'BA',
            'user_id' => '1',
            'pais_id' => '1'
        ],

        [
            'name' => 'Bie',
            'codigo' => ' ',
            'abreviacao' => 'BE',
            'user_id' => '1',
            'pais_id' => '1'
        ],

        [
            'name' => 'Cabinda',
            'codigo' => ' ',
            'abreviacao' => 'CA',
            'user_id' => '1',
            'pais_id' => '1'
        ],

        [
            'name' => 'Cunene',
            'codigo' => ' ',
            'abreviacao' => 'CE',
            'user_id' => '1',
            'pais_id' => '1'
        ],

        [
            'name' => 'Huambo',
            'codigo' => ' ',
            'abreviacao' => 'HO',
            'user_id' => '1',
            'pais_id' => '1'
        ],

        [
            'name' => 'Huila',
            'codigo' => ' ',
            'abreviacao' => 'HA',
            'user_id' => '1',
            'pais_id' => '1'
        ],

        [
            'name' => 'Kuando Kubango',
            'codigo' => ' ',
            'abreviacao' => 'KK',
            'user_id' => '1',
            'pais_id' => '1'
        ],

        [
            'name' => 'Kwanza Norte',
            'codigo' => ' ',
            'abreviacao' => 'KN',
            'user_id' => '1',
            'pais_id' => '1'
        ],

        [
            'name' => 'Kwanza Sul',
            'codigo' => ' ',
            'abreviacao' => 'KS',
            'user_id' => '1',
            'pais_id' => '1'
        ],

        [
            'name' => 'Luanda',
            'codigo' => ' ',
            'abreviacao' => 'LA',
            'user_id' => '1',
            'pais_id' => '1'
        ],

        [
            'name' => 'Lunda Norte',
            'codigo' => ' ',
            'abreviacao' => 'LN',
            'user_id' => '1',
            'pais_id' => '1'
        ],

        [
            'name' => 'Lunda Sul',
            'codigo' => ' ',
            'abreviacao' => 'LS',
            'user_id' => '1',
            'pais_id' => '1'
        ],

        [
            'name' => 'Malanje',
            'codigo' => ' ',
            'abreviacao' => 'ME',
            'user_id' => '1',
            'pais_id' => '1'
        ],

        [
            'name' => 'Moxico',
            'codigo' => ' ',
            'abreviacao' => 'MO',
            'user_id' => '1',
            'pais_id' => '1'
        ],

        [
            'name' => 'Namibe',
            'codigo' => ' ',
            'abreviacao' => 'NE',
            'user_id' => '1',
            'pais_id' => '1'
        ],

        [
            'name' => 'Uige',
            'codigo' => ' ',
            'abreviacao' => 'UE',
            'user_id' => '1',
            'pais_id' => '1'
        ],

        [
            'name' => 'Zaire',
            'codigo' => ' ',
            'abreviacao' => 'ZE',
            'user_id' => '1',
            'pais_id' => '1'
        ],

    ]; //fim das províncias de Angola

    //cria cada provincia contida no vector provincias
    foreach ($provincias as $provincia)
        Provincia::Create($provincia);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //todas permissões padrão
        $permissions = [

            // PERMISSÕES DAS OPERAÇÕES DE AUTENTICAÇÃO
            [
                'name' => 'FAZER LOGIN',
                'description' => '',
            ],

            //PERMISSÕES DAS OPERAÇÕES DOS UTILIZADORES
            [
                'name' => 'REGISTAR UTILIZADOR',
                'description' => '',
            ],

            [
                'name' => 'EDITAR UTILIZADOR',
                'description' => '',
            ],

            [
                'name' => 'VER UTILIZADOR',
                'description' => '',
            ],

            [
                'name' => 'VER UTILIZADORES ACTIVOS',
                'description' => '',
            ],

            [
                'name' => 'VER UTILIZADORES DESACTIVADOS',
                'description' => '',
            ],

            [
                'name' => 'VER TODOS UTILIZADORES',
                'description' => '',
            ],

            [
                'name' => 'ACTIVAR TODAS CONTAS',
                'description' => '',
            ],

            [
                'name' => 'ACTIVAR CONTA',
                'description' => '',
            ],

            [
                'name' => 'DESACTIVAR TODAS CONTAS',
                'description' => '',
            ],

            [
                'name' => 'DESACTIVAR CONTA',
                'description' => '',
            ],

            //PERMISSÕES DAS OPERAÇÕES DE CONFIGURAÇÃO
            [
                'name' => 'REGISTAR ENTIDADE',
                'description' => '',
            ],

            [
                'name' => 'VER ENTIDADE',
                'description' => '',
            ],

            [
                'name' => 'EDITAR ENTIDADE',
                'description' => '',
            ],

            [
                'name' => 'REGISTAR PROVINCIA',
                'description' => '',
            ],

            [
                'name' => 'VER PROVINCIA',
                'description' => '',
            ],

            [
                'name' => 'EDITAR PROVINCIA',
                'description' => '',
            ],

            [
                'name' => 'REGISTAR MUNICIPIO',
                'description' => '',
            ],

            [
                'name' => 'VER MUNICIPIO',
                'description' => '',
            ],

            [
                'name' => 'EDITAR MUNICIPIO',
                'description' => '',
            ],

            [
                'name' => 'REGISTAR ROLE',
                'description' => '',
            ],

            [
                'name' => 'VER ROLE',
                'description' => '',
            ],

            [
                'name' => 'EDITAR ROLE',
                'description' => '',
            ],

            [
                'name' => 'VER PERMISSÕES',
                'description' => '',
            ],

            [
                'name' => 'REGISTAR CAMPANHA',
                'description' => '',
            ],
            [
                'name' => 'EDITAR CAMPANHA',
                'description' => '',
            ],
            [
                'name' => 'VER CAMPANHA',
                'description' => '',
            ],
            [
                'name' => 'VER HISTÓRIA DE SUCESSO',
                'description' => '',
            ],
            [
                'name' => 'VER PERFIL',
                'description' => '',
            ],
            [
                'name' => 'EDITAR PERFIL',
                'description' => '',
            ],
            [
                'name' => 'FAZER DOAÇÃO',
                'description' => '',
            ],
            [
                'name' => 'REGISTAR DOAÇÃO',
                'description' => '',
            ],
            [
                'name' => 'EDITAR DOAÇÃO',
                'description' => '',
            ],
            [
                'name' => 'VER DOAÇÃO',
                'description' => '',
            ],
            [
                'name' => 'APROVAR CAMPANHA',
                'description' => '',
            ],
            [
                'name' => 'REJEITAR CAMPANHA',
                'description' => '',
            ],
            [
                'name' => 'ELIMINAR CAMPANHA',
                'description' => '',
            ],
            //FIM DAS PERMISSÕES DAS OPERAÇÕES DE CONFIGURAÇÃO


        ]; //fim das permissões

        //cria cada permissão contida no vector permissions
        foreach ($permissions as $permission) {
            Permission::Create($permission);
        }
    }
}

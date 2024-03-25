<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //todas permissões padrão
        $permissions = [

            // PERMISSÕES DAS OPERAÇÕES DE AUTENTICAÇÃO
            [
                'name' => 'FAZER LOGIN',
                'slug' => 'FAZER_LOGIN',
                'description' => '',
            ],

            //PERMISSÕES DAS OPERAÇÕES DOS UTILIZADORES
            [
                'name' => 'REGISTAR UTILIZADOR',
                'slug' => 'REGISTAR_UTILIZADOR',
                'description' => '',
            ],

            [
                'name' => 'EDITAR UTILIZADOR',
                'slug' => 'EDITAR_UTILIZADOR',
                'description' => '',
            ],

            [
                'name' => 'VER UTILIZADOR',
                'slug' => 'VER_UTILIZADOR',
                'description' => '',
            ],

            [
                'name' => 'VER UTILIZADORES ACTIVOS',
                'slug' => 'VER_UTILIZADOR_ACTIVO',
                'description' => '',
            ],

            [
                'name' => 'VER UTILIZADORES DESACTIVADOS',
                'slug' => 'VER_UTILIZADOR_DESACTIVADO',
                'description' => '',
            ],

            [
                'name' => 'VER TODOS UTILIZADORES',
                'slug' => 'VER_UTILIZADOR_GERAL',
                'description' => '',
            ],

            [
                'name' => 'ACTIVAR TODAS CONTAS',
                'slug' => 'ACTIVAR_CONTAS',
                'description' => '',
            ],

            [
                'name' => 'ACTIVAR CONTA',
                'slug' => 'ACTIVAR_CONTA',
                'description' => '',
            ],

            [
                'name' => 'DESACTIVAR TODAS CONTAS',
                'slug' => 'DESACTIVAR_CONTAS',
                'description' => '',
            ],

            [
                'name' => 'DESACTIVAR CONTA',
                'slug' => 'DESACTIVAR_CONTA',
                'description' => '',
            ],

            //PERMISSÕES DAS OPERAÇÕES DE CONFIGURAÇÃO
            [
                'name' => 'REGISTAR ENTIDADE',
                'slug' => 'REGISTAR_ENTIDADE',
                'description' => '',
            ],

            [
                'name' => 'VER ENTIDADE',
                'slug' => 'VER_ENTIDADE',
                'description' => '',
            ],

            [
                'name' => 'EDITAR ENTIDADE',
                'slug' => 'EDITAR_ENTIDADE',
                'description' => '',
            ],

            [
                'name' => 'REGISTAR PROVINCIA',
                'slug' => 'REGISTAR_PROVINCIA',
                'description' => '',
            ],

            [
                'name' => 'VER PROVINCIA',
                'slug' => 'VER_PROVINCIA',
                'description' => '',
            ],

            [
                'name' => 'EDITAR PROVINCIA',
                'slug' => 'EDITAR_PROVINCIA',
                'description' => '',
            ],

            [
                'name' => 'REGISTAR MUNICIPIO',
                'slug' => 'REGISTAR_MUNICIPIO',
                'description' => '',
            ],

            [
                'name' => 'VER MUNICIPIO',
                'slug' => 'VER_MUNICIPIO',
                'description' => '',
            ],

            [
                'name' => 'EDITAR MUNICIPIO',
                'slug' => 'EDITAR_MUNICIPIO',
                'description' => '',
            ],

            [
                'name' => 'REGISTAR ROLE',
                'slug' => 'REGISTAR_ROLE',
                'description' => '',
            ],

            [
                'name' => 'VER ROLE',
                'slug' => 'VER_ROLE',
                'description' => '',
            ],

            [
                'name' => 'EDITAR ROLE',
                'slug' => 'EDITAR_ROLE',
                'description' => '',
            ],

            [
                'name' => 'VER PERMISSÕES',
                'slug' => 'VER_PERMISSOES',
                'description' => '',
            ],

            [
                'name' => 'REGISTAR CAMPANHA',
                'slug' => 'REGISTAR_CAMPANHA',
                'description' => '',
            ],
            [
                'name' => 'EDITAR CAMPANHA',
                'slug' => 'EDITAR_CAMPANHA',
                'description' => '',
            ],
            [
                'name' => 'VER CAMPANHA',
                'slug' => 'VER_CAMPANHA',
                'description' => '',
            ],
            [
                'name' => 'VER HISTOÁRIA DE SUCESSO',
                'slug' => 'VER_HISTORIA_DE_SUCESSO',
                'description' => '',
            ],
            [
                'name' => 'VER PERFIL',
                'slug' => 'VER_PERFIL',
                'description' => '',
            ],
            [
                'name' => 'EDITAR PERFIL',
                'slug' => 'VER_PERFIL',
                'description' => '',
            ],
            [
                'name' => 'FAZER DOAÇÃO',
                'slug' => 'FAZER_DOACAO',
                'description' => '',
            ],
            [
                'name' => 'REGISTAR DOAÇÃO',
                'slug' => 'REGISTAR_DOACAO',
                'description' => '',
            ],
            [
                'name' => 'EDITAR DOAÇÃO',
                'slug' => 'EDITAR_DOACAO',
                'description' => '',
            ],
            [
                'name' => 'VER DOAÇÃO',
                'slug' => 'VER_DOACAO',
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

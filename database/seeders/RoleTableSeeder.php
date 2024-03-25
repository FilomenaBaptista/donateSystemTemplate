<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'SUPER ADMINISTRADOR',
                'slug' => 'role_super',
                'description' => 'Essa é a role para o utilizador Root (Super Utilizador). Terá todos os privilégios!!!',
                'special' => 'all-access',
            ],

            [
                'name' => 'ADMINISTRADOR',
                'slug' => 'role_administrador',
                'description' => 'Essa é a role para o Administrador.',
            ],

            [
                'name' => 'VOLUNTÁRIO',
                'slug' => 'role_voluntario',
                'description' => 'Essa é a role para os voluntários',
            ],

            [
                'name' => 'ENTIDADE',
                'slug' => 'role_entidade',
                'description' => 'Essa é a role para as empresas',
            ],

            [
                'name' => 'DOADOR',
                'slug' => 'role_doador',
                'description' => 'Essa é a role para os doadores',
            ]

        ]; //fim das roles

        //cria cada role com suas permissões padrão contida no vector roles
        foreach ($roles as $role) {
            $role = Role::Create($role);
            if ($role->slug == 'role_administrador')
                $role->syncPermissions([
                    1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22,23, 24, 35, 36, 37
                ]); //recebe as seguintes permissões (,,)

            if ($role->slug == 'role_voluntario')
                $role->syncPermissions([1, 25, 26, 27, 28, 29, 30, 31]); //recebe as seguintes permissões (,,)

            if ($role->slug == 'role_entidade' || $role->slug == 'role_doador')
                $role->syncPermissions([1, 25, 26, 27, 28, 29, 30, 31, 32, 33 ,34]); //recebe as seguintes permissões (,,)
        }
    }
}

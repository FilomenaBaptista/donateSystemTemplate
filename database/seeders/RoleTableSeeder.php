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
                'description' => 'Essa é a role para o utilizador Root (Super Utilizador). Terá todos os privilégios!!!',
                'special' => 'all-access',
            ],

            [
                'name' => 'ADMINISTRADOR',
                'description' => 'Essa é a role para o Administrador.',
            ],

            [
                'name' => 'VOLUNTÁRIO',
                'description' => 'Essa é a role para os voluntários',
            ],

            [
                'name' => 'ENTIDADE',
                'description' => 'Essa é a role para as empresas',
            ],

            [
                'name' => 'DOADOR',
                'description' => 'Essa é a role para os doadores',
            ]

        ]; //fim das roles

        //cria cada role com suas permissões padrão contida no vector roles
        foreach ($roles as $role) {
            $role = Role::Create($role);
            if ($role->name == 'ADMINISTRADOR')
                $role->syncPermissions([
                    1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22,23, 24, 35, 36, 37
                ]); //recebe as seguintes permissões (,,)

            if ($role->name == 'VOLUNTÁRIO')
                $role->syncPermissions([1, 25, 26, 27, 28, 29, 30, 31]); //recebe as seguintes permissões (,,)

            if ($role->name == 'ENTIDADE' || $role->name == 'DOADOR')
                $role->syncPermissions([1, 25, 26, 27, 28, 29, 30, 31, 32, 33 ,34]); //recebe as seguintes permissões (,,)
        }
    }
}

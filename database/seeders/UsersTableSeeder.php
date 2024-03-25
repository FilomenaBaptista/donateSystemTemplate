<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //utilizador root
        $user = User::create([
            'name' => 'SUPER UTILIZADOR',
            'telefone' => '999999999',
            'email'  => 'testenicodemos@gmail.com',
            'municipio_id' => 5,
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        $user->assignRole(1);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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

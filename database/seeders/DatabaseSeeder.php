<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
             CategoriaSeeder::class,
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            PaisSeeder::class,
            ProvinciaSeeder::class,
            MunicipioSeeder::class,
            UserTableSeeder::class,
            RegraSeeder::class,
        ]);

        \App\Models\Campanha::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

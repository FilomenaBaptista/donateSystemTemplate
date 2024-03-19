<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = ['Medicina', 'Educação','Alimento','Calçado','Roupas','Decorações','Eletrodomésticos','Acessórios e ração animal','Beleza/Cuidado corporal','Artesanato','Construção e renovação','Cozinha e utensílios de mesa','Manuteção Doméstica','Jardim','Jogos e Brinquedos','Lazer','Equipamento de Escritório','Mobiliário','Tecnologia','Esporte' ];
        
        foreach ($categorias as $categoria) {
            Categoria::create(['name' => $categoria]);
        }
    }
}

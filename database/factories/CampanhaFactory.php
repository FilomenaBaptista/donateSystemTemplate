<?php

namespace Database\Factories;

use App\Models\Campanha;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampanhaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campanha::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(),
            'descricao' => $this->faker->paragraph(),
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'categoria_id' => function () {
                return \App\Models\Categoria::factory()->create()->id;
            },
            'eliminado' => $this->faker->randomElement(['0', '1']),
        ];
    }
}

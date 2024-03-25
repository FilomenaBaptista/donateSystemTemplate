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
            'user_id' => 1,
            'categoria_id' => $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
            'eliminado' => $this->faker->randomElement(['0', '1']),
        ];
    }
}

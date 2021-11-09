<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Extra;

class ExtraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Extra::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'foto' => $this->faker->word,
            'conocimientos' => $this->faker->word,
            'acercade' => $this->faker->word,
            'habilidades' => $this->faker->word,
        ];
    }
}

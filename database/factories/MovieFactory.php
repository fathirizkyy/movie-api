<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'judul' => $this->faker->words(3, true),
            'sinopsis' => $this->faker->paragraph,
            'tahun_rilis' => $this->faker->numberBetween(1990, 2024),
            'negara' => $this->faker->country,
        ];
    }
}

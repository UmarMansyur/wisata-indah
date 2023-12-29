<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TypeTour>
 */
class TypeTourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $categoryTour = $this->faker->randomElement(['Pantai', 'Gunung', 'Kota', 'Hutan', 'Laut', 'Pulau']);
        return [
            'name' => $categoryTour,
        ];
    }
}

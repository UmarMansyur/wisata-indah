<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = $this->faker->randomElement(['admin', 'user', 'owner']);
        $gender = $this->faker->randomElement(['male', 'female', 'other']);
        return [
            'username' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('qwerty123'),
            'role' => $role,
            'gender' => $gender,
            'phone' => fake()->phoneNumber(),
            'thumbnail' => fake()->imageUrl(),
            'address' => fake()->address(),
        ];
    }
}

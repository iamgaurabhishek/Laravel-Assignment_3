<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"=>fake()->name(),
            "email"=>fake()->unique()->safeEmail(),
            "phone"=>fake()->unique()->phoneNumber(),
            "address"=>fake()->address(), 
        ];
        
    }
}

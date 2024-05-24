<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $randomName = ['Laptop MSI', 'Laptop Lenovo', 'Laptop Asus', 'Laptop HP', 'Laptop Dell'];
    
        return [
            'name' => $this->faker->randomElement($randomName)
        ];
    }
}

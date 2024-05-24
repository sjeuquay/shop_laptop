<?php

namespace Database\Factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Thumnail>
 */
class ThumnailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imagePaths = ['laptop1.jpg', 'laptop2.jpg', 'laptop3.jpg'];
       
        return [
            'product_id'          => $this->faker->numberBetween(1, 20),
            'img_thumnail'        => $this->faker->randomElement($imagePaths),
        ];
    }
}

<?php

namespace Database\Factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imagePaths = ['laptop1.jpg', 'laptop2.jpg', 'laptop3.jpg', 'laptop4.jpg', 'laptop5.jpg'];
        $salePrice = $this->faker->randomNumber(8);
        $price = $this->faker->numberBetween($salePrice, $salePrice + 1000000);
        return [
            'category_id'         => $this->faker->numberBetween(1, 5),
            'hot'                 => $this->faker->numberBetween(0, 1),
            'name'                => $this->faker->text(20),
            'description'         => $this->faker->text(200),
            'short_description'   => $this->faker->text(200),
            'price'               => $price,
            'quantity_available'  => $this->faker->randomNumber(3),
            'sale_price'          => $salePrice,
            'view'                => $this->faker->randomNumber(5),
            'image'               => $this->faker->randomElement($imagePaths),
        ];
    }
}

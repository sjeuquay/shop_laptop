<?php

namespace Database\Factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Specifications>
 */
class SpecificationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id'    => $this->faker->numberBetween(1, 20),
            'content'                => $this->faker->text(200),
            'company'         => $this->faker->text(20),
            'type'   => $this->faker->text(50),
            'ram'               => $this->faker->text(30),
            'Capacity'  => $this->faker->text(50),
            'screen_size'          => $this->faker->text(20),
            'card_screen'                => $this->faker->text(100)
        ];
    }
}

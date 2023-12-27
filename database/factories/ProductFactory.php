<?php

namespace Database\Factories;

use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
        return [
            'name' => $this->faker->text(10),
            'seller_id'=>Seller::inRandomOrder()->pluck('id')->first(),
            'description' => $this->faker->text(20),
            'quantity'=>$this->faker->randomDigit(),
            'price'=>$this->faker->randomNumber(2),
            'min_order_qty'=>$this->faker->randomNumber(),
            'photo_path'=>$this->faker->text(),

        ];
    }
}

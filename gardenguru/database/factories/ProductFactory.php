<?php

namespace Database\Factories;

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
            'name' => $this->faker->name(),
            'user_id'=>User::inRandomOrder()->pluck('id')->first(),
            'description' => $this->faker->name(),
            'quantity'=>$this->faker->randomDigit(),
            'price'=>$this->faker->randomNumber(2),
            'min_order_qty'=>$this->faker->randomNumber(),
            'photo_path'=>$this->faker->text(),

        ];
    }
}

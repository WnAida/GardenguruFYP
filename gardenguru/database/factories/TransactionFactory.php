<?php

namespace Database\Factories;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'seller_id'=>Seller::inRandomOrder()->pluck('id')->first(),
            'amount' => $this->faker->randomFloat(),
            'transactionable_id' => $this->faker->word(),
            'transactionable_type' => $this->faker->word(),

        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id'=>Product::inRandomOrder()->pluck('id')->first(),
            'transaction_id'=>Transaction::inRandomOrder()->pluck('id')->first(),
            'User_id'=>User::inRandomOrder()->pluck('id')->first(),
        ];
    }
}

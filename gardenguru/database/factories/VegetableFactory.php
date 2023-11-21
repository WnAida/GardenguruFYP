<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VegetableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'user_id'=>User::inRandomOrder()->pluck('id')->first(),
            'name' => $this->faker->text(10),
            'description' => $this->faker->text(),
            'note'=>$this->faker->text(),
            'photo'=>$this->faker->text(),
        ];
    }
}

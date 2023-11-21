<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ScheduleFactory extends Factory
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
            'location' => $this->faker->word(),
            'user_id'=>User::inRandomOrder()->pluck('id')->first(),
            'planted_at' => $this->faker->dateTime(),
            'notes'=>$this->faker->text(),
            'seed'=> $this->faker->randomDigit(),
            'photo_path'=> $this->faker->text(),
        ];
    }
}

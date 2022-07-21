<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => ucfirst($this->faker->word()),
            'sms' => $this->faker->boolean(),
            'preview' => $this->faker->boolean(),
            'edit' => $this->faker->boolean(),
            'config' => $this->faker->boolean(),
            'user_id_created' => 1,
        ];

    }
}

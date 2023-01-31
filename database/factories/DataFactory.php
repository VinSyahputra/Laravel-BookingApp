<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Data>
 */
class DataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'room_id' => Room::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'room_owner' => fake()->name(),
            'contact' => fake()->phoneNumber(),
            'event_name' => fake()->title(),
            'date' => fake()->date(),
            'time_start' => fake()->time(),
            'time_end' => fake()->time(),
            'description' => fake()->sentence(2),
        ];
    }
}

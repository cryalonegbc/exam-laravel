<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usee;
use App\Models\Thing;
use App\Models\Place;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usee>
 */
class UseeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'thing_id' => Thing::all()->random()->id,
            'place_id' => Place::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'amount' => rand(0, 5),
        ];
    }
}

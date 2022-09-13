<?php

namespace Database\Factories;

use App\Models\Airline;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'airline'=>Airline::factory(),
            'origin'=>City::factory(),
            'arrival'=>City::factory(),
            'takeoff_time'=>$this->faker->dateTime(),
            'arrival_time'=>$this->faker->dateTime()
        ];
    }
}

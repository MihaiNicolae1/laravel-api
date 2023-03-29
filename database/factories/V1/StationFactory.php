<?php

namespace Database\Factories\V1;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $latitude  = (string) $this->faker->latitude;
        $longitude = (string) $this->faker->longitude;
        return [
            'name' => $this->faker->name,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'company_id' => 1,
            'address' => $this->faker->name,
        ];
    }
}

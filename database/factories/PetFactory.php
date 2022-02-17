<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'species' => $this->faker->name(),
            'status' => $this->faker->name(),
            'location' => $this->faker->name(),
            'description' => $this->faker->text(),
            'descriptionabridged' => $this->faker->name(),
            'img' => 'https://loremflickr.com/320/240',
            'age' => $this->faker->numberBetween(1,999),
            'owner' => $this->faker->name(),
            'contact' => $this->faker->numberBetween(100000000, 999999999)
        ];
    }
}

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
            'race' => $this->faker->name(),
            'location' => $this->faker->name(),
            'description' => $this->faker->text(),
            'img_url' => $this->faker->image(),
            'age' => $this->faker->numberBetween(1,999),
            'owner' => $this->faker->name(),
        ];
    }
}

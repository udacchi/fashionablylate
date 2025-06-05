<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition():array
    {
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'gender' => $this->faker->randomElement(['male', 'female', 'others']),
            'email' => $this->faker->unique()->safeEmail,
            'phone1' => $this->faker->randomNumber(3),
            'phone2' => $this->faker->randomNumber(4),
            'phone3' => $this->faker->randomNumber(4),
            'address' => $this->faker->address,
            'building_name' => $this->faker->secondaryAddress,
            'category_id' => $this->faker->numberBetween(1, 5),
            'content' => $this->faker->realText(120),
        ];
    }
}

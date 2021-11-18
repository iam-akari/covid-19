<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class user_postsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->realText
        ];
    }
}

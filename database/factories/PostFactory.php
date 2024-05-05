<?php

namespace Database\Factories;

use Facade\Ignition\Support\FakeComposer;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email'=> $this->faker->email(),
            'title'=> $this->faker->words(4,true),
            'body'=> $this->faker->realText(300),
            'image'=> $this->faker->imageUrl(),
            'views'=> $this->faker->numberBetween(0,100)
        ];
    }
}

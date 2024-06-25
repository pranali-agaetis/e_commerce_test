<?php

namespace Database\Factories;

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
            'title'       => $this->faker->name(),
            'slug'        => $this->faker->slug(),
            'body'        => $this->faker->text(10),
            'image'       => $this->faker->imageUrl(),
           // 'category_id' => $this->faker->category_id(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $extensions = ['png', 'jpg', 'gif'];
        return [
            'title' => $this->faker->realText(mt_rand(20, 100)),
            'keywords' => implode(', ', $this->faker->words(mt_rand(3, 5))),
            'text' => $this->faker->paragraphs(mt_rand(2,10), true),
            'cover' => $this->faker->word.'.'.$this->faker->randomElement($extensions),
        ];
    }
}

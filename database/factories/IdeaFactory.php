<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Idea>
 */
class IdeaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence(4);
        $description = $this->faker->paragraph(4);
        $category = $this->faker->word;
        return [
            //
            'title' => $title,
            'description' => $description,
            'category' => $category,
        ];
    }
}

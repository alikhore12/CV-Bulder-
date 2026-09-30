<?php

namespace Database\Factories;

use App\Models\CvTemplate;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<CvTemplate>
 */
class CvTemplateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->words(2, true),
            'slug' => Str::slug(fake()->unique()->words(2, true)),
            'description' => fake()->sentence(),
            'preview_image' => null,
            'is_active' => true,
            'sort_order' => fake()->numberBetween(1, 5),
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes): array => [
            'is_active' => false,
        ]);
    }
}

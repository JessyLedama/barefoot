<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Safari>
 */
class SafariFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'slug' => fake()->name(),
            'price_from'  => fake()->name(),
            'residents_price'  => fake()->name(), 
            'non_residents_price'  => fake()->name(), 
            'entry_fee'  => fake()->name(),
            'transport'  => fake()->name(),
            'tour_guide'  => fake()->name(), 
            'drinks', 
            'lunch', 
            'dinner', 
            'accomodation', 
            'description', 
            'location', 
            'map'  => fake()->name(), 
            'link'  => fake()->name(), 
            'featured', 
            'cover'  => fake()->name(), 
            'gallery', 
            'subcategoryId', 
            'itineraryId',

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

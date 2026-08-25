<?php

namespace Database\Factories;

use App\Models\ContactInquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ContactInquiry>
 */
class ContactInquiryFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->numerify('615-###-####'),
            'intended_use' => fake()->randomElement(['Collector', 'Studio', 'Investment', null]),
            'message' => fake()->paragraph(),
            'status' => 'new',
            'read_at' => null,
        ];
    }

    public function read(): static
    {
        return $this->state(fn () => [
            'status' => 'read',
            'read_at' => now(),
        ]);
    }
}

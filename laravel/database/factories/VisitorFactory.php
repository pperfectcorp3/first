<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visitor>
 */
class VisitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'ip_address' => fake()->ipv4,
            'browser_type' => fake()->userAgent,
            'referring_url' => fake()->url,
            'visited_at' => fake()->dateTimeBetween(random_int(0, 6) == 1 ? '2024-01-01' : '2019-01-01' , '0 days')
            //
        ];
    }
}

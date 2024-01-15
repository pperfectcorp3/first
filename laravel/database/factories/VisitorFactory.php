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
            'ip_address' => faker()->ipv4,
            'browser_type' => faker()->userAgent,
            'referring_url' => faker()->url,
            'visited_at' => Carbon::now(),
            //
        ];
    }
}

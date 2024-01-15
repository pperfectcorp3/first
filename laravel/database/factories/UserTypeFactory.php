<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserType>
 */
class UserTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = random_int(1, 3);
        return [
            'user_id' => \User::inRandomOrder()->take(1)->first()->id
            'authorizations' => json_encode($type == 1
                ? [
                    "article" => "crud",
                    "agent" => "crud",
                ]
                : ($type == 2
                    ? ["article" => "crud"]
                    : null
                )
            ),
            'type' => ['super', 'admin', 'agent', 'simple'][$type]
        ];
    }
}

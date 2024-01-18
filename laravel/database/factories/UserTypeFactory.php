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
        $type = random_int(random_int(0, 899) <= 145 ? 1 : 2, 3);
        $user = \App\Models\User::inRandomOrder()->take(1)->first();
        return [
            'user_id' => $user->id,
            'updated_by_user_id' => $user->isAdmin() ? $user->id : null,
            'authorizations' => $type == 1
                ? [
                    "article" => "crud",
                    "agent" => "crud",
                ]
                : ($type == 2
                    ? ["article" => "crud"]
                    : null
                )
            ,
            'type' => (string) $type
        ];
    }
}

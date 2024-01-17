<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory(20)->create()->map(function($user){
            \App\Models\UserType::factory()->create([
                'user_id' => $user->id,
                // 'updated_by_user_id' => $user->isAdmin() || $user->isAgent() ? $user->id : null,
            ]);
        });
    }
}

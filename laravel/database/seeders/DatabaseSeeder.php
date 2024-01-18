<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(!\App\Models\User::where('username', 'gt')->exists()){
            $u = \App\Models\User::factory()->create([
                'name' => "Gedeon Timothy",
                'email' => "gt@icloud.com",
                'username' => "gt",
            ]);
            \App\Models\UserType::factory()->create([
                'user_id' => $u->id,
                'authorizations' => 'all',
                'type' => "0",
                'updated_by_user_id' => null
            ]);
        }
        $this->call([
            UserSeeder::class,
            VisitorSeeder::class,
        ]);
    }
}

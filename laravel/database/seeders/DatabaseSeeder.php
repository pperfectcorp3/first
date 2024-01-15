<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(!\App\Models\User::where('username', 'gt')->exists()){
            \App\Models\User::factory()->create([
                'name' => "Gedeon Timothy",
                'email' => "gt@icloud.com",
                'username' => "gt",
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ]);
        }
        $this->call([
            UserSeeder::class,
            UserTypeSeeder::class,
            VisitorSeeder::class,
        ]);
    }
}

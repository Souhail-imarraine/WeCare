<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Example test user (non-admin)
        if (!User::where('email', 'test@example.com')->exists()) {
            User::create([
                'first_name' => 'Test',
                'last_name' => 'User',
                'email' => 'test@example.com',
                'password' => Hash::make('password123'),
                'role' => 'patient',
            ]);
        }

        // Call individual seeders
        $this->call([
            AdminUserSeeder::class,
        ]);
    }
}

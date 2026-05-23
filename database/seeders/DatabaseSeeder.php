<?php

namespace Database\Seeders;

use App\Models\Albums;
use App\Models\Images;
use App\Models\Lyrics;
use App\Models\Singles;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed categories first
        $this->call([
            CategorySeeder::class,
        ]);

        // Create admin user
        $this->createAdminUser();

        // Seed realistic Swindon band data
        $this->call([
            SwindonDataSeeder::class,
        ]);
    }

    private function createAdminUser()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@swindon.com',
            'password' => Hash::make('admin'),
        ]);

        $this->command->info('✓ Admin user created (email: admin@swindon.com, password: admin123)');
    }
}

<?php

namespace Database\Seeders;

use Database\Seeders\Admin\AdminSeeder;
use Database\Seeders\Admin\PlatformSeeder;
use Database\Seeders\School\AnnouncementSeeder;
use Database\Seeders\School\SchoolSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // AdminSeeder::class,
            // PlatformSeeder::class,
            // SchoolSeeder::class,
            AnnouncementSeeder::class
            // StudentSeeder::class,

        ]);
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

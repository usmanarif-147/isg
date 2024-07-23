<?php

namespace Database\Seeders;

use App\Models\Platform;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all image files from the storage directory
        $imageFiles = File::files(storage_path('app/public/students'));

        $platforms = Platform::all()->pluck('id');

        for ($i = 0; $i < 50; $i++) {

            // Select a random image file
            $randomImage = $imageFiles[array_rand($imageFiles)];

            // Get the URL for the image
            $imageUrl = 'students/' . $randomImage->getFilename();

            $user = User::create([
                'first_name' => 'first_',
                'last_name' => 'last',
                'email' => 'student_' . $i . '_@gmail.com',
                'role' => 3,
                'roll_number' => \Str::uuid(),
                'photo' => $imageUrl,
                'password' => bcrypt('11223344'),
            ]);

            if ($i % 3 == 0) {
                $user->platforms()->sync($platforms->random(rand(1, $platforms->count()))->toArray());
            }
        }
    }
}

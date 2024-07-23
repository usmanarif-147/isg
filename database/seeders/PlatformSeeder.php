<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $platforms = [
            'facebook',
            'linkedin',
            'tiktok',
            'instagram',
            'youtube'
        ];

        // Get all image files from the storage directory
        $imageFiles = File::files(storage_path('app/public/platform'));


        foreach ($platforms as $title) {
            // Select a random image file
            $randomImage = $imageFiles[array_rand($imageFiles)];

            // Get the URL for the image
            $imageUrl = 'platform/' . $randomImage->getFilename();

            Platform::create([
                'title' => $title,
                'icon' => $imageUrl, // Store the URL to the image
            ]);
        }
    }
}

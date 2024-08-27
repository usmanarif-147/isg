<?php

namespace Database\Seeders\Admin;

use App\Models\Platform;
use Illuminate\Database\Seeder;
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

        $imageFiles = File::files(storage_path('app/public/platform'));


        foreach ($platforms as $title) {
            $randomImage = $imageFiles[array_rand($imageFiles)];

            $imageUrl = 'platform/' . $randomImage->getFilename();

            Platform::create([
                'title' => $title,
                'icon' => $imageUrl,
            ]);
        }
    }
}

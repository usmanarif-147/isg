<?php

namespace Database\Seeders;

use App\Models\RollNumberPrefix;
use App\Models\Template;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Get all image files from the storage directory
        $imageFiles = File::files(storage_path('app/public/schools'));

        for ($i = 0; $i < 5; $i++) {

            // Select a random image file
            $randomImage = $imageFiles[array_rand($imageFiles)];

            // Get the URL for the image
            $imageUrl = 'schools/' . $randomImage->getFilename();

            $school = User::create([
                'name' => 'school_' . $i,
                'email' => 'school_' . $i . '_@gmail.com',
                'role' => 2,
                'password' => bcrypt('11223344'),
                'photo' => $imageUrl,
            ]);

            Template::create([
                'school_id' => $school->id,
                'name' => $school->name,
                'logo' => $school->photo,
                'required_fields' => getTemplateFields()
            ]);

            RollNumberPrefix::create([
                'school_id' => $school->id,
                'prefix' => str_replace(" ", "-", $school->name),
            ]);
        }
    }
}

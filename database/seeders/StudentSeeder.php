<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Platform;
use App\Models\StudentCard;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageFiles = File::files(storage_path('app/public/students'));
        $platforms = Platform::all()->pluck('id');
        $schools = User::where('role', 2)->pluck('id');

        for ($i = 0; $i < 50; $i++) {
            $randomImage = $imageFiles[array_rand($imageFiles)];
            $imageUrl = 'students/' . $randomImage->getFilename();

            // Assign a random school_id
            $school_id = $schools->random();

            $user = User::create([
                'first_name' => 'first_',
                'last_name' => 'last',
                'email' => 'student_' . $i . '_@gmail.com',
                'role' => 3,
                'roll_number' => Str::uuid(),
                'photo' => $imageUrl,
                'password' => bcrypt('11223344'),
                'school_id' => $school_id,
            ]);

            // Create a StudentCard for the newly created student
            StudentCard::create([
                'school_id' => $user->school_id,
                'student_id' => $user->id,
                'front_side' => [],
                'back_side' => []
            ]);

            if ($i % 3 == 0) {
                $user->platforms()->sync($platforms->random(rand(1, $platforms->count()))->toArray());
            }
        }
    }
}

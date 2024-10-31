<?php

namespace Database\Seeders;

use App\Models\ProfileViews;
use App\Models\User;
use App\Models\Platform;
use App\Models\StudentCard;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

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

        for ($i = 0; $i < 200; $i++) {
            $randomImage = $imageFiles[array_rand($imageFiles)];
            $imageUrl = 'students/' . $randomImage->getFilename();

            // Assign a random school_id
            $school_id = $schools->random();

            // Define timeframe for random created date
            $timeframe = $i % 3 === 0 ? 'weekly' : ($i % 3 === 1 ? 'monthly' : 'yearly');
            $randomDate = $this->getRandomDate($timeframe);

            $user = User::create([
                'first_name' => 'first_',
                'last_name' => 'last',
                'email' => 'student_' . $i . '_@gmail.com',
                'role' => 3,
                'roll_number' => Str::uuid(),
                'photo' => $imageUrl,
                'password' => bcrypt('11223344'),
                'school_id' => $school_id,
                'clicks' => rand(5, 40),
                'student_profile' => [],
                'created_at' => $randomDate,
            ]);

            // Create a StudentCard for the newly created student
            StudentCard::create([
                'school_id' => $user->school_id,
                'student_id' => $user->id,
                'front_side' => [],
                'back_side' => []
            ]);

            $this->generateProfileViews($user, 'weekly', 10);
            $this->generateProfileViews($user, 'monthly', 30);
            $this->generateProfileViews($user, 'yearly', 5 * 365);

            if ($i % 3 == 0) {
                $user->platforms()->sync($platforms->random(rand(1, $platforms->count()))->toArray());
            }
        }
    }

    private function getRandomDate(string $timeframe): Carbon
    {
        switch ($timeframe) {
            case 'weekly':
                return Carbon::now()->subDays(rand(0, 7));
            case 'monthly':
                return Carbon::now()->subDays(rand(0, 30));
            case 'yearly':
                return Carbon::now()->subDays(rand(0, 365));
            default:
                return Carbon::now();
        }
    }

    private function generateProfileViews($student, $timeframe, $maxDays)
    {
        // Generate a random number of views (between 1 and 10 views for this example)
        $numberOfViews = rand(5, 20);

        for ($j = 0; $j < $numberOfViews; $j++) {
            // Random date generation based on timeframe
            $daysBack = rand(0, $maxDays); // Days back from today
            $viewDate = Carbon::now()->subDays($daysBack);

            // Create a profile view entry
            ProfileViews::create([
                'viewing_id' => $student->id,
                'created_at' => $viewDate,
                'school_id' => $student->school_id,
            ]);
        }
    }
}

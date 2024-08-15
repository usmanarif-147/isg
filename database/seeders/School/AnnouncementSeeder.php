<?php

namespace Database\Seeders\School;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schools = User::where('role', 2)->pluck('id')->toArray();
        for ($i = 0; $i < 50; $i++) {

            $school_id = $schools[array_rand($schools)];

            $school = Announcement::create([
                'school_id' => $school_id,
                'title' => 'announ_title_' . $i,
                'message' => 'announ_message_' . $i,
            ]);
        }
    }
}

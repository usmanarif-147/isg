<?php

namespace Database\Seeders\School;

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
        for ($i = 0; $i < 6; $i++) {
            $school = User::create([
                'name' => 'school_' . $i,
                'email' => 'school_' . $i . '_@gmail.com',
                'role' => 2,
                'password' => bcrypt('11223344'),
                'photo' => '',
            ]);

            Template::create([
                'school_id' => $school->id,
                'name' => $school->name,
                'logo' => $school->photo,
                'front_side' => getTemplateFrontSide(),
                'back_side' => getTemplateBackSide(),
            ]);

            RollNumberPrefix::create([
                'school_id' => $school->id,
                'prefix' => str_replace(" ", "-", $school->name),
            ]);
        }
    }
}

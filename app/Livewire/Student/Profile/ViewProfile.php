<?php

namespace App\Livewire\Student\Profile;

use App\Models\User;
use Livewire\Component;
use App\Models\Platform;
use Illuminate\Support\Facades\DB;

class ViewProfile extends Component
{
    public $school;
    public $roll_number;
    public $student;
    public $studentProfile;
    public $platforms;

    public function mount()
    {
        $school = request()->route('school');
        $roll_number = request()->route('roll_number');

        $this->school = $school;
        $this->roll_number = $roll_number;

        // Fetch the student
        $this->student = User::where('role', 3)
            ->where('school_id', function ($query) use ($school) {
                $query->select('id')
                    ->from('users')
                    ->where('role', 2)
                    ->where('name', $school);
            })
            ->where('roll_number', $this->roll_number)
            ->first();

        // Fetch platforms for the student with status 1
        if ($this->student) {
            $this->platforms = DB::table('platform_user')
                ->join('platforms', 'platform_user.platform_id', '=', 'platforms.id')
                ->where('platform_user.user_id', $this->student->id)
                ->where('platforms.status', 1)
                ->select('platform_user.path', 'platforms.title', 'platforms.icon')
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.student.profile.view-profile');
    }
}

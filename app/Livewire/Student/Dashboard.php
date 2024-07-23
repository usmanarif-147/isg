<?php

namespace App\Livewire\Student;

use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{

    public $activePlatforms;

    public
        $about_me,
        $full_name,
        $profile_photo,
        $cover_photo,
        $bio;

    public function mount()
    {
        $student = UserProfile::where('user_id', auth()->id())->first();

        $this->about_me = $student->about_me;
        $this->full_name = $student->full_name;
        $this->profile_photo = url('storage') . '/' . $student->profile_photo;
        $this->cover_photo = url('storage') . '/' . $student->cover_photo;
        $this->bio = $student->bio;

        $this->getActivePlatforms();
    }

    public function getActivePlatforms()
    {
        $this->activePlatforms =
            DB::table('platform_user')
            ->select('platforms.icon')
            ->join('platforms', 'platforms.id', 'platform_user.platform_id')
            ->where('platform_user.user_id', auth()->id())
            ->where('platform_user.status', 1)
            ->get();
    }


    public function render()
    {
        return view('livewire.student.dashboard', [
            'activePlatforms'  => $this->activePlatforms
        ]);
    }
}
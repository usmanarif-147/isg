<?php

namespace App\Livewire\Student;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{

    public $activePlatforms;

    public
        $email,
        $full_name,
        $photo;

    public function mount()
    {
        // $student = UserProfile::where('user_id', auth()->id())->first();

        $student = User::where('id', auth()->id())->first();

        $this->email = $student->email;
        $this->full_name = $student->first_name . ' ' . $student->last_name;
        $this->photo = url('storage') . '/' . $student->photo;

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

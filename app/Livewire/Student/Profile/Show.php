<?php

namespace App\Livewire\Student\Profile;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    public $tab = 2;

    public $activePlatforms = [];

    public
        $about_me = '',
        $full_name = '',
        $profile_photo = '',
        $cover_photo = '',
        $bio = '';

    public function mount()
    {

        $student = User::where('id', auth()->id())->first();
        if ($student->student_profile) {

            $profile = $student->student_profile;

            $this->about_me = $profile[0]['about_me'];
            $this->full_name = $profile[1]['full_name'];
            $this->bio = $profile[8]['bio'];

            $this->profile_photo = url('storage') . '/' . $profile[9]['profile_photo'];
            $this->cover_photo = url('storage') . '/' . $profile[10]['cover_photo'];
        }

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

    public function showDetailsTab()
    {
        $this->tab = 1;
    }
    public function showLinksTab()
    {
        $this->tab = 2;
    }
    public function showCardsTab()
    {
        $this->tab = 3;
    }

    #[On('update-platforms')]
    public function updatePlatforms()
    {
        $this->getActivePlatforms();
    }

    public function render()
    {
        return view('livewire.student.profile.show', [
            'activePlatforms'  => $this->activePlatforms
        ]);
    }
}

<?php

namespace App\Livewire\Student\Setting;

use Livewire\Component;

class Show extends Component
{

    public $tab = 1;

    public function mount()
    {
        // $student = UserProfile::where('user_id', auth()->id())->first();

        // $this->about_me = $student->about_me;
        // $this->full_name = $student->full_name;
        // $this->profile_photo = url('storage') . '/' . $student->profile_photo;
        // $this->cover_photo = url('storage') . '/' . $student->cover_photo;
        // $this->bio = $student->bio;

        // $this->getActivePlatforms();
    }

    public function showPasswordTab()
    {
        $this->tab = 1;
    }
    public function showPrivacyTab()
    {
        $this->tab = 2;
    }
    public function showLanguageTab()
    {
        $this->tab = 3;
    }
    public function showTermsTab()
    {
        $this->tab = 4;
    }


    public function render()
    {
        return view('livewire.student.setting.show');
    }
}

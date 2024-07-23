<?php

namespace App\Livewire\Student\Profile\Tab;

use App\Models\UserProfile;
use Livewire\Component;

class Details extends Component
{
    public $student;

    public function render()
    {
        $this->student = UserProfile::where('user_id', auth()->id())->first();
        return view('livewire.student.profile.tab.details');
    }
}

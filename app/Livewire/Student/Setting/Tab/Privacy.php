<?php

namespace App\Livewire\Student\Setting\Tab;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Privacy extends Component
{
    public $studentProfile;
    public $studentId;

    public function mount()
    {
        $studentId = Auth()->user()->id;
        $student = User::where('role', 3)->findOrFail($studentId);
        $this->studentProfile = $student->student_profile;
        $this->studentId = $studentId;
    }

    public function toggleEnabled($key)
    {
        $this->studentProfile[$key]['enabled'] = $this->studentProfile[$key]['enabled'] == 1 ? 0 : 1;
        User::where('id', $this->studentId)->update([
            'student_profile' => json_encode($this->studentProfile),
        ]);

        $this->dispatch('profileUpdated');
    }

    public function render()
    {
        return view('livewire.student.setting.tab.privacy');
    }
}

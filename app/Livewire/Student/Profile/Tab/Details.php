<?php

namespace App\Livewire\Student\Profile\Tab;

use App\Models\User;
use Livewire\Component;

class Details extends Component
{

    public
        $about_me,
        $full_name,
        $profile_photo,
        $cover_photo,
        $cnic,
        $blood_group,
        $phone,
        $dob,
        $nationality,
        $gender,
        $bio;

    public function mount()
    {
        $student = User::where('id', auth()->id())->first();
        if ($student->student_profile) {

            $profile = $student->student_profile;

            $this->about_me = $profile[0]['about_me'];
            $this->full_name = $profile[1]['full_name'];
            $this->cnic = $profile[2]['cnic'];
            $this->blood_group = $profile[3]['blood_group'];
            $this->phone = $profile[4]['phone'];
            $this->dob = $profile[5]['dob'];
            $this->nationality = $profile[6]['nationality'];
            $this->gender = $profile[7]['gender'];
            $this->bio = $profile[8]['bio'];
        }
    }

    public function render()
    {
        return view('livewire.student.profile.tab.details');
    }
}

<?php

namespace App\Livewire\Student\Profile\Tab;

use App\Models\StudentCard;
use App\Models\Template;
use Livewire\Component;

class Cards extends Component
{
    public $schoolName, $schoolLogo;
    public $frontSide = [], $backSide = [],
        $frontSidePhoto = 'https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?t=st=1716804080~exp=1716807680~hmac=f544d7e2421c72cab962a627fa919c2d9a3849e1ccc759486401d83c64602064&amp;w=740',
        $backSidePhoto = 'https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?t=st=1716804080~exp=1716807680~hmac=f544d7e2421c72cab962a627fa919c2d9a3849e1ccc759486401d83c64602064&amp;w=740';
    public function mount()
    {
        $template = Template::where('school_id', auth()->user()->school_id)->first();
        $this->schoolName = $template->name;
        $this->schoolLogo = $template->logo;

        $studentCart = StudentCard::where('student_id', auth()->id())->first();
        $this->frontSide = $studentCart->front_side;
        $this->backSide = $studentCart->back_side;

        if ($this->frontSide['photo']) {
            $this->frontSidePhoto = url('storage') . '/' . $this->frontSide['photo'];
        }
        if ($this->backSide['photo']) {
            $this->backSidePhoto = url('storage') . '/' . $this->backSide['photo'];
        }
    }

    public function render()
    {
        return view('livewire.student.profile.tab.cards');
    }
}

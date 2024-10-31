<?php

namespace App\Livewire\Student\Profile\Tab;

use App\Models\StudentCard;
use App\Models\StudentRequests;
use App\Models\Template;
use Livewire\Component;

class Cards extends Component
{
    public $schoolName, $schoolLogo;

    // confirm modal variables
    public $method, $btnText, $btnColor, $body;
    public $studentCardRequest = 1;
    public $frontSide = [], $backSide = [], $status,
    $frontSidePhoto = 'https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?t=st=1716804080~exp=1716807680~hmac=f544d7e2421c72cab962a627fa919c2d9a3849e1ccc759486401d83c64602064&amp;w=740',
    $backSidePhoto = 'https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?t=st=1716804080~exp=1716807680~hmac=f544d7e2421c72cab962a627fa919c2d9a3849e1ccc759486401d83c64602064&amp;w=740';
    public function mount()
    {
        $template = Template::where('school_id', auth()->user()->school_id)->first();
        $this->schoolName = $template->name;
        $this->schoolLogo = $template->logo;

        $studentCard = StudentCard::where('student_id', auth()->id())->first();
        $this->frontSide = $studentCard->front_side;
        $this->backSide = $studentCard->back_side;
        $this->status = $studentCard->status;

        if (!empty($this->frontSide)) {
            if (isset($this->frontSide['photo'])) {
                $this->frontSidePhoto = url('storage') . '/' . $this->frontSide['photo'];
            }
        }

        if (!empty($this->backSide)) {
            if (isset($this->backSide['photo'])) {
                $this->backSidePhoto = url('storage') . '/' . $this->backSide['photo'];
            }
        }
    }

    /**
     * Request Send
     */

    public function confirmRequestCard()
    {
        if ($this->studentCardRequest == 1) {
            $input = 'Modifiaction of Card';
        } else {
            $input = 'Stollen of Card';
        }
        $this->method = 'studentRequestCard';
        $this->btnText = 'Send';
        $this->btnColor = 'bg-success';
        $this->body = 'You want to Send Request ' . $input . '!';
        $this->dispatch('confirm-popup');
    }

    public function studentRequestCard()
    {
        $studentCard = StudentCard::where('student_id', auth()->id())->first();
        $insert = new StudentRequests();
        $insert->school_id = $studentCard->school_id;
        $insert->student_id = $studentCard->student_id;
        $insert->card_id = $studentCard->id;
        $insert->request_type = $this->studentCardRequest == 1 ? 'updated' : ($this->studentCardRequest == 2 ? 'stolen' : 'unknown');
        $insert->save();

        $this->method = '';
        $this->btnText = '';
        $this->btnColor = '';
        $this->body = '';

        $this->dispatch('swal:modal', [
            'icon' => 'success',
            'title' => 'Success',
            'text' => 'Your Request Send Successfully!',
        ]);
    }

    public function render()
    {
        return view('livewire.student.profile.tab.cards');
    }
}

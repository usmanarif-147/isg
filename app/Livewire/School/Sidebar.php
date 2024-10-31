<?php

namespace App\Livewire\School;

use App\Models\StudentCard;
use App\Models\StudentRequests;
use Livewire\Component;
use Livewire\Attributes\On;

class Sidebar extends Component
{
    public $pending = 0;

    public $requestPending = 0;
    public function mount()
    {
        $this->pending = StudentCard::select('id', 'front_side', 'back_side', 'status', 'created_at', 'student_id')
            ->with('student:id,first_name,last_name,email')
            ->where('school_id', auth()->id())
            ->where('status', 1)
            ->count();
        $this->requestPending = StudentRequests::where('school_id', auth()->id())
            ->where('status', 0)->count();
    }
    #[On('request-pending')]
    public function studentRequestsCard()
    {
        return StudentRequests::where('school_id', auth()->id())
            ->where('status', 0)->count();
    }
    #[On('pending')]
    public function studentCardStatus()
    {
        return StudentCard::select('id', 'front_side', 'back_side', 'status', 'created_at', 'student_id')
            ->with('student:id,first_name,last_name,email')
            ->where('school_id', auth()->id())
            ->where('status', 1)
            ->count();
    }
    public function render()
    {
        $this->requestPending = $this->studentRequestsCard();
        $this->pending = $this->studentCardStatus();
        return view('livewire.school.sidebar', [
            'requestPending' => $this->requestPending,
            'pending' => $this->pending,
        ]);
    }
}

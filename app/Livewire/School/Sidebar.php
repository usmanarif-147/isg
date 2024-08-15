<?php

namespace App\Livewire\School;

use App\Models\StudentCard;
use Livewire\Component;

class Sidebar extends Component
{
    public $pending = 0;
    public function mount()
    {
        $this->pending = StudentCard::select('id', 'front_side', 'back_side', 'status', 'created_at', 'student_id')
            ->with('student:id,first_name,last_name,email')
            ->where('school_id', auth()->id())
            ->where('status', 1)
            ->count();
    }

    public function render()
    {
        return view('livewire.school.sidebar');
    }
}

<?php

namespace App\Livewire\Student;

use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{
    public function notifications()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $this->redirectRoute('student.notification');
    }

    public function render()
    {
        return view('livewire.student.navbar');
    }
}

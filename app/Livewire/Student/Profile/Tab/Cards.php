<?php

namespace App\Livewire\Student\Profile\Tab;

use Livewire\Component;

class Cards extends Component
{

    public function mount()
    {
        dd("cards");
    }

    public function render()
    {
        return view('livewire.student.profile.tab.cards');
    }
}

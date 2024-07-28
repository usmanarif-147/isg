<?php

namespace App\Livewire\School\Card;

use Livewire\Component;

class Cards extends Component
{
    public $studentCards;

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.school.card.cards');
    }
}

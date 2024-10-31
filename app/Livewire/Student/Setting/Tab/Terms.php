<?php

namespace App\Livewire\Student\Setting\Tab;

use Livewire\Component;

class Terms extends Component
{
    public $terms_accepted = false;

    public function mount()
    {
        $this->terms_accepted = auth()->user()->terms_accepted;
    }
    public function saveTerms()
    {
        $this->validate([
            'terms_accepted' => 'accepted',
        ]);
        auth()->user()->update([
            'terms_accepted' => $this->terms_accepted,
        ]);
        session()->flash('message', 'Terms and conditions have been saved successfully.');
    }
    public function render()
    {
        return view('livewire.student.setting.tab.terms');
    }
}

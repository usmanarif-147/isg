<?php

namespace App\Livewire\School\Announcement;

use App\Models\Announcement;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{

    public
        $title,
        $message;

    /**
     * Validation Rules
     */
    protected function rules()
    {
        return [
            'title'            =>      ['required'],
            'message'          =>      ['required'],
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }


    public function storeAnnouncement()
    {

        $this->validate();

        Announcement::create([
            'school_id' => auth()->id(),
            'title' => $this->title,
            'message' => $this->message
        ]);

        $this->reset(['title', 'message']);

        $this->dispatch('swal:modal', [
            'title' =>  'Success',
            'text' => 'Announcement Created Successfully.',
            'icon' => 'success'
        ]);
    }

    #[On('ok-button-clicked')]
    public function okButtonClicked()
    {
        $this->redirectRoute('school.announcements');
    }

    public function render()
    {
        return view('livewire.school.announcement.create');
    }
}

<?php

namespace App\Livewire\School\Announcement;

use App\Models\Announcement;
use Livewire\Component;

class Edit extends Component
{

    public $announcementId;

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

    public function mount()
    {
        $this->announcementId = request()->id;
        $announcement = Announcement::find($this->announcementId);
        if (!$announcement) {
            abort(404);
        }

        $this->title = $announcement->title;
        $this->message = $announcement->message;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function updateAnnouncement()
    {
        $this->validate();

        Announcement::where('id', $this->announcementId)
            ->where('school_id', auth()->id())
            ->update([
                'title' => $this->title,
                'message' => $this->message
            ]);

        $this->dispatch('swal:modal', [
            'title' =>  'Success',
            'text' => 'Announcement Updated Successfully.',
            'icon' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.school.announcement.edit');
    }
}

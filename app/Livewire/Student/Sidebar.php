<?php

namespace App\Livewire\Student;

use App\Models\Announcement;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class Sidebar extends Component
{
    public $unreadNotifications = 0, $totalNewAnnouncements = 0;

    public function mount()
    {
        $user = auth()->user();
        $this->unreadNotifications = $user->unreadNotifications->count();
        $this->updateNewAnnCounter();
    }

    #[On('update-new-ann-counter')]
    public function updateNewAnnCounter()
    {
        $newAnnouncements = DB::table('announcements')
            ->leftJoin('announcement_student', 'announcements.id', '=', 'announcement_student.announcement_id')
            ->whereNull('announcement_student.announcement_id')
            ->select('announcements.*')
            ->where('announcements.school_id', auth()->user()->school_id);

        $this->totalNewAnnouncements = $newAnnouncements->count();
    }

    public function notifications()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $this->redirectRoute('student.notification');
    }

    public function render()
    {
        return view('livewire.student.sidebar');
    }
}

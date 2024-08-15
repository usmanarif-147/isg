<?php

namespace App\Livewire\Student\Announcement;

use App\Models\Announcement;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class View extends Component
{
    public $tab = 1;

    public $user;

    public $date = '', $title = '', $message = '';

    public $totalNewAnnouncements = 0, $newAnnouncements = [], $totalOldAnnouncements = 0, $oldAnnouncements = [];

    public $isOld = 0;

    public function mount()
    {
        $this->user = auth()->user();
        $this->getNewAnnouncements();
    }

    public function getNewAnnouncements()
    {
        $this->tab = 1;
        $newAnnouncements = DB::table('announcements')
            ->leftJoin('announcement_student', 'announcements.id', '=', 'announcement_student.announcement_id')
            ->whereNull('announcement_student.announcement_id')
            ->select('announcements.*')
            ->where('announcements.school_id', $this->user->school_id);

        $this->totalNewAnnouncements = $newAnnouncements->count();
        $this->newAnnouncements = $newAnnouncements->orderBy('created_at', 'desc')->get();
    }

    public function getOldAnnouncements()
    {
        $this->tab = 2;
        $this->oldAnnouncements = DB::table('announcement_student')
            ->select('announcements.*')
            ->join('announcements', 'announcements.id', 'announcement_student.announcement_id')
            ->where('student_id', $this->user->id)
            ->get();
    }

    public function markAsRead($id)
    {
        $this->isOld = 0;
        $announcement = Announcement::where('id', $id)->first();
        $this->date = defaultDateFormat($announcement->created_at);
        $this->title = $announcement->title;
        $this->message = $announcement->message;

        $exists = $announcement->students()
            ->wherePivot('student_id', $this->user->id)
            ->wherePivot('announcement_id', $id)
            ->exists();
        if (!$exists) {
            if ($announcement) {
                $announcement->students()->attach($this->user->id, [
                    'school_id' => $this->user->school_id,
                    'is_read' => 1,
                    'read_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        $this->dispatch('read-announcement');
    }

    public function read($id)
    {
        $this->isOld = 1;
        $announcement = Announcement::where('id', $id)->first();
        $this->date = defaultDateFormat($announcement->created_at);
        $this->title = $announcement->title;
        $this->message = $announcement->message;

        $this->dispatch('read-announcement');
    }

    public function closeModal()
    {
        $this->reset(['date', 'title', 'message']);
        $this->dispatch('close-modal');
        if (!$this->isOld) {
            $this->getNewAnnouncements();
            $this->dispatch('update-new-ann-counter');
        }
    }

    public function remove($id)
    {
        DB::table('announcement_student')
            ->where('student_id', $this->user->id)
            ->where('announcement_id', $id)
            ->delete();

        $this->getOldAnnouncements();
    }

    public function render()
    {
        $this->totalOldAnnouncements = DB::table('announcement_student')
            ->where('student_id', $this->user->id)
            ->count();

        return view('livewire.student.announcement.view', [
            'totalNewAnnouncements' => $this->totalNewAnnouncements,
            'newAnnouncements' => $this->newAnnouncements,
            'totalOldAnnouncements' => $this->totalOldAnnouncements,
            'oldAnnouncements' => $this->oldAnnouncements
        ]);
    }
}

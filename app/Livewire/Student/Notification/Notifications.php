<?php

namespace App\Livewire\Student\Notification;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Notifications extends Component
{

    public function deleteNotification($id)
    {
        DB::table('notifications')->where('id', $id)->delete();
    }

    public function render()
    {
        auth()->user()->unreadNotifications->markAsRead();

        $notifications = auth()->user()->notifications;
        return view(
            'livewire.student.notification.notifications',
            [
                'notifications' => $notifications
            ]
        );
    }
}

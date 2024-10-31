<?php

namespace App\Livewire\School\StudentRequests;

use App\Models\StudentCard;
use App\Models\StudentCardHistory;
use App\Models\User;
use App\Notifications\StudentCardNotifications;
use Livewire\Component;
use App\Models\StudentRequests;
use Livewire\WithPagination;

class StudentRequestCards extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $heading = '', $total = 0;

    public $method, $btnText, $btnColor, $body;

    public $cardId, $requestId, $requestType, $studentId;

    public $reason;

    public function AcceptRequestCard($id, $student_id, $card_id, $type)
    {
        $this->requestId = $id;
        $this->cardId = $card_id;
        $this->requestType = $type;
        $this->studentId = $student_id;
        $this->method = $this->requestType === 'updated' ? 'UpdationCard' : ($this->requestType === 'stolen' ? 'StolenCard' : null);
        $this->btnText = 'Yes';
        $this->btnColor = 'bg-success';
        $this->body = 'You want to Accept this request !';
        $this->dispatch('confirm-popup');
    }

    public function StolenCard()
    {
        StudentRequests::where('id', $this->requestId)
            ->update([
                'status' => 1,
            ]);
        StudentCard::where('id', $this->cardId)
            ->where('student_id', $this->studentId)
            ->update([
                'status' => 3,
            ]);
        $title = 'Your Request Against Card ' . $this->requestType . ' Accepted';
        $message = 'Your Card Temporary Inactive State.';

        $student = User::find($this->studentId);
        $student->notify(new StudentCardNotifications($title, $message));
        $this->dispatch('swal:modal', [
            'icon' => 'success',
            'title' => 'Success',
            'text' => 'Card Request Accepted Successfully',
        ]);
        $this->dispatch('request-pending');
    }

    public function UpdationCard()
    {
        StudentRequests::where('id', $this->requestId)
            ->update([
                'status' => 1,
            ]);
        StudentCard::where('id', $this->cardId)
            ->where('student_id', $this->studentId)
            ->update([
                'status' => 4,
            ]);
        $card = StudentCard::where('id', $this->cardId)->where('student_id', $this->studentId)->first();
        StudentCardHistory::create([
            'card_id' => $card->id,
            'school_id' => $card->school_id,
            'student_id' => $card->student_id,
            'front_side' => $card->front_side,
            'back_side' => $card->back_side
        ]);
        $title = 'Your Request Against Card ' . $this->requestType . ' Accepted';
        $message = 'Your Can apply for Updation your Card in Product Section.';

        $student = User::find($this->studentId);
        $student->notify(new StudentCardNotifications($title, $message));
        $this->dispatch('swal:modal', [
            'icon' => 'success',
            'title' => 'Success',
            'text' => 'Card Request Accepted Successfully',
        ]);
        $this->dispatch('request-pending');
    }

    public function RejectRequestCard($id, $student_id, $card_id, $type)
    {
        $this->cardId = $card_id;
        $this->studentId = $student_id;
        $this->requestId = $id;
        $this->requestType = $type;

        $this->method = 'RejectionReason';
        $this->btnText = 'Reject';
        $this->btnColor = 'bg-danger';
        $this->body = 'You want to Reject Card Request From Student!';
        $this->dispatch('confirm-popup');
    }

    public function RejectionReason()
    {
        $this->dispatch('reason-popup');
    }

    protected function rules()
    {
        return [
            'reason' => ['required'],
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function RequestReject()
    {

        $this->validate();
        StudentRequests::where('id', $this->requestId)
            ->update([
                'status' => 2,
            ]);
        $title = 'Your Request Against Card ' . $this->requestType . ' Rejected';
        $message = $this->reason;

        $student = User::find($this->studentId);
        $student->notify(new StudentCardNotifications($title, $message));

        $this->method = '';
        $this->btnText = '';
        $this->btnColor = '';
        $this->body = '';
        $this->reason = '';

        $this->dispatch('swal:modal', [
            'icon' => 'success',
            'title' => 'Success',
            'text' => 'Card Request Rejected Successfully',
        ]);
        $this->dispatch('request-pending');
        $this->resetPage();
    }
    private function getData()
    {
        $data = StudentRequests::select('id', 'request_type', 'status', 'created_at', 'student_id', 'school_id', 'card_id')
            ->where('school_id', auth()->id())->orderBy('created_at', 'desc');
        return $data->paginate(10);
    }

    public function render()
    {
        $this->studentRequests = $this->getData();
        $this->heading = "StudentCardRequests";
        $this->total = StudentRequests::where('school_id', auth()->id())->count();
        return view('livewire.school.student-requests.student-request-cards', [
            'studentRequests' => $this->studentRequests,
        ]);
    }
}

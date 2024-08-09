<?php

namespace App\Livewire\School\Card;

use App\Models\Notification;
use App\Models\StudentCard;
use App\Models\User;
use App\Notifications\StudentCardNotifications;
use Livewire\Component;
use Livewire\WithPagination;

class Cards extends Component
{
    use WithPagination;

    protected $studentCards;

    public $search;

    // confirm modal variables
    public $method, $btnText, $btnColor, $body;

    public $heading = '', $total = 0;

    public $cardId, $studentId;

    public $reason;

    public function mount()
    {
        $this->studentCards = StudentCard::select('id', 'front_side', 'back_side', 'status', 'created_at', 'student_id')
            ->with('student:id,first_name,last_name,email')
            ->where('school_id', auth()->id())
            ->where('status', '!=', 0)
            ->get();
    }

    protected function rules()
    {
        return [
            'reason'        =>      ['required'],
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    /**
     * Activate
     */
    public function confirmActivateCard($studentId, $cardId)
    {
        $this->cardId = $cardId;
        $this->studentId = $studentId;
        $this->method = 'activate';
        $this->btnText = 'Activate';
        $this->btnColor = 'bg-success';
        $this->body = 'You want to Activate Card!';
        $this->dispatch('confirm-popup');
    }

    public function activate()
    {
        StudentCard::where('id', $this->cardId)
            ->where('student_id', $this->studentId)
            ->update([
                'status' => 2,
            ]);

        $title = 'Card Request Accepted';
        $message = 'Congratulations! your card is activated now';

        $student = User::find($this->studentId);
        $student->notify(new StudentCardNotifications($title, $message));

        $this->method = '';
        $this->btnText = '';
        $this->btnColor = '';
        $this->body = '';

        $this->dispatch('swal:modal', [
            'icon' => 'success',
            'title' => 'Success',
            'text' => 'Card Actiavated Successfully',
        ]);
        $this->resetPage();
    }

    /**
     * Deactivate
     */
    public function confirmDeactivateCard($studentId, $cardId)
    {
        $this->cardId = $cardId;
        $this->studentId = $studentId;

        $this->method = 'deactivationReason';
        $this->btnText = 'Deactivate';
        $this->btnColor = 'bg-danger';
        $this->body = 'You want to Deactivate Card!';
        $this->dispatch('confirm-popup');
    }


    public function deactivationReason()
    {
        $this->dispatch('reason-popup');
    }


    public function deactivate()
    {

        $this->validate();

        StudentCard::where('id', $this->cardId)
            ->where('student_id', $this->studentId)
            ->update([
                'status' => 3,
            ]);

        $title = 'Card Request Rejected';
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
            'text' => 'Card Deactivated Successfully',
        ]);
        $this->resetPage();
    }

    private function getData()
    {

        $cards = StudentCard::select('id', 'front_side', 'back_side', 'status', 'created_at', 'student_id')
            ->with('student:id,first_name,last_name,email')
            ->where('school_id', auth()->id())
            ->where('status', '!=', 0)
            ->orderBy('created_at', 'desc');

        return $cards->paginate(10);
    }

    public function render()
    {

        $this->studentCards = $this->getData();

        $this->heading = "Cards";
        $this->total = StudentCard::where('school_id', auth()->id())
            ->where('status', '!=', 0)
            ->get()
            ->count();

        return view('livewire.school.card.cards', [
            'studentCards' => $this->studentCards
        ]);
    }
}

<?php

namespace App\Livewire\School\Card;

use App\Models\Notification;
use App\Models\StudentCard;
use App\Models\Template;
use App\Models\User;
use App\Notifications\StudentCardNotifications;
use Livewire\Component;
use Livewire\WithPagination;

class Cards extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $studentCards;
    public $schoolName, $schoolLogo;
    public $frontSide = [], $backSide = [], $status,
    $frontSidePhoto = 'https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?t=st=1716804080~exp=1716807680~hmac=f544d7e2421c72cab962a627fa919c2d9a3849e1ccc759486401d83c64602064&amp;w=740',
    $backSidePhoto = 'https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?t=st=1716804080~exp=1716807680~hmac=f544d7e2421c72cab962a627fa919c2d9a3849e1ccc759486401d83c64602064&amp;w=740';

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
            'reason' => ['required'],
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

    public function viewCard($studentId, $cardId)
    {
        $this->cardId = $cardId;
        $this->studentId = $studentId;
        $template = Template::where('school_id', auth()->id())->first();
        $this->schoolName = $template->name;
        $this->schoolLogo = $template->logo;

        $studentCard = StudentCard::find($cardId);
        $this->frontSide = $studentCard->front_side;
        $this->backSide = $studentCard->back_side;
        $this->status = $studentCard->status;

        if (!empty($this->frontSide)) {
            if (isset($this->frontSide['photo'])) {
                $this->frontSidePhoto = url('storage') . '/' . $this->frontSide['photo'];
            }
        }

        if (!empty($this->backSide)) {
            if (isset($this->backSide['photo'])) {
                $this->backSidePhoto = url('storage') . '/' . $this->backSide['photo'];
            }
        }
        $this->dispatch('view-popup');
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
        $this->dispatch('pending');
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
        $this->dispatch('pending');
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

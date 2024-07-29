<?php

namespace App\Livewire\School\Card;

use App\Models\Notification;
use App\Models\StudentCard;
use Livewire\Component;
use Livewire\WithPagination;

class Cards extends Component
{
    use WithPagination;

    protected $studentCards;

    // confirm modal variables
    public $method, $btnText, $btnColor, $body;

    public $heading = '', $total = 0;

    public $cardId, $studentId;

    public function mount()
    {
        $this->studentCards = StudentCard::select('id', 'front_side', 'back_side', 'status', 'created_at', 'student_id')
            ->with('student:id,first_name,last_name,email')
            ->where('school_id', auth()->id())
            ->where('status', '!=', 0)
            ->get();
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

        Notification::create([
            'student_id' => $this->studentId,
            'school_id' => auth()->id(),
            'message' => 'Card Request Accepted',
        ]);

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
     * Activate
     */
    public function confirmDeactivateCard($studentId, $cardId)
    {
        $this->cardId = $cardId;
        $this->studentId = $studentId;

        $this->method = 'deactivate';
        $this->btnText = 'Deactivate';
        $this->btnColor = 'bg-danger';
        $this->body = 'You want to Deactivate Card!';
        $this->dispatch('confirm-popup');
    }
    public function deactivate()
    {
        StudentCard::where('id', $this->cardId)
            ->where('student_id', $this->studentId)
            ->update([
                'status' => 3,
            ]);

        Notification::create([
            'student_id' => $this->studentId,
            'school_id' => auth()->id(),
            'message' => 'Card Request Rejected',
        ]);

        $this->method = '';
        $this->btnText = '';
        $this->btnColor = '';
        $this->body = '';

        $this->dispatch('swal:modal', [
            'icon' => 'success',
            'title' => 'Success',
            'text' => 'Card Deactivated Successfully',
        ]);
        $this->resetPage();
    }

    private function getData()
    {
        // $search = $this->search;

        $cards = StudentCard::select('id', 'front_side', 'back_side', 'status', 'created_at', 'student_id')
            ->with('student:id,first_name,last_name,email')
            // ->when($search, function ($query) use ($search) {
            //     $query->where('email', 'like', "%$search%");
            // })
            // ->when($sortStatus, function ($query) use ($sortStatus) {
            //     $query->orderBy('status', $sortStatus);
            // })
            // ->when($sortPrice, function ($query) use ($sortPrice) {
            //     $query->orderBy('price', $sortPrice);
            // })
            // ->when($sortDiscount, function ($query) use ($sortDiscount) {
            //     $query->orderBy('discount', $sortDiscount);
            // })
            // ->when($sortQuantity, function ($query) use ($sortQuantity) {
            //     $query->orderBy('quantity', $sortQuantity);
            // })
            // ->when($sortFeature, function ($query) use ($sortFeature) {
            //     $query->orderBy('is_featured', $sortFeature);
            // })
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

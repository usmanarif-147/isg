<?php

namespace App\Livewire\School\Student;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination;

    protected $students;

    public $studentId;

    public $heading, $total;

    // confirm modal variables
    public $method, $btnText, $btnColor, $body;

    public $create = 0, $edit = 0, $edit_discount = 0, $edit_quantity = 0, $confirm_popup = 0;

    // filters
    public $search = '', $sortPrice = 0, $sortDiscount = 0, $sortQuantity = 0, $sortFeature = 0, $sortStatus = 0;


    /**
     * Activate
     */
    public function confirmActivateStudent($id)
    {
        $this->studentId = $id;
        $this->method = 'activate';
        $this->btnText = 'Activate';
        $this->btnColor = 'bg-success';
        $this->body = 'You want to Activate Student!';
        $this->dispatch('confirm-popup');
    }
    public function activate()
    {
        User::where('id', $this->studentId)
            ->update([
                'status' => 1,
            ]);

        $this->method = '';
        $this->btnText = '';
        $this->btnColor = '';
        $this->body = '';

        $this->dispatch('swal:modal', [
            'icon' => 'success',
            'title' => 'Success',
            'text' => 'Student Actiavated Successfully',
        ]);
        $this->resetPage();
    }

    /**
     * Activate
     */
    public function confirmDeactivateStudent($id)
    {
        $this->studentId = $id;
        $this->method = 'deactivate';
        $this->btnText = 'Deactivate';
        $this->btnColor = 'bg-danger';
        $this->body = 'You want to Deactivate Student!';
        $this->dispatch('confirm-popup');
    }
    public function deactivate()
    {
        User::where('id', $this->studentId)->update([
            'status' => 0,
        ]);

        $this->method = '';
        $this->btnText = '';
        $this->btnColor = '';
        $this->body = '';

        $this->dispatch('swal:modal', [
            'icon' => 'success',
            'title' => 'Success',
            'text' => 'Student Deactivated Successfully',
        ]);
        $this->resetPage();
    }

    /**
     * Filters
     */
    // public function sort($column, $order)
    // {
    //     if ($column == 'price') {
    //         $this->sortPrice = $order ? 'desc' : 'asc';
    //         $this->sortQuantity = 0;
    //         $this->sortFeature = 0;
    //         $this->sortStatus = 0;
    //         $this->sortDiscount = 0;
    //     }
    //     if ($column == 'discount') {
    //         $this->sortDiscount = $order ? 'desc' : 'asc';
    //         $this->sortQuantity = 0;
    //         $this->sortFeature = 0;
    //         $this->sortStatus = 0;
    //         $this->sortPrice = 0;
    //     }
    //     if ($column == 'quantity') {
    //         $this->sortQuantity = $order ? 'desc' : 'asc';
    //         $this->sortFeature = 0;
    //         $this->sortStatus = 0;
    //         $this->sortPrice = 0;
    //         $this->sortDiscount = 0;
    //     }
    //     if ($column == 'feature') {
    //         $this->sortFeature = $order ? 'desc' : 'asc';
    //         $this->sortQuantity = 0;
    //         $this->sortStatus = 0;
    //         $this->sortPrice = 0;
    //         $this->sortDiscount = 0;
    //     }
    //     if ($column == 'status') {
    //         $this->sortStatus = $order ? 'desc' : 'asc';
    //         $this->sortQuantity = 0;
    //         $this->sortFeature = 0;
    //         $this->sortPrice = 0;
    //         $this->sortDiscount = 0;
    //     }
    // }

    public function updatedSearch()
    {
        $this->resetPage();
        // $this->sortPrice = 0;
        // $this->sortQuantity = 0;
        // $this->sortFeature = 0;
        // $this->sortStatus = 0;
    }

    /**
     * Students Data
     */
    private function getData()
    {
        $search = $this->search;
        // $sortPrice = $this->sortPrice;
        // $sortDiscount = $this->sortDiscount;
        // $sortQuantity = $this->sortQuantity;
        // $sortFeature = $this->sortFeature;
        // $sortStatus = $this->sortStatus;

        $students = User::withCount('platforms')
            ->when($search, function ($query) use ($search) {
                $query->where('email', 'like', "%$search%");
            })
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
            ->where('role', 3)
            ->where('school_id', auth()->id())
            ->orderBy('created_at', 'desc');

        return $students->paginate(10);
    }

    /**
     * Render Method
     */
    public function render()
    {
        $this->students = $this->getData();

        $this->heading = "Students";
        $this->total = User::where('role', 2)->get()->count();

        return view('livewire.school.student.students', [
            'students' => $this->students
        ]);
    }
}

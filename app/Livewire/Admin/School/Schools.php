<?php

namespace App\Livewire\Admin\School;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Schools extends Component
{
    use WithPagination;

    protected $schools;

    public $schoolId;

    public $heading, $total;

    public $status = null;

    // confirm modal variables
    public $method, $btnText, $btnColor, $body;

    public $create = 0, $edit = 0, $edit_discount = 0, $edit_quantity = 0, $confirm_popup = 0;

    // filters
    public $search = '', $sortPrice = 0, $sortDiscount = 0, $sortQuantity = 0, $sortFeature = 0, $sortStatus = 0;


    /**
     * Activate
     */
    public function confirmActivateSchool($id)
    {
        $this->schoolId = $id;
        $this->method = 'activate';
        $this->btnText = 'Activate';
        $this->btnColor = 'bg-success';
        $this->body = 'You want to Activate School!';
        $this->dispatch('confirm-popup');
    }
    public function activate()
    {
        User::where('id', $this->schoolId)
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
            'text' => 'School Actiavated Successfully',
        ]);
        $this->resetPage();
    }

    /**
     * Activate
     */
    public function confirmDeactivateSchool($id)
    {
        $this->schoolId = $id;
        $this->method = 'deactivate';
        $this->btnText = 'Deactivate';
        $this->btnColor = 'bg-danger';
        $this->body = 'You want to Deactivate School!';
        $this->dispatch('confirm-popup');
    }
    public function deactivate()
    {
        User::where('id', $this->schoolId)->update([
            'status' => 0,
        ]);

        $this->method = '';
        $this->btnText = '';
        $this->btnColor = '';
        $this->body = '';

        $this->dispatch('swal:modal', [
            'icon' => 'success',
            'title' => 'Success',
            'text' => 'School Deactivated Successfully',
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
    }

    /**
     * Schools Data
     */

     private function getData()
     {
         $search = $this->search;
         $status = $this->status;

         $schools = User::withCount('students')
             ->when($search, function ($query) use ($search) {
                 $query->where('email', 'like', "%$search%");
             })
             ->when($status !== null, function ($query) use ($status) {
                 if ($status !== '') {
                     $query->where('status', $status);
                 }
             })
             ->where('role', 2)
             ->orderBy('created_at', 'desc');

         return $schools->paginate(10);
     }



    /**
     * Render Method
     */
    public function render()
    {
        $this->schools = $this->getData();

        $this->heading = "Schools";
        $this->total = User::where('role', 2)->get()->count();

        return view('livewire.admin.school.schools', [
            'schools' => $this->schools
        ]);
    }
}

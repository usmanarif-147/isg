<?php

namespace App\Livewire\Admin\Platform;

use App\Models\Platform;
use Livewire\Component;
use Livewire\WithPagination;

class Platforms extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $platforms;

    public $platformId;

    public $heading, $total;

    // confirm modal variables
    public $method, $btnText, $btnColor, $body;

    // filters
    public $search = '', $sortPrice = 0, $sortDiscount = 0, $sortQuantity = 0, $sortFeature = 0, $sortStatus = 0;


    /**
     * Activate
     */
    public function confirmActivatePlatform($id)
    {
        $this->platformId = $id;
        $this->method = 'activate';
        $this->btnText = 'Activate';
        $this->btnColor = 'bg-success';
        $this->body = 'You want to Activate Platform!';
        $this->dispatch('confirm-popup');
    }
    public function activate()
    {
        Platform::where('id', $this->platformId)
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
            'text' => 'Platform Actiavated Successfully',
        ]);
        $this->resetPage();
    }

    /**
     * Deactivate
     */
    public function confirmDeactivatePlatform($id)
    {
        $this->platformId = $id;
        $this->method = 'deactivate';
        $this->btnText = 'Deactivate';
        $this->btnColor = 'bg-danger';
        $this->body = 'You want to Deactivate Platform!';
        $this->dispatch('confirm-popup');
    }
    public function deactivate()
    {
        Platform::where('id', $this->platformId)->update([
            'status' => 0,
        ]);

        $this->method = '';
        $this->btnText = '';
        $this->btnColor = '';
        $this->body = '';

        $this->dispatch('swal:modal', [
            'icon' => 'success',
            'title' => 'Success',
            'text' => 'Platform Deactivated Successfully',
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
     * Platfroms Data
     */
    private function getData()
    {
        $search = $this->search;
        // $sortPrice = $this->sortPrice;
        // $sortDiscount = $this->sortDiscount;
        // $sortQuantity = $this->sortQuantity;
        // $sortFeature = $this->sortFeature;
        // $sortStatus = $this->sortStatus;

        $platforms = Platform::when($search, function ($query) use ($search) {
            $query->where('title', 'like', "%$search%");
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
            ->orderBy('created_at', 'desc');

        return $platforms->paginate(10);
    }

    /**
     * Render Method
     */
    public function render()
    {
        $this->platforms = $this->getData();

        $this->heading = "Platforms";
        $this->total = Platform::count();

        return view('livewire.admin.platform.platforms', [
            'platforms' => $this->platforms
        ]);
    }
}

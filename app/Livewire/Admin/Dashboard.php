<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Platform;
use App\Models\StudentCard;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    protected $schools;

    public $totalSchools, $totalStudents, $totalPlatforms, $totalCards;

    public function mount()
    {
        $this->totalSchools = User::where('role', 2)->count();
        $this->totalStudents = User::where('role', 3)->count();
        $this->totalPlatforms = Platform::count();
        $this->totalCards = StudentCard::where('status', 2)->count();
    }

    public function getSchools()
    {
        $schools = User::withCount('students')
            ->where('role', 2)
            ->orderBy('created_at', 'desc');

        return $schools->paginate(5);
    }
    public function render()
    {
        $this->schools = $this->getSchools();
        return view('livewire.admin.dashboard', [
            'schools' => $this->schools
        ]);
    }
}

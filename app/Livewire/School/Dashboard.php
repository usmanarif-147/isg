<?php

namespace App\Livewire\School;

use App\Models\Announcement;
use App\Models\Platform;
use App\Models\StudentCard;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Storage;

class Dashboard extends Component
{
    public $totalStudents, $totalPlatforms, $totalCards, $totalAnnouncements;

    public $timeframe = 'weekly';

    public $topStudents, $chartData;



    public function mount()
    {
        $this->totalStudents = User::where('role', 3)->where('school_id', auth()->id())->count();
        $this->totalPlatforms = Platform::count();
        $this->totalCards = StudentCard::where('status', 2)->where('school_id', auth()->id())->count();
        $this->totalAnnouncements = Announcement::where('school_id', auth()->id())->count();
        $this->updateChart();
        $this->topStudents = $this->getTopStudents();
        $this->chartData = $this->prepareChartData($this->topStudents);
    }

    public function updatedTimeframe()
    {
        $this->updateChart();
    }

    #[On('updateChart')]
    public function updateChart()
    {
        $data = $this->getStudentsData();
        $this->dispatch('refreshChart', ['data' => $data]);
    }

    public function getStudentsData()
    {
        $query = User::query();

        switch ($this->timeframe) {
            case 'weekly':
                $query->where('school_id', auth()->id())->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                break;
            case 'monthly':
                $query->where('school_id', auth()->id())->whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year);
                break;
            case 'yearly':
                $query->where('school_id', auth()->id())->whereYear('created_at', now()->year);
                break;
        }

        return $query->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(fn($data) => ['date' => $data->date, 'count' => $data->count]);
    }

    public function getTopStudents()
    {
        $schoolId = auth()->id();
        return User::where('school_id', $schoolId)
            ->orderBy('clicks', 'desc')
            ->take(10)
            ->get(['first_name', 'last_name', 'clicks', 'photo']);
    }

    private function prepareChartData($profiles)
    {
        $fallbackImageUrl = asset('admin/images/user.png');

        $data = [
            'labels' => [],
            'photos' => [],
            'data' => []
        ];

        foreach ($profiles as $profile) {
            $data['labels'][] = $profile->first_name . $profile->last_name;
            $data['photos'][] = $profile->photo ? asset(Storage::url($profile->photo)) : $fallbackImageUrl; // Fallback if no photo
            $data['data'][] = $profile->clicks;
        }
        return $data;
    }

    public function render()
    {
        return view('livewire.school.dashboard');
    }
}

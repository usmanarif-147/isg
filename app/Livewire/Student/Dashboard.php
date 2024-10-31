<?php

namespace App\Livewire\Student;

use App\Models\ProfileViews;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class Dashboard extends Component
{

    public $activePlatforms;
    public $totalPlatformClicks, $student;
    public
    $email,
    $full_name,
    $created_at,
    $totalClicks,
    $photo;

    public $labels = [], $labelsMonth = [], $labelsYearly = [];
    public $data = [], $dataMonth = [], $dataYearly = [];

    public function mount()
    {
        $this->student = User::where('id', auth()->id())->first();

        $this->email = $this->student->email;
        $this->created_at = $this->student->created_at;
        $this->totalClicks = $this->student->clicks;
        $this->full_name = $this->student->first_name . ' ' . $this->student->last_name;
        $this->photo = url('storage') . '/' . $this->student->photo;
        $this->totalPlatformClicks = DB::table('platform_user')
            ->where('platform_user.user_id', auth()->id())
            ->where('platform_user.status', 1)
            ->sum('platform_user.clicks');

        $this->getActivePlatforms();
        $this->viewsAnalytics();
        $this->loadMonthlyData();
        $this->loadYearlyData();
    }

    public function getActivePlatforms()
    {
        $this->activePlatforms =
            DB::table('platform_user')
                ->select(
                    'platforms.icon',
                    'platform_user.clicks'
                )
                ->join('platforms', 'platforms.id', 'platform_user.platform_id')
                ->where('platform_user.user_id', auth()->id())
                ->where('platform_user.status', 1)
                ->get();
    }

    public function viewsAnalytics()
    {
        $startDate = Carbon::now()->subDays(6);
        $endDate = Carbon::now();

        $dateLabels = collect(CarbonPeriod::create($startDate, $endDate))->map(function ($date) {
            return $date->format('d-m');
        });

        $views = ProfileViews::where('viewing_id', auth()->id())
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, COUNT(*) as views')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $this->labels = $dateLabels->toArray();
        $this->data = $dateLabels->map(function ($label) use ($views) {
            return $views->get(Carbon::createFromFormat('d-m', $label)->toDateString(), (object) ['views' => 0])->views;
        })->toArray();
    }

    public function loadMonthlyData()
    {
        // Get views grouped by month for the current year
        $views = ProfileViews::where('viewing_id', auth()->id())
            ->whereYear('created_at', now()->year)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as views')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        // Generate labels for each month
        $this->labelsMonth = collect(range(1, 12))->map(function ($month) {
            return Carbon::createFromDate(null, $month, 1)->format('F'); // e.g., "January"
        })->toArray();

        // Prepare data for each month, setting to zero if no views for that month
        $this->dataMonth = collect(range(1, 12))->map(function ($month) use ($views) {
            return $views->get($month, (object) ['views' => 0])->views;
        })->toArray();
    }

    public function loadYearlyData()
    {
        // Get views grouped by year
        $views = ProfileViews::where('viewing_id', auth()->id())
            ->selectRaw('YEAR(created_at) as year, COUNT(*) as views')
            ->groupBy('year')
            ->orderBy('year')
            ->get()
            ->keyBy('year');

        // Generate labels and data
        $this->labelsYearly = $views->keys()->toArray(); // years as labels
        $this->dataYearly = $views->pluck('views')->toArray(); // views as data
    }

    public function render()
    {
        return view('livewire.student.dashboard', [
            'activePlatforms' => $this->activePlatforms
        ]);
    }
}

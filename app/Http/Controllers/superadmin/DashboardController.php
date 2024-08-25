<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Sbu;
use App\Models\Status;
use Carbon\Carbon;

class DashboardController extends Controller
{
    private function generateColors()
    {
        $red = rand(100, 255);
        $green = rand(100, 255);
        $blue = rand(100, 255);

        $color = "rgba($red, $green, $blue, 0.5)";

        return $color;
    }

    public function dashboard()
    {
        $page_name = 'Dashboard';

        $projectsByType = Type::withCount('projects')->get();
        $projectsBySbu = Sbu::withCount('projects')->get();
        $projectsByStatus = Status::withCount('projects')->get();

        $projectsPerMonth = Project::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $topSbus = Sbu::withCount('projects')
            ->orderByDesc('projects_count')
            ->take(5)
            ->get();

        $projectCompletionTrend = Project::selectRaw('MONTH(target) as month, 
                COUNT(*) as target_count, 
                SUM(CASE WHEN end_date IS NOT NULL THEN 1 ELSE 0 END) as completed_count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $latestProjects = Project::with(['type', 'sbu', 'status'])
            ->latest()
            ->take(10)
            ->get();

        $projectsByTypeColors = array_map(fn() => $this->generateColors(), $projectsByType->pluck('type_name')->toArray());
        $projectsBySbuColors = array_map(fn() => $this->generateColors(), $projectsBySbu->pluck('sbu_name')->toArray());
        $projectsByStatusColors = array_map(fn() => $this->generateColors(), $projectsByStatus->pluck('status_name')->toArray());

        $projectsPerMonthColor = $this->generateColors();

        $projectCompletionTargetColor = $this->generateColors();
        $projectCompletionCompletedColor = $this->generateColors();

        return view('superadmin.dashboard', compact(
            'page_name',
            'projectsByType',
            'projectsBySbu',
            'projectsByStatus',
            'projectsPerMonth',
            'topSbus',
            'projectCompletionTrend',
            'latestProjects',
            'projectsByTypeColors',
            'projectsBySbuColors',
            'projectsByStatusColors',
            'projectsPerMonthColor',
            'projectCompletionTargetColor',
            'projectCompletionCompletedColor'
        ));
    }
}
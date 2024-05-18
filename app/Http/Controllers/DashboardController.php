<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Type;
use App\Models\Sbu;
use App\Models\Status;
use App\Models\Project;
use App\Models\FtthProject;

class DashboardController extends Controller
{
    private function generateRandomColor()
    {
        $red = rand(100, 255);
        $green = rand(100, 255);
        $blue = rand(100, 255);

        $color = "rgba($red, $green, $blue, 0.5)";
    
        return $color;
    }
    

    public function dashboard_project()
    {
        $projects = FtthProject::get();
        $types = Type::all();
        $sbus = Sbu::all();
        $statuses = Status::all();
      
        $pieChartData1 = [];
        $pieChartData2 = [];
        $pieChartData3 = [];

        $statusData = [];

        foreach ($statuses as $status) {
            $projectsCount = $status->ftthProjects()->count();

            $pieChartData3[] = [
                'label' => $status->status_name,
                'count' => $projectsCount,
                'color' => $this->generateRandomColor(),
            ];
        }

        foreach ($sbus as $sbu) {
            $projectsCount = $sbu->ftthProjects()->count();

            $pieChartData2[] = [
                'label' => $sbu->sbu_name,
                'count' => $projectsCount,
                'color' => $this->generateRandomColor(),
            ];
        }
        
        foreach ($types as $type) {
            $projectsCount = $type->ftthProjects()->count();

            $pieChartData1[] = [
                'label' => $type->type_name,
                'count' => $projectsCount,
                'color' => $this->generateRandomColor(),
            ];
        }

        $total_project = FtthProject::count();

        $inschedule_project = FtthProject::whereColumn('target', '=', 'end_date')->count();

        $inschedule_project_percentage = round(($inschedule_project / $total_project) * 100);
        
        $overdue_project = FtthProject::whereNull('end_date')
                            ->where('target', '<', now())
                            ->count();    

        $overdue_project_percentage = round(($overdue_project / $total_project) * 100);
        
        $beyond_project = FtthProject::whereColumn('target', '<', 'end_date')->count();   
        
        $beyond_project_percentage = round(($beyond_project / $total_project) * 100);

        return view('dashboard.project', [
            'projects' => $projects,
            'types' => $types,
            'sbus' => $sbus,
            'statuses' => $statuses,
            'total_project' => $total_project,
            'inschedule_project' => $inschedule_project,
            'inschedule_project_percentage' => $inschedule_project_percentage,
            'overdue_project' => $overdue_project,
            'overdue_project_percentage' => $overdue_project_percentage,
            'beyond_project' => $beyond_project,
            'beyond_project_percentage' => $beyond_project_percentage,
            'pieChartData1' => $pieChartData1,
            'pieChartData2' => $pieChartData2,
            'pieChartData3' => $pieChartData3
        ]);
    }

    public function dashboard_homepass(Request $request)
    {
        $types = Type::all();
        $sbus = Sbu::all();
    
        $typeId = $request->input('type');
        $sbuId = $request->input('sbu');
    
        if ($typeId && $sbuId) {
            $projects = FtthProject::where('type_id', $typeId)
                      ->where('sbu_id', $sbuId)
                      ->get();
        } else {    
            $projects = FtthProject::get();
        }
    
        return view('dashboard.homepass', [
            'projects' => $projects,
            'types' => $types,
            'sbus' => $sbus
        ]);
    }

    public function dashboard_ftth()
    {
        $projects = FtthProject::get();
        $types = Type::all();
        $sbus = Sbu::all();
        
        return view('dashboard.ftth', [
            'projects' => $projects,
            'types' => $types,
            'sbus' => $sbus
        ]);
    }
}

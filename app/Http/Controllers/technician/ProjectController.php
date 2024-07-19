<?php

namespace App\Http\Controllers\technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Type;
use App\Models\Sbu;
use App\Models\Status;
use App\Models\Project;
use App\Models\SuratJalan;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $page_name = 'Dashboard Project';
        $projects = Project::with('type', 'sbu', 'status')->get();
        $selected_projects = SuratJalan::with('project')->where('technician_id', auth()->user()->id)->get();
        $types = Type::all();
        $sbus = Sbu::all();
        $statuses = Status::all();
      
        $total_project = Project::count();

        if ($total_project > 0) {
            $inschedule_project = Project::whereColumn('target', '=', 'end_date')->count();
            $inschedule_project_percentage = round(($inschedule_project / $total_project) * 100);

            $overdue_project = Project::whereNull('end_date')
                                ->where('target', '<', now())
                                ->count();
            $overdue_project_percentage = round(($overdue_project / $total_project) * 100);

            $beyond_project = Project::whereColumn('target', '<', 'end_date')->count();
            $beyond_project_percentage = round(($beyond_project / $total_project) * 100);
        } else {
            $inschedule_project = 0;
            $inschedule_project_percentage = 0;

            $overdue_project = 0;
            $overdue_project_percentage = 0;

            $beyond_project = 0;
            $beyond_project_percentage = 0;
        }

        return view('technician.project.index', [
            'page_name' => $page_name,
            'projects' => $projects,
            'selected_projects' => $selected_projects,
            'types' => $types,
            'sbus' => $sbus,
            'statuses' => $statuses,
            'total_project' => $total_project,
            'inschedule_project' => $inschedule_project,
            'inschedule_project_percentage' => $inschedule_project_percentage,
            'overdue_project' => $overdue_project,
            'overdue_project_percentage' => $overdue_project_percentage,
            'beyond_project' => $beyond_project,
            'beyond_project_percentage' => $beyond_project_percentage
        ]);
    }

    public function startProject(Request $request, $id)
    {
        try {
            $project = Project::findOrFail($id);
    
            if (SuratJalan::where('project_id', $project->id)->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Instalasi sudah dimulai untuk proyek ini.'
                ], 400);
            }
    
            $project->status_id = Status::where('status_name', 'ON PROGRESS')->first()->id;
            $project->save();
    
            $surat_jalan = SuratJalan::create([
                'project_id' => $project->id,
                'nomor_surat' => Str::uuid(),
                'deskripsi' => '-',
                'technician_id' => auth()->user()->id,
                'created_by' => auth()->user()->id
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Instalasi berhasil dimulai.'
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memulai instalasi. Silakan coba lagi.'
            ], 500);
        }
    }

    public function view(Request $request, $id)
    {
        $page_name = 'Submit Project';

        $project = Project::findOrFail($id);

        $statuses = Status::all();
        $types = Type::all();
        $sbus = Sbu::all();

        return view('technician.project.submit', compact('page_name', 'project', 'statuses', 'types', 'sbus'));
    }
}

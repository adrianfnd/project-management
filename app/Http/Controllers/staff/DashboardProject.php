<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Type;
use App\Models\Sbu;
use App\Models\Status;
use App\Models\Project;

class DashboardProject extends Controller
{
    private function generateColors()
    {
        $red = rand(100, 255);
        $green = rand(100, 255);
        $blue = rand(100, 255);

        $color = "rgba($red, $green, $blue, 0.5)";
    
        return $color;
    }

    public function dashboard(Request $request)
    {
        $page_name = 'Dashboard Project';
        $projects = Project::get();
        $types = Type::all();
        $sbus = Sbu::all();
        $statuses = Status::all();
      
        $pieChartData1 = [];
        $pieChartData2 = [];
        $pieChartData3 = [];

        foreach ($statuses as $status) {
            $projectsCount = $status->projects()->count();

            $pieChartData3[] = [
                'label' => $status->status_name,
                'count' => $projectsCount,
                'color' => $this->generateColors(),
            ];
        }

        foreach ($sbus as $sbu) {
            $projectsCount = $sbu->projects()->count();

            $pieChartData2[] = [
                'label' => $sbu->sbu_name,
                'count' => $projectsCount,
                'color' => $this->generateColors(),
            ];
        }
        
        foreach ($types as $type) {
            $projectsCount = $type->projects()->count();

            $pieChartData1[] = [
                'label' => $type->type_name,
                'count' => $projectsCount,
                'color' => $this->generateColors(),
            ];
        }

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

        return view('staff.dashboard_project.index', [
            'page_name' => $page_name,
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


    public function create()
    {
        $page_name = 'Create Project';

        $statuses = Status::all();
        $types = Type::all();
        $sbus = Sbu::all();

        return view('staff.dashboard_project.create', compact('page_name', 'statuses', 'types', 'sbus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_id' => 'required|exists:types,id',
            'project_name' => 'required|string|max:255',
            'olt_hostname' => 'required|string|max:255',
            'no_sp2k_spa' => 'required|string|max:255',
            'sbu_id' => 'required|exists:sbus,id',
            'hp_plan' => 'required|string|max:255',
            'hp_built' => 'required|string|max:255',
            'fat_total' => 'required|string|max:255',
            'fat_progress' => 'required|string|max:255',
            'fat_built' => 'required|string|max:255',
            'ip_olt' => 'required|string|max:255',
            'kendala' => 'required|string',
            'progress' => 'required|string|max:255',
            'status_id' => 'required|exists:statuses,id',
            'start_date' => 'required|date',
            'target' => 'required|date|after:start_date',
            'end_date' => 'nullable|date|after:start_date',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'required|numeric',
        ], [
            'type_id.required' => 'Kolom Tipe Project wajib diisi.',
            'type_id.exists' => 'Tipe Project yang dipilih tidak valid.',
            'project_name.required' => 'Kolom Nama Project wajib diisi.',
            'project_name.max' => 'Kolom Nama Project tidak boleh lebih dari :max karakter.',
            'olt_hostname.required' => 'Kolom OLT Hostname wajib diisi.',
            'olt_hostname.max' => 'Kolom OLT Hostname tidak boleh lebih dari :max karakter.',
            'no_sp2k_spa.required' => 'Kolom No SP2K/SPA wajib diisi.',
            'no_sp2k_spa.max' => 'Kolom No SP2K/SPA tidak boleh lebih dari :max karakter.',
            'sbu_id.required' => 'Kolom SBU wajib diisi.',
            'sbu_id.exists' => 'SBU yang dipilih tidak valid.',
            'hp_plan.required' => 'Kolom HP Plan wajib diisi.',
            'hp_plan.max' => 'Kolom HP Plan tidak boleh lebih dari :max karakter.',
            'hp_built.required' => 'Kolom HP Built wajib diisi.',
            'hp_built.max' => 'Kolom HP Built tidak boleh lebih dari :max karakter.',
            'fat_total.required' => 'Kolom FAT Total wajib diisi.',
            'fat_total.max' => 'Kolom FAT Total tidak boleh lebih dari :max karakter.',
            'fat_progress.required' => 'Kolom FAT Progress wajib diisi.',
            'fat_progress.max' => 'Kolom FAT Progress tidak boleh lebih dari :max karakter.',
            'fat_built.required' => 'Kolom FAT Built wajib diisi.',
            'fat_built.max' => 'Kolom FAT Built tidak boleh lebih dari :max karakter.',
            'ip_olt.required' => 'Kolom IP OLT wajib diisi.',
            'ip_olt.max' => 'Kolom IP OLT tidak boleh lebih dari :max karakter.',
            'kendala.required' => 'Kolom Kendala wajib diisi.',
            'progress.required' => 'Kolom Progress wajib diisi.',
            'progress.max' => 'Kolom Progress tidak boleh lebih dari :max karakter.',
            'status_id.required' => 'Kolom Status wajib diisi.',
            'status_id.exists' => 'Status yang dipilih tidak valid.',
            'start_date.required' => 'Kolom Tanggal Mulai wajib diisi.',
            'start_date.date' => 'Kolom Tanggal Mulai harus berupa tanggal yang valid.',
            'target.required' => 'Kolom Target Selesai wajib diisi.',
            'target.date' => 'Kolom Target Selesai harus berupa tanggal yang valid.',
            'target.after' => 'Kolom Target Selesai harus setelah Tanggal Mulai.',
            'end_date.date' => 'Kolom Tanggal Selesai harus berupa tanggal yang valid.',
            'end_date.after' => 'Kolom Tanggal Selesai harus setelah Tanggal Mulai.',
            'latitude.required' => 'Kolom Latitude wajib diisi.',
            'latitude.numeric' => 'Kolom Latitude harus berupa angka.',
            'longitude.required' => 'Kolom Longitude wajib diisi.',
            'longitude.numeric' => 'Kolom Longitude harus berupa angka.',
            'radius.required' => 'Kolom Radius (meters) wajib diisi.',
            'radius.numeric' => 'Kolom Radius (meters) harus berupa angka.',
        ]);
        

        $project = Project::create([
            'type_id' => $request->type_id,
            'project_name' => 'TK-' . $request->project_name,
            'olt_hostname' => $request->olt_hostname,
            'no_sp2k_spa' => $request->no_sp2k_spa,
            'sbu_id' => $request->sbu_id,
            'hp_plan' => $request->hp_plan,
            'hp_built' => $request->hp_built,
            'fat_total' => $request->fat_total,
            'fat_progress' => $request->fat_progress,
            'fat_built' => $request->fat_built,
            'ip_olt' => $request->ip_olt,
            'kendala' => $request->kendala,
            'progress' => $request->progress,
            'status_id' => $request->status_id,
            'start_date' => $request->start_date,
            'target' => $request->target,
            'end_date' => $request->end_date,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'radius' => $request->radius,
            'created_by' => auth()->user()->id
        ]);

        return redirect()->route('dashboard_project')->with('success', 'Project telah ditambahkan');
    }

    public function view(Project $project)
    {
        $page_name = 'View Project';

        $statuses = Status::all();
        $types = Type::all();
        $sbus = Sbu::all();

        return view('staff.dashboard_project.view', compact('page_name', 'project', 'statuses', 'types', 'sbus'));
    }

    public function edit(Project $project)
    {
        $page_name = 'Edit Project';

        $statuses = Status::all();
        $types = Type::all();
        $sbus = Sbu::all();

        return view('staff.dashboard_project.edit', compact('page_name', 'project', 'statuses', 'types', 'sbus'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'type_id' => 'required|exists:types,id',
            'project_name' => 'required|string|max:255',
            'olt_hostname' => 'required|string|max:255',
            'no_sp2k_spa' => 'required|string|max:255',
            'sbu_id' => 'required|exists:sbus,id',
            'hp_plan' => 'required|string|max:255',
            'hp_built' => 'required|string|max:255',
            'fat_total' => 'required|string|max:255',
            'fat_progress' => 'required|string|max:255',
            'fat_built' => 'required|string|max:255',
            'ip_olt' => 'required|string|max:255',
            'kendala' => 'required|string',
            'progress' => 'required|string|max:255',
            'status_id' => 'required|exists:statuses,id',
            'start_date' => 'required|date',
            'target' => 'required|date|after:start_date',
            'end_date' => 'nullable|date|after:start_date',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'required|numeric',
        ], [
            'type_id.required' => 'Kolom Tipe Project wajib diisi.',
            'type_id.exists' => 'Tipe Project yang dipilih tidak valid.',
            'project_name.required' => 'Kolom Nama Project wajib diisi.',
            'project_name.max' => 'Kolom Nama Project tidak boleh lebih dari :max karakter.',
            'olt_hostname.required' => 'Kolom OLT Hostname wajib diisi.',
            'olt_hostname.max' => 'Kolom OLT Hostname tidak boleh lebih dari :max karakter.',
            'no_sp2k_spa.required' => 'Kolom No SP2K/SPA wajib diisi.',
            'no_sp2k_spa.max' => 'Kolom No SP2K/SPA tidak boleh lebih dari :max karakter.',
            'sbu_id.required' => 'Kolom SBU wajib diisi.',
            'sbu_id.exists' => 'SBU yang dipilih tidak valid.',
            'hp_plan.required' => 'Kolom HP Plan wajib diisi.',
            'hp_plan.max' => 'Kolom HP Plan tidak boleh lebih dari :max karakter.',
            'hp_built.required' => 'Kolom HP Built wajib diisi.',
            'hp_built.max' => 'Kolom HP Built tidak boleh lebih dari :max karakter.',
            'fat_total.required' => 'Kolom FAT Total wajib diisi.',
            'fat_total.max' => 'Kolom FAT Total tidak boleh lebih dari :max karakter.',
            'fat_progress.required' => 'Kolom FAT Progress wajib diisi.',
            'fat_progress.max' => 'Kolom FAT Progress tidak boleh lebih dari :max karakter.',
            'fat_built.required' => 'Kolom FAT Built wajib diisi.',
            'fat_built.max' => 'Kolom FAT Built tidak boleh lebih dari :max karakter.',
            'ip_olt.required' => 'Kolom IP OLT wajib diisi.',
            'ip_olt.max' => 'Kolom IP OLT tidak boleh lebih dari :max karakter.',
            'kendala.required' => 'Kolom Kendala wajib diisi.',
            'progress.required' => 'Kolom Progress wajib diisi.',
            'progress.max' => 'Kolom Progress tidak boleh lebih dari :max karakter.',
            'status_id.required' => 'Kolom Status wajib diisi.',
            'status_id.exists' => 'Status yang dipilih tidak valid.',
            'start_date.required' => 'Kolom Tanggal Mulai wajib diisi.',
            'start_date.date' => 'Kolom Tanggal Mulai harus berupa tanggal yang valid.',
            'target.required' => 'Kolom Target Selesai wajib diisi.',
            'target.date' => 'Kolom Target Selesai harus berupa tanggal yang valid.',
            'target.after' => 'Kolom Target Selesai harus setelah Tanggal Mulai.',
            'end_date.date' => 'Kolom Tanggal Selesai harus berupa tanggal yang valid.',
            'end_date.after' => 'Kolom Tanggal Selesai harus setelah Tanggal Mulai.',
            'latitude.required' => 'Kolom Latitude wajib diisi.',
            'latitude.numeric' => 'Kolom Latitude harus berupa angka.',
            'longitude.required' => 'Kolom Longitude wajib diisi.',
            'longitude.numeric' => 'Kolom Longitude harus berupa angka.',
            'radius.required' => 'Kolom Radius (meters) wajib diisi.',
            'radius.numeric' => 'Kolom Radius (meters) harus berupa angka.',
        ]);
        

        return redirect()->route('dashboard_project')->with('success', 'Project telah diperbarui');
    }
    

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('dashboard_project')->with('success', 'Project telah dihapus');
    }
}

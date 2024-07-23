<?php

namespace App\Http\Controllers\technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Sbu;
use App\Models\Status;
use App\Models\Customer;
use App\Models\SuratJalan;
use App\Models\RiwayatSuratJalan;

class TechnicianPengajuanController extends Controller
{
    public function index(Request $request)
    {
        $page_name = 'Dashboard Project';
        $projects = Project::where('status_id', Status::where('status_name', 'SURAT JALAN CHECK')->first()->id)
                                ->where('technician_id', auth()->user()->id)
                                ->get();
                                
        $selected_projects = Project::where('status_id', Status::where('status_name', 'SURAT JALAN CHECK')->first()->id)->get();
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

        return view('technician.pengajuan.index', [
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
    
    public function addToSelectedProjects(Project $project)
    {
        try {
            $suratJalan = $project->suratJalan;
            
            $suratJalan = SuratJalan::where('project_id', $project->id)->first();

            if (!$suratJalan) {
                throw new \Exception('Surat Jalan tidak ditemukan.');
            }

            $suratJalan->update(['is_active' => 'Y']);

            return response()->json(['success' => true, 'message' => 'Surat Jalan berhasil ditambahkan..']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function view(Project $project)
    {
        $page_name = 'View Project';

        $customer = Customer::where('project_id', $project->id)->first();

        return view('technician.pengajuan.view', compact('page_name', 'project', 'customer'));
    }

    public function complete(Request $request, SuratJalan $suratJalan)
    {
        $request->validate([
            'keterangan' => 'required|string',
        ], [
            'keterangan.required' => 'Keterangan wajib diisi.',
        ]);

        $suratJalan->update([
            'status' => 'completed',
        ]);

        RiwayatSuratJalan::create([
            'surat_jalan_id' => $suratJalan->id,
            'project_id' => $suratJalan->project_id,
            'keterangan' => $request->keterangan,
            'tanggal' => now(),
            'technician_id' => auth()->user()->id,
            'vendor_id' => $suratJalan->vendor_id,
            'customer_id' => $suratJalan->project->customers->first()->id,
            'created_by' => auth()->user()->id,
        ]);

        return redirect()->route('technician.pengajuan.index')->with('success', 'Surat Jalan berhasil diselesaikan');
    }
}
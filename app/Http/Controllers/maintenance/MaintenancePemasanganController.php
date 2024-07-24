<?php

namespace App\Http\Controllers\maintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\SuratJalan;
use App\Models\Status;
use App\Models\Customer;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;
use PDF;

class MaintenancePemasanganController extends Controller
{
    public function index()
    {
        $page_name = 'Daftar Pemasangan';

        $list_project = Project::with('status')
                        ->whereNotIn('status_id', [Status::where('status_name', 'PENGAJUAN')->first()->id, Status::where('status_name', 'SURAT JALAN CHECK')->first()->id])
                        ->get();
    
        $projects = $list_project->sortBy(function($project) {
            $order = ['INSTALASI' => 1, 'SURAT JALAN' => 2];
            return $order[$project->status->status_name] ?? 3;
        });
        
        return view('maintenance.pemasangan.index', compact('page_name', 'projects'));
    }

    public function view(Project $project)
    {
        $page_name = 'View Project';

        $customer = Customer::where('project_id', $project->id)
                        ->firstOrFail();

        $project = Project::where('id', $project->id)
                        ->whereNotIn('status_id', [Status::where('status_name', 'PENGAJUAN')->first()->id, Status::where('status_name', 'SURAT JALAN CHECK')->first()->id])
                        ->firstOrFail();

        $suratJalan = SuratJalan::where('project_id', $project->id)
                        ->first();

        return view('maintenance.pemasangan.view', compact('page_name', 'project', 'customer', 'suratJalan'));
    }

    public function showPdf($id)
    {
        $project = Project::where('id', $id)
                        ->firstOrFail();

        $suratJalan = SuratJalan::where('project_id', $project->id)
                        ->firstOrFail();
                            
        $path = str_replace('public/', 'app/public/', $suratJalan->link_file);

        $pdfPath = storage_path($path);

        if (!$pdfPath) {
            abort(404, 'PDF tidak ditemukan');
        }

        return response()->file($pdfPath);
    }


    public function approve(Project $project)
    {
        if ($project->status->status_name !== 'INSTALASI') {
            return response()->json(['error' => 'Project tidak ditemukan.'], 400);
        }

        $surat_jalan = SuratJalan::where('project_id', $project->id)->firstOrFail();


        $project->update([
            'status_id' => Status::where('status_name', 'SURAT JALAN')->first()->id,
            'link_file' => $surat_jalan->link_file,
            'updated_by' => auth()->user()->id
        ]);
    
        return response()->json(['message' => 'Project disetujui dan Surat Jalan dibuat.']);
    }
    
    public function decline(Request $request, Project $project)
    {
        if ($project->status->status_name !== 'INSTALASI') {
            return response()->json(['error' => 'Project tidak ditemukan.'], 400);
        }
    
        $project->update([
            'kendala' => $request->notes,
            'status_id' => Status::where('status_name', 'PENGAJUAN')->first()->id,
            'updated_by' => auth()->user()->id
        ]);

        $suratJalan = SuratJalan::where('project_id', $project->id)->first();
    
        if ($suratJalan) {
            if ($suratJalan->link_file) {
                Storage::delete($suratJalan->link_file);
            }

            $suratJalan->delete();
        }
    
        return response()->json(['message' => 'Project ditolak.']);
    }

}
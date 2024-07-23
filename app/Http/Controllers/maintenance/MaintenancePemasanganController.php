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
        $project->update([
            'status_id' => Status::where('status_name', 'DISETUJUI')->first()->id
        ]);

        $suratJalan = SuratJalan::create([
            'project_id' => $project->id,
            'nomor_surat' => 'SJ-' . date('YmdHis'),
            'deskripsi' => 'Surat Jalan Pemasangan untuk ' . $project->project_name,
            'created_by' => auth()->user()->id,
        ]);

        return response()->json(['message' => 'Pengajuan disetujui dan Surat Jalan dibuat.']);
    }

    public function decline(Project $project)
    {
        $project->update([
            'status_id' => Status::where('status_name', 'DITOLAK')->first()->id
        ]);

        return response()->json(['message' => 'Pengajuan ditolak.']);
    }
}
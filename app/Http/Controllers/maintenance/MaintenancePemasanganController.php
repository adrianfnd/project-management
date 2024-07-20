<?php

namespace App\Http\Controllers\maintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\SuratJalan;
use App\Models\Status;

class MaintenancePemasanganController extends Controller
{
    public function index()
    {
        $page_name = 'Daftar Pengajuan Pemasangan';

        $projects = Project::where('status_id', Status::where('status_name', 'PENGAJUAN')->first()->id)->get();
        
        return view('maintenance.pemasangan.index', compact('page_name', 'projects'));
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
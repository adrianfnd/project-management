<?php

namespace App\Http\Controllers\maintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Vendor;
use App\Models\User;
use App\Models\SuratJalan;

class MaintenancePengajuanController extends Controller
{
    public function index()
    {
        $page_name = 'Daftar Surat Jalan';

        $surat_jalans = SuratJalan::with(['project', 'vendor', 'technician'])->get();

        return view('maintenance.pengajuan.index', compact('page_name', 'surat_jalans'));
    }

    public function create()
    {
        $page_name = 'Buat Surat Jalan';

        $projects = Project::all();
        $vendors = Vendor::all();
        $technicians = User::where('role_id', 3)->get();
        
        return view('maintenance.pengajuan.create', compact('page_name', 'projects', 'vendors', 'technicians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'vendor_id' => 'required|exists:vendors,id',
            'technician_id' => 'required|exists:users,id',
            'nomor_surat' => 'required|string|unique:surat_jalan,nomor_surat',
            'deskripsi' => 'required|string',
        ], [
            'project_id.required' => 'Pilih project terlebih dahulu.',
            'vendor_id.required' => 'Pilih vendor terlebih dahulu.',
            'technician_id.required' => 'Pilih teknisi terlebih dahulu.',
            'nomor_surat.required' => 'Nomor surat wajib diisi.',
            'nomor_surat.unique' => 'Nomor surat sudah digunakan.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
        ]);

        $surat_jalan = SuratJalan::create([
            'project_id' => $request->project_id,
            'vendor_id' => $request->vendor_id,
            'technician_id' => $request->technician_id,
            'nomor_surat' => $request->nomor_surat,
            'deskripsi' => $request->deskripsi,
            'created_by' => auth()->user()->id,
        ]);

        return redirect()->route('maintenance.pengajuan.index')->with('success', 'Surat Jalan berhasil dibuat');
    }

}
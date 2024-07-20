<?php

namespace App\Http\Controllers\maintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Vendor;
use App\Models\User;
use App\Models\SuratJalan;
use App\Models\Status;
use App\Models\Customer;
use App\Models\Role;

class MaintenancePengajuanController extends Controller
{
    public function index()
    {
        $page_name = 'Daftar Pengajuan Pemasangan';

        $projects = Project::where('status_id', Status::where('status_name', 'PENGAJUAN')->first()->id)->get();
        
        return view('maintenance.pengajuan.index', compact('page_name', 'projects'));
    }

    public function create()
    {
        $page_name = 'Buat Surat Jalan';

        $projects = Project::all();
        $vendors = Vendor::all();
        $technicians = User::where('role_id', Role::where('role_name', 'TECHNICIAN')->first()->id)->get();
        
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

        $customer = Customer::where('project_id', $request->project_id)->first();

        $surat_jalan = SuratJalan::create([
            'project_id' => $request->project_id,
            'vendor_id' => $request->vendor_id,
            'customer_id' => $customer->id,
            'technician_id' => $request->technician_id,
            'nomor_surat' => $request->nomor_surat,
            'deskripsi' => $request->deskripsi,
            'created_by' => auth()->user()->id,
        ]);

        return redirect()->route('maintenance.pengajuan.index')->with('success', 'Surat Jalan berhasil dibuat');
    }

    public function view(Project $project)
    {
        $page_name = 'View Project';

        $customer = Customer::where('project_id', $project->id)->first();

        return view('maintenance.pengajuan.view', compact('page_name', 'project', 'customer'));
    }

}
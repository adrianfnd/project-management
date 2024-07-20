<?php

namespace App\Http\Controllers\technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuratJalan;
use App\Models\RiwayatSuratJalan;
use App\Models\Status;

class TechnicianPemasanganController extends Controller
{
    public function index()
    {
        $page_name = 'Daftar Surat Jalan Pemasangan';
        $suratJalans = SuratJalan::where('technician_id', auth()->user()->id)
                                  ->whereHas('project', function ($query) {
                                      $query->where('status_id', Status::where('status_name', 'DISETUJUI')->first()->id);
                                  })
                                  ->where('status', 'pending')
                                  ->with(['project', 'project.customers'])
                                  ->get();
        return view('technician.pemasangan.index', compact('page_name', 'suratJalans'));
    }

    public function show(SuratJalan $suratJalan)
    {
        $page_name = 'Detail Surat Jalan Pemasangan';
        return view('technician.pemasangan.show', compact('page_name', 'suratJalan'));
    }

    public function complete(Request $request, SuratJalan $suratJalan)
    {
        $request->validate([
            'keterangan' => 'required|string',
            'hp_built' => 'required|integer',
            'fat_built' => 'required|integer',
        ], [
            'keterangan.required' => 'Keterangan wajib diisi.',
            'hp_built.required' => 'Jumlah HP Built wajib diisi.',
            'fat_built.required' => 'Jumlah FAT Built wajib diisi.',
        ]);

        $suratJalan->update([
            'status' => 'completed',
        ]);

        $suratJalan->project->update([
            'hp_built' => $request->hp_built,
            'fat_built' => $request->fat_built,
            'status_id' => Status::where('status_name', 'SELESAI')->first()->id,
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

        return redirect()->route('technician.pemasangan.index')->with('success', 'Pemasangan berhasil diselesaikan');
    }
}
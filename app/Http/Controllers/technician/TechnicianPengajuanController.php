<?php

namespace App\Http\Controllers\technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuratJalan;
use App\Models\RiwayatSuratJalan;

class TechnicianPengajuanController extends Controller
{
    public function index()
    {
        $page_name = 'Daftar Surat Jalan';
        $surat_jalans = SuratJalan::where('technician_id', auth()->user()->id)
                                   ->with(['project', 'vendor'])
                                   ->get();

        return view('technician.pengajuan.index', compact('page_name', 'surat_jalans'));
    }

    public function show(SuratJalan $suratJalan)
    {
        $page_name = 'Detail Surat Jalan';
        return view('technician.pengajuan.show', compact('page_name', 'suratJalan'));
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
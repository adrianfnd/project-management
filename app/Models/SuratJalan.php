<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    use HasFactory;

    protected $table = 'surat_jalan';

    protected $fillable = [
        'ftth_project_id',
        'nomor_surat',
        'deskripsi',
        'technician_id',
        'created_by',
        'updated_by',
    ];

    public function ftthProject()
    {
        return $this->belongsTo(FtthProject::class, 'ftth_project_id');
    }

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function riwayatSuratJalan()
    {
        return $this->hasMany(RiwayatSuratJalan::class, 'surat_jalan_id');
    }
}

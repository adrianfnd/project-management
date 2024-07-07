<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatSuratJalan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_surat_jalan';

    protected $fillable = [
        'surat_jalan_id',
        'ftth_project_id',
        'keterangan',
        'tanggal',
        'created_by',
    ];

    public function suratJalan()
    {
        return $this->belongsTo(SuratJalan::class, 'surat_jalan_id');
    }

    public function ftthProject()
    {
        return $this->belongsTo(FtthProject::class, 'ftth_project_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

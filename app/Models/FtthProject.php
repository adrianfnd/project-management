<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FtthProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'project_name',
        'olt_hostname',
        'no_sp2k_spa',
        'sbu_id',
        'hp_plan',
        'hp_built',
        'fat_total',
        'fat_progress',
        'fat_built',
        'ip_olt',
        'kendala',
        'progress',
        'status_id',
        'start_date',
        'target',
        'end_date',
        'created_by',
        'updated_by',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function sbu()
    {
        return $this->belongsTo(Sbu::class, 'sbu_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}

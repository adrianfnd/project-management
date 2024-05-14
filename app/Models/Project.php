<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_type_id',
        'project_id',
        'created_by',
        'updated_by',
    ];

    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function ftthProject()
    {
        return $this->belongsTo(FtthProject::class, 'project_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
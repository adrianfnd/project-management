<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sbu extends Model
{
    use HasFactory;

    protected $fillable = [
        'sbu_name',
        'location',
        'latitude',
        'longitude',
    ];

    public function ftthProjects()
    {
        return $this->hasMany(FtthProject::class, 'sbu_id');
    }
}


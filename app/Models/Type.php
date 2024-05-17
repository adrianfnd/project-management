<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_name',
        'description',
    ];

    public function ftthProjects()
    {
        return $this->hasMany(FtthProject::class, 'type_id');
    }
}

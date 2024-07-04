<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Type;
use App\Models\Sbu;
use App\Models\Status;
use App\Models\Project;
use App\Models\FtthProject;

class DashboardHomepass extends Controller
{
    public function dashboard(Request $request)
    {
        $page_name = 'Homepass Dashboard';
        $types = Type::all();
        $sbus = Sbu::all();
    
        $typeId = $request->input('type');
        $sbuId = $request->input('sbu');
    
        if ($typeId && $sbuId) {
            $projects = FtthProject::where('type_id', $typeId)
                      ->where('sbu_id', $sbuId)
                      ->get();
        } else {    
            $projects = FtthProject::get();
        }
    
        return view('dashboard_homepass.index', [
            'page_name' => $page_name,
            'projects' => $projects,
            'types' => $types,
            'sbus' => $sbus
        ]);
    }
}

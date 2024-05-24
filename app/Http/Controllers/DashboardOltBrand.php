<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\FtthProject;

class DashboardOltBrand extends Controller
{
    public function dashboard()
    {
        $page_name = 'Dashboard OLT Brand';

        return view ("dashboard.olt", compact('page_name'));
    }
}

<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\FtthProject;

class DashboardOltBrand extends Controller
{
    public function dashboard()
    {
        $page_name = 'Dashboard OLT Brand';

        return view ("dashboard_olt_brand.index", compact('page_name'));
    }
}

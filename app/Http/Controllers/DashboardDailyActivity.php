<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\FtthProject;

class DashboardDailyActivity extends Controller
{
    public function dashboard()
    {
        $page_name = 'Dashboard Daily Activity';

        return view ("dashboard_daily_activity.index", compact('page_name'));
    }
}

<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\FtthProject;

class DashboardDailyActivity extends Controller
{
    public function dashboard()
    {
        $page_name = 'Dashboard Daily Activity';

        return view("staff.dashboard_daily_activity.index", compact('page_name'));
    }
}

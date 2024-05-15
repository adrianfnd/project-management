<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view ('dashboard.index');
    }

    public function dashboard_ftth()
    {
        return view ('dashboard.ftth');
    }

    public function dashboard_homepass()
    {
        return view ('dashboard.homepass');
    }
}

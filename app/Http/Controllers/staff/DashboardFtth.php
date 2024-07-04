<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Type;
use App\Models\Sbu;
use App\Models\Project;
use App\Models\FtthProject;

class DashboardFtth extends Controller
{
    private function generateColors($count, $opacity)
    {
        $baseColors = [
            'rgba(28, 55, 130, OPACITY)',
            'rgba(81, 83, 88, OPACITY)',
            'rgba(145, 145, 158, OPACITY)',
        ];        

        $colors = [];
        for ($i = 0; $i < $count; $i++) {
            $colorIndex = $i % count($baseColors);
            $color = str_replace('OPACITY', $opacity, $baseColors[$colorIndex]);
            $colors[] = $color;
        }

        return $colors;
    }

    public function dashboard()
    {
        $page_name = 'Dashboard FTTH';
        $projects = FtthProject::get();
        $types = Type::all();
        $sbus = Sbu::all();

        $chartData1 = [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'datasets' => [
                [
                    'label' => 'Sales',
                    'data' => [65, 59, 80, 81, 56, 55, 40, 50, 70, 60, 90, 100],
                    'backgroundColor' => $this->generateColors(5, 0.3),
                    'borderColor' => $this->generateColors(5, 1),
                ],
            ],
        ];

        return view('dashboard_ftth.index', [
            'page_name' => $page_name,
            'projects' => $projects,
            'types' => $types,
            'sbus' => $sbus,
            'chartData1' => $chartData1
        ]);
    }
}

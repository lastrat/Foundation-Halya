<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->input('start_date', now()->subDays(30)->format('Y-m-d'));
        $end = $request->input('end_date', now()->format('Y-m-d'));

        $startDate = \Carbon\Carbon::parse($start)->startOfDay();
        $endDate = \Carbon\Carbon::parse($end)->endOfDay();

        $total = Visit::whereBetween('visited_at', [$startDate, $endDate])->count();

        $perDay = Visit::select(DB::raw('DATE(visited_at) as date'), DB::raw('count(*) as total'))
            ->whereBetween('visited_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $perWeek = Visit::select(DB::raw('YEAR(visited_at) as year'), DB::raw('WEEK(visited_at) as week'), DB::raw('count(*) as total'))
            ->whereBetween('visited_at', [$startDate, $endDate])
            ->groupBy('year', 'week')
            ->orderBy('year')
            ->orderBy('week')
            ->get();

        $perMonth = Visit::select(DB::raw('YEAR(visited_at) as year'), DB::raw('MONTH(visited_at) as month'), DB::raw('count(*) as total'))
            ->whereBetween('visited_at', [$startDate, $endDate])
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        $perYear = Visit::select(DB::raw('YEAR(visited_at) as year'), DB::raw('count(*) as total'))
            ->whereBetween('visited_at', [$startDate, $endDate])
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        return view('admin.visits.index', compact('total', 'perDay', 'perWeek', 'perMonth', 'perYear', 'start', 'end'));
    }
}

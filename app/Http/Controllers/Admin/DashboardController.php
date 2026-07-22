<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Partner;
use App\Models\Program;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'news' => News::count(),
            'programs' => Program::count(),
            'partners' => Partner::count(),
            'testimonials' => Testimonial::count(),
        ];

        $recentNews = News::orderByDesc('created_at')->limit(5)->get();

        $visits = [
            'total' => Visit::count(),
            'today' => Visit::whereDate('visited_at', now()->toDateString())->count(),
            'week' => Visit::whereBetween('visited_at', [now()->subDays(7), now()])->count(),
            'month' => Visit::whereBetween('visited_at', [now()->subDays(30), now()])->count(),
        ];

        $newsStatus = [
            'published' => News::where('status', 'published')->count(),
            'draft' => News::where('status', 'draft')->count(),
            'scheduled' => News::where('status', 'scheduled')->count(),
        ];

        $topArticles = News::withCount('views')->orderByDesc('views_count')->limit(5)->get();

        $visitChart = Visit::select(DB::raw('DATE(visited_at) as date'), DB::raw('count(*) as total'))
            ->whereBetween('visited_at', [now()->subDays(30), now()])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('admin.dashboard', compact('stats', 'recentNews', 'visits', 'newsStatus', 'topArticles', 'visitChart'));
    }
}

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

        return view('admin.dashboard', compact('stats', 'recentNews', 'visits'));
    }
}

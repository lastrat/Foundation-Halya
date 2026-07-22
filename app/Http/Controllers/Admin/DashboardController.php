<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Partner;
use App\Models\Program;
use App\Models\Slider;
use App\Models\Testimonial;
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

        return view('admin.dashboard', compact('stats', 'recentNews'));
    }
}

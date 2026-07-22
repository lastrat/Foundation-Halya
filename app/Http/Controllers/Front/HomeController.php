<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Program;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('is_active', true)->orderBy('order')->get();
        $programs = Program::where('is_active', true)->orderBy('order')->limit(3)->get();
        $news = News::where('status', 'published')->orderByDesc('published_at')->limit(3)->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('order')->get();
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        return view('front.home', compact('sliders', 'programs', 'news', 'testimonials', 'settings'));
    }
}

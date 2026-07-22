<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Setting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('front.pages.about', compact('settings'));
    }

    public function contact()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('front.pages.contact', compact('settings'));
    }

    public function partners()
    {
        $partners = Partner::where('is_active', true)->orderBy('order')->get();
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('front.pages.partners', compact('partners', 'settings'));
    }
}

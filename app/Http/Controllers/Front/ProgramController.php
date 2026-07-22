<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Program;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::where('is_active', true)->orderBy('order')->get();
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('front.programs.index', compact('programs', 'settings'));
    }

    public function show($slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('front.programs.show', compact('program', 'settings'));
    }
}

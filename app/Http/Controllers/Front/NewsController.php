<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Setting;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::where('status', 'published')->orderByDesc('published_at');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $news = $query->paginate(6);
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('front.news.index', compact('news', 'settings'));
    }

    public function show($slug)
    {
        $article = News::where('slug', $slug)->where('status', 'published')->firstOrFail();
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        $recentArticles = News::where('status', 'published')->where('id', '!=', $article->id)->orderByDesc('published_at')->limit(3)->get();

        $sessionKey = 'article_viewed_' . $article->id;

        if (!session()->has($sessionKey)) {
            \App\Models\ArticleView::create([
                'news_id' => $article->id,
                'ip_address' => request()->ip(),
                'viewed_at' => now(),
            ]);

            session()->put($sessionKey, true);
        }

        return view('front.news.show', compact('article', 'settings', 'recentArticles'));
    }
}

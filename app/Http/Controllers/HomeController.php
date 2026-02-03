<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\Client;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::has('projects')->with(['projects' => function ($q) {
            $q->orderBy('sort_order')->take(4);
        }])->get();

        $clients = Client::all();
        $settings = Setting::pluck('value_' . app()->getLocale(), 'key')->toArray();

        return view('index', compact('categories', 'clients', 'settings'));
    }

    public function category($locale, $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $projects = $category->projects()->orderBy('sort_order')->paginate(12);
        $settings = Setting::pluck('value_' . app()->getLocale(), 'key')->toArray();

        return view('category', compact('category', 'projects', 'settings'));
    }

    public function switchLanguage($lang)
    {
        if (in_array($lang, ['en', 'ar'])) {
            session(['locale' => $lang]);
        }
        return redirect()->back();
    }
}

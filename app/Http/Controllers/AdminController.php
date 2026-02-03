<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\Client;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Categories
    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
        ]);

        Category::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'slug' => Str::slug($request->name_en),
        ]);

        return back()->with('success', 'Category created.');
    }

    // Projects
    public function projects()
    {
        $projects = Project::with('category')->get();
        $categories = Category::all();
        return view('admin.projects.index', compact('projects', 'categories'));
    }

    public function storeProject(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title_en' => 'required',
            'title_ar' => 'required',
        ]);

        $project = new Project($request->all());

        if ($request->hasFile('thumbnail')) {
            $project->thumbnail = $request->file('thumbnail')->store('projects', 'public');
        }

        $project->save();

        return back()->with('success', 'Project created.');

        // dd($request->all());
    }

    public function editProject($id)
    {
        $project = Project::findOrFail($id);
        $categories = Category::all();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function updateProject(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'title_en' => 'required',
            'title_ar' => 'required',
        ]);

        $project = Project::findOrFail($id);
        $project->fill($request->all());

        if ($request->hasFile('thumbnail')) {
            $project->thumbnail = $request->file('thumbnail')->store('projects', 'public');
        }

        $project->save();

        return redirect()->route('admin.projects')->with('success', 'Project updated.');
    }

    public function deleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        return back()->with('success', 'Category deleted.');
    }

    public function deleteProject($id)
    {
        Project::findOrFail($id)->delete();
        return back()->with('success', 'Project deleted.');
    }

    // Settings
    public function settings()
    {
        $settings = Setting::all();
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        foreach ($request->settings as $key => $values) {
            Setting::where('key', $key)->update([
                'value_en' => $values['en'] ?? null,
                'value_ar' => $values['ar'] ?? null,
            ]);
        }
        return back()->with('success', 'Settings updated.');
    }

    // Clients/Partners
    public function clients()
    {
        $clients = Client::orderBy('created_at', 'desc')->get();
        return view('admin.clients.index', compact('clients'));
    }

    public function storeClient(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $logoPath = $request->file('logo')->store('clients', 'public');

        Client::create([
            'name' => $request->name,
            'logo' => '/storage/' . $logoPath,
        ]);

        return back()->with('success', 'Partner added successfully.');
    }

    public function deleteClient($id)
    {
        $client = Client::findOrFail($id);

        // Delete logo file if exists
        $logoPath = str_replace('/storage/', '', $client->logo);
        if (Storage::disk('public')->exists($logoPath)) {
            Storage::disk('public')->delete($logoPath);
        }

        $client->delete();
        return back()->with('success', 'Partner deleted successfully.');
    }
}

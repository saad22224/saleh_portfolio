@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-bold mb-8">Dashboard</h2>
<div class="grid grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-gray-500 font-bold uppercase text-xs mb-2">Categories</h3>
        <p class="text-3xl font-bold">{{ \App\Models\Category::count() }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-gray-500 font-bold uppercase text-xs mb-2">Projects</h3>
        <p class="text-3xl font-bold">{{ \App\Models\Project::count() }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-gray-500 font-bold uppercase text-xs mb-2">Clients</h3>
        <p class="text-3xl font-bold">{{ \App\Models\Client::count() }}</p>
    </div>
</div>
@endsection
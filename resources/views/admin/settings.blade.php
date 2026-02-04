@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-bold mb-8">Settings (Bio & Info)</h2>

@if(session('success'))
<div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
    {{ session('success') }}
</div>
@endif

<div class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('admin.settings') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @foreach($settings as $setting)
        <div class="mb-6 pb-6 border-b last:border-0">
            <h3 class="font-bold text-gray-700 mb-4 uppercase text-sm">{{ str_replace('_', ' ', $setting->key) }}</h3>
            
            @if($setting->type === 'image')
            {{-- Image Upload Field --}}
            <div class="space-y-4">
                @if($setting->value_en)
                <div class="mb-4">
                    <p class="text-sm text-gray-500 mb-2">Current Image:</p>
                    <img src="{{ asset('storage/' . $setting->value_en) }}" 
                         alt="Hero Image" 
                         class="w-64 h-auto rounded-lg shadow-md border">
                </div>
                @endif
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        {{ $setting->value_en ? 'Change Image' : 'Upload Image' }}
                    </label>
                    <input type="file" 
                           name="hero_image" 
                           accept="image/*"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <p class="mt-2 text-xs text-gray-400">Recommended: 800x1000 pixels (4:5 aspect ratio)</p>
                </div>
            </div>
            @else
            {{-- Text Fields --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Value (English)</label>
                    <textarea name="settings[{{ $setting->key }}][en]" class="w-full border p-2 rounded h-24">{{ $setting->value_en }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Value (Arabic)</label>
                    <textarea name="settings[{{ $setting->key }}][ar]" class="w-full border p-2 rounded h-24">{{ $setting->value_ar }}</textarea>
                </div>
            </div>
            @endif
        </div>
        @endforeach
        <button class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold shadow-lg hover:bg-blue-700 transition">Save All Settings</button>
    </form>
</div>
@endsection
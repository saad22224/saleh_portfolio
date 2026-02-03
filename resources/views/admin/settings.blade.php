@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-bold mb-8">Settings (Bio & Info)</h2>

<div class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('admin.settings') }}" method="POST">
        @csrf
        @foreach($settings as $setting)
        <div class="mb-6 pb-6 border-b last:border-0">
            <h3 class="font-bold text-gray-700 mb-4 uppercase text-sm">{{ str_replace('_', ' ', $setting->key) }}</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label>Value (English)</label>
                    <textarea name="settings[{{ $setting->key }}][en]" class="w-full border p-2 rounded h-24">{{ $setting->value_en }}</textarea>
                </div>
                <div>
                    <label>Value (Arabic)</label>
                    <textarea name="settings[{{ $setting->key }}][ar]" class="w-full border p-2 rounded h-24">{{ $setting->value_ar }}</textarea>
                </div>
            </div>
        </div>
        @endforeach
        <button class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold shadow-lg hover:bg-blue-700 transition">Save All Settings</button>
    </form>
</div>
@endsection
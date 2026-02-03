@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-bold mb-8">Categories</h2>

<div class="bg-white p-6 rounded-lg shadow mb-8">
    <h3 class="text-xl font-bold mb-4">Add New Category</h3>
    <form action="{{ route('admin.categories') }}" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label>Name (English)</label>
                <input type="text" name="name_en" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label>Name (Arabic)</label>
                <input type="text" name="name_ar" class="w-full border p-2 rounded" required>
            </div>
        </div>
        <button class="mt-4 bg-blue-600 text-white px-6 py-2 rounded">Save</button>
    </form>
</div>

<div class="bg-white p-6 rounded-lg shadow">
    <table class="w-full">
        <thead>
            <tr class="border-b">
                <th class="text-left p-2">English Name</th>
                <th class="text-left p-2">Arabic Name</th>
                <th class="text-left p-2">Slug</th>
                <th class="text-left p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr class="border-b">
                <td class="p-2">{{ $category->name_en }}</td>
                <td class="p-2">{{ $category->name_ar }}</td>
                <td class="p-2">{{ $category->slug }}</td>
                <td class="p-2">
                    <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 hover:text-red-700">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-bold mb-8">Projects</h2>

<div class="bg-white p-6 rounded-lg shadow mb-8">
    <h3 class="text-xl font-bold mb-4">Add New Project</h3>
    <form action="{{ route('admin.projects') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category_id" id="category_select" class="w-full border p-2 rounded" required>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" data-name="{{ strtolower($cat->name_en) }}">{{ $cat->name_en }} / {{ $cat->name_ar }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Title (English)</label>
                <input type="text" name="title_en" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Title (Arabic)</label>
                <input type="text" name="title_ar" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Thumbnail</label>
                <input type="file" name="thumbnail" class="w-full border p-2 rounded">
            </div>
            <div id="video_url_container">
                <label class="block text-sm font-medium text-gray-700">Video URL</label>
                <input type="text" name="video_url" class="w-full border p-2 rounded" placeholder="https://...">
            </div>
            <div id="lens_link_container">
                <label class="block text-sm font-medium text-gray-700">Lens Link</label>
                <input type="text" name="lens_link" class="w-full border p-2 rounded" placeholder="https://...">
            </div>
        </div>
        <button class="mt-4 bg-blue-600 text-white px-6 py-2 rounded">Save Project</button>
    </form>
</div>

<div class="bg-white p-6 rounded-lg shadow">
    <table class="w-full">
        <thead>
            <tr class="border-b">
                <th class="text-left p-2">Title</th>
                <th class="text-left p-2">Category</th>
                <th class="text-left p-2">Links</th>
                <th class="text-left p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr class="border-b">
                <td class="p-2">{{ $project->title_en }}</td>
                <td class="p-2">{{ $project->category->name_en ?? 'N/A' }}</td>
                <td class="p-2">
                    @if($project->video_url)
                    <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">Video</span>
                    @endif
                    @if($project->lens_link)
                    <span class="text-xs bg-purple-100 text-purple-800 px-2 py-1 rounded">Lens</span>
                    @endif
                </td>
                <td class="p-2 flex space-x-2 rtl:space-x-reverse">
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="text-blue-500 hover:text-blue-700">
                        <i class="fa-solid fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.projects.delete', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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

<script>
    const categorySelect = document.getElementById('category_select');
    const videoContainer = document.getElementById('video_url_container');
    const lensContainer = document.getElementById('lens_link_container');

    function updateFields() {
        const selectedOption = categorySelect.options[categorySelect.selectedIndex];
        const categoryName = selectedOption.getAttribute('data-name');

        if (categoryName.includes('lens') || categoryName.includes('عدسات')) {
            videoContainer.classList.add('opacity-50');
            lensContainer.classList.remove('opacity-50');
        } else {
            videoContainer.classList.remove('opacity-50');
            lensContainer.classList.add('opacity-50');
        }
    }

    categorySelect.addEventListener('change', updateFields);
    updateFields();
</script>
@endsection
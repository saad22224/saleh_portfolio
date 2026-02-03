@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h2 class="text-3xl font-bold">Edit Project</h2>
    <a href="{{ route('admin.projects') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back to List</a>
</div>

<div class="bg-white p-6 rounded-lg shadow mb-8">
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category_id" id="category_select" class="w-full border p-2 rounded" required>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" data-name="{{ strtolower($cat->name_en) }}" {{ $project->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name_en }} / {{ $cat->name_ar }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Title (English)</label>
                <input type="text" name="title_en" value="{{ $project->title_en }}" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Title (Arabic)</label>
                <input type="text" name="title_ar" value="{{ $project->title_ar }}" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Thumbnail</label>
                @if($project->thumbnail)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $project->thumbnail) }}" class="h-20 w-auto rounded border">
                </div>
                @endif
                <input type="file" name="thumbnail" class="w-full border p-2 rounded">
            </div>
            <div id="video_url_container">
                <label class="block text-sm font-medium text-gray-700">Video URL</label>
                <input type="text" name="video_url" value="{{ $project->video_url }}" class="w-full border p-2 rounded" placeholder="https://...">
            </div>
            <div id="lens_link_container">
                <label class="block text-sm font-medium text-gray-700">Lens Link</label>
                <input type="text" name="lens_link" value="{{ $project->lens_link }}" class="w-full border p-2 rounded" placeholder="https://...">
            </div>
        </div>
        <button class="mt-4 bg-blue-600 text-white px-6 py-2 rounded">Update Project</button>
    </form>
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
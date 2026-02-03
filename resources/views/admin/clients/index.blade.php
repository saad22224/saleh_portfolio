@extends('layouts.admin')

@section('title', 'Partners')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Add New Partner Form -->
    <div class="lg:col-span-1">
        <div class="bg-white p-8 rounded-2xl shadow-lg">
            <h3 class="text-xl font-bold mb-6 flex items-center">
                <i class="fa-solid fa-plus-circle text-orange-500 mr-3"></i>
                Add New Partner
            </h3>
            <form action="{{ route('admin.clients') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-gray-600 mb-2">Partner Name</label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-3 border-2 border-gray-100 rounded-xl focus:border-orange-500 focus:outline-none transition"
                        placeholder="e.g., Company Name">
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-600 mb-2">Logo Image</label>
                    <div class="relative">
                        <input type="file" name="logo" required accept="image/*" id="logoInput"
                            class="w-full px-4 py-3 border-2 border-gray-100 rounded-xl focus:border-orange-500 focus:outline-none transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-orange-500 file:text-white file:font-bold file:cursor-pointer">
                    </div>
                    <p class="text-gray-400 text-xs mt-2">Accepted: JPG, PNG, GIF, SVG, WebP (Max 2MB)</p>
                    @error('logo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <!-- Preview -->
                    <div id="logoPreview" class="mt-4 hidden">
                        <img id="previewImage" src="" alt="Preview" class="h-16 w-auto object-contain rounded-lg border-2 border-gray-100">
                    </div>
                </div>
                <button type="submit"
                    class="w-full bg-orange-500 text-white font-bold py-4 px-6 rounded-xl hover:bg-orange-600 transition flex items-center justify-center">
                    <i class="fa-solid fa-upload mr-2"></i>
                    Add Partner
                </button>
            </form>
        </div>
    </div>

    <!-- Partners List -->
    <div class="lg:col-span-2">
        <div class="bg-white p-8 rounded-2xl shadow-lg">
            <h3 class="text-xl font-bold mb-6 flex items-center">
                <i class="fa-solid fa-handshake text-orange-500 mr-3"></i>
                Partners List
                <span class="ml-auto bg-gray-100 text-gray-600 text-sm font-bold px-3 py-1 rounded-full">{{ $clients->count() }} Partners</span>
            </h3>

            @if($clients->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($clients as $client)
                <div class="group relative bg-gray-50 rounded-2xl p-6 text-center hover:shadow-lg transition">
                    <div class="aspect-square flex items-center justify-center mb-4">
                        <img src="{{ $client->logo }}" alt="{{ $client->name }}" class="max-h-20 max-w-full object-contain">
                    </div>
                    <p class="font-bold text-gray-700 text-sm truncate">{{ $client->name }}</p>

                    <!-- Delete Button -->
                    <form action="{{ route('admin.clients.delete', $client->id) }}" method="POST"
                        class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition"
                        onsubmit="return confirm('Are you sure you want to delete this partner?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition shadow-lg">
                            <i class="fa-solid fa-trash text-xs"></i>
                        </button>
                    </form>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-16">
                <i class="fa-solid fa-handshake text-6xl text-gray-200 mb-6"></i>
                <p class="text-gray-400 font-bold">No partners added yet</p>
                <p class="text-gray-300 text-sm">Add your first partner using the form on the left</p>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
    // Logo Preview
    document.getElementById('logoInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
                document.getElementById('logoPreview').classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-50 flex">
    <!-- Sidebar -->
    <div class="w-72 bg-slate-900 min-h-screen text-white p-8">
        <h1 class="text-2xl font-black mb-12 tracking-tighter text-orange-500">SALEH<span class="text-white">.ADMIN</span></h1>

        <nav class="space-y-4">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center p-4 rounded-xl hover:bg-white/5 transition {{ request()->routeIs('admin.dashboard') ? 'bg-orange-500 font-bold' : '' }}">
                <i class="fa-solid fa-chart-line mr-4"></i> Dashboard
            </a>
            <a href="{{ route('admin.categories') }}" class="flex items-center p-4 rounded-xl hover:bg-white/5 transition {{ request()->routeIs('admin.categories') ? 'bg-orange-500 font-bold' : '' }}">
                <i class="fa-solid fa-layer-group mr-4"></i> Categories
            </a>
            <a href="{{ route('admin.projects') }}" class="flex items-center p-4 rounded-xl hover:bg-white/5 transition {{ request()->routeIs('admin.projects') ? 'bg-orange-500 font-bold' : '' }}">
                <i class="fa-solid fa-briefcase mr-4"></i> Projects
            </a>
            <a href="{{ route('admin.settings') }}" class="flex items-center p-4 rounded-xl hover:bg-white/5 transition {{ request()->routeIs('admin.settings') ? 'bg-orange-500 font-bold' : '' }}">
                <i class="fa-solid fa-gear mr-4"></i> Settings
            </a>

            <div class="pt-10">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="w-full text-left flex items-center p-4 rounded-xl text-red-400 hover:bg-red-500/10 transition">
                        <i class="fa-solid fa-right-from-bracket mr-4"></i> Logout
                    </button>
                </form>
            </div>
        </nav>
    </div>

    <!-- Main -->
    <div class="flex-1 p-12">
        <header class="flex justify-between items-center mb-12">
            <h2 class="text-4xl font-black text-slate-900">@yield('title', 'Overview')</h2>
            <a href="{{ url('/') }}" target="_blank" class="bg-white border-2 border-gray-100 px-6 py-3 rounded-xl font-bold hover:border-orange-500 transition">
                View Website <i class="fa-solid fa-arrow-up-right-from-square ml-2"></i>
            </a>
        </header>

        @if(session('success'))
        <div class="bg-green-500 text-white p-6 rounded-2xl mb-8 shadow-lg flex items-center">
            <i class="fa-solid fa-check-circle mr-4 text-2xl"></i>
            <span class="font-bold">{{ session('success') }}</span>
        </div>
        @endif

        @yield('content')
    </div>
</body>

</html>
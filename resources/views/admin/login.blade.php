<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-900 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-md w-full bg-white rounded-[2rem] p-10 shadow-2xl">
        <h1 class="text-3xl font-black text-center mb-8">ADMIN <span class="text-orange-500">LOGIN</span></h1>

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="text-xs font-black uppercase tracking-widest text-gray-400 block mb-2">Email Address</label>
                <input type="email" name="email" class="w-full border-2 border-gray-100 p-4 rounded-xl focus:border-orange-500 outline-none transition" required>
            </div>
            <div>
                <label class="text-xs font-black uppercase tracking-widest text-gray-400 block mb-2">Password</label>
                <input type="password" name="password" class="w-full border-2 border-gray-100 p-4 rounded-xl focus:border-orange-500 outline-none transition" required>
            </div>

            @if($errors->any())
            <p class="text-red-500 text-sm font-bold">{{ $errors->first() }}</p>
            @endif

            <button class="w-full bg-slate-900 text-white py-5 rounded-xl font-black uppercase tracking-widest hover:bg-orange-500 transition-all duration-300">
                Sign In
            </button>
        </form>
    </div>
</body>

</html>
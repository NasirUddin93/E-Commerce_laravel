<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - @yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white h-screen shadow-md">
        <div class="p-6 font-bold text-xl border-b">Admin Panel</div>
        <nav class="mt-6">
            <a href="{{ route('admin.dashboard') }}" class="block py-2 px-6 hover:bg-gray-200">Dashboard</a>
            <a href="{{ route('products.index') }}" class="block py-2 px-6 hover:bg-gray-200">Products</a>
            <a href="#" class="block py-2 px-6 hover:bg-gray-200">Orders</a>
            <a href="#" class="block py-2 px-6 hover:bg-gray-200">Users</a>
            <form method="POST" action="{{ route('logout') }}" class="mt-6 px-6">
                @csrf
                <button type="submit" class="w-full text-left hover:bg-gray-200 py-2 px-2 rounded">Logout</button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        @yield('content')
    </div>

</body>
</html>

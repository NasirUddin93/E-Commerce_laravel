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
            <a href="{{ route('admin.dashboard') }}?tab=products" class="block py-2 px-6 hover:bg-gray-200 sidebar-tab-link" data-tab="products">Products</a>
            <a href="{{ route('admin.dashboard') }}?tab=orders" class="block py-2 px-6 hover:bg-gray-200 sidebar-tab-link" data-tab="orders">Orders</a>
            <a href="{{ route('admin.dashboard') }}?tab=users" class="block py-2 px-6 hover:bg-gray-200 sidebar-tab-link" data-tab="users">Users</a>
            <form method="POST" action="{{ route('logout') }}" class="mt-6 px-6" id="logout-form">
                @csrf
                <button type="button" id="logout-button" class="w-full text-left hover:bg-gray-200 py-2 px-2 rounded">Logout</button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const logoutButton = document.getElementById('logout-button');
            const logoutForm = document.getElementById('logout-form');

            if (logoutButton && logoutForm) {
                logoutButton.addEventListener('click', function (e) {
                    e.preventDefault(); // Prevent default form submission

                    Swal.fire({
                        title: 'Are you sure you want to log out?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, log me out!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            logoutForm.submit(); // Submit the form if confirmed
                        }
                    });
                });
            }
        });
    </script>

</body>
</html>

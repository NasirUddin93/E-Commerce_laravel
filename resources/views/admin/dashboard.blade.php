@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<style>
    .tab-button.active {
        border-bottom: 2px solid #3b82f6; /* blue-500 */
    }
</style>

<h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

<!-- Tabs -->
<div class="grid grid-cols-4 gap-6" id="tab-buttons">
    <div class="tab-button bg-white p-6 rounded shadow cursor-pointer active" data-tab="products">
        <h2 class="text-lg font-semibold">Products</h2>
        <p class="text-2xl mt-2">{{ \App\Models\Product::count() }}</p>
        <a href="#" class="text-blue-500 mt-2 inline-block">Manage</a>
    </div>
    <div class="tab-button bg-white p-6 rounded shadow cursor-pointer" data-tab="orders">
        <h2 class="text-lg font-semibold">Orders</h2>
        <p class="text-2xl mt-2">0</p>
        <a href="#" class="text-blue-500 mt-2 inline-block">Manage</a>
    </div>
    <div class="tab-button bg-white p-6 rounded shadow cursor-pointer" data-tab="users">
        <h2 class="text-lg font-semibold">Users</h2>
        <p class="text-2xl mt-2">{{ \App\Models\User::count() }}</p>
        <a href="#" class="text-blue-500 mt-2 inline-block">Manage</a>
    </div>
    <div class="tab-button bg-white p-6 rounded shadow cursor-pointer" data-tab="revenue">
        <h2 class="text-lg font-semibold">Revenue</h2>
        <p class="text-2xl mt-2">${{ number_format($revenue, 2) }}</p>
    </div>
</div>

<!-- Tab Content -->
<div class="mt-8" id="tab-content">
    <!-- Products Tab -->
    <div class="tab-pane" id="products-content">
        <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Products List</h2>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Add Product Button -->
            <div class="mb-4 text-right">
                <a href="{{ route('products.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Add Product
                </a>
            </div>

            <!-- Products Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">ID</th>
                            <th class="border p-2">Image</th>
                            <th class="border p-2">Name</th>
                            <th class="border p-2">Price</th>
                            <th class="border p-2">Stock</th>
                            <th class="border p-2">Category</th>
                            <th class="border p-2">Brand</th>
                            <th class="border p-2">Status</th>
                            <th class="border p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="border p-2 text-center">{{ $product->id }}</td>

                            <!-- Product Image -->
                            <td class="border p-2 text-center">
                                @if($product->main_image)
                                    <img src="{{ asset('storage/' . $product->main_image) }}"
                                         class="w-16 h-16 object-cover rounded mx-auto">
                                @else
                                    <span class="text-gray-400">No Image</span>
                                @endif
                            </td>

                            <td class="border p-2">{{ $product->name }}</td>
                            <td class="border p-2">${{ number_format($product->price, 2) }}</td>
                            <td class="border p-2 text-center">{{ $product->stock }}</td>
                            <td class="border p-2">{{ $product->category ?? 'N/A' }}</td>
                            <td class="border p-2">{{ $product->brand ?? 'N/A' }}</td>
                            <td class="border p-2 text-center">
                                @if($product->status)
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Active</span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Inactive</span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td class="border p-2 text-center space-x-2">
                                <a href="{{ route('products.show', $product->id) }}"
                                   class="text-blue-600 hover:underline">View</a>
                                <a href="{{ route('products.edit', $product->id) }}"
                                   class="text-yellow-600 hover:underline">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="delete-form inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                            class="text-red-600 hover:underline delete-btn">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="border p-4 text-center text-gray-500">
                                No products found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Orders Tab -->
    <div class="tab-pane hidden" id="orders-content">
        @include('admin.orders.index')
    </div>

    <!-- Users Tab -->
    <div class="tab-pane hidden" id="users-content">
        @include('admin.users.index')
    </div>

    <!-- Revenue Tab -->
    <div class="tab-pane hidden" id="revenue-content">
        <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Revenue Details</h2>

            <div class="grid grid-cols-3 gap-4 mb-6">
                <div class="bg-gray-100 p-4 rounded">
                    <h3 class="text-lg font-semibold">Total Orders</h3>
                    <p class="text-xl">{{ $totalOrders }}</p>
                </div>
                <div class="bg-gray-100 p-4 rounded">
                    <h3 class="text-lg font-semibold">Average Order Value (AOV)</h3>
                    <p class="text-xl">${{ number_format($aov, 2) }}</p>
                </div>
                <div class="bg-gray-100 p-4 rounded">
                    <h3 class="text-lg font-semibold">Completed Revenue</h3>
                    <p class="text-xl">${{ number_format($revenue, 2) }}</p>
                </div>
            </div>

            <h3 class="text-xl font-bold mb-4">Revenue by Status</h3>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">Status</th>
                            <th class="border p-2">Total Revenue</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($revenueByStatus as $status => $total)
                        <tr class="hover:bg-gray-50">
                            <td class="border p-2 capitalize">{{ $status }}</td>
                            <td class="border p-2">${{ number_format($total, 2) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="border p-4 text-center text-gray-500">
                                No revenue data by status.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const tabButtons = document.querySelectorAll(".tab-button");
    const tabPanes = document.querySelectorAll('.tab-pane');
    const sidebarTabLinks = document.querySelectorAll('.sidebar-tab-link');

    function activateTab(tabName) {
        // Deactivate all buttons and panes
        tabButtons.forEach(btn => btn.classList.remove('active'));
        tabPanes.forEach(pane => pane.classList.add('hidden'));

        // Activate the clicked button and corresponding pane
        const targetButton = document.querySelector(`.tab-button[data-tab="${tabName}"]`);
        const targetPane = document.getElementById(tabName + '-content');

        if (targetButton) {
            targetButton.classList.add('active');
        }
        if (targetPane) {
            targetPane.classList.remove('hidden');
        }
    }

    // Handle clicks on tab buttons
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const tab = button.dataset.tab;
            activateTab(tab);
        });
    });

    // Handle clicks on sidebar tab links
    sidebarTabLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent default link navigation
            const tab = link.dataset.tab;
            activateTab(tab);
            // Optionally update URL without reloading
            history.pushState(null, '', link.href);
        });
    });

    // Activate tab based on URL query parameter on page load
    const urlParams = new URLSearchParams(window.location.search);
    const initialTab = urlParams.get('tab');
    if (initialTab) {
        activateTab(initialTab);
    } else {
        // Set the first tab as active by default if no tab parameter
        if (tabButtons.length > 0) {
            tabButtons[0].classList.add('active');
            tabPanes[0].classList.remove('hidden');
        }
    }

    // Delete confirmation script
    const deleteForms = document.querySelectorAll(".delete-form");

    deleteForms.forEach(form => {
        const btn = form.querySelector(".delete-btn");

        btn.addEventListener("click", function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    // Success Message after delete
    @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "{{ session('success') }}",
            timer: 2000,
            showConfirmButton: false
        });
    @endif
});
</script>
@endsection

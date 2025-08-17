@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

<div class="grid grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold">Products</h2>
        <p class="text-2xl mt-2">{{ \App\Models\Product::count() }}</p>
        <a href="{{ route('products.index') }}" class="text-blue-500 mt-2 inline-block">Manage</a>
    </div>
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold">Orders</h2>
        <p class="text-2xl mt-2">0</p>
        <a href="#" class="text-blue-500 mt-2 inline-block">Manage</a>
    </div>
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold">Users</h2>
        <p class="text-2xl mt-2">{{ \App\Models\User::count() }}</p>
        <a href="#" class="text-blue-500 mt-2 inline-block">Manage</a>
    </div>
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold">Revenue</h2>
        <p class="text-2xl mt-2">$0</p>
    </div>
</div>
@endsection

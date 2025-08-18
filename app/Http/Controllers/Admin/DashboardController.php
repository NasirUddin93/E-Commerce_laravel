<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $revenue = Order::where('status', 'completed')->sum('total_price');
        $orders = Order::all();
        $users = User::all();

        $totalOrders = Order::count();
        $aov = $totalOrders > 0 ? Order::sum('total_price') / $totalOrders : 0;
        $revenueByStatus = Order::select('status', DB::raw('SUM(total_price) as total'))
                                ->groupBy('status')
                                ->pluck('total', 'status');

        return view('admin.dashboard', compact('products', 'revenue', 'orders', 'users', 'totalOrders', 'aov', 'revenueByStatus'));
    }
}

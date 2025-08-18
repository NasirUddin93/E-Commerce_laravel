<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Orders List</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Orders Table -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Order Number</th>
                    <th class="border p-2">User</th>
                    <th class="border p-2">Total Price</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Payment Method</th>
                    <th class="border p-2">Created At</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr class="hover:bg-gray-50">
                    <td class="border p-2 text-center">{{ $order->id }}</td>
                    <td class="border p-2">{{ $order->order_number }}</td>
                    <td class="border p-2">{{ $order->user_id }}</td>
                    <td class="border p-2">${{ number_format($order->total_price, 2) }}</td>
                    <td class="border p-2 text-center">
                        <span class="px-2 py-1 rounded text-xs capitalize {{ [
                            'pending' => 'bg-yellow-100 text-yellow-700',
                            'processing' => 'bg-blue-100 text-blue-700',
                            'shipped' => 'bg-indigo-100 text-indigo-700',
                            'delivered' => 'bg-green-100 text-green-700',
                            'cancelled' => 'bg-red-100 text-red-700',
                        ][$order->status] ?? 'bg-gray-100 text-gray-700' }}">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td class="border p-2">{{ $order->payment_method }}</td>
                    <td class="border p-2">{{ $order->created_at->format('Y-m-d H:i') }}</td>

                    <!-- Actions -->
                    <td class="border p-2 text-center space-x-2">
                        <a href="#" class="text-blue-600 hover:underline">View</a>
                        <a href="#" class="text-yellow-600 hover:underline">Edit</a>
                        <form action="#" method="POST" class="delete-form inline">
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
                    <td colspan="8" class="border p-4 text-center text-gray-500">
                        No orders found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

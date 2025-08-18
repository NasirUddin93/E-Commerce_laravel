<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = $this->getCartItems();
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    /**
     * Add a product to the cart.
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Log session ID before finding/creating cart item
        Log::info('CartController@add - Session ID: ' . Session::getId());

        $cartItem = $this->findCartItem($productId);

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
            Log::info('CartController@add - Updated existing cart item.');
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'session_id' => Auth::check() ? null : Session::getId(),
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
            Log::info('CartController@add - Created new cart item.');
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    /**
     * Update the quantity of a cart item.
     */
    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Ensure the cart item belongs to the current user or session
        if (!$this->isCartItemBelongsToUserOrSession($cartItem)) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    /**
     * Remove a cart item.
     */
    public function remove(CartItem $cartItem)
    {
        // Ensure the cart item belongs to the current user or session
        if (!$this->isCartItemBelongsToUserOrSession($cartItem)) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $cartItem->delete();

        return redirect()->back()->with('success', 'Product removed from cart.');
    }

    /**
     * Helper method to get cart items for the current user or session.
     */
    protected function getCartItems()
    {
        if (Auth::check()) {
            return CartItem::where('user_id', Auth::id())->with('product')->get();
        } else {
            return CartItem::where('session_id', Session::getId())->with('product')->get();
        }
    }

    /**
     * Helper method to find a cart item for a given product ID.
     */
    protected function findCartItem($productId)
    {
        if (Auth::check()) {
            return CartItem::where('user_id', Auth::id())
                           ->where('product_id', $productId)
                           ->first();
        } else {
            return CartItem::where('session_id', Session::getId())
                           ->where('product_id', $productId)
                           ->first();
        }
    }

    /**
     * Helper method to check if a cart item belongs to the current user or session.
     */
    protected function isCartItemBelongsToUserOrSession(CartItem $cartItem)
    {
        if (Auth::check()) {
            return $cartItem->user_id === Auth::id();
        } else {
            return $cartItem->session_id === Session::getId();
        }
    }
}

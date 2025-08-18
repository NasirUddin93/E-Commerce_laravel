<?php

namespace App\View\Composers;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class CartComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $cartItemCount = 0;
        $currentSessionId = Session::getId();

        Log::info('CartComposer@compose - Current Session ID: ' . $currentSessionId);

        if (Auth::check()) {
            $cartItemCount = CartItem::where('user_id', Auth::id())->sum('quantity');
            Log::info('CartComposer@compose - User authenticated. Cart count: ' . $cartItemCount);
        } else {
            $cartItemCount = CartItem::where('session_id', $currentSessionId)->sum('quantity');
            Log::info('CartComposer@compose - Guest user. Cart count: ' . $cartItemCount);
        }

        $view->with('cartItemCount', $cartItemCount);
    }
}

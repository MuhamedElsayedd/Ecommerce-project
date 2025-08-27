<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{

    public function index()
    {
        try {
            $cart = Cart::with('items.product')
                ->where('user_id', Auth::id())
                ->first();

            if (!$cart) {
                return successResponse(
                    data: ['cart' => null],
                    message: 'Cart is empty',
                    statusCode: Response::HTTP_OK
                );
            }

            return successResponse(
                data: ['cart' => $cart],
                message: 'Cart retrieved successfully',
                statusCode: Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return errorResponse(
                message: 'An error occurred while fetching cart.',
                errors: [$e->getMessage()],
                statusCode: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'quantity'   => 'required|integer|min:1',
            ]);

            $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

            $cartItem = $cart->items()->where('product_id', $request->product_id)->first();

            if ($cartItem) {
                $cartItem->update([
                    'quantity' => $cartItem->quantity + $request->quantity
                ]);
            } else {
                $cartItem = $cart->items()->create([
                    'product_id' => $request->product_id,
                    'quantity'   => $request->quantity
                ]);
            }

            return successResponse(
                data: ['cart_item' => $cartItem],
                message: 'Product added to cart successfully',
                statusCode: Response::HTTP_CREATED
            );
        } catch (\Exception $e) {
            return errorResponse(
                message: 'An error occurred while adding product to cart.',
                errors: [$e->getMessage()],
                statusCode: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'quantity' => 'required|integer|min:1',
            ]);

            $cartItem = CartItem::whereHas('cart', function ($q) {
                $q->where('user_id', Auth::id());
            })->findOrFail($id);

            $cartItem->update(['quantity' => $request->quantity]);

            return successResponse(
                data: ['cart_item' => $cartItem],
                message: 'Cart item updated successfully',
                statusCode: Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return errorResponse(
                message: 'An error occurred while updating cart item.',
                errors: [$e->getMessage()],
                statusCode: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }


    public function destroy($id)
    {
        try {
            $cartItem = CartItem::whereHas('cart', function ($q) {
                $q->where('user_id', Auth::id());
            })->findOrFail($id);

            $cartItem->delete();

            return successResponse(
                data: [],
                message: 'Cart item removed successfully',
                statusCode: Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return errorResponse(
                message: 'An error occurred while removing cart item.',
                errors: [$e->getMessage()],
                statusCode: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}

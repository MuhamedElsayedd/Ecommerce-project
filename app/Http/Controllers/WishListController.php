<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::with('product')->where('user_id', auth()->id())->get();

        return response()->json([
            'success' => true,
            'message' => 'Wishlist retrieved successfully',
            'data' => $wishlist
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $wishlist = Wishlist::firstOrCreate([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product added to wishlist',
            'data' => $wishlist
        ], Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::where('user_id', auth()->id())->where('id', $id)->first();

        if (!$wishlist) {
            return response()->json([
                'success' => false,
                'message' => 'Item not found in wishlist',
                'data' => null
            ], Response::HTTP_NOT_FOUND);
        }

        $wishlist->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product removed from wishlist',
            'data' => null
        ], Response::HTTP_OK);
    }
}

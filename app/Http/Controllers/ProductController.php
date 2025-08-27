<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $products = Product::latest()->paginate(10);
            return successResponse(
                data: ['products' => $products],
                message: 'Products retrieved successfully',
                statusCode: Response::HTTP_OK
            );
        } catch (\Exception $e) {

            return errorResponse(
                message: 'An error occurred while fetching products.',
                errors: [$e->getMessage()],
                statusCode: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $product = Product::create($request->validated());

            return successResponse(
                data: ['product' => $product],
                message: 'Product created successfully',
                statusCode: Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return errorResponse(
                message: 'Storing Product Failed.',
                errors: [$e->getMessage()],
                statusCode: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            $product = Product::find($id);

            return response()->json([
                'status'  => 'success',
                'message' => 'Product retirved successfully.',
                'data'    => $product
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return errorResponse(
                message: 'An error occur while fetching the product.',
                errors: [$e->getMessage()],
                statusCode: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        //
        try {
            $product = Product::find($id);

            if (!$product) {
                return errorResponse(
                    message: 'Product not found.',
                    statusCode: Response::HTTP_NOT_FOUND
                );
            }

            $product = Product::update($request->validated());

            return response()->json([
                'status'  => 'success',
                'message' => 'Product updated successfully.',
                'data'    => $product
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return errorResponse(
                message: 'An error occurred while updating the product.',
                errors: [$e->getMessage()],
                statusCode: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                return errorResponse(
                    message: 'Product not found.',
                    statusCode: Response::HTTP_NOT_FOUND
                );
            }

            $product->delete();

            return response()->json([
                'status'  => 'success',
                'message' => 'Product deleted successfully.',
                'data'    => null
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return errorResponse(
                message: 'An error occurred while deleting the product.',
                errors: [$e->getMessage()],
                statusCode: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}

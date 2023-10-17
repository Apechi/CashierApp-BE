<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $product = Product::all();

            $json = response()->json(
                [
                    'status' => 200,
                    'data' => $product
                ]
            );

            return $json;
        } catch (Exception $th) {

            $json = response()->json(
                [
                    'status' => 500,
                    'error' => $th->getMessage()
                ],
                500
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $validate = $request->validated();

            $product = Product::create($validate);

            return response()->json([
                'status' => 200,
                'data' => $product
            ]);
        } catch (Exception $th) {
            $json = response()->json(
                [
                    'status' => 500,
                    'error' => $th->getMessage()
                ],
                500
            );

            return $json;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $validate = $request->validated();

            $product::update($validate);

            return response()->json([
                'status' => 200,
                'message' => 'berhasil di edit',
                'data' => $product
            ]);
        } catch (Exception $th) {
            $json = response()->json(
                [
                    'status' => 500,
                    'error' => $th->getMessage()
                ],
                500
            );

            return $json;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return response()->json([
                "status" => 200,
                "message" => "{$product->name} Telah di hapus"
            ]);
        } catch (Exception $th) {
            $json = response()->json(
                [
                    'status' => 500,
                    'error' => $th->getMessage()
                ],
                500
            );

            return $json;
        }
    }
}

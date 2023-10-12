<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $category = Category::all();

            $json = response()->json(
                [
                    'status' => 200,
                    'data' => $category
                ]
            );

            return $json;
        } catch (\Throwable $th) {

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
    public function store(StoreCategoryRequest $request)
    {
        try {
            $validate = $request->validated();

            $category = Category::create($validate);

            return response()->json([
                'status' => 200,
                'data' => $category
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {

            $validated = $request->validated();
            $category->update($validated);

            return response()->json(
                [
                    'status' => 200,
                    'data' => $category,
                ]
            );
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
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return response()->json([
                "status" => 200,
                "message" => "{$category->name} Telah di hapus"
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

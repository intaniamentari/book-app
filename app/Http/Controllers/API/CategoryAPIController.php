<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = Category::all();
            return response()->json([
                'data' => $categories,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error occurred while fetching categories.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $category = Category::where('id', $id)->first();
            return response()->json([
                'data' => $category,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error occurred while fetching category.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'category' => 'required|unique:categories,category'
            ]);

            $category = Category::create($request->all());

            return response()->json([
                'message' => 'Category created successfully',
                'data' => $category,
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error occurred while add new category.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'category' => 'required|unique:categories,category,'. $id,
            ]);

            $category = Category::where('id', $id)->update($request->all());

            return response()->json([
                'message' => 'Category updated successfully',
                'data' => $category,
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error occurred while updating category.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Category::where('id', $id)->delete();

            return response()->json([
                'message' => 'Category Deleted successfully',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error occurred while deleting category.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}

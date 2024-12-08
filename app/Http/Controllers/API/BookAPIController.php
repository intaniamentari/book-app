<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Writer;
use Illuminate\Http\Request;

class BookAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $books = Book::with(['category', 'writer'])->get();

            return response()->json([
                'data' => $books,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error occurred while fetching books.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $book = Book::where('id', $id)->with(['category', 'writer'])->get();

            return response()->json([
                'data' => $book,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error occurred while fetching book.',
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
                'title' => 'required',
                'category_id' => 'required',
                'writer_id' => 'required',
                'year' => 'required|integer',
            ]);

            $book = Book::create($request->all());
            $book->load(['category', 'writer']);

            return response()->json([
                'message' => 'Book created successfully',
                'data' => $book,
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error occurred while add new book.',
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
            $book = Book::where('id', $id)->first();

            $request->validate([
                'title' => 'required',
                'category_id' => 'required',
                'writer_id' => 'required',
                'year' => 'required|integer',
            ]);

            $data = $book->update($request->all());

            return response()->json([
                'message' => 'Book updated successfully',
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error occurred while updating book.',
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
            Book::where('id', $id)->delete();

            return response()->json([
                'message' => 'Book Deleted successfully',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error occurred while deleting book.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}

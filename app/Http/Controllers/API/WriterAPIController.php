<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Writer;
use Illuminate\Http\Request;

class WriterAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $books = Writer::all();

            return response()->json([
                'data' => $books,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error occurred while fetching writers.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $writer = Writer::where('id', $id)->first();

            return response()->json([
                'data' => $writer,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error occurred while fetching writer.',
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
                'name' => 'required|unique:writers,name'
            ]);

            $writer = Writer::create($request->all());

            return response()->json([
                'message' => 'Writer created successfully',
                'data' => $writer,
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error occurred while add new writer.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Writer $writer)
    {
        return view('writer.form', compact('writer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|unique:writers,name,'. $id,
            ]);

            $writer = Writer::where('id', $id)->update($request->all());

            return response()->json([
                'message' => 'Writer updated successfully',
                'data' => $writer,
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error occurred while updating writer.',
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
            Writer::where('id', $id)->delete();

            return response()->json([
                'message' => 'Writer Deleted successfully',
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error occurred while deleting writer.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}

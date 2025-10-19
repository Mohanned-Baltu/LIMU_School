<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fees = Fee::all();
        return response()->json(['data' => $fees]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'schoolId' => ['required', 'exists:schools,id'],
            'level' => ['required', 'exists:levels,id'],
            'price' => ['required', 'numeric'],
        ]);

        Fee::create($input);

        return response()->json([
            'message' => 'Fee added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fee = Fee::findOrFail($id);
        return response()->json(['data' => $fee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'schoolId' => ['required', 'exists:schools,id'],
            'level' => ['required', 'exists:levels,id'],
            'price' => ['required', 'numeric'],
        ]);

        $fee = Fee::findOrFail($id);
        $fee->update($validatedData);

        return response()->json([
            'message' => 'Fee is updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fee = Fee::findOrFail($id);
        $fee->delete();

        return response()->json(['message' => 'Fee is deleted successfully']);
    }
}

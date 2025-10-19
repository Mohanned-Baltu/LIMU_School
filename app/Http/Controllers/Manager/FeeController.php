<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Http\Requests\feesReq;

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
    public function store(feesReq $request)
    {
        Fee::create($request->validated());

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
    public function update(feesReq $request, string $id)
    {
        $fee = Fee::findOrFail($id);
        $fee->update($request->validated());

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

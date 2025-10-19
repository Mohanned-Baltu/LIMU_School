<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class levelcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades=Level::all();
        return response()->json(['data'=>$grades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $input = $request->validate([
            'level' => ['required']
        ]);
        Level::create($input);
        return response()->json([
            'message' => 'Grade added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $grade=Level::findOrFail($id);
        return response()->json(['data'=>$grade]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $update = $request->validate([
            'level' => ['required']
        ]);
        $grade=Level::findOrFail($id);
        $grade->update($update);
        return response()->json([
            'message' => 'Grade is updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $grade=Level::findorFail(id: $id); 
        $grade->delete();
        return response()->json(data: ['message'=>'Grade is deleted successfully']);
    }
}

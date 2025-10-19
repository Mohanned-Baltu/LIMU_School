<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Http\Requests\schoolReq;

class schoolcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $school = School::all();
        return response()->json(['data'=>$school]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(schoolReq $request)
    {
        School::create($request->validated());
        return response()->json([
            'message' => 'School created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $school=School::findOrFail($id);
        return response()->json(['data'=>$school]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(schoolReq $request, string $id)
    {
        $school=School::findOrFail($id);
        $school->update($request->validated());
        return response()->json([
            'message' => 'School is updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $school=School::findorFail(id: $id); 
        $school->delete();
        return response()->json(data: ['message'=>'School is deleted successfully']);
    }
}

<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Http\Requests\teacherReq;

class teachercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher=Teacher::all();
        return response()->json(['data'=>$teacher]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(teacherReq $request)
    {
        Teacher::create($request->validated());
        return response()->json([
            'message' => 'Teacher created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher=Teacher::findOrFail($id);
        return response()->json(['data'=>$teacher]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(teacherReq $request, string $id)
    {
        $teacher=Teacher::findOrFail($id);
        $teacher->update($request->validated());
        return response()->json([
            'message' => 'Teacher is updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher=Teacher::findorFail(id: $id); $teacher->delete();
        return response()->json(data: ['message'=>'Teacher is deleted successfully']);
    }
}

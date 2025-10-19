<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Http\Requests\managerReq;

class managercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manager = Manager::all();
        return response()->json(['data'=>$manager]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(managerReq $request)
    {
        Manager::create($request->validated());
        return response()->json([
            'message' => 'Manager created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $manager=Manager::findOrFail($id);
        return response()->json(['data'=>$manager]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(managerReq $request, string $id)
    {
        $manager=Manager::findOrFail($id);
        $manager->update($request->validated());
        return response()->json([
            'message' => 'Manager is updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $manager=Manager::findorFail(id: $id); $manager->delete();
        return response()->json(data: ['message'=>'manager is deleted successfully']);
    }
}

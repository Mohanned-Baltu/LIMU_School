<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => ['required'],
            'email' => ['required','unique:managers,email'],
            'phoneNumber' =>['required'],
            'password'=>['required','password'],
            'schoolId'=>['required','exists:schools,id']
        ]);
        Manager::create($input);
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
    public function update(Request $request, string $id)
    {
        $update = $request->validate([
            'name' => ['required'],
            'email' => ['required','unique:managers,email'],
            'phoneNumber' =>['required'],
            'password'=>['required','string'],
            'schoolId'=>['required','exists:schools,id']
        ]);
        $manager=Manager::findOrFail($id);
        $manager->update($update);
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

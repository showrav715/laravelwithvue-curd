<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Service::all();
        return response()->json([
            'message' => 'Data retrieved successfully',
            'status' => 200,
            'data' => $datas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // api validation
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:services,slug',
            'details' => 'required'
        ]);

        // create data
        Service::create($request->all());
        return response()->json([
            'message' => 'Data added successfully',
            'status' => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Service::find($id);
        return response()->json([
            'message' => 'Data retrieved successfully',
            'status' => 200,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // api validation
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:services,slug,'.$id,
            'details' => 'required'
        ]);

        // update data
        Service::find($id)->update($request->all());
        return response()->json([
            'message' => 'Data updated successfully',
            'status' => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete data
        Service::find($id)->delete();
        return response()->json([
            'message' => 'Data deleted successfully',
            'status' => 200,
        ]);
    }
}

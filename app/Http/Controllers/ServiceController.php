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
        $datas = Service::get();
  
        if($datas->isEmpty()){
            return response()->json([
                'message' => 'No data found',
                'status' => 404,
            ]);
        }
        foreach($datas as $data){
            $newData[] = [
                'id' => $data->id,
                'title' => $data->title,
                'slug' => $data->slug,
                'details' => $data->details,
                'image' => asset('images/services/'.$data->image),
                'created_at' => $data->created_at,
                'updated_at' => $data->updated_at
            ];
            
        }
        
        return response()->json([
            'message' => 'Data retrieved successfully',
            'status' => 200,
            'data' => $newData
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
            'details' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $input = $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension(); // get image extension
            $destinationPath = public_path('/images/services'); // public path folder dir
            $image->move($destinationPath, $name); // move image to destination folder
            $input['image'] = $name;
        }

       
        // create data
        Service::create($input);
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
        $data->image = asset('images/services/'.$data->image);

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
            'details' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        $data = Service::find($id);
        $input = $request->all();
        if($request->hasFile('image')){
            // delete old image
            @unlink(public_path('images/services/'.$data->image));
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension(); // get image extension
            $destinationPath = public_path('/images/services'); // public path folder dir
            $image->move($destinationPath, $name); // move image to destination folder
            $input['image'] = $name;
        }

        // update data
        $data->update($input);
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

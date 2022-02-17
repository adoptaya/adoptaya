<?php

namespace App\Http\Controllers\API;

use App\Models\Pet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;

class PetController extends Controller
{

    public function index()
    {

        $pets = Pet::all();

        return response()->json([
                'status'=>200,
                'pets'=>$pets,
        ]);

        
        // return response()->json($pets, 200);

    }

    /*public function editpet($id){

        $pet = Pet::find($id);
       if($pet){
        return response()->json([
            'status'=>200,
            'pet'=>$pet,
    ]);
       }
       else{
        return response()->json([
            'status'=>404,
            'message'=>'El Producto No Fue Encontrado',
    ]);
       }

    }*/

    public function store(Request $request)
    {
        $pet = Pet::create($request->all());
        return $pet;  
    }

    public function add(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'species' => 'required|max:50',
            'status' => 'required|max:50',
            'location' => 'required|max:50',
            'description' => 'required|max:500',
            'descriptionabridged' => 'required|max:100',
            'img' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'age' => 'required|max:3',
            'owner' => 'required|max:50',
            'contact' => 'required|min:9|max:9',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ]);
        } else {

            $pet = new Pet;
            $pet->name = $request->input('name');
            $pet->race = $request->input('race');

            $pet->location = $request->input('location');
            $pet->description = $request->input('description');

            $pet->age = $request->input('age');
            $pet->owner = $request->input('owner');

            if ($request->hasFile('img_url')) {

                $file = $request->file('img_url');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/pet/', $filename);
                $pet->img_url = 'uploads/pet/' . $filename;
            }

            $pet->status = $request->input('status') == true ? '1' : '0';
            $pet->save();

            return response()->json([
                'status' => 200,
                'message' => 'El Animal Fue Creado',
            ]);
        }
    }
}

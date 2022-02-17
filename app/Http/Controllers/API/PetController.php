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

    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'species' => 'required|max:50',
            'status' => 'required|max:50',
            'location' => 'required|max:50',
            'description' => 'required|max:500',
            'descriptionabridged' => 'required|max:100',
            'img' => 'required',
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

            $pet = Pet::create($request->all());

            return $pet;  

        }
    }

}

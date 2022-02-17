<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PetController;

Route::get('/pets', [PetController::class, 'index']);

Route::POST('add-pet', [PetController::class, 'store']);

Route::post('/pets', [PetController::class, 'add']);

// Route::post('/pets', [PetController::class, 'add']);

// Route::get('view-pet', [PetController::class, 'index']);

// Route::GET('/view-pet/{id}', [PetController::class, 'show']);

// Route::post('add-pet', [PetController::class, 'add']);

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

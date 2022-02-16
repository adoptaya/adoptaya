<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PetController;

Route::post('add-pet', [PetController::class, 'addpet']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PetController;

Route::get('/pets', [PetController::class, 'index']);

Route::post('/pets', [PetController::class, 'store']);

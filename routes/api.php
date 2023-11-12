<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DeviseController;
use App\Http\Controllers\Api\PaireController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Devise API Routes
Route::get('devise', [DeviseController::class, 'index']);
Route::post('devise', [DeviseController::class, 'store']);
Route::get('devise/{id}', [DeviseController::class, 'show']);
Route::get('devise/{id}/edit', [DeviseController::class, 'edit']);
Route::put('devise/{id}/edit', [DeviseController::class, 'update']);
Route::delete('devise/{id}/delete', [DeviseController::class, 'destroy']);


//Paires API Routes
Route::get('paire', [PaireController::class, 'index']);
Route::post('paire', [PaireController::class, 'store']);
Route::get('paire/{id}', [PaireController::class, 'show']);
Route::get('paire/{id}/edit', [PaireController::class, 'edit']);
Route::put('paire/{id}/edit', [PaireController::class, 'update']);
Route::delete('paire/{id}/delete', [PaireController::class, 'destroy']);

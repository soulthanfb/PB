<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route untuk menampilkan data hewan
Route::get('/animals', [AnimalController::class, "index"]);

// Route untuk menambahkan data hewan
Route::post('/animals', [AnimalController::class, "store"]);

// Route untuk mengupdate data hewan
Route::put('animals/{$id}', [AnimalController::class, "update"]);

// Route untuk menghapus data hewan
Route::delete('animals/{$id}', [AnimalController::class, "destroy"]);
<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
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

//Route untuk membuat kelompok middleware atau mendapatkan token
Route::middleware(['auth:sanctum'])->group(function(){

//-------------------------------------//
// Route untuk menampilkan data hewan
Route::get('/animals', [AnimalController::class, "index"]);

// Route untuk menambahkan data hewan
Route::post('/animals', [AnimalController::class, "store"]);

// Route untuk mengupdate data hewan
Route::put('/animals/{id}', [AnimalController::class, "update"]);

// Route untuk menghapus data hewan
Route::delete('/animals/{id}', [AnimalController::class, "destroy"]);


//------------------------------------//
//Route untuk menampilkan semua siswa
Route::get("students", [StudentController::class, "index"]);

//Route untuk menambahkan data siswa
Route::post('/students', [StudentController::class, "store"]);

// Route untuk mengupdate data siswa
Route::put('/students/{id}', [StudentController::class, "update"]);

// Route untuk menghapus data siswa
Route::delete('/students/{id}', [StudentController::class, "destroy"]);

//----------------------------------------------//
//Route untuk mendapatkan detail student
Route::get("student/{id}", [StudentController::class, "show"]);
});

//------------------------------------------//
//Route untuk membuat register dan login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, "login"]);

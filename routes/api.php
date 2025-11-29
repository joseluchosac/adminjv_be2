<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("/users/create", [AuthController::class, 'createUser']);
Route::post("/users/login", [AuthController::class, 'loginUser']);
Route::middleware('auth:sanctum')->get('users/user', function (Request $request) {
  return $request->user();
});
Route::middleware('auth:sanctum')->get('users/hola', function () {
  return response()->json([
    'success' => true,
    'msg' => "Tienes permiso"
  ]);
});
Route::get("/login", function(){
  return response()->json("estas en login");
});

// Route::resource('/note', NoteController::class);
Route::get('/notes', [NoteController::class, 'index']);
Route::get('/notes/{id}', [NoteController::class, 'show']);
Route::post('/notes', [NoteController::class, 'store']);
Route::post('/notes/{id}', [NoteController::class, 'update']);
Route::delete('/notes/{id}', [NoteController::class, 'destroy']);



Route::middleware('example')->post('/', [ExampleController::class, 'index']);
Route::get('/no-access', [ExampleController::class, 'noAccess'])->name('no-access');


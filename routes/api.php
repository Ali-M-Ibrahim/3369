<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('getStudents',[UserController::class,'index'])->middleware('checkkey');
Route::get('getSingleStudent',[UserController::class,'single']);
Route::post('postStudent',[UserController::class,'post']);



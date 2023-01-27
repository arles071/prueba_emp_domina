<?php

use App\Http\Controllers\ExerciseFourController;
use App\Http\Controllers\ExerciseThreeController;
use App\Http\Controllers\ExerciseTwoController;
use App\Http\Controllers\ExerciseUnaController;
use App\Http\Controllers\PruebaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('', [PruebaController::class, 'index']);

//ejercicio 1
Route::get('ejercicio1', [ExerciseUnaController::class, 'index']);
Route::post('ejercicio1', [ExerciseUnaController::class, 'store']);

//ejercicio 2
Route::get('ejercicio2', [ExerciseTwoController::class, 'index']);
Route::post('ejercicio2', [ExerciseTwoController::class, 'store']);

//ejercicio 3
Route::get('ejercicio3', [ExerciseThreeController::class, 'index']);
Route::post('ejercicio3', [ExerciseThreeController::class, 'store']);

//ejercicio 4
Route::get('ejercicio4', [ExerciseFourController::class, 'index']);
Route::post('ejercicio4', [ExerciseFourController::class, 'store']);

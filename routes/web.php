<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CarController::class, 'index']);

//rutas de cars
Route::get('/cars', [CarController::class, 'index']);
Route::get('/car/{id}', [CarController::class, 'show']);
Route::get('/newCar', [CarController::class, 'create']);
Route::post('/saveCar', [CarController::class, 'store']);
Route::post('/deleteAjax', [CarController::class, 'deleteAjax']);
Route::get('/carEdit/{id}', [CarController::class, 'edit']);
Route::post('/carUpload', [CarController::class, 'update']);



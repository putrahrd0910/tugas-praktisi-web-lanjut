<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\todo\StatusController;
use App\Http\Controllers\Api\todo\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

#asline
#Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
#    return $request->user();
#});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/status', [StatusController::class, 'store']);
Route::post('/todo', [TodoController::class, 'store']);
Route::delete('/todo/{id}', [TodoController::class, 'destroy']);
Route::put('/todo/{id}', [TodoController::class, 'update']);
Route::patch('/todo/{id}', [TodoController::class, 'updateStatus']);
Route::patch('/status/{id}', [StatusController::class, 'updatePatch']);
Route::patch('/todo/judul/{id}', [TodoController::class, 'updateJudul']);
Route::put('/status/{id}', [StatusController::class, 'updateStatus']);

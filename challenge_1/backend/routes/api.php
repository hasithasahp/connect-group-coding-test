<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/attendance/', [AttendanceController::class, 'index']);
Route::get('/attendance/employee/{emp_id}', [AttendanceController::class, 'show']);
Route::post('/attendance/upload', [AttendanceController::class, 'store']);


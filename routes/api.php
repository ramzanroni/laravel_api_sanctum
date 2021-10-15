<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DamiApiController;
use App\Http\Controllers\ResourceApiController;
use App\Http\Controllers\sanctumController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/getdata', [DamiApiController::class, 'getData']);
Route::get('/getdatadb/{id?}', [DamiApiController::class, 'getDataDB']);
Route::post('/addData', [DamiApiController::class, 'AddData']);
Route::put('/updateData', [DamiApiController::class, 'updateData']);
Route::delete('/deleteData/{id}', [DamiApiController::class, 'deleteData']);
Route::get('/searchData/{name}', [DamiApiController::class, 'searchData']);
Route::post('/validationData', [DamiApiController::class, 'validationData']);
Route::apiResource('employeeApi', ResourceApiController::class);


Route::group(['middleware' => 'auth:sanctum'], function(){
    
    Route::post('/loginapi', [sanctumController::class, 'index']);
//////add more url for using secure 
    });

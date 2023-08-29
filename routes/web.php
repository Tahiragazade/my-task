<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/task1', [HomeController::class, 'task1']);
Route::get('/task2', [HomeController::class, 'task2']);
Route::get('/task3', [HomeController::class, 'task3']);
Route::get('/task4', [HomeController::class, 'task4']);
Route::get('/task5', [HomeController::class, 'task5']);
Route::get('/task6', [HomeController::class, 'task6']);
Route::get('/task7', [HomeController::class, 'task7']);
Route::get('/task8', [HomeController::class, 'task8']);
Route::get('/task9', [HomeController::class, 'task9']);


Route::group(['prefix' => 'mysql'], function () {
    Route::get('/task1', [EmployeeController::class, 'task1']);
    Route::get('/task2', [EmployeeController::class, 'task2']);
    Route::get('/task3', [EmployeeController::class, 'task3']);
    Route::get('/task4', [EmployeeController::class, 'task4']);
    Route::get('/task5', [EmployeeController::class, 'task5']);
    Route::get('/task6', [EmployeeController::class, 'task6']);
    Route::get('/task7', [EmployeeController::class, 'task7']);
    Route::get('/task8', [EmployeeController::class, 'task8']);
//    Route::get('/task9', [EmployeeController::class, 'task9']);

});


<?php

use App\Http\Controllers\ArraysController;
use App\Http\Controllers\ColaController;
use App\Http\Controllers\TaskController;
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

//Ruta para mostrar los datos del controlador en una vista
Route::get('/arrays ', [ArraysController::class, 'index']);

Route::get('/colas' , [ColaController::class, 'index']);


Route::post('/add-task', [TaskController::class, 'addTask']);
Route::get('/view-tasks', [TaskController::class, 'viewTasks']);
Route::post('/process-task', [TaskController::class, 'processTask']);

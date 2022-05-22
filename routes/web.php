<?php

use App\Http\Controllers\Csv;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Octave;
use App\Http\Controllers\MainController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/octave', [Octave::class, 'updateOctave']);
Route::get('/octave', [Octave::class, 'readOctave']);
Route::get("/csv", [Csv::class, 'createCsv']);

Route::get('/main', [MainController::class, 'index']);

Route::post('/main/checkLogin', [MainController::class, 'checkLogin']);
Route::get('/main/successLogin', [MainController::class, 'successLogin']);
Route::get('/main/logout', [MainController::class, 'logout']);

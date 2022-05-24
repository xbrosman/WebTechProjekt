<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Octave;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Redirect;

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

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();});
    
Route::get('/', function () {
    return Redirect('main');
});

Route::post('/octave', [Octave::class, 'updateOctave']);
Route::get('/octave', [Octave::class, 'readOctave']);

Route::get('/main', [MainController::class, 'index']);

Route::post('/main/checkLogin', [MainController::class, 'checkLogin']);
Route::get('/main/successLogin', [MainController::class, 'successLogin']);
Route::get('/main/logout', [MainController::class, 'logout']);


Route::get('/registration', [RegistrationController::class, 'readRegistration']);
Route::post('/registration', [RegistrationController::class, 'createRegistration']);

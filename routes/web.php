<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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
    return view('home');
});

Route::get('/contact-data', [ContactController::class, 'getContactData']);
Route::get('/contact/getContact/{id}', [ContactController::class, 'getContact']);
Route::delete('/contact/delete/{id}', [ContactController::class, 'deleteContact']);

Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contact', [ContactController::class, 'store']);


Route::get('/about', function () {
    return view('about');
});
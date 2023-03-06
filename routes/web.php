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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('inquiry', [ContactController::class, 'inquiry']);
Route::post('confirm', [ContactController::class, 'confirm']);
Route::get('correct', [ContactController::class, 'correct']);
Route::post('submit', [ContactController::class, 'submit'])->name('submit');
Route::get('manage', [ContactController::class, 'manage']);
Route::get('thanks', [ContactController::class, 'thanks']);
Route::post('search', [ContactController::class, 'search']);
Route::post('delete', [ContactController::class, 'delete'])->name('delete');
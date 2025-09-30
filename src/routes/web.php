<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;

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
    return view('contactform');
});

// Route::get('/login',function(){
//     return view('auth.login');
// });

/* auth check */
Route::middleware('auth')->group(function(){
    Route::get('/admin',[ContactController::class,'index']);
});


/* contact confirm */
Route::post('/confirm',[ContactController::class,'confirm']);

/* create */

Route::post('/thanks',[ContactController::class,'create']);
Route::get('/',[ContactController::class,'contact']);
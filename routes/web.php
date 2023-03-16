<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::resource('user', UserController::class);
Route::get('images/product/{image}', function($image = null)
{
    // dd(Storage::get('public/dokumen4.jpeg'));
    $file = Storage::get('public/' . $image);
    $mimetype = Storage::mimeType('public/' . $image);
    return response($file, 200)->header('Content-Type', $mimetype);
});

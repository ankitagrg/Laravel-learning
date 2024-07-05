<?php
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', function () {
    return view('layout');
});
Route::get('/about', function () {
    return view('About');
})->middleware('auth');

Route::get('/gces', function(){
    return view('GCES');
});
Route::get('/test', [TestController::class, 'index']);
Route::get('/int', [TestController::class, 'info']);
Route::get('/char', [TestController::class, 'information']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
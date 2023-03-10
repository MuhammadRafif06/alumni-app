<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\test1Controller;
use App\Http\Controllers\siswaController;


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

//metode tanpa controller langsung mengarah ke view
Route::get('/test', function() {
    return view('test');
});

//metode tanpa view
Route::get('/test1', function() {
    return 'hello vlog welcome to my guys';
});

//metode dengan menggunakan controller
Route::get('/test2', [test1Controller::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/siswa',[siswaController::class, 'index'])->name('siswagaje');

Route::post('/siswa/create/success',[siswaController::class, 'store'])->name('siswa.store');

Route::get('/siswa/delete/success/{id}',[siswaController::class, 'destroy'])->name('siswa.delete');


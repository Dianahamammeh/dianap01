<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\LoginController;
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
    return view('auth.register');
});


Auth::routes();


//Route::post('logout', [AuthController::class, 'logout'])->name('logout'); 
Route::middleware('auth')->group(function () {
Route::get('clientindex', [ClientController::class, 'getclients'])->name('clientindex');


Route::resource('clients', ClientController::class);

Route::post('update_client/{id}', [ClientController::class, 'update'])->name('update_client');
Route::get('active_client/{id}', [ClientController::class, 'active'])->name('clients.active');
Route::post('destroyclient', [ClientController::class, 'destroy'])->name('destroyclient');
Route::get('edit_client/{id}', [ClientController::class, 'edit'])->name('edit_client');
Route::get('show_client/{id}', [ClientController::class, 'show'])->name('show_client');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});
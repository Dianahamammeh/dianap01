<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClientController;
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
//Route::get('login', [AuthController::class, 'index'])->name('login');
//Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
//Route::get('registration', [AuthController::class, 'registration'])->name('register');
//Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
//Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Auth::routes();
Route::get('/main_logout', [AuthController::class, 'main_logout']); 


Route::resource('clients', ClientController::class);

Route::post('update_client/{id}', [ClientController::class, 'update'])->name('update_client');
Route::get('active_client/{id}', [ClientController::class, 'active'])->name('clients.active');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


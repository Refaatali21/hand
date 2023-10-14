<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use Whoops\Run;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login', function () {
    return view('auth.login');
});
Route::get('register', function () {
    return view('auth.register');
});
// Add Employee
Route::post('create', [ App\Http\Controllers\employee::class  , 'create']);
Route::post('destroy', [ App\Http\Controllers\employee::class  , 'destroy']);
Route::post('update/{id}', [ App\Http\Controllers\employee::class  , 'update']);
Route::post('trached', [ App\Http\Controllers\employee::class  , 'trached']);
// End Employee //

// Open Archives //
Route::get('Archives_index' , [App\Http\Controllers\archives::class,'index']);
Route::post('Archives_update/{id}' , [App\Http\Controllers\archives::class,'update']);
Route::post('Archives_destroy' , [App\Http\Controllers\archives::class,'destroy']);
// End Archives //

// Open attendance //
Route::get('attendance' , [App\Http\Controllers\employee_attendance::class,'index']);
Route::post('attendance_create', [App\Http\Controllers\employee_attendance::class, 'create']);
Route::post('attendance_update/{id}', [App\Http\Controllers\employee_attendance::class, 'update']);
Route::post('attendance_destroy', [App\Http\Controllers\employee_attendance::class, 'destroy']);
// End attendance //



Route::group(['middleware' => ['auth']], function() {

    /**
     * User Routes
     */
    Route::resource('roles', RolesController::class);
    Route::resource('users', UserController::class);
});



Auth::routes();


Route::get('/{page}', [App\Http\Controllers\AdminController::class , 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

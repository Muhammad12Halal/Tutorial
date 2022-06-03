<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OpenController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\StudentController;
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

//login
Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
    Route::get('registration', [AuthController::class, 'registration'])->name('register');
    Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
    Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'open', 'as' => 'open.'], function () {
    Route::get('/', [OpenController::class, 'showOpens'])->name('index');
    Route::get('/create', [OpenController::class, 'createOpens'])->name('create');
    Route::post('/create', [OpenController::class, 'saveOpens']);
    Route::get('/edit/{id}', [OpenController::class, 'getOpens'])->name('edit');
    Route::put('/update/{id}', [OpenController::class, 'saveOpens'])->name('update');
    Route::delete('/delete/{id}', [OpenController::class, 'deleteOpens'])->name('delete');

});

Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::post('store', [StudentController::class, 'store'])->name('store');
    Route::get('/{item}/show', [StudentController::class, 'show'])->name('show');
    Route::get('/{item}/edit', [StudentController::class, 'edit'])->name('edit');
    Route::put('/{item}/update', [StudentController::class, 'update'])->name('update');
    Route::delete('/{item}/destroy', [StudentController::class, 'destroy'])->name('destroy');
});

//livewire example routes
Route::controller(PostController::class)
    ->prefix('post')
    ->as('post.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/{item}/show', 'show')->name('show');
        Route::get('/{item}/edit', 'edit')->name('edit');
        Route::put('/{item}/update', 'update')->name('update');
        Route::delete('/{item}/destroy', 'destroy')->name('destroy');
});

Route::controller(SendEmailController::class)
    ->prefix('email')
    ->as('email.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/sendEmail', 'sendEmail')->name('sendEmail');
        Route::get('/{id}/approved', 'approved')->name('approved');
});


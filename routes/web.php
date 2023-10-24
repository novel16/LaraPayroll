<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);


    //deduction routes
    Route::get('/deductions',App\Livewire\Admin\Deduction\Index::class);

    //position routes
    Route::get('/positions',App\Livewire\Admin\Position\Index::class);

    //Schedules routes
    Route::get('/schedules',App\Livewire\Admin\Schedule\Index::class);

    //Employee Routes
    Route::controller(App\Http\Controllers\Admin\EmployeeController::class)->group(function(){

        Route::get('/employees', 'index');
        Route::get('/employees/create', 'create');
        Route::post('/employees', 'store');
        Route::get('/employees/{employee}/edit', 'edit');
        Route::put('/employees/{employee_id}', 'update');
    });

});

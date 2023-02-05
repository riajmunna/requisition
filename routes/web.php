<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/employee/add', [EmployeeController::class, 'addEmployee'])->name('add.employee');
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
    Route::post('/save-employee', [EmployeeController::class, 'saveEmployee'])->name('save.employee');
    Route::get('/edit_employee/{id}', [EmployeeController::class, 'editEmployee'])->name('edit.employee');
    Route::post('/update_employee', [EmployeeController::class, 'updateEmployee'])->name('update.employee');
    Route::post('/delete_employee', [EmployeeController::class, 'deleteEmployee'])->name('delete.employee');

});

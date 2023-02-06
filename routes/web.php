<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SiteController;

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

    //Employee Controller
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/employee',  'index')->name('employee');
        Route::get('/employee-add',  'addEmployee')->name('add.employee');
        Route::post('/save-employee',  'saveEmployee')->name('save.employee');
        Route::get('/edit_employee/{id}',  'editEmployee')->name('edit.employee');
        Route::post('/update_employee',  'updateEmployee')->name('update.employee');
        Route::post('/delete_employee',  'deleteEmployee')->name('delete.employee');
    });

    //Customer Controller
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customer',  'index')->name('customer');
        Route::get('/customer-add',  'addCustomer')->name('add.customer');
        Route::post('/save-customer',  'saveCustomer')->name('save.customer');
        Route::get('/edit-customer/{id}',  'editCustomer')->name('edit.customer');
        Route::post('/update-customer',  'updateCustomer')->name('update.customer');
        Route::post('/delete-customer',  'deleteCustomer')->name('delete.customer');
    });

    //Site Controller
    Route::controller(SiteController::class)->group(function () {

    });


});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AdvanceController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AdvancedController;
use App\Http\Controllers\AccountingFinanceController;

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

    Route::group(['middleware' => 'admin'], function () {
        //Employee Controller
        Route::controller(EmployeeController::class)->group(function () {
            Route::get('/employee', 'index')->name('employee');
            Route::get('/employee-add', 'addEmployee')->name('add.employee');
            Route::post('/save-employee', 'saveEmployee')->name('save.employee');
            Route::get('/edit_employee/{id}', 'editEmployee')->name('edit.employee');
            Route::post('/update_employee', 'updateEmployee')->name('update.employee');
            Route::post('/delete_employee', 'deleteEmployee')->name('delete.employee');
        });

        //Customer Controller
        Route::controller(CustomerController::class)->group(function () {
            Route::get('/customer', 'index')->name('customer');
            Route::get('/customer-add', 'addCustomer')->name('add.customer');
            Route::post('/save-customer', 'saveCustomer')->name('save.customer');
            Route::get('/edit-customer/{id}', 'editCustomer')->name('edit.customer');
            Route::post('/update-customer', 'updateCustomer')->name('update.customer');
            Route::post('/delete-customer', 'deleteCustomer')->name('delete.customer');
        });

        //Department Controller
        Route::controller(DepartmentController::class)->group(function () {
            Route::get('/department', 'index')->name('department');
            Route::get('/department-add', 'addDepartment')->name('add.department');
            Route::post('/save-department', 'saveDepartment')->name('save.department');
            Route::get('/edit-department/{id}', 'editDepartment')->name('edit.department');
            Route::post('/update-department', 'updateDepartment')->name('update.department');
            Route::post('/delete-department', 'deleteDepartment')->name('delete.department');
        });

        //Designation Controller
        Route::controller(DesignationController::class)->group(function () {
            Route::get('/designation', 'index')->name('designation');
            Route::get('/designation-add', 'addDesignation')->name('add.designation');
            Route::post('/save-designation', 'saveDesignation')->name('save.designation');
            Route::get('/edit-designation/{id}', 'editDesignation')->name('edit.designation');
            Route::post('/update-designation', 'updateDesignation')->name('update.designation');
            Route::post('/delete-designation', 'deleteDesignation')->name('delete.designation');
        });

        //Site Controller
        Route::controller(SiteController::class)->group(function () {
            Route::get('/site', 'index')->name('site');
            Route::get('/site-add', 'addSite')->name('add.site');
            Route::post('/save-site', 'saveSite')->name('save.site');
            Route::get('/edit-site/{id}', 'editSite')->name('edit.site');
            Route::post('/update-site', 'updateSite')->name('update.site');
            Route::post('/delete-site', 'deleteSite')->name('delete.site');
        });

        //Item Controller
        Route::controller(ItemController::class)->group(function () {
            Route::get('/item', 'index')->name('item');
            Route::get('/item-add', 'addItem')->name('add.item');
            Route::post('/save-item', 'saveItem')->name('save.item');
            Route::get('/edit-item/{id}', 'editItem')->name('edit.item');
            Route::post('/update-item', 'updateItem')->name('update.item');
            Route::post('/delete-item', 'deleteItem')->name('delete.item');
        });

        //Advanced Controller
        Route::controller(AdvancedController::class)->group(function () {
            Route::get('/advanced', 'index')->name('advanced');
            Route::get('/advanced-add', 'addAdvanced')->name('add.advanced');
            Route::post('/save-advanced', 'saveAdvanced')->name('save.advanced');
            Route::get('/edit-advanced/{id}', 'editAdvanced')->name('edit.advanced');
            Route::post('/update-advanced', 'updateAdvanced')->name('update.advanced');
            Route::post('/delete-advanced', 'deleteAdvanced')->name('delete.advanced');
        });





        //Advance History List
        Route::get('/advance-history-list', [AdvanceController::class, 'advanceHistoryList'])->name('advance.history.list');
        Route::get('/edit-advance/{id}', [AdvanceController::class, 'editAdvance'])->name('edit.advance');
        Route::post('/update-advance', [AdvanceController::class, 'updateAdvance'])->name('update.advance');
        Route::post('/delete-advance', [AdvanceController::class, 'deleteAdvance'])->name('delete.advance');


    });
});

Route::group(['middleware' => 'employee'], function () {
    //Advance History
    Route::get('/advance-list', [AdvanceController::class, 'index'])->name('advance.list');
    Route::get('/create-advance-list', [AdvanceController::class, 'create'])->name('create.advance.list');
    Route::post('/save-advance', [AdvanceController::class, 'store'])->name('save.advance.list');


    //Requisition
    Route::get('/requisition', [RequisitionController::class, 'index'])->name('requisition');
    Route::get('/add-requisition', [RequisitionController::class, 'addRequisition'])->name('add.requisition');
    Route::post('/save-requisition', [RequisitionController::class, 'saveRequisition'])->name('save.requisition');
    Route::get('/edit-requisition/{id}', [RequisitionController::class, 'editRequisition'])->name('edit.requisition');
    Route::post('/update-requisition', [RequisitionController::class, 'updateRequisition'])->name('update.requisition');
    Route::post('/delete-requisition', [RequisitionController::class, 'deleteRequisition'])->name('delete.requisition');


    //Accounting and Finance Controller
    Route::controller(AccountingFinanceController::class)->group(function () {
//        Route::get('/advance-list', 'advanceList')->name('advance.list');
//        Route::get('/create-advance-list', 'createAdvanceList')->name('create.advance.list');
        Route::get('/advance-approval', 'advanceApproval')->name('advance.approval');
        Route::get('/bill-requisition-list', 'billRequisitionList')->name('bill.requisition.list');
        Route::get('/create-bill-requisition-list', 'createBillRequisitionList')->name('create.bill.requisition.list');
        Route::get('/bill-requisition-approval', 'billRequisitionApproval')->name('bill.requisition.approval');
        Route::get('/summary-report', 'summaryReport')->name('summary.report');
    });

});


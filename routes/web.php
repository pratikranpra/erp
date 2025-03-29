<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\OtherUserController;
use App\Http\Controllers\EmployeeController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ItemController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

// Site settings
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    /*Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');*/

    Route::get('/site_settings', [SettingsController::class, 'index'])->name('settings');
    Route::get('/password', [UserController::class, 'password'])->name('profile.password');


    // Status change
    Route::group(['prefix' => 'status'], function () {
        Route::post('/users', [SettingsController::class, 'status']);
        Route::post('/customers', [CustomerController::class, 'status']);
        Route::post('/vendors', [VendorController::class, 'status']);
        Route::post('/other_users', [OtherUserController::class, 'status']);
        Route::post('/employees', [EmployeeController::class, 'status']);
        Route::post('/categories', [CategoryController::class, 'status']);
        Route::post('/companies', [CompanyController::class, 'status']);
        Route::post('/branches', [BranchController::class, 'status']);
        Route::post('/items', [ItemController::class, 'status']);

    });
    
});

Route::middleware('auth')->post('/change_password', [ProfileController::class, 'changePassword']);


// Modules
Route::middleware('auth')->resource('/admin/users', UserController::class);
Route::middleware('auth')->resource('/admin/customers', CustomerController::class);
Route::middleware('auth')->resource('/admin/vendors', VendorController::class);
Route::middleware('auth')->resource('/admin/other_users', OtherUserController::class);
Route::middleware('auth')->resource('/admin/employees', EmployeeController::class);

Route::middleware('auth')->resource('/admin/categories', CategoryController::class);
Route::middleware('auth')->resource('/admin/companies', CompanyController::class);
Route::middleware('auth')->resource('/admin/branches', BranchController::class);
Route::middleware('auth')->resource('/admin/items', ItemController::class);










require __DIR__.'/auth.php';
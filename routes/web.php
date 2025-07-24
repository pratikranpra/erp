<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\OtherUserController;
use App\Http\Controllers\EmployeeController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\employee_admin\EmployeeAdminConstroller;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\GstMasterController;

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
        Route::post('/roles', [RoleController::class, 'status']);
        Route::post('/customers', [CustomerController::class, 'status']);
        Route::post('/vendors', [VendorController::class, 'status']);
        Route::post('/other_users', [OtherUserController::class, 'status']);
        Route::post('/employees', [EmployeeController::class, 'status']);
        Route::post('/categories', [CategoryController::class, 'status']);
        Route::post('/companies', [CompanyController::class, 'status']);
        Route::post('/branches', [BranchController::class, 'status']);
        Route::post('/items', [ItemController::class, 'status']);
        Route::post('/gst-masters', [GstMasterController::class, 'status']);

    });
    
});

Route::middleware('auth')->post('/change_password', [ProfileController::class, 'changePassword']);


// Modules
Route::middleware('auth')->resource('/admin/users', UserController::class);
Route::middleware('auth')->resource('/admin/roles', RoleController::class);
Route::middleware('auth')->resource('/admin/customers', CustomerController::class);
Route::middleware('auth')->resource('/admin/vendors', VendorController::class);
Route::middleware('auth')->resource('/admin/other_users', OtherUserController::class);
Route::middleware('auth')->resource('/admin/employees', EmployeeController::class);

Route::middleware('auth')->resource('/admin/categories', CategoryController::class);
Route::middleware('auth')->resource('/admin/companies', CompanyController::class);
Route::middleware('auth')->resource('/admin/branches', BranchController::class);
Route::middleware('auth')->resource('/admin/items', ItemController::class);
Route::middleware('auth')->resource('/admin/gst-masters', GstMasterController::class);


// Employee Login
Route::get('/emp_login', [App\Http\Controllers\Auth\EmployeeLoginController::class, 'showLoginForm'])->name('employee.login.form');
Route::post('/emp_login', [App\Http\Controllers\Auth\EmployeeLoginController::class, 'login'])->name('employee.login');
Route::post('/employee/logout', [App\Http\Controllers\Auth\EmployeeLoginController::class, 'logout'])->name('employee.logout');

// Route::middleware(['auth:employee'])->group(function () {
//     Route::get('/employee/dashboard', function () {
//         return 'Welcome, employee!';
//     });
// });

// Employee routes
Route::prefix('employee')->group(function () {
    Route::middleware(['auth:employee'])->group(function () {
        // Route::get('/dashboard', function () {
        //     return view('employee_admin.dashboard'); // Or whatever view you want
        // })->name('employee.dashboard');

        Route::get('/dashboard', [EmployeeAdminConstroller::class, 'index'])->name('employee.dashboard');
        Route::get('/change-password', [EmployeeAdminConstroller::class, 'getChangePassword'])->name('employee.change.password');
        Route::post('/change-password', [EmployeeAdminConstroller::class, 'postChangePassword'])->name('post:employee.change.password');
    });
});



require __DIR__.'/auth.php';
<?php

use App\Http\Controllers\Auth\EmployeeLoginController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerShippingAddressController;
use App\Http\Controllers\employee_admin\EmployeeAdminConstroller;
use App\Http\Controllers\EmployeeAdminItemConstroller;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GstMasterController;
use App\Http\Controllers\InventoryMasterController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ManageOrderController;
use App\Http\Controllers\ManageOrderRequestController;
use App\Http\Controllers\OtherUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Models\CustomerShippingAddress;
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
        Route::post('/units', [UnitController::class, 'status']);
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

    Route::group(['prefix' => 'items'], function () {
        Route::post('/load-item-type-data', [ItemController::class, 'loadItemTypeData'])->name('load.item.type.data');
        Route::post('/load-sub-category-data', [ItemController::class, 'loadSubCategoryData'])->name('load.sub.category.data');
        Route::get('/download-pdf', [ItemController::class, 'downloadPDF'])->name('items.download.pdf');
    });

    Route::group(['prefix' => 'manage-orders'], function () {
        Route::post('/customer-billing-address', [ManageOrderController::class, 'customerBillingAddress'])->name('customer.billing.address');
        Route::post('/load-more-item-data', [ManageOrderController::class, 'loadMoreItemData'])->name('load.more.item.data');
        Route::post('/load-vendor-data', [ManageOrderController::class, 'loadVendorData'])->name('load.vendor.data');
    });
    Route::group(['prefix' => 'manage-orders-request'], function () {
        Route::get('/', [ManageOrderRequestController::class, 'index'])->name('manage.orders.request.index');
        Route::get('/show/{id}', [ManageOrderRequestController::class, 'show'])->name('manage.orders.request.show');
        Route::post('/manage-orders-request-complete', [ManageOrderRequestController::class, 'completeOrder'])->name('manage.orders.request.complete');
        Route::get('/download-purchase-bill/{id}', [ManageOrderRequestController::class, 'downloadPurchaseBill'])->name('download-purchase-bill.pdf');
    }); 

    Route::group([
        'prefix' => 'customers/{customer_id}', 
        'as' => 'customer-shipping-addresses.',
    ], function () {
        Route::get('customer-shipping-addresses', [CustomerShippingAddressController::class, 'index'])->name('index');
        Route::get('customer-shipping-addresses/create', [CustomerShippingAddressController::class, 'create'])->name('create');
        Route::post('customer-shipping-addresses', [CustomerShippingAddressController::class, 'store'])->name('store');
        Route::get('customer-shipping-addresses/{address}/edit', [CustomerShippingAddressController::class, 'edit'])->name('edit');
        Route::patch('customer-shipping-addresses/{address}', [CustomerShippingAddressController::class, 'update'])->name('update');
        Route::delete('customer-shipping-addresses/{address}', [CustomerShippingAddressController::class, 'destroy'])->name('destroy');
        Route::post('customer-shipping-addresses/status', [CustomerShippingAddressController::class, 'status'])->name('status');
    });
    
});

Route::middleware('auth')->post('/change_password', [ProfileController::class, 'changePassword']);


Route::middleware('auth')->resource('/admin/users', UserController::class);
Route::middleware('auth')->resource('/admin/roles', RoleController::class);
Route::middleware('auth')->resource('/admin/units', UnitController::class);

// Route::get('/admin/customer-shipping-addresses/{customer}', [CustomerShippingAddressController::class, 'index'])->name('customer-shipping-address.index');
// Route::get('/admin/customer-shipping-addresses/create/{customer}', [CustomerShippingAddressController::class, 'create'])->name('customer-shipping-address.create');
// Route::middleware('auth')->resource('/admin/customer-shipping-addresses', CustomerShippingAddressController::class);

Route::middleware('auth')->resource('/admin/customers', CustomerController::class);
Route::middleware('auth')->resource('/admin/vendors', VendorController::class);
Route::middleware('auth')->resource('/admin/other_users', OtherUserController::class);
Route::middleware('auth')->resource('/admin/employees', EmployeeController::class);

Route::middleware('auth')->resource('/admin/categories', CategoryController::class);
Route::middleware('auth')->resource('/admin/companies', CompanyController::class);
Route::middleware('auth')->resource('/admin/branches', BranchController::class);
Route::middleware('auth')->resource('/admin/items', ItemController::class);
Route::middleware('auth')->resource('/admin/manage-orders', ManageOrderController::class);
//Route::middleware('auth')->resource('/admin/manage-orders-request', ManageOrderController::class);
Route::middleware('auth')->resource('/admin/gst-masters', GstMasterController::class);
Route::middleware('auth')->resource('/admin/inventory-masters', InventoryMasterController::class);



    
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

        //code for route for employee item add
        Route::get('/items', [ItemController::class, 'index'])->name('employee.items.index');
        Route::post('/status/items', [ItemController::class, 'status'])->name('employee.items.status');
        Route::group(['prefix' => 'items'], function () {
            Route::get('/create', [ItemController::class, 'create'])->name('employee.items.create');
            Route::post('/store', [ItemController::class, 'store'])->name('employee.items.store');
            Route::get('/show/{id}', [ItemController::class, 'show'])->name('employee.items.show');    
            Route::get('/{id}/edit', [ItemController::class, 'edit'])->name('employee.items.edit');
            Route::patch('/{item}/update', [ItemController::class, 'update'])->name('employee.items.update');
            Route::delete('/{id}/destroy', [ItemController::class, 'destroy'])->name('employee.items.destroy');
            Route::post('/load-item-type-data', [ItemController::class, 'loadItemTypeData'])->name('employee.load.item.type.data');
            Route::post('/load-sub-category-data', [ItemController::class, 'loadSubCategoryData'])->name('employee.load.sub.category.data');
            Route::get('/download-pdf', [ItemController::class, 'downloadPDF'])->name('employee.items.download.pdf');
        });
        

        //code for route for employee item add
        Route::get('/manage-orders', [ManageOrderController::class, 'index'])->name('employee.manage-orders.index');
        //Route::post('/status/manage-orders', [ManageOrderController::class, 'status'])->name('employee.manage-orders.status');
        Route::group(['prefix' => 'manage-orders'], function () {
            Route::get('/create', [ManageOrderController::class, 'create'])->name('employee.manage-orders.create');
            Route::post('/store', [ManageOrderController::class, 'store'])->name('employee.manage-orders.store');
            Route::get('/show/{id}', [ManageOrderController::class, 'show'])->name('employee.manage-orders.show');    
            //Route::get('/{id}/edit', [ManageOrderController::class, 'edit'])->name('employee.manage-orders.edit');
            //Route::patch('/{manageOrder}/update', [ManageOrderController::class, 'update'])->name('employee.manage-orders.update');
            //Route::delete('/{id}/destroy', [ManageOrderController::class, 'destroy'])->name('employee.manage-orders.destroy');
            Route::post('/customer-billing-address', [ManageOrderController::class, 'customerBillingAddress'])->name('employee.customer.billing.address');
            Route::post('/load-more-item-data', [ManageOrderController::class, 'loadMoreItemData'])->name('employee.load.more.item.data');
            Route::post('/load-vendor-data', [ManageOrderController::class, 'loadVendorData'])->name('employee.load.vendor.data');
        });
    });
});

require __DIR__.'/auth.php';
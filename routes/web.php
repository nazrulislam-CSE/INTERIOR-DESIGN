<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\VisitController;
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

Route::get('/test', function(){
    return App\Models\Expense::find(12);
});


Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){

// ==================== START DASHBOARD SECTION ================== //
Route::get('/dashboard','DashboardController@index')->name('dashboard');
// ==================== END DASHBOARD SECTION ================== //


// ==================== START SALES SECTION ================== //
Route::get('/sales-add','SelesController@create')->name('sales.add');
Route::get('/all-sales','SelesController@index')->name('sales.index');
Route::post('/sales-store','SelesController@store')->name('sales.store');
Route::get('/sales-edit/{id}','SelesController@edit')->name('sales.edit');
Route::post('/sales-update/{id}','SelesController@update')->name('sales.update');
Route::get('/sales-delete/{id}','SelesController@destroy')->name('sales.delete');

// ==================== END SALES SECTION ================== //

// ==================== START STAFF SECTION ================== //
Route::resource('staff', StaffController::class);
Route::get('/staff-delete/{id}','StaffController@destroy')->name('staff.destroy');
// ==================== START STAFF SECTION ================== //

Route::resource('customer', CustomerController::class);
Route::post('/customer-store','CustomerController@store')->name('customers.store');
Route::get('/customer-delete/{id}','CustomerController@destroy')->name('customer.destroy');
// ==================== START DIVISIION SECTION ================== //
Route::resource('division', DivisionController::class);
Route::resource('district', DistrictController::class);
Route::get('/category','CategoryController@create')->name('category.create');
Route::post('/category','CategoryController@store')->name('category.store');
// ==================== START DIVISIION SECTION ================== //   

/*================ Start Ajax Category Click SubCategory Show ==================*/
Route::get('/division-city/ajax/{state_id}','CustomerController@getdivision')->name('division.ajax');
Route::get('/city-upazila/ajax/{district_id}','CustomerController@getupazila')->name('upazila.ajax');
/*================ Start Ajax Category Click SubCategory Show ==================*/
  
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

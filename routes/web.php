
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your applicatio;;n. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){
    return view('auth.login');
});

Auth::routes([
    'register' => false
]);

//==================================== Admin Route Here ===================================================
//==========================================================================================================//


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

    // Admin Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard/logout', 'DashboardController@logout')->name('logout');
    // profile
    Route::get('/profile/edit', 'ProfileController@editProfile')->name('edit.profile');
    Route::put('/profile/update', 'ProfileController@updateProfile')->name('update.profile');

    // password change
    Route::get('/password/change', 'ProfileController@PasswordChange')->name('password.change');
    Route::post('/password/update', 'ProfileController@PasswordUpdate')->name('password.update');
     
    // Site Info Setting
    Route::get('/setting', 'SettingController@settings')->name('settings');
    Route::put('/setting/update/{id}', 'SettingController@settingUpdate')->name('setting.update');

    // Customer Route
    Route::get('customers', 'CustomerController@index')->name('customer.index');
    Route::post('customers/store', 'CustomerController@store')->name('customer.store');
    Route::get('customers/edit/{id}', 'CustomerController@edit')->name('customer.edit');
    Route::put('customers/update/{id}', 'CustomerController@update')->name('customer.update');
    Route::delete('customers/destory/{id}', 'CustomerController@destory')->name('customer.destory');

    // Indivisul customer Invoice
    Route::get('customer/report/{id}', 'CustomerController@customerReport')->name('customer.report');

    // Customer Route
    Route::get('invoices', 'InvoiceController@index')->name('invoice.index');
    Route::get('invoices/create', 'InvoiceController@create')->name('invoice.create');
    Route::post('invoice/store', 'InvoiceController@store')->name('invoice.store');
    Route::get('invoice/edit/{id}', 'InvoiceController@edit')->name('invoice.edit');
    Route::put('invoice/update/{id}', 'InvoiceController@update')->name('invoice.update');
    Route::delete('invoice/destory/{id}', 'InvoiceController@destory')->name('invoice.destory');
    
});
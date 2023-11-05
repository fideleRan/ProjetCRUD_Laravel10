<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomerController;

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
    return view('about');
});

Route::view('contact', 'contacte');
Route::view('about', 'about');

//Route CUSTOMERS
// Route::get('customer', 'CustomerController@index');
// Route::post('customer', 'CustomerController@addCustomer'); 
// Route::get('customer/create', 'CustomerController@create');
// Route::get('customer/{customer}', 'CustomerController@show');
// Route::get('customer/{customer}/edit', 'CustomerController@edit');
// Route::patch('customer/{customer}', 'CustomerController@update');
// Route::delete('customer/{customer}', 'CustomerController@destroy');
Route::resource('customer', 'CustomerController');

//Route COMPANIES
// Route::get('company', 'CompanyController@index');
// Route::post('company', 'CompanyController@addCompany');
// Route::get('company/create', 'CompanyController@create');
// Route::get('company/{company}', 'CompanyController@show');
// Route::get('company/{company}/edit', 'CompanyController@edit');
// Route::patch('company/{company}', 'CompanyController@update');
// Route::delete('company/{company}', 'CompanyController@destroy');
Route::resource('company', 'CompanyController');

//Route CONTACT
Route::get('contact/create', 'ContactController@create');
Route::post('contact', 'ContactController@store');

Auth::routes();
Route::get('/home','HomeController@index')->name('home');

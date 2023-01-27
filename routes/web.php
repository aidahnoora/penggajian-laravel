<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware'=> ['auth', 'checkRole:admin,pegawai']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/loans', 'LoanController@index')->name('loans');
    Route::get('/add-loans/{id}', 'LoanController@edit')->name('add-loans');
    Route::put('/add-loans/{id}', 'LoanController@update')->name('add-loans');

    Route::get('/salaries', 'SalaryController@index')->name('salaries');
    Route::get('/add-salaries', 'SalaryController@create')->name('add-salaries');
    Route::post('/add-salaries', 'SalaryController@store')->name('add-salaries');

    Route::get('/filter', 'ReportController@index')->name('filter');
    Route::get('/report/{month}/{year}', 'ReportController@salaryReport')->name('report');
    Route::get('/filter-slip', 'ReportController@slipIndex')->name('filter-slip');
    Route::get('/slip/{id}', 'ReportController@slipDownload')->name('slip');

    Route::get('/profile', function () {
        if (Auth::user()->role == 'pegawai') {
            return view('employee.profile');
        } else {
            return view('pages.profile');
        }
    });
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function() {
    Route::get('/positions', 'PositionController@index')->name('positions');
    Route::get('/add-positions', 'PositionController@create')->name('add-positions');
    Route::post('/add-positions', 'PositionController@store')->name('add-positions');
    Route::get('/edit-positions/{id}', 'PositionController@edit')->name('edit-positions');
    Route::put('/edit-positions/{id}', 'PositionController@update')->name('edit-positions');
    Route::get('/delete-positions/{id}', 'PositionController@destroy')->name('delete-positions');

    Route::get('/employees', 'EmployeeController@index')->name('employees');
    Route::get('/add-employees', 'EmployeeController@create')->name('add-employees');
    Route::post('/add-employees', 'EmployeeController@store')->name('add-employees');
    Route::get('/show-employees/{id}', 'EmployeeController@show')->name('show-employees');
    Route::get('/edit-employees/{id}', 'EmployeeController@edit')->name('edit-employees');
    Route::put('/edit-employees/{id}', 'EmployeeController@update')->name('edit-employees');
    Route::get('/delete-employees/{id}', 'EmployeeController@destroy')->name('delete-employees');

    Route::get('/users', 'UserController@index')->name('users');
    Route::get('/add-users', 'UserController@create')->name('add-users');
    Route::post('/add-users', 'UserController@store')->name('add-users');
    Route::get('/edit-users/{id}', 'UserController@edit')->name('edit-users');
    Route::put('/edit-users/{id}', 'UserController@update')->name('edit-users');
    Route::get('/delete-users/{id}', 'UserController@destroy')->name('delete-users');
});

Route::group(['middleware' => ['auth', 'checkRole:pegawai']], function() {
    Route::get('employee-salaries', 'HomeController@showSalary')->name('employee-salaries');
});

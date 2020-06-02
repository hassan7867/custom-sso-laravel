<?php

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
    return view('welcome');
});
Route::get('/home', "DomainsController@index")->middleware('dashboard')->name('home')->middleware('dashboard');
Route::get('add-domain', "DomainsController@addDomain")->middleware('dashboard');
Route::post('add-domain', "DomainsController@saveDomain")->middleware('dashboard');
Route::post('/domain/update', "DomainsController@updateDomain")->middleware('dashboard');
Route::post('/domain/delete', "DomainsController@deleteDomain")->middleware('dashboard');
Route::get('edit/domain/{id}', "DomainsController@editDomain")->middleware('dashboard');
Auth::routes();
Route::get('/admin', "AdminController@loginPage");
Route::post('/admin/login', "AdminController@login")->name('admin.login');
Route::get('admin-dashboard', "AdminController@adminDashboard");
Route::post('admin-logout', "AdminController@logout")->name('admin.logout');

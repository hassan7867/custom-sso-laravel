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

//api routes
Route::post('login/authenticate',"AuthController@login");
Route::post('user/register',"AuthController@signup");
Route::post('logout',"AuthController@logout");
Route::post('kit/create',"KitsController@createKit");
Route::post('kit/delete',"KitsController@deleteKit");
Route::post('kit/logo',"KitsController@addLogo");
Route::post('kit/{url}/company/save',"CompanyController@saveCompanyInfo");
Route::post('kit/{url}/company/files/save',"CompanyController@saveFile");
Route::post('kit/{url}/product/create',"ProductController@createProduct");
Route::post('kit/{url}/product/save',"ProductController@saveProductInfo");
Route::post('kit/{url}/product/delete',"ProductController@deleteProduct");
Route::post('kit/{url}/product/get',"ProductController@getProducts");
Route::post('kit/{url}/product/files/save',"ProductController@saveFile");
Route::post('kit/{url}/video/create',"VideoController@createVideo");
Route::post('kit/{url}/video/save',"VideoController@saveVideo");
Route::post('kit/{url}/video/delete',"VideoController@deleteVideo");
Route::post('kit/{url}/video/get',"VideoController@getVideos");
Route::post('kit/{url}/team/create',"TeamController@createTeam");
Route::post('kit/{url}/team/save',"TeamController@saveTeamInfo");
Route::post('kit/{url}/team/delete',"TeamController@deleteTeam");
Route::post('kit/{url}/team/get',"TeamController@getTeam");
Route::post('kit/{url}/team/files/save',"TeamController@saveFile");
Route::post('kit/{url}/investor/create',"InvestorController@create");
Route::post('kit/{url}/investor/save',"InvestorController@store");
Route::post('kit/{url}/investor/delete',"InvestorController@delete");
Route::post('kit/{url}/investor/get',"InvestorController@index");
Route::post('kit/{url}/investor/files/save',"InvestorController@saveFile");
Route::post('kit/{url}/asset/create',"AssetController@create");
Route::post('kit/{url}/asset/save',"AssetController@store");
Route::post('kit/{url}/asset/delete',"AssetController@delete");
Route::post('kit/{url}/asset/get',"AssetController@index");
Route::post('kit/{url}/asset/files/save',"AssetController@saveFile");
Route::post('kit/{url}/image/create',"ImageController@create");
Route::post('kit/{url}/image/save',"ImageController@store");
Route::post('kit/{url}/image/delete',"ImageController@delete");
Route::post('kit/{url}/image/get',"ImageController@index");
Route::post('kit/{url}/image/files/save',"ImageController@saveFile");
Route::post('kit/{url}/advisory/create',"AdvisoryController@create");
Route::post('kit/{url}/advisory/save',"AdvisoryController@store");
Route::post('kit/{url}/advisory/delete',"AdvisoryController@delete");
Route::post('kit/{url}/advisory/get',"AdvisoryController@index");
Route::post('kit/{url}/advisory/files/save',"AdvisoryController@saveFile");
Route::post('kit/{url}/news/create',"NewsController@create");
Route::post('kit/{url}/news/save',"NewsController@store");
Route::post('kit/{url}/news/delete',"NewsController@delete");
Route::post('kit/{url}/news/get',"NewsController@index");
Route::post('kit/{url}/news/files/save',"NewsController@saveFile");
Route::post('kit/{url}/color/create',"ColorController@create");
Route::post('kit/{url}/color/save',"ColorController@store");
Route::post('kit/{url}/color/delete',"ColorController@delete");
Route::post('kit/{url}/color/get',"ColorController@index");
Route::post('kit/{url}/pressurl/create',"PressUrlController@create");
Route::post('kit/{url}/pressurl/save',"PressUrlController@store");
Route::post('kit/{url}/pressurl/delete',"PressUrlController@delete");
Route::post('kit/{url}/pressurl/get',"PressUrlController@index");
Route::post('kit/{url}/producthunt/create',"ProductHuntController@create");
Route::post('kit/{url}/producthunt/save',"ProductHuntController@store");
Route::post('kit/{url}/producthunt/delete',"ProductHuntController@delete");
Route::post('add-domain',"KitsController@saveDomain");

Route::post('kit/{url}/company/get',"CompanyController@index");
//dashboard routes


   //auth routes
    Route::get('/', function () {
        return view('auth/login');
    })->middleware('checkAuth');
    Route::get('/login', function () {
        return view('auth/login');
    })->middleware('checkAuth');
    Route::get('/signup', function () {
        return view('auth/signup');
    })->middleware('checkAuth');
    Route::get('dashboard',"KitsController@index")->middleware('dashboard');
    Route::get('add-domain',"KitsController@addDomain")->middleware('dashboard');
    Route::get('edit/domain/{id}',"KitsController@editDomain")->middleware('dashboard');
    Route::get('kit/{url}',"KitsController@editKit")->middleware('dashboard');
    Route::get('kit/{url}/preview',"KitsController@preview")->middleware('dashboard');
    Route::get('kit/{url}/get',"KitsController@showKit");
Route::group(['domain' => '{subdomain}.presskitelaravel.com'], function()
{
    Route::get('/', "KitsController@showKit");
});

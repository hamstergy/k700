<?php

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
    return view('home');
});
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);
Route::get('posts/{post}', ['uses' => 'PostController@show', 'as' => 'posts.post']);
Route::get('specservice/', ['uses' => 'SpecServiceController@index', 'as' => 'specservice']);
Route::get('parts/', ['uses' => 'SparepartController@index', 'as' => 'parts']);
Route::get('parts/{spectype}/', ['uses' => 'SparepartController@getSpareparts', 'as' => 'parts.specsparepart']);
Route::post('parts/{spectype}/', ['uses' => 'SparepartController@getSpareparts', 'as' => 'parts.specsparepart']);
Route::get('spectehnika/', ['uses' => 'SparepartController@spectehnika', 'as' => 'spectehnika']);
Route::get('spectehnika/{spectype}/', ['uses' => 'VehicleController@getVehicles', 'as' => 'spectehnika.vehicles']);
Route::post('spectehnika/{spectype}/', ['uses' => 'VehicleController@getVehicles', 'as' => 'spectehnika.vehicles']);
Route::get('spectehnika/vehicle/{vehicle}', ['uses' => 'VehicleController@show', 'as' => 'spectehnika.vehicle']);
Route::post('spectehnika/vehicle/{vehicle}', ['uses' => 'VehicleController@show', 'as' => 'spectehnika.vehicle']);
Route::get('parts/{spectype}/{specsparepart}', ['uses' => 'SparepartController@getBrands', 'as' => 'parts.specbrand']);
Route::post('parts/{spectype}/{specsparepart}', ['uses' => 'SparepartController@getBrands', 'as' => 'parts.specbrand']);
Route::get('parts/{spectype}/{specsparepart}/{specbrand}', ['uses' => 'SparepartController@getSpecmodels', 'as' => 'parts.specmodel']);
Route::post('parts/{spectype}/{specsparepart}/{specbrand}', ['uses' => 'SparepartController@getSpecmodels', 'as' => 'parts.specmodel']);

Route::get('tyres/', ['uses' => 'TyreController@index', 'as' => 'tyres']);
Route::get('tyres/{spectype}/', ['uses' => 'TyreController@getSpectyres', 'as' => 'tyres.tyres']);
Route::post('tyres/{spectype}/', ['uses' => 'TyreController@getSpectyres', 'as' => 'tyres.tyres']);

Route::post('request','RequestController@getRequestForm');
Route::post('requestspec','RequestController@getRequestFormParts');
Route::post('requestspectyres','RequestController@getRequestFormSpecTyres');
Route::post('requestspecservice','RequestController@getRequestFormSpecService');
Route::get('request', 'RequestController@getRequestForm');
Route::get('requestspec', 'RequestController@getRequestFormSpec');
Route::get('requestspectyres', 'RequestController@getRequestFormSpecTyres');
Route::get('requestspecservice', 'RequestController@getRequestFormSpecService');
Route::get('/sitemap.xml', 'SitemapController@index');
Route::get('/sitemap/posts.xml', 'SitemapController@posts');
Route::get('/sitemap/spectehnika.xml', 'SitemapController@spectehnika');
Route::get('/sitemap/parts.xml', 'SitemapController@parts');
Route::get('/sitemap/tyres.xml', 'SitemapController@tyres');
Route::get('/sitemap/tyres.xml', 'SitemapController@tyres');
Route::get('/turbo/vehicles.xml', 'YandexTurboPages@index');

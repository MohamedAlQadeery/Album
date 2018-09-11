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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', ['as' => 'album.index', 'uses' => 'AlbumController@index']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' =>'auth'], function () {
    Route::get('logout', 'Controller@customLogout')->name('customLogout');

    Route::group(['prefix' => 'album'], function () {
        Route::get('/showAllAlbums', ['as' => 'album.showAllAlbums', 'uses' => 'AlbumController@showAllAlbums']);
        Route::get('create', ['as' => 'album.create', 'uses' => 'AlbumController@create']);
        Route::post('create', ['as' => 'album.store', 'uses' => 'AlbumController@store']);
        Route::get('/{id}', ['as' => 'album.show', 'uses' => 'AlbumController@show']);
        Route::get('delete/{id}', ['as' => 'album.destroy', 'uses' => 'AlbumController@destroy']);

        // upload Photos Routes
        Route::get('/uploadPhoto/{id}', ['as' => 'photo.create', 'uses' => 'PhotoController@create']);
        Route::post('/uploadPhoto', ['as' => 'photo.store', 'uses' => 'PhotoController@store']);

    });

    Route::group(['prefix' => 'photo'], function () {
        Route::get('/{id}', ['as' => 'photo.show', 'uses' => 'PhotoController@show']);
        Route::get('delete/{id}', ['as' => 'photo.destroy', 'uses' => 'PhotoController@destroy']);
    });
});


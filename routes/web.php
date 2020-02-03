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

Route::get('/','HomeController@index')->name('index');
Route::get('nos-opportunites','HomeController@opportunite')->name('nos-opportunites');
Route::get('nos-universites','HomeController@universite')->name('nos-universites');
Route::get('a-propos','HomeController@apropos')->name('a-propos');
Route::get('contacts','HomeController@contact')->name('contacts');

Route::get('post/{slug}','PostController@details')->name('post.details');

Route::post('message-box','MsgboxController@store')->name('msgbox.store');

Route::get('/recherche','SearchController@search')->name('search');

Auth::routes();


Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']],
    function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('tag','TagController');
    Route::resource('pays','PaysController');
    Route::resource('slider','SliderController');
    Route::resource('universite','UniversiteController');
    Route::resource('post','PostController');

    Route::get('en-attente/post/','PostController@enattente')->name('post.en-attente');
    Route::put('/post/{id}/approuver','PostController@approbation')->name('post.approuver');

    Route::get('/message-box','MsgboxController@index')->name('msgbox.index');
    Route::delete('message-box','MsgboxController@destroy')->name('msgbox.destroy');
});

Route::group(['as'=>'auteur.','prefix'=>'auteur','namespace'=>'Auteur','middleware'=>['auth','auteur']],
    function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('post','PostController');

});

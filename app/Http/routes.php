<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'StuffController@welcome');

Route::get('/posts/{id}', ['uses' => 'StuffController@showPost']);

Route::auth();

Route::get('/about', function() {
    return view('pages.about');
})->name('about');

Route::group(['middleware' => 'web'], function () {
    
    Route::get('/home', 'HomeController@index');
    
    Route::post('/post', [
        'uses' => 'HomeController@newPost',
        'as' => 'post'
    ]);
    
    Route::post('/edit', 'HomeController@edit');
    
    Route::post('/update', [
            'uses' => 'HomeController@update',
            'as' => 'update'
        ]);
        
    Route::post('/delete', [
            'uses' => 'HomeController@delete',
            'as' => 'delete'
        ]);
    
});



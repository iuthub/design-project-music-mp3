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


Auth::routes();
    Route::get('/',['uses'=>'Main\MainPageController@show', 'as'=>'music']);
    Route::get('/home',['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/genres',['as' => 'genres', 'uses' => 'GenreController@rock']);
    Route::get('/about', function () {
        return view('about');
    })->name('about');
    Route::get('/send.message',['uses'=>'MassageController@sendMessage', 'as'=>'send.message'])->middleware('web');
    Route::get('/add',['uses'=>'Main\MainPageController@addToMyPlaylist', 'as'=>'add_song'])->middleware('auth');;
//Genres

  Route::get('/genres/rock',['uses'=>'GenreController@rock', 'as'=>'rock']);
  Route::get('/genres/classical',['uses'=>'GenreController@classical', 'as'=>'classical']);
  Route::get('/genres/pop',['uses'=>'GenreController@pop', 'as'=>'pop']);
  Route::get('/genres/rap',['uses'=>'GenreController@rap', 'as'=>'rap']);
  Route::get('/genres/jazz',['uses'=>'GenreController@jazz', 'as'=>'jazz']);


//User
Route::group(['prefix'=>'profile', 'middleware'=>['web', 'auth']], function(){
    Route::get('/',['uses'=>'UserController@profile', 'as'=>'profile']);
    Route::get('/playlist', ['uses'=>'UserController@show_playlist', 'as'=>'playlist']);
    Route::patch('update',  ['as' => 'users.update', 'uses' => 'UserController@update']);
    Route::get('/img-upload',['uses'=>'UserController@imgUpload', 'as'=>'img-upload']);
    Route::post('/img-upload',['uses'=>'UserController@imgUpload', 'as'=>'img-upload']);
    Route::post('/playlist',['uses'=>'UserController@musicUpload', 'as'=>'upload.music']);
    Route::get('/playlist/suggest',['uses'=>'UserController@makeSuggest', 'as'=>'makeSuggest']);
    Route::get('/playlist/unlike',['uses'=>'UserController@unlike', 'as'=>'unlike']);

});

    //Admin
    Route::group(['prefix'=>'admin', 'middleware'=>['web','auth']], function(){
    Route::get('/',['uses'=>'Admin\AdminController@showMessages', 'as'=>'admin_messages']);

    Route::get('/music', ['uses'=>'Admin\AdminController@showMusic', 'as'=>'admin_music']);
    Route::get('/users', ['uses'=>'Admin\AdminController@showUsers', 'as'=>'admin_users']);
    Route::get('/profile', ['uses'=>'Admin\AdminController@showProfile', 'as'=>'admin_profile']);

    Route::get('/add/music',['uses'=>'Admin\AdminPostController@show', 'as'=>'admin_add_music']);
    Route::post('/add/music',['uses'=>'Admin\AdminPostController@create', 'as'=>'admin_add_m']);
    Route::post('/add/music/edit',['uses'=>'Admin\AdminPostController@edit', 'as'=>'admin_add_edit']);
    Route::get('/add/music/delete',['uses'=>'Admin\AdminPostController@delete', 'as'=>'admin_delete']);
    Route::get('/update/music',['uses'=>'Admin\AdminUpdateController@show', 'as'=>'admin_update_music']);
    Route::post('/update/music',['uses'=>'Admin\AdminUpdateController@create', 'as'=>'admin_update_m']);

    Route::get('/suggested',['uses'=>'Admin\AdminController@showSuggested', 'as'=>'suggested']);
    Route::get('/suggested/edit',['uses'=>'Admin\AdminController@showSuggestedEdit', 'as'=>'suggestedEdit']);
    Route::get('/suggested/edit',['uses'=>'Admin\AdminUpdateController@setGlobal', 'as'=>'setGlobal']);
    Route::get('/suggested/delete',['uses'=>'Admin\AdminUpdateController@suggestDelete', 'as'=>'suggestDelete']);
    Route::get('/suggested/music',['uses'=>'Admin\AdminUpdateController@suggestedMusic', 'as'=>'suggestedMusic']);



});
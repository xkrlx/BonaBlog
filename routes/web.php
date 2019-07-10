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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::get('/index', function () {
    return view('pages.index');
});

Route::get('/access', function () {
    return view('pages.noaccess');
});

Route::get('/','PagesController@index');

Route::get('/news','PagesController@index2');
Route::get('/sport','PagesController@index3');
Route::get('/inne','PagesController@index4');



Route::get('/page/{page}',[
    'uses' => 'PagesController@show',
    'as' => 'pages.show'
]);


Route::post('comments/{post_id}',['uses'=>'CommentsController@store','as'=> 'comments.store']);


Route::post('comments/{id}/reply',['uses'=>'RepliesController@store','as'=>'reply.store']);




Route::group([
    'middleware'=>'roles',
    'roles'=>['moderator','user']
], function(){
    Route::get('/create', 'PagesController@create');

    Route::post('/store',[
        'uses' => 'PagesController@store',
        'as' => 'pages.store'
    ]);

    Route::POST('/page/{page}', [
        'uses' => 'PagesController@destroy',
        'as' => 'pages.delete'
    ]);

    Route::get('/page/{page}/edit',[
        'uses' => 'PagesController@edit',
        'as' => 'pages.edit'
    ]);

    Route::post('/page/{page}/page', [
        'uses' => 'PagesController@update',
        'as' => 'pages.update'
    ]);
    Route::get('page/like/{id}',  ['uses' => 'LikeController@likePost','as' => 'page.like']);

    Route::get('/myprofile', 'ProfileController@index');

    Route::get('/myprofile/{user}/edit',[
        'uses' => 'ProfileController@edit',
        'as' => 'profile.edit'
    ]);

    Route::post('/myprofile/{user}/update', [
        'uses' => 'ProfileController@update',
        'as' => 'profile.update'
        ]);

    Route::get('/profile/{id}','ProfileController@index2');

    Route::get('/myprofile/{user}/changepassword','ProfileController@changepassword');

    Route::post('/myprofile/{user}/updatepassword', [
        'uses' => 'ProfileController@updatepassword',
        'as' => 'profile.updatepassword'
    ]);
});

Route::group([
    'middlwere' =>'roles',
    'roles' => 'moderator'
], function(){
    //usuwanie komentarzy)
    Route::get('comments/{id}',['uses'=>'CommentsController@delete','as'=>'comments.delete']);
    Route::get('comments/{id}/reply',['uses'=>'RepliesController@destroy','as'=>'reply.delete']);
});


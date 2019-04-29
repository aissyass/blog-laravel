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

use App\Mail\TestEmail;

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Routres for Test SEND
Route::get('/testsend', function() {
    $data = ['message' => 'This is a test!'];
    Mail::to('aissyass91@gmail.com')->send(new TestEmail($data));
    return back();
});


// Routes for Search
Route::get('/search', 'SiteController@search')->name('searchPosts');


// Routes for Fronted
Route::get('/', 'SiteController@index')->name('siteIndex');
Route::get('/p/{slug}', 'SiteController@post')->name('postInfo');
Route::get('/category/{id}', 'SiteController@category')->name('categoryPosts');
Route::get('/tag/{id}', 'SiteController@tag')->name('tagPosts');


// Routes for Backend
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    // Routes for Posts
    Route::get('/posts', 'PostController@index')->name('posts');
    Route::get('/post/create', 'PostController@create')->name('postCreate');
    Route::post('/post/store', 'PostController@store')->name('postStore');
    Route::get('/post/delete/{id}', 'PostController@destroy')->name('postDelete');
    Route::get('/post/trashed', 'PostController@trashed')->name('postTrashed');
    Route::get('/post/restore/{id}', 'PostController@restore')->name('postRestore');
    Route::get('/post/hdelete/{id}', 'PostController@hardDelete')->name('postHardDelete');
    Route::get('/post/edit/{id}', 'PostController@edit')->name('postEdit');
    Route::post('/post/update/{id}', 'PostController@update')->name('postUpdate');

    // Routes for Categories
    Route::get('/categories', 'CategoryController@index')->name('categories');
    Route::get('/category/create', 'CategoryController@create')->name('categoryCreate');
    Route::post('/category/store', 'CategoryController@store')->name('categoryStore');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('categoryEdit');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('categoryUpdate');
    Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('categoryDelete');

    // Routes for Tags
    Route::get('/tags', 'TagController@index')->name('tags');
    Route::get('/tag/create', 'TagController@create')->name('tagCreate');
    Route::post('/tag/store', 'TagController@store')->name('tagStore');
    Route::get('/tag/edit/{id}', 'TagController@edit')->name('tagEdit');
    Route::post('/tag/update/{id}', 'TagController@update')->name('tagUpdate');
    Route::get('/tag/delete/{id}', 'TagController@destroy')->name('tagDelete');

    // Routes for Users
    Route::get('/users', 'UserController@index')->name('users');
    Route::get('/user/admin/{id}', 'UserController@admin')->name('userAdmin');
    Route::get('/user/nadmin/{id}', 'UserController@notAdmin')->name('userNotAdmin');
    Route::get('/user/create', 'UserController@create')->name('userCreate');
    Route::post('/user/store', 'UserController@store')->name('userStore');

    // Routes for Setting
    Route::get('/settings', 'SettingController@index')->name('settings');
    Route::post('/setting/update', 'SettingController@update')->name('settingUpdate');
});

// Routes Test
Route::get('/contact/{age?}', 'HomeController@contact')->name('contact');
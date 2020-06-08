<?php

use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('pages.index');
// });
Route::get('/','MenuController@index');

Route::get('/about-us','MenuController@about')->name('about');

Route::get('/contactUs','MenuController@contact')->name('contact');
Route::get('/writePost','MenuController@writePost')->name('write.post');
Route::get('/blog','MenuController@blog')->name('blog');

//category crud are here
Route::get('/allCategory','MenuController@AllCategory')->name('all.category');
Route::get('/addCategory','MenuController@AddCategory')->name('add.category');
Route::post('/storeCategory','MenuController@StoreCategory')->name('store.category');
Route::get('view/category/{id}', 'MenuController@ViewCategory');
Route::get('delete/category/{id}', 'MenuController@DeleteCategory');
Route::get('edit/category/{id}', 'MenuController@EditCategory');
Route::post('update/category/{id}', 'MenuController@UpdateCategory');


//post crude are Here
Route::get('/writePost','PostController@writePost')->name('write.post');
Route::post('store/post','PostController@storePost')->name('store.post');
Route::get('/allPost','PostController@AllPost')->name('all.post');
Route::get('view/post/{id}', 'PostController@ViewPost');
Route::get('delete/post/{id}', 'PostController@DeletePost');
Route::get('edit/post/{id}', 'PostController@EditPost');
Route::post('update/post/{id}', 'PostController@UpdatePost');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

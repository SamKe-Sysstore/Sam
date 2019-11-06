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
    return view('frontend.index');
})->name('home');

Route::get('about', function () {
    return view('frontend.about');
})->name('about');

Route::get('products', function () {
    return view('frontend.products');
})->name('products');

Route::get('store', function () {
    return view('frontend.store');
})->name('store');

// �n�J����
Route::get('/admin/login', function (){
    return view('backend.login');
});
Route::post('/admin/login', 'Auth\LoginController@login')->name('login');
// ��auth middleware�i������
// prefix �N��group����url���|�e����/admin/
// name �N�� group��route�R�W�ɡA�C��name���e��|�[�Jadmin.
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {
 
    // �n�X
    Route::get('/admin/logout', 'Auth\LoginController@logout')->name('logout');
 
    // Website����s
    Route::get('/', 'Backend\WebsiteController@edit')->name('website.edit');
    Route::post('/', 'Backend\WebsiteController@update')->name('website.update');
 
    // Home����s
    Route::get('home', 'Backend\HomeController@edit')->name('home.edit');
    Route::post('home', 'Backend\HomeController@update')->name('home.update');
 
    // About����s
    Route::get('about', 'Backend\AboutController@edit')->name('about.edit');
    Route::post('about', 'Backend\AboutController@update')->name('about.update');
 
    // Product���W�R��d�٦�index����
    Route::resource('product', 'Backend\ProductController', ['except'=> ['show']]);
 
    // Store����s
    Route::get('store', 'Backend\StoreController@edit')->name('store.edit');
    Route::post('store', 'Backend\StoreController@update')->name('store.update');
});

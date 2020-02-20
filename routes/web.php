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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// category related-----------
Route::get('/add-category', 'category\categorycontroller@add_category')->name('add-category');
Route::post('/save-category', 'category\categorycontroller@save_category')->name('save-category');
Route::get('/manage-category', 'category\categorycontroller@manage_category')->name('manage-category');
Route::get('/details-category/{id}', 'category\categorycontroller@details_category')->name('details-category');
Route::get('/edit-category/{id}', 'category\categorycontroller@edit_category')->name('edit-category');
Route::post('/update-category', 'category\categorycontroller@update_category')->name('update-category');


// subcategory related------------
Route::get('/manage-sub-category', 'subcategory\subcategoryController@manage_sub_category')->name('manage-sub-category');
Route::get('/add-sub-category', 'subcategory\subcategoryController@add_sub_category')->name('add-sub-category');
// Route::get('/get-sub-category', 'subcategory\subcategoryController@get_sub_category')->name('get-sub-category');
Route::post('/save-subcategory','subcategory\subcategoryController@save_sub_category')->name('save-subcategory');
Route::get('/category-wise-subcategory','subcategory\subcategoryController@category_wise_subcategory')->name('category-wise-subcategory');

// slider related-------------
Route::get('/manage-slider','slider\sliderController@manage_slider')->name('manage-slider');
Route::get('/add-slider','slider\sliderController@add_slider')->name('add-slider');
Route::post('/save-slider','slider\sliderController@save_slider')->name('save-slider');
Route::get('/slider-details/{id}','slider\sliderController@slider_details')->name('slider-details');
Route::get('/delete-slider/{id}','slider\sliderController@delete_slider')->name('delete-slider');
Route::get('/edit-slider/{id}','slider\sliderController@edit_slider')->name('edit-slider');
Route::post('/update-slider','slider\sliderController@update_slider')->name('update-slider');



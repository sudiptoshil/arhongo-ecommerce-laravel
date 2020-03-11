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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();



// for client part ---------------------
Route::get('/','client\clientController@index');
Route::get('/category-product/{id}','client\clientController@category_product')->name('category-product');
Route::get('/sub-category-product/{id}','client\clientController@sab_category_product')->name('sub-category-product');

Route::post('/client-signup','client\checkoutController@client_signup')->name('client-signup');
Route::get('/client-logout','client\checkoutController@logout')->name('client-logout');
Route::post('/client-login','client\checkoutController@client_login')->name('client-login');

// for contact---------------------------
Route::get('/contact-us','client\contactController@contact_us')->name('contact-us');
// shopping cart--------------------------
Route::post('/add-to-cart','cart\cartController@add_to_cart')->name('add-to-cart');
// order confirmation---------------------
Route::get('/place-order','order\orderController@place_order')->name('place-order');






Route::group(['middleware' => ['auth']], function () {

Route::get('/home', 'HomeController@index')->name('home');
// category related-----------
Route::get('/manage-category','category\categorycontroller@manage_category')->name('manage-category');
Route::get('/manage-categorywise-category/{id}','category\categorycontroller@manage_category_wise_category')->name('manage-categorywise-category');
Route::get('/add-categorywise-category/{id}','category\categorycontroller@add_categorywise_category')->name('add-categorywise-category');
Route::post('/save-categorywise-category','category\categorycontroller@save_categorywise_category')->name('save-categorywise-category');
Route::get('/add-category','category\categorycontroller@add_category')->name('add-category');
Route::post('/save-category','category\categorycontroller@save_category')->name('save-category');



// subcategory related------------
Route::get('/manage-sub-category', 'subcategory\subcategoryController@manage_sub_category')->name('manage-sub-category');
Route::get('/add-sub-category', 'subcategory\subcategoryController@add_sub_category')->name('add-sub-category');
Route::post('/save-subcategory','subcategory\subcategoryController@save_sub_category')->name('save-subcategory');
Route::get('/edit-sub-category/{id}', 'subcategory\subcategoryController@edit_sub_category')->name('edit-sub-category');
Route::post('/update-subcategory','subcategory\subcategoryController@update_sub_category')->name('update-subcategory');
Route::get('/details-sub-category/{id}', 'subcategory\subcategoryController@details_sub_category')->name('details-sub-category');



// slider related-------------
Route::get('/manage-slider','slider\sliderController@manage_slider')->name('manage-slider');
Route::get('/add-slider','slider\sliderController@add_slider')->name('add-slider');
Route::post('/save-slider','slider\sliderController@save_slider')->name('save-slider');
Route::get('/slider-details/{id}','slider\sliderController@slider_details')->name('slider-details');
Route::get('/delete-slider/{id}','slider\sliderController@delete_slider')->name('delete-slider');
Route::get('/edit-slider/{id}','slider\sliderController@edit_slider')->name('edit-slider');
Route::post('/update-slider','slider\sliderController@update_slider')->name('update-slider');




// type related----------------------------
Route::get('/manage-type','type\typeController@manage_type')->name('manage-type');
Route::get('/add-type','type\typeController@add_type')->name('add-type');
Route::post('/save-type','type\typeController@save_type')->name('save-type');
Route::get('/type-details/{id}','type\typeController@type_details')->name('type-details');
Route::get('/edit-type/{id}','type\typeController@edit_type')->name('edit-type');
Route::post('/update-type','type\typeController@update_type')->name('update-type');



// product related-------------------------
Route::get('/manage-product','product\productController@manage_product')->name('manage-product');
Route::get('/add-product','product\productController@add_product')->name('add-product');
Route::post('/save-product','product\productController@save_product')->name('save-product');
Route::get('/product-details/{id}','product\productController@product_details')->name('product-details');
Route::get('/edit-product/{id}','product\productController@edit_product')->name('edit-product');
Route::post('/update-product','product\productController@update_product')->name('update-product');




// add product size color related-------------
Route::post('/add-color-size','color_size\color_sizeController@add_color_size')->name('add-color-size');
// add product more image related---------------
Route::post('/add-more-image','product_image\product_imageController@addmoreimage')->name('add-more-image');

// api related --------------------
Route::get('/get-categories/{id}','Api\apiController@getcategories');
Route::get('/get-brand/{id}','Api\apiController@getbrands');
});




// for vendor-------------------------------

    // vendor login ------------------
Route::get('/vendor-login','vendor\vendorController@vendor_login')->name('vendor-login');
Route::post('/vendor-new-login','vendor\vendorController@vendor_new_login')->name('vendor-new-login');
 // vendor sign up-----------------------
Route::get('/vendor-signup','vendor\vendorController@vendor_signup')->name('vendor-signup');
Route::post('/vendor-new-signup','vendor\vendorController@vendor_new_signup')->name('vendor-new-signup');
Route::get('/vendor-logout','vendor\vendorController@vendor_logout')->name('vendor-logout');
  // vendor dashboad---------------------
Route::get('/vendor-dashboard','vendor\vendorController@vendor_dashboard')->name('vendor-dashboard');




 // vendor brand ------------------------
Route::get('/vendor-manage-brand','vendor\brand\brandController@vendor_manage_brand')->name('vendor-manage-brand');
Route::post('/vendor-save-brand','vendor\brand\brandController@vendor_save_brand')->name('vendor-save-brand');
Route::get('/vendor-edit-brand/{id}','vendor\brand\brandController@vendor_edit_brand')->name('vendor-edit-brand');



// vendor  product ---------------------
Route::get('/vendor-manage-product','vendor\product\productController@vendor_manage_product')->name('vendor-manage-product');

Route::get('/vendor-add-product','vendor\product\productController@vendor_add_product')->name('vendor-add-product');

Route::post('/vendor-save-product','vendor\product\productController@vendor_save_product')->name('vendor-save-product');

Route::get('/vendor-edit-product/{id}','vendor\product\productController@vendor_edit_product')->name('vendor-edit-product');

Route::post('/vendor-update-product','vendor\product\productController@vendor_update_product')->name('vendor-update-product');

Route::get('/vendor-details-product/{id}','vendor\product\productController@vendor_details_product')->name('vendor-details-product');
// Vendor color_size 
Route::post('/vendor-save-sizecolor','vendor\color_size\color_sizeController@vendor_save_sizecolor')->name('vendor-save-sizecolor');
// vendor product image------------------
Route::post('/vendor-add-more-image','vendor\product_image\product_imageController@vendor_addmoreimage')->name('vendor-add-more-image');




 Route::get('/productimage','vendor\product\productController@product_image');
//Route::get('/product-image','product\productController@product_image');

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
Route::get('/index',function (){
    return view('dashboard/index');
});
Route::get('/blog',function (){
    return view('front-end/blog');

});
Route::get('/home',function (){
    return view('front-end/index');

});
Route::get('/product',function (){
    return view('front-end/product');

});
Route::get('/contact',function (){
    return view('front-end/contact');

});
Route::get('/blog-details',function (){
    return view('front-end/blog-details');

});
Route::get('/shop',function (){
    return view('front-end/shop');

});
Route::get('/register',function (){
    return view('front-end/register');

});
Route::get('/shopping-cart',function (){
    return view('front-end/shopping-cart');

});
Route::get('/check-out',function (){
    return view('front-end/check-out');

});
Route::get('/login',function (){
    return view('front-end/login');

});

Route::resource('admins','AdminController');
Route::resource('brands', 'BrandController');
Route::resource('banners', 'BannerController');
Route::resource('carts','CartController');
Route::resource('categories','CategoryController');
Route::resource('contacts','ContactController');
Route::resource('products','ProductController');
Route::resource('labels','LabelController');
Route::resource('pages','PageController');
Route::resource('orders','OrderController');
Route::resource('populars','PopularController');




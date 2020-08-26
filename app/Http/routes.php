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

Route::get('/','PagesController@home');
Route::get('/about','PagesController@about');
Route::get('/contact','TicketsController@create');
Route::post('/contact','TicketsController@store');
Route::get('/faq','PagesController@faq');
Route::get('/help','PagesController@help');
Route::get('/terms','PagesController@terms');
Route::get('/privacy','PagesController@privacy');
Route::get('/testimonials','PagesController@testimonials');
Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function() {
  Route::get('/','PagesController@home');
  Route::get('tickets','TicketsController@index');
  Route::get('users', [ 'as' => 'admin.user.index', 'uses' => 'UsersController@index']);
Route::get('users', [ 'as' => 'admin.user.index', 'uses' => 'UsersController@search']);
  Route::get('roles','RolesController@index');
  Route::get('roles/create','RolesController@create');
  Route::post('roles/create','RolesController@store');
  Route::get('users/{id?}/edit','UsersController@edit');
  Route::get('users/{id?}/orders','UsersController@orders');
  Route::get('users/{id?}/payments','UsersController@payments');
  Route::get('users/{id?}/message','UsersController@message');
  Route::post('users/{id?}/message','UsersController@send_message');
  Route::get('users/{id?}/activate','UsersController@activate');
  Route::get('users/{id?}/deactivate','UsersController@deactivate');
  Route::get('users/{id?}/re_activate','UsersController@re_activate');
  Route::post('users/{id?}/edit','UsersController@update');
  Route::get('posts','PostsController@index');
  Route::get('posts','PostsController@available');
  Route::get('posts/unavailable/{id?}','PostsController@unavailable');
  Route::get('posts','PostsController@search');
  Route::get('posts/create','PostsController@create');
  Route::post('posts/create','PostsController@store');
  Route::get('posts/{id?}/edit','PostsController@edit');
  Route::post('posts/{id?}/edit','PostsController@update');
  Route::get('categories','CategoriesController@index');
  Route::get('categories/create','CategoriesController@create');
  Route::post('categories/create','CategoriesController@store');
  Route::get('/{slug?}','CategoriesController@show');
});
Route::group(array('prefix' => 'staff', 'namespace' => 'Staff', 'middleware' => 'staff'), function() {
  Route::get('/','PagesController@home');
  Route::get('users', [ 'as' => 'staff.user.index', 'uses' => 'UsersController@index']);
Route::get('users', [ 'as' => 'staff.user.index', 'uses' => 'UsersController@search']);
  Route::get('users/{id?}/edit','UsersController@edit');
  Route::get('users/{id?}/orders','UsersController@orders');
  Route::get('users/{id?}/payments','UsersController@payments');
  Route::get('users/{id?}/message','UsersController@message');
  Route::post('users/{id?}/message','UsersController@send_message');
  Route::get('users/{id?}/activate','UsersController@activate');
  Route::post('users/{id?}/edit','UsersController@update');
  Route::get('posts','PostsController@index');
  Route::get('posts','PostsController@search');
  Route::get('posts/create','PostsController@create');
  Route::post('posts/create','PostsController@store');
  Route::get('posts/{id?}/edit','PostsController@edit');
  Route::post('posts/{id?}/edit','PostsController@update');
});
Route::resource('search', 'SearchController@search');
Route::get('users/logout', 'Auth\AuthController@getLogout');
Route::get('/{slug?}.html', 'ProductController@index');
Route::get('/checkout/{slug?}.html', 'ProductController@checkout');
Route::post('/checkout/{slug?}.html', 'ProductController@pay_item');
Route::get('orders/get_order_details_{id?}.html','ProductController@order_details');
Route::get('verify_payment','ProductController@verify_payment');
Route::get('payment_receipt','ProductController@payment_receipt');
Route::post('orders/get_order_details_{id?}.html','ProductController@order_details_post');
Route::post('orders/get_order_details_{id?}.html','ProductController@order_details_post_2');
Route::get('/payment/{slug?}.html', 'ProductController@payment');
Route::get('/{slug?}', 'ProductController@show');
Route::get('/users/orders', 'ProductController@orders');
Route::get('/users/messages', 'UsersController@inbox');
Route::get('messages/get_message_details_{id?}.html','UsersController@inbox_read');
Route::post('/comment', 'CommentsController@newComment');
Route::get('users/profile', 'UsersController@profile');
Route::get('users/view-{id?}', 'UsersController@view');
Route::get('register/verify/{confirmation_code}',[ 'as' => 'confirmation_path', 'uses' => 'RegistrationController@confirm']);
Route::get('users/resend_verify_link','RegistrationController@re_confirm_1');
Route::post('users/resend_verify_link','RegistrationController@re_confirm_2');
Route::get('users/forgot_password','PasswordController@show');
Route::post('users/forgot_password','PasswordController@store');
Route::get('forgot_password/{token}',[ 'as' => 'confirmation_path', 'uses' => 'PasswordController@confirm']);
Route::post('forgot_password/{token}',[ 'as' => 'confirmation_path', 'uses' => 'PasswordController@confirm_2']);
Route::get('users/register', 'RegistrationController@index');
Route::post('users/register', 'RegistrationController@store');
Route::get('users/login', 'LoginController@index');
Route::post('users/login', 'LoginController@store');

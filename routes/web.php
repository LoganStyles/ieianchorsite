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

Route::get('/ops', function () {
    return view('login');
})->name('login'); //..go to login page
//users & dashboard
/*generic is a placeholder for any subitem*/
Route::get('/templates/dashboard', 'UserController@getDashboard')->name('dashboard'); //..display dashboard

Route::get('/templates/activity', 'AppController@getActivity')->name('activity'); //..display dashboard

Route::get('/logout', 'UserController@logoutUser')->name('logout'); //..logout user
Route::get('/users', 'UserController@index')->name('show_users'); //..display users page
Route::get('/create_user', 'UserController@createAdmin')->name('create_user'); //..display create administrator page
Route::post('create_administrator', 'UserController@postCreateUser')->name('create_u'); //..submit post data to create an administrator
Route::post('/dashboard', 'UserController@postLoginUser')->name('login_u'); //..go to dashboard after login
//roles
Route::get('/usergroups', 'UserController@showUserGroups')->name('show_usergroups'); //..display usergroups page
Route::post('process_usergroup', 'UserController@processUserGroups')->name('process_role'); //..create/edit usergroups
//Setup
Route::get('/setup', 'AppController@setup')->name('setup'); //display site page
Route::post('site_update', 'AppController@updateSite')->name('update_site'); //process site info
//About
Route::get('/module/{generic}', 'AppController@showModule'); //display abouts and other modules in admin page
Route::post('process_about', 'AppController@processModule')->name('process_about'); //process about items
Route::post('delete_about', 'AppController@destroy')->name('delete_ab');

//Service
Route::post('process_service', 'AppController@processModule')->name('process_service'); //process service items
Route::post('delete_service', 'AppController@destroy')->name('delete_service');

//Testimonial
Route::post('process_testimonial', 'AppController@processModule')->name('process_testimonial'); //process testimonial items
Route::post('delete_testimonial', 'AppController@destroy')->name('delete_testimonial');

//News
Route::post('process_newsitem', 'AppController@processModule')->name('process_newsitem'); //process testimonial items
Route::post('delete_newsitem', 'AppController@destroy')->name('newsitem_testimonial');

//Banner
Route::post('process_banner', 'AppController@processModule')->name('process_banner'); //process banner items
Route::post('delete_banner', 'AppController@destroy')->name('delete_banner');

//Board
Route::post('process_board', 'AppController@processModule')->name('process_board'); //process board items
Route::post('delete_board', 'AppController@destroy')->name('delete_board');

//Management
Route::post('process_management', 'AppController@processModule')->name('process_management'); //process management items
Route::post('delete_management', 'AppController@destroy')->name('delete_management');

//Feedback
Route::post('process_feedback', 'AppController@processContact')->name('process_feedback'); //process feedback items
Route::post('delete_feedback', 'AppController@destroy')->name('delete_feedback');

//Register
Route::post('process_register', 'AppController@processRegister')->name('process_register'); //process register items
Route::post('delete_register', 'AppController@destroy')->name('delete_register');

Route::get('/unitprice/range','AppController@fetchRangeOfPrices')->name('unitprice_range');

//site pages & content
Route::get('index', 'AppController@index')->name('home');
Route::get('/investment', 'AppController@showInvestment')->name('investment'); //..display investment strategy
//Route::get('/contact', 'AppController@showContact')->name('contact'); //..display contact page
Route::get('/single/{generic}', 'AppController@showPage'); //..display register,price history & other pages
//Route::get('/price_history', 'AppController@showPriceHistory')->name('price_history'); //..display  page
Route::get('/page/{generic}', 'AppController@show');//display a site page
Route::get('/page/{service}/{generic}', 'AppController@show');//display about site page
////Pension Calculator
Route::get('/listings/{pension}', 'AppController@showCalculator');//display pension calculator page
Route::post('pension_calculator', 'AppController@pensionCalculator')->name('pension_calc'); //pension calculator
//File downloads
Route::get('/downloads/{file}', 'AppController@downloadFile');//download an item

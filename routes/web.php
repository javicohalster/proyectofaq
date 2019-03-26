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

Route::get('/welcome/faqs', 'FaqCategoryController@frontFaqs');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('faqCategories', 'FaqCategoryController');

Route::resource('faqs', 'FaqController');
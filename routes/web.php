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



Route::group([
    'prefix' => 'admin',
//    'domain' => 'admin.paynext.my',
], function () {

    Voyager::routes();

    Route::post('update-cost', 'Admin\AdminController@update_cost')->name('update_cost');
});


Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Auth::routes();
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/news/{slug?}', 'HomeController@news')->name('news');
    Route::get('/how-to-use', 'HomeController@to_use')->name('to_use');
    Route::match(['get','post'],'/contact', 'HomeController@contact')->name('contact');




    Route::post('/change', 'HomeController@change')->name('change');
    Route::post('/change-confirm', 'HomeController@change_confirm')->name('change_confirm');
//    Route::get('/home/{slug?}', 'HomeController@index')->name('home');

    Route::get('/register', function () {
        if (!Auth::guest()) {
            return redirect()->route('home');
        } else {
            return view('auth.register');
        }
    });

    Route::post('/register', 'MyAuthController@register')->name('register');
    Route::post('/login', 'MyAuthController@login')->name('login');
    Route::group(['middleware' => 'myAuth'], function () {
        Route::get('/my-changes', 'UserController@index')->name('my_changes');
        Route::match(['get','post'],'/change-account/{selector?}', 'UserController@change_account')->name('change_account');
        Route::get('/logout', function (){
           Auth::logout();
           return redirect()->route('home');
        })->name('logout');
    });

});
Route::post('/cost', 'HomeController@cost');
Route::post('/update/new-order', 'Admin\AdminController@update_order_new');
Route::get('/login', function (){
    return abort(404);
});

Route::post('/checked-new-order', 'Admin\AdminController@checked_new_order');

Route::get('/home', function (){
    return redirect()->route('home');
});
// Route::get('/storage-link', function (){
//     $target = '/home/tuz173/public_html/paynext/storage/app/public';
//     $shortcut = '/home/tuz173/public_html/paynext/public';
//     symlink($target, $shortcut);
// });



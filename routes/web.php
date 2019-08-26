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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {
            Route::resource('/', 'Dashboard\DashboardController');
            Route::resource('/users', 'Dashboard\UserController');
            Route::resource('/category', 'Dashboard\CategoryController');
            // start course route
            Route::resource('/course', 'Dashboard\CourseController');
            // end course route

            // start lesson route
            Route::resource('/lesson', 'Dashboard\LessonController');
            // end lesson route

            //tag
            Route::resource('/tag', 'Dashboard\TagController');
            //end tag
            Route::get('/users/profile/{id}', 'Dashboard\UserController@profile')->name('users.profile');

            Route::post('/users/profile/{id}/edit', 'Dashboard\UserController@update_profile')->name('users.update_profile');
            Route::resource('/settings', 'Dashboard\SettingController');

        });

        Route::get('/', function () {
            return view('welcome');
        });
        Auth::routes();

    });

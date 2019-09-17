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
            Route::resource('/question', 'Dashboard\QuestionController');
            Route::resource('/exam', 'Dashboard\ExamController');
            Route::resource('/comment', 'Dashboard\CommentController');

        });
        Route::post('/course_enroll/{course_id}','Student\CourseController@enroll_and_in_enroll_course')->name('user.course_enroll');
        Route::get('/course','View\CourseController@course_list');
        Route::get('/course/{course_id}','View\CourseController@course_details')->name('course_details'); //course details
        Route::get('/lessons/{course_id}/{lesson_id?}','View\LessonsController@lessons_list')->name('course_lesson'); //lessons list
        Route::get('/','View\CourseController@course_list');
        Route::get('lesson/{lesson_id}/question','Student\QuestionController@lesson_question')->name('list_question');
        Route::post('lesson/question/comment','Student\CommentController@store_question')->name('new_comment_question');
        Route::post('lesson/question','Student\QuestionController@store')->name('new_question');
        Route::post('lesson/comment','Student\CommentController@store')->name('new_comment');



        ////////////////////////// lecture
        Route::get('lecture/course','Lecture\CourseController@index')->name('course_lecture.index');
        Route::post('lecture/course','Lecture\CourseController@store')->name('course_lecture.store');
        Route::get('lecture/course/{course_id}','Lecture\CourseController@show')->name('course_lecture.show');
        Route::get('lecture/course/{course_id}/edit','Lecture\CourseController@edit')->name('course_lecture.edit');
        Route::put('lecture/course/update','Lecture\CourseController@update')->name('course_lecture.update');
        Route::get('lecture/courses/student/{course_id}','Lecture\StudentController@showCoursesStudents')->name('course.student.show');
        Route::get('lecture/course/{course_id}/exam','Lecture\ExamController@index')->name('course.exam.show');
        Route::resource('lecture/course/{course_id}/exam', 'Lecture\ExamController');


        /////////////////////////// student
        Route::post('lesson/watch/','Student\CourseController@student_watch_lesson')->name('student.lesson.watch');
        Route::post('lesson/complete/','Student\CourseController@complete_watch_lesson')->name('student.lesson.complete');
        Route::get('student/course/','Student\CourseController@getEnrolledCoursesByUser')->name('student.courses.enrolled');
        /// end student

        ////////////////////////////start setting user
        ///
        Route::get('setting/','View\SettingController@index')->name('user.setting');
        Route::put('setting/update_info','View\SettingController@updateUserInformation')->name('user.updateInfo');
        Route::put('setting/update_password','View\SettingController@updateUserPassword')->name('user.updatePassword');


        Route::get('dashboard/login','Dashboard\AuthController@getLoginPage')->name('dashboard.login');
        Route::post('dashboard/login','Dashboard\AuthController@login');


        ////// end lecture
        Auth::routes();

        ///Deploy
        Route::get('deploy','Deploy@index');

            });

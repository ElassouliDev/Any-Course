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
        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth','superAdmin'])->group(function () {
            Route::resource('/notifications','Dashboard\NotificationsController');
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
            Route::resource('/settings', 'Dashboard\SettingController')->except('create','delete');
            Route::resource('/question', 'Dashboard\QuestionController');
            Route::resource('/exam', 'Dashboard\ExamController');
            Route::resource('/comment', 'Dashboard\CommentController');

        });
        Route::get('/{id}/notifications','Dashboard\NotificationsController@index_by');

        Route::group(['middleware' => ['auth']], function () {

            Route::get('student/course/', 'Student\CourseController@getEnrolledCoursesByUser')->name('student.courses.enrolled');



            Route::post('/course_enroll/{course_slug}', 'Student\CourseController@enroll_and_in_enroll_course')->name('user.course_enroll');
            Route::get('/course/{course_slug}/lesson/{lesson_slug?}', 'View\LessonsController@lessons_list')->name('course_lesson')->middleware('lesson'); //lessons list
            Route::get('/course/{course_slug}/lesson/{lesson_slug?}/question', 'Student\QuestionController@lesson_question')->name('list_question')->middleware('lesson');
            Route::post('lesson/question/comment', 'Student\CommentController@store_question')->name('new_comment_question')->middleware('lesson');
            Route::post('/course/{course_slug}/lesson/{lesson_slug?}lesson/question', 'Student\QuestionController@store')->name('new_question')->middleware('lesson');
            Route::post('/course/{course_slug}/comment', 'Student\CommentController@store')->name('new_comment');


            // setting user
            Route::get('setting/', 'View\SettingController@index')->name('user.setting');
            Route::put('setting/update_info', 'View\SettingController@updateUserInformation')->name('user.updateInfo');
            Route::put('setting/update_password', 'View\SettingController@updateUserPassword')->name('user.updatePassword');

            Route::post('lecture/promocode/course/pay', 'Lecture\PromoCodeController@UsePromocode_to_pay_course')->name('promocode.paycourse');

        });
        Route::get('/course', 'View\CourseController@course_list');
        Route::get('/course/{course_slug}', 'View\CourseController@course_details')->name('course_details'); //course details
        Route::get('/', 'View\CourseController@course_list');

        ////////////////////////// lecture
        Route::group(['middleware' => ['role:lecture|super_admin']], function() {

            Route::get('lecture/course', 'Lecture\CourseController@index')->name('course_lecture.index');
            Route::post('lecture/course', 'Lecture\CourseController@store')->name('course_lecture.store');
            Route::get('lecture/course/{course_slug}', 'Lecture\CourseController@show')->name('course_lecture.show');
            Route::get('lecture/course/{course_slug}/edit', 'Lecture\CourseController@edit')->name('course_lecture.edit');
            Route::put('lecture/course/update', 'Lecture\CourseController@update')->name('course_lecture.update');
            Route::get('lecture/courses/student/{course_slug}', 'Lecture\StudentController@showCoursesStudents')->name('course.student.show');
            Route::get('lecture/all/students', 'Lecture\StudentController@showAllStudents')->name('course.all.student');
            Route::get('lecture/course/{course_slug}/exam', 'Lecture\ExamController@index')->name('course.exam.show');
            Route::resource('lecture/course/{course_slug}/exam', 'Lecture\ExamController');
            Route::resource('lecture/course/{course_slug}/lesson', 'Lecture\LessonController');
            Route::resource('lecture/promocode', 'Lecture\PromoCodeController');

        });


        /////////////////////////// student
        Route::group(['middleware' => ['role:student|super_admin']], function() {
            Route::post('lesson/watch/', 'Student\CourseController@student_watch_lesson')->name('student.lesson.watch');
            Route::post('lesson/complete/', 'Student\CourseController@complete_watch_lesson')->name('student.lesson.complete');
            Route::resource('student/certificate/', 'Student\CertificateController');///->middleware('lesson');
            Route::get('/course/{course_slug}/exam/', 'View\LessonsController@exams')->name('course.exam'); //lessons list
            Route::post('/course/{course_slug}/exam/', 'View\LessonsController@answerExam'); //lessons list
            Route::post('/course/{course_slug}/review/', 'Student\ReviewCourseController@review')->name('course.review'); //lessons list
            Route::get('/course/{course_slug}/certification/', 'Student\CourseController@certification')->name('course.certification'); //lessons list
//            Route::get('/certifications', 'Student\CertificateController@certifications_student')->name('student.certifications'); //lessons list


        });
        /// end student




        Route::get('dashboard/login', 'Dashboard\AuthController@getLoginPage')->name('dashboard.login');
        Route::post('dashboard/login', 'Dashboard\AuthController@login');


        Auth::routes();

        ///Deploy
        Route::get('deploy', 'Deploy@index')->middleware('superAdmin');

    });

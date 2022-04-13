<?php

use Illuminate\Support\Facades\Route;

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

#guest user login option

Route::get('/', "Home\home@home");
Route::get('/modal', function () {
    return view('includes.modal');
});





Route::post('/attendance/get-location', [App\Http\Controllers\AttendanceController::class, 'location'])->name('attendance.get-location');
Route::post('/attendance/{user_id}', [App\Http\Controllers\AttendanceController::class, 'storeEntry']);
Route::put('/attendance/{attendance_id}', [App\Http\Controllers\AttendanceController::class, 'storeExit']);
Route::post('/insert_video/{sch_id}',[App\Http\Controllers\VideoController::class,'insert'])->name('insert.file');













//guest group
Route::group(['middleware' => ['guest']], function () {
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/registration', 'Auth\LoginController@registration');
    Route::get('/registration', function () {
        return view("home/registration");
    });
    Route::get('/login', function () {
        return view("home/login");
    });
    Route::get('/notification_socket', function () {
        return view("notification/queue/clear_queue");
    });
});

  Route::group(['prefix' => 'teacher', 'middleware' => ['teacher']], function () {
    Route::get('/dashboard', 'Home\home@teacherDashboard');
    Route::get('/routine', 'Course\CourseController@routine');
    Route::get('/attendance', 'AttendanceController@allattendance');



    Route::get('/logout', 'Auth\LoginController@logout');

    //profile
    Route::get('/profile', 'User\LoginUserController@getProfile');
    Route::post('/profile/{user_id}', 'User\LoginUserController@updateProfileDetail');
    Route::post('/profile/{user_id}/password', 'User\LoginUserController@updatePassword');

    Route::get('/api/teacher_list', 'Course\CourseController@teacherList');

    //---course
    //get
    Route::get('/courses', 'Course\CoursePageController@viewCourseList');
    Route::get('/courses/create', 'Course\CoursePageController@createCourse');

    Route::group(['prefix' => 'courses/{course_id}', 'middleware' => ['course']], function () {

        Route::get('/', 'Course\CoursePageController@viewDashboard');
        Route::post('/confirm', 'Course\CourseController@confirmRequest');
        Route::get('/dashboard', 'Course\CoursePageController@viewDashboard');
        Route::get('/teachers', 'Course\CoursePageController@viewTeacherList');
        Route::get('/students', 'Course\CoursePageController@viewStudentList');
        Route::get('/setting', 'Course\CoursePageController@setting');
        Route::get('/setting/leave', 'Course\CourseController@leave');
        Route::post('/setting/update', 'Course\CourseController@courseUpdate');

        //post comment
        Route::post('/comment', 'Course\CommentController@create');
        Route::get('/comment/{comment_id}/update', 'Course\CommentController@updatePage');
        Route::post('/comment/{comment_id}/update', 'Course\CommentController@update');
        Route::get('/comment/{comment_id}/delete', 'Course\CommentController@delete');
        Route::post('/comment/{comment_id}/comment-reply', 'Course\CommentReplyController@create');

        Route::get('/comment-reply/{comment_reply_id}/update', 'Course\CommentReplyController@updatePage');
        Route::post('/comment-reply/{comment_reply_id}/update', 'Course\CommentReplyController@update');
        Route::get('/comment_reply/{comment_reply_id}/delete', 'Course\CommentReplyController@deletePage');

        //schedule

        Route::group(['prefix' => 'schedule/'], function () {
            Route::get('/', 'Course\ScheduleController@scheduleList');
            Route::get('/create', 'Course\ScheduleController@viewCreateSchedule');
            Route::post('/create', 'Course\ScheduleController@createSchedule');

            Route::group(['prefix' => '{schedule_id}/'], function () {
                Route::get('/update', 'Course\ScheduleController@viewUpdateSchedule');
                Route::post('/update', 'Course\ScheduleController@updateSchedule')->name('schedule_update');
                Route::post('/update', 'Course\ScheduleController@updateSchedule')->name('schedule_update');
                Route::get('/delete', 'Course\ScheduleController@deleteSchedule');

                Route::get('/board/', 'Course\ScheduleController@getBoard');
                Route::post('/board/save', 'Course\ScheduleController@saveBoard');


                Route::get('/whiteboard', 'Course\ScheduleWhiteboardController@viewWhiteboard');
                Route::get('/whiteboard/get', 'Course\ScheduleWhiteboardController@getBoard');
                Route::post('/whiteboard/save', 'Course\ScheduleWhiteboardController@saveBoard');
                Route::get('/whiteboard/add_page', 'Course\ScheduleWhiteboardController@addPage');
                Route::get('/whiteboard/download', 'Course\ScheduleWhiteboardController@downloadBoard');

                Route::post('/send_conversation', 'Course\ScheduleController@sendConversation');
                Route::get('/conversations', 'Course\ScheduleController@viewConversations');

                Route::get('/', 'Course\ScheduleController@viewSchedule');
                Route::get('/', 'Course\ScheduleController@viewSchedule');

                Route::get('/present_graph', function () {
                    return view('course.schedule.class_present_graph');
                });
            });
        });

        //course admin area
        Route::group(['middleware' => ['course.admin']], function () {

            Route::post('/teachers/create', 'Course\CourseController@addTeacher');
            Route::get('/teachers/create', 'Course\CoursePageController@viewAddTeacher');
            Route::get('/teachers/delete', 'Course\CourseController@deleteTeacher');
            Route::get('/setting/delete', 'Course\CourseController@delete');
            Route::post('/setting/archive', 'Course\CourseController@updateArchive');
            Route::get('/students/create', 'Course\CourseController@addStudent');
            Route::get('/students/delete/{user_id}', 'Course\CourseController@deleteStudent');

        });

    });

    //post
    Route::post('/courses/create', 'Course\CourseController@create');

    //end classroom --------------------

    Route::get('/update_profile', function () {
        return view('user.update_profile');
    });
});

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin1', function () {
        echo "admin dashboard ";
    });
    Route::get('/notification_template', "Notification\NotificationController@loadTemplateList");
    Route::get('/clear_queue', "Notification\NotificationController@clearQueue");
});

Route::get('/test', "Home\home@test");



Route::group(['prefix' => 'student', 'middleware' => ['student']], function () {
    Route::get('/dashboard', 'Home\home@studentDashboard');
    Route::get('/routine', 'Course\CourseController@routine');
    Route::get('/attendance', 'AttendanceController@showattendance');

    Route::get('/logout', 'Auth\LoginController@logout');

    //profile
    Route::get('/profile', 'User\LoginUserController@getProfile');
    Route::post('/profile/{user_id}', 'User\LoginUserController@updateProfileDetail');
    Route::post('/profile/{user_id}/password', 'User\LoginUserController@updatePassword');



    Route::get('/api/teacher_list', 'Course\CourseController@teacherList');

    //---course
    //get
    Route::get('/courses', 'Course\CoursePageController@viewCourseList');
    Route::get('/courses/join', 'Course\CoursePageController@joinCourse');

    Route::group(['prefix' => 'courses/{course_id}', 'middleware' => ['course']], function () {

        Route::get('/', 'Course\CoursePageController@viewDashboard');
        Route::post('/confirm', 'Course\CourseController@confirmRequest');
        Route::get('/dashboard', 'Course\CoursePageController@viewDashboard');
        Route::get('/teachers', 'Course\CoursePageController@viewTeacherList');

        Route::get('/students', 'Course\CoursePageController@viewStudentList');
        Route::get('/setting', 'Course\CoursePageController@setting');
        Route::get('/setting/leave', 'Course\CourseController@leave');

        //post comment
        Route::post('/comment', 'Course\CommentController@create');
        Route::get('/comment/{comment_id}/update', 'Course\CommentController@updatePage');
        Route::post('/comment/{comment_id}/update', 'Course\CommentController@update');
        Route::get('/comment/{comment_id}/delete', 'Course\CommentController@delete');

        Route::post('/comment/{comment_id}/comment-reply', 'Course\CommentReplyController@create');
        Route::get('/comment-reply/{comment_reply_id}/update', 'Course\CommentReplyController@updatePage');
        Route::post('/comment-reply/{comment_reply_id}/update', 'Course\CommentReplyController@update');
        Route::get('/comment_reply/{comment_reply_id}/delete', 'Course\CommentReplyController@deletePage');

        //schedule

        Route::group(['prefix' => 'schedule/'], function () {
            Route::get('/', 'Course\ScheduleController@scheduleList');

            Route::group(['prefix' => '{schedule_id}/'], function () {

                Route::get('/board/', 'Course\ScheduleController@getBoard');
                Route::get('/whiteboard', 'Course\ScheduleWhiteboardController@viewWhiteboard');
                Route::get('/whiteboard/get', 'Course\ScheduleWhiteboardController@getBoard');
                Route::get('/whiteboard/download', 'Course\ScheduleWhiteboardController@downloadBoard');
                Route::post('/send_conversation', 'Course\ScheduleController@sendConversation');
                Route::get('/conversations', 'Course\ScheduleController@viewConversations');
                Route::get('/', 'Course\ScheduleController@viewSchedule');
                Route::get('/', 'Course\ScheduleController@viewSchedule');
                Route::get('/present_graph', function () {
                    return view('course.schedule.class_present_graph');
                });
            });
        });

    });

    //post
    Route::post('/courses/join', 'Course\CourseController@join');

    //end classroom --------------------
    Route::get('/update_profile', function () {
        return view('user.update_profile');
    });
});

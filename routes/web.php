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

Auth::routes();

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', function () {
    if (Auth::guest()) {
        return redirect()->route('login');
    } else {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role == 'teacher') {
            return redirect()->route('teacher.dashboard');
        } elseif (Auth::user()->role == 'student') {
            return redirect()->route('student.dashboard');
        }
    }
})->name('home');

Route::middleware('auth')->group(function () {

    // Administrator
    Route::group(['prefix' => '/a', 'as' => 'admin.', 'middleware' => 'admin'], function () {
        Route::get('/', 'AdminController@dashboard')->name('dashboard');

        Route::resource('/classroom', 'ClassroomController');
        Route::resource('/classroom/{classroom}/student', 'StudentController');
        Route::resource('/teacher', 'TeacherController');
        Route::resource('/course', 'CourseController');
        Route::resource('/agency', 'AgencyController');
        Route::resource('/skill', 'SkillController');
    });

    // Teacher
    Route::group(['prefix' => '/t', 'as' => 'teacher.', 'middleware' => 'teacher'], function () {
        Route::get('/', 'TeacherController@dashboard')->name('dashboard');

        Route::get('/task/classroom/{classroom}', 'Teacher\TaskController@get_by_classroom')->name('task.get_by_classroom');
        Route::resource('/task', 'Teacher\TaskController');
        Route::resource('/assessment', 'AssessmentController');

        Route::resource('/agency', 'AgencyController');
        Route::resource('/skill', 'SkillController');
        Route::resource('/practice', 'PracticeController');
        Route::resource('/practice-member', 'PracticeMemberController');
    });

    // Student
    Route::group(['prefix' => '/s', 'as' => 'student.', 'middleware' => 'student'], function () {
        Route::get('/', 'StudentController@dashboard')->name('dashboard');

        Route::resource('/task', 'Student\TaskController');
    });

});

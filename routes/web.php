<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'frontend_home'])->name('frontend_home');
Route::get('/courses/{id?}', [CourseController::class, 'frontend_courses'])->name('frontend_courses');
Route::get('/course_detail/{id}', [CourseController::class, 'frontend_courses_detail'])->name('frontend_courses_detail');
Route::get('/projects', [ProjectController::class, 'frontend_projects'])->name('frontend_projects');
Route::get('/register_success', [FrontendController::class, 'register_success'])->name('register_success');
Route::get('/about', [FrontendController::class, 'about'])->name('about');

Route::get('/course_search_view', [FrontendController::class, 'course_search_view'])->name('course_search_view');
Route::post('/course_search', [FrontendController::class, 'course_search'])->name('course_search');


// admin dashboard

// DashboardController
Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});

// UserController
Route::controller(UserController::class)->group(function () {
    Route::get('/user_view', 'user_view')->name('user_view');
});

// CourseController
Route::controller(CourseController::class)->group(function () {
    Route::get('/course_view', 'admin_course_view')->name('admin_course_view');
    Route::get('/courses_create', 'admin_courses_create_view')->name('admin_courses_create_view');
    Route::post('/course_add', 'admin_course_add')->name('admin_course_add');
    Route::get('/course_edit_view/{id}', 'admin_course_edit_view')->name('admin_course_edit_view');
    Route::post('/course_update/{id}', 'admin_course_update')->name('admin_course_update');
});

// CourseTypeController
Route::controller(CourseTypeController::class)->group(function () {
    Route::post('/course_type_add', 'admin_course_type_add')->name('admin_course_type_add');
    Route::get('/course_type_delete/{id}', 'admin_course_type_delete')->name('admin_course_type_delete');
    Route::post('/course_type_edit/{id}', 'admin_course_type_edit')->name('admin_course_type_edit');
});

// ProjectController
Route::controller(ProjectController::class)->group(function () {
    Route::get('/project_view', 'admin_project_view')->name('admin_project_view');
    Route::get('/project_detail', 'admin_project_detail_view')->name('admin_project_detail_view');
});

// ClassesController
Route::controller(ClassesController::class)->group(function () {
    Route::get('/classes_view', 'admin_classes_view')->name('admin_classes_view');
    Route::get('/classes_create', 'admin_classes_create_view')->name('admin_classes_create_view');
    Route::post('/classes_add', 'admin_classes_add')->name('admin_classes_add');
    Route::get('/classes_delete/{id}', 'admin_classes_delete')->name('admin_classes_delete');
    Route::get('/classes_detail/{id}', 'admin_classes_detail')->name('admin_classes_detail');
    Route::post('/classes_edit/{id}', 'admin_classes_edit')->name('admin_classes_edit');
    Route::get('/classes_student_list/{id}', 'admin_classes_student_list')->name('admin_classes_student_list');
});

// PosController
Route::controller(PosController::class)->group(function () {
    Route::get('/print_view', 'admin_print_view')->name('admin_print_view');
    Route::get('/invoice', 'admin_invoice_view')->name('admin_invoice_view');
});

// RegisterController

Route::controller(PosController::class)->group(function () {
    // frontend
    Route::get('/register', [RegisterController::class, 'frontend_register'])->name('frontend_register');
    Route::post('/register_post', [RegisterController::class, 'frontend_register_post'])->name('frontend_register_post');

    // admin

    Route::get('/register_view', [RegisterController::class, 'admin_register_view'])->name('admin_register_view');

    Route::get('/register_accept/{id}', [RegisterController::class, 'admin_register_accept'])->name('admin_register_accept');
    Route::get('/register_cancel/{id}', [RegisterController::class, 'admin_register_cancel'])->name('admin_register_cancel');
});

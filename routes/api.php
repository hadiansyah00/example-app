<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ImageCourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MyCourseController;
use App\Http\Controllers\ReviewController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route Mentor
Route::get('mentors', [MentorController::class, 'index']);
Route::get('mentors/{id}', [MentorController::class, 'show']);
Route::put('mentors/{id}', [MentorController::class, 'update']);
Route::post('mentors', [MentorController::class, 'create']);
Route::put('mentors/{id}', [MentorController::class, 'update']);
Route::delete('mentors/{id}', [MentorController::class, 'destroy']);

//Route Course
Route::get('course', [CourseController::class, 'index']);
Route::get('course/{id}', [CourseController::class, 'show']);
Route::put('course/{id}', [CourseController::class, 'update']);
Route::post('course', [CourseController::class, 'create']);
Route::delete('course/{id}', [CourseController::class, 'destroy']);

//Route Chapter
Route::get('chapter', [ChapterController::class, 'index']);
Route::get('chapter/{id}', [ChapterController::class, 'show']);
Route::put('chapter/{id}', [ChapterController::class, 'update']);
Route::post('chapter', [ChapterController::class, 'create']);
Route::delete('chapter/{id}', [ChapterController::class, 'destroy']);

//Route Lesson
Route::get('lesson', [LessonController::class, 'index']);
Route::get('lesson/{id}', [LessonController::class, 'show']);
Route::put('lesson/{id}', [LessonController::class, 'update']);
Route::post('lesson', [LessonController::class, 'create']);
Route::delete('lesson/{id}', [LessonController::class, 'destroy']);

//Route ImageCourse
Route::post('image-course', [ImageCourseController::class, 'create']);
Route::delete('image-course/{id}', [ImageCourseController::class, 'destroy']);

//Route MyCourse
Route::post('my-course', [MyCourseController::class, 'create']);
Route::get('my-course', [MyCourseController::class, 'index']);
Route::post('my-course/premium', [MyCourseController::class, 'destroy']);

//Route Review
Route::post('review', [ReviewController::class, 'create']);
Route::put('review/{id}', [ReviewController::class, 'update']);
Route::delete('review/{id}', [ReviewController::class, 'destroy']);

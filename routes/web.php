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


//Lessons
Route::get('lessons', 'LessonController@index')->name('lessons.index');
Route::get('lessons/create', 'LessonController@create')->name('lessons.create');
Route::post('lessons', 'LessonController@store')->name('lessons.store');
Route::get('lessons/{id} ', 'LessonController@show')->name('lessons.show');
Route::post('lessons/update', 'LessonController@update')->name('lessons.update');
Route::delete('lessons/{id} ', 'LessonController@destroy')->name('lessons.destroy');
Route::get('lessons/enroll/{id} ', 'LessonController@enroll')->name('lessons.enroll');
Route::get('lessons/unenroll/{id} ', 'LessonController@unenroll')->name('lessons.unenroll');


//Comments
Route::get('lessons/{lessonid}/comments', 'CommentController@index')->name('comments.index');

Route::get('lessons/{lessonid}/comments/store/{name}/{description}', 'CommentController@store')->name('comments.store');
Route::post('lessons/{lessonid}/comments', 'CommentController@store')->name('comments.store');

Route::post('comments/create/{id}', 'CommentController@create')->name('comments.create');
Route::get('comments/edit/{id}', 'CommentController@edit')->name('comments.edit');

Route::post('comments/update/{id}', 'CommentController@update')->name('comments.update');
Route::get('comments/{id} ', 'CommentController@show')->name('comments.show');
Route::get('comments/delete/{id} ', 'CommentController@destroy')->name('comments.destroy');


//trainees
Route::resource('trainees','TraineeController');


//trainer
Route::get('trainers', 'TrainerController@index')->name('trainers.index');
Route::get('trainer/{id} ', 'TrainerController@show')->name('trainer.show');

//lockers
Route::resource('lockers','LockerController');



//Home page
Auth::routes();
Route::resource('home','HomeController');

Route::get('/quote', 'ApiController@index');

Route::post('/like', 'LikeController@update');











Route::get('/', function () {
 return redirect('home');
});






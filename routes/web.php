<?php

use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student', 'StudentController@index')->name('student.index');
Route::post('/student-create', 'StudentController@create')->name('student.create');

Route::get('/result', 'ResultController@index')->name('result.index');
Route::get('/result-create', 'ResultController@create')->name('result.create');
Route::post('/result-save', 'ResultController@save')->name('result.save');

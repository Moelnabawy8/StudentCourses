<?php

use App\Models\Course;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ResFlightController;
use App\Http\Controllers\StudentController;

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
    return view('home');
});
Route::prefix('courses')->group(function () {
  
    Route::get('/',[CourseController::class, 'index'])->name('courses.index');
    Route::get('/create',[CourseController::class, 'create'])->name('courses.create');
    Route::post('/',[CourseController::class, 'store'])->name('courses.store');
    Route::get('/{id}/edit',[CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/{id}',[CourseController::class, 'update'])->name('courses.update');
    Route::delete('/{id}',[CourseController::class, 'destroy'])->name('courses.destroy');
    Route::get('/{id}',[CourseController::class, 'show'])->name('courses.show');
});

Route::prefix('students')->group(function () {
  
   Route::get('/',[StudentController::class, 'index'])->name('students.index');
    Route::get('/create',[StudentController::class, 'create'])->name('students.create');
    Route::post('/',[StudentController::class, 'store'])->name('students.store');
    Route::get('/{id}/edit',[StudentController::class, 'edit'])->name('students.edit');
    Route::put('/{id}',[StudentController::class, 'update'])->name('students.update');
    Route::delete('/{id}',[StudentController::class, 'destroy'])->name('students.destroy');
    Route::get('/{id}',[StudentController::class, 'show'])->name('students.show');
});
 

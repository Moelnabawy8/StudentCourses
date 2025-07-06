<?php

use App\Models\Course;
use App\Models\Professor;
require __DIR__.'/auth.php';
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfessorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



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

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');
Route::get("contact",[ContactController::class, 'index'])->name('contact.index');
Route::post("contact",[ContactController::class, 'store'])->name('contact.store');



Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard.index');



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
Route::prefix("professors")->group(function () {
    Route::get('/',[ProfessorController::class, 'index'])->name('professors.index');
    Route::get('/create',[ProfessorController::class, 'create'])->name('professors.create');
    Route::post('/',[ProfessorController::class, 'store'])->name('professors.store');
    Route::get('/{id}/edit',[ProfessorController::class, 'edit'])->name('professors.edit');
    Route::put('/{id}',[ProfessorController::class, 'update'])->name('professors.update');
    Route::delete('/{id}',[ProfessorController::class, 'destroy'])->name('professors.destroy');
    Route::get('/{id}',[ProfessorController::class, 'show'])->name('professors.show');
});
 

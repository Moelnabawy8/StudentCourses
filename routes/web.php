<?php

use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ResFlightController;

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
Route::prefix("flights")->group(function () {
    Route::get('/', [FlightController::class, 'index'])->name('flight.index');
    Route::get('/create', [FlightController::class, 'create'])->name('flight.create');
    Route::post('/', [FlightController::class, 'store'])->name('flight.store');
    Route::get('/{id}/edit', [FlightController::class, 'edit'])->name('flight.edit');
    Route::put('/{id}', [FlightController::class, 'update'])->name('flight.update');
    Route::delete('/{id}', [FlightController::class, 'destroy'])->name('flight.destroy');
    Route::get('/{id}', [FlightController::class, 'show'])->name('flight.show');
});
Route::resource('flights', ResFlightController::class);
Route::resource('countries', CountryController::class);
Route::delete('countries/delete/{id}', [CountryController::class, 'softDelete'])->name('countries.softDelete');

// trashed & restore
Route::get('countries/trashed', [CountryController::class, 'trashed'])->name('countries.trashed');
Route::patch('countries/restore/{id}', [CountryController::class, 'restore'])->name('countries.restore');

Route::fallback(function () {
    return view('404');
});

 
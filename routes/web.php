<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

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

Route::middleware('set.city')->group(function () {
    Route::get('/', [CityController::class, 'index'])->name('home');
    Route::get('/{city}', [CityController::class, 'index'])->name('city.home');
    Route::get('/about', [CityController::class, 'about'])->name('about');
    Route::get('/news', [CityController::class, 'news'])->name('news');
    Route::get('/{city}/about', [CityController::class, 'about'])->name('city.about');
    Route::get('/{city}/news', [CityController::class, 'news'])->name('city.news');
});

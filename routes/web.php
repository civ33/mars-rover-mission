<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerRoverDashboard;

Route::match(['get', 'post'], '/', function () {
    return view('app');
})->name('home');

Route::post('/createMission', [ControllerRoverDashboard::class, 'createMission'])->name('createMission');

Route::post('/travel', [ControllerRoverDashboard::class, 'travel'])->name('travel');


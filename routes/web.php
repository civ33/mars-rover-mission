<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerRoverDashboard;


Route::match(['get', 'post'], '/', function () {
    return view('app');
})->name('home');

Route::post('/startMission', [ControllerRoverDashboard::class, 'startMission'])->name('startMission');

Route::post('/travel', [ControllerRoverDashboard::class, 'travel'])->name('travel');
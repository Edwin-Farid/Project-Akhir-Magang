<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::resource('makanan', MenuController::class);

Route::resource('reservation', ReservationController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanningController;


Route::get('/', [PlanningController::class, 'index']);

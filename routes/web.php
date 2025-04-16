<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::resource('jobs', JobController::class);
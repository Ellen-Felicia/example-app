<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->paginate(5);
    return view('jobs',[
        'jobs' => $jobs
    ]);
});

Route::post('/jobs', function () {
    request()->validate([
        'employer_id' => ['required', 'exists:employers'],
        'title'       => ['required'],
        'salary'      => ['required'],
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});


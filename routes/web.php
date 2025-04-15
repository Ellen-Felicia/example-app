<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

//index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(5);
    return view('jobs.index',[
        'jobs' => $jobs
    ]);
});

//Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

//Show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    
    return view('jobs.show', ['job' => $job]);
 });

//Store
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

//Edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    
    return view('jobs.edit', ['job' => $job]);
 });

//Update
Route::patch('/jobs/{id}', function ($id) {
    // Validate the request
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    //Authorize the user

    //Update the job
    $job = Job::findOrFail($id); //Declaração de variavel

    // $job->title = request('title');
    // $job->salary = request('salary');
    // $job->save();

    //Or use the update method

    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);
     
    //Redirect 
    return redirect('/jobs/'. $job->id);
 });

//Delete
Route::delete('/jobs/{id}', function ($id) {
   //Authorize the user

   //Delete the job
    $job = Job::findOrFail($id);
    $job->delete();

   //Redirect
   return redirect('/jobs');

 });

Route::get('/contact', function () {
    return view('contact');
});


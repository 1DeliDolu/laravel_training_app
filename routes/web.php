<?php


use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    $jobs = \App\Models\Job::paginate(5);
    return view('home', ['jobs' => $jobs]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/home/{id}', function ($id) {
    $jobModel = new Job();
    $job = $jobModel->getJobById($id);

    if ($job) {
        return view('home', ['job' => $job]);
    } else {
        abort(404, 'Job not found');
    }
});

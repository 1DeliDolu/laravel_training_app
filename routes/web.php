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
Route::get('/job', function () {
    $jobs = \App\Models\Job::paginate(10);
    return view('job', ['jobs' => $jobs]);
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

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::post('/jobs', function () {
    $job = new Job();
    $job->title = request('title');
    $job->description = request('description');
    $job->company = request('company');
    $job->salary = request('salary');
    $job->save();

    return redirect('/job')->with('success', 'Job created successfully!');
});

Route::get('/jobs/{id}', function ($id) {
    $job = \App\Models\Job::findOrFail($id);
    return view('jobs.show', ['job' => $job]);
});

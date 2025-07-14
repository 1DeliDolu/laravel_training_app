<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentListController;

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

Route::get('/job', [JobController::class, 'index']);

Route::get('/home/{id}', function ($id) {
    $jobModel = new Job();
    $job = $jobModel->getJobById($id);

    if ($job) {
        return view('home', ['job' => $job]);
    } else {
        abort(404, 'Job not found');
    }
});

// Job routes using JobController
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store']);
Route::get('/jobs/{job}/show', [JobController::class, 'show']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
Route::patch('/jobs/{job}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

// Resource routes for other controllers
Route::resource('tags', TagController::class);
Route::resource('users', UserController::class);
Route::resource('comments', CommentController::class);
Route::resource('comment-lists', CommentListController::class);

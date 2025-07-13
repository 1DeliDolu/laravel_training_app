<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $jobs=[
        ['title' => 'Software Engineer', 'company' => 'Tech Corp'],
        ['title' => 'Data Analyst', 'company' => 'Data Solutions'],
        ['title' => 'Web Developer', 'company' => 'Web Innovations'],
    ];
    return view('home', ['jobs' => $jobs]);

});


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

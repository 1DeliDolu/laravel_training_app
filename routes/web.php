<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/demo', function () {
    return "Demo Page";
});

Route::get('/array', function () {
    return ["foo" => "bar", "baz" => ["qux" => "quux"]];
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

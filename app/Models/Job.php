<?php

namespace   App\Models;

class Job
{
    public function index()
    {
        $jobs = [
            ['id' => 1, 'title' => 'Software Engineer', 'company' => 'Tech Corp'],
            ['id' => 2, 'title' => 'Data Analyst', 'company' => 'Data Solutions'],
            ['id' => 3, 'title' => 'Web Developer', 'company' => 'Web Innovations'],
        ];

        return view('home', ['jobs' => $jobs]);
    }
    public function getJobById($id)
    {
        $jobs = [
            1 => ['id' => 1, 'title' => 'Software Engineer', 'company' => 'Tech Corp'],
            2 => ['id' => 2, 'title' => 'Data Analyst', 'company' => 'Data Solutions'],
            3 => ['id' => 3, 'title' => 'Web Developer', 'company' => 'Web Innovations'],
        ];

        return $jobs[$id] ?? null;
    }
}



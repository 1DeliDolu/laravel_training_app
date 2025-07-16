<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Jobs\TranslateJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display jobs for the home page.
     */
    public function home()
    {
        $jobs = Job::paginate(5);
        return view('home', ['jobs' => $jobs]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::paginate(10);
        return view('job', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        // Dispatch translation job to queue
        TranslateJob::dispatch($job);

        // Send email notification to the authenticated user who created the job
        if (Auth::check()) {
            Mail::to(Auth::user()->email)->queue(new \App\Mail\JobPosted($job, Auth::user()->email));
        }

        return redirect('/jobs')->with('success', 'Job created successfully! Translation and email queued.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job,
            'original_description' => $job->description,
            'translated_description' => $job->translated_description,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required'],
            'company' => ['required'],
            'salary' => ['required']
        ]);

        $job->update($request->all());

        return redirect('/jobs/' . $job->id)->with('success', 'Job updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/job')->with('success', 'Job deleted successfully!');
    }

    /**
     * Test method for sending job posted emails.
     */
    public function test()
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return 'Please login first to send email.';
        }

        // Get the first job or create one for testing
        $job = Job::first() ?? Job::factory()->create();

        // Send email from the currently logged-in user
        Mail::to(Auth::user()->email)->send(new \App\Mail\JobPosted($job, Auth::user()->email));

        return 'Email sent from ' . Auth::user()->email . ' successfully!';
    }
}

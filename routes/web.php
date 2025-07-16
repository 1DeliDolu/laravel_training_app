<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentListController;
use App\Http\Controllers\RegisteredUserController;
use App\Jobs\TranslateJob;

// Public Pages Group
Route::prefix('')->group(function () {
    Route::get('/', [JobController::class, 'home'])->name('home');
    Route::get('/about', function () {
        return view('about');
    })->name('about');
    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', function (Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Welcome back!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    });

    Route::get('/register', function () {
        return view('users.register');
    })->name('register');

    Route::post('/register', function (Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user' // Default role
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Registration successful! Welcome to our platform.');
    });
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/')->with('success', 'Logged out successfully!');
    })->name('logout');

    // Profile routes for authenticated users
    Route::get('/profile', function () {
        return view('users.edit', ['user' => Auth::user()]);
    })->name('profile.edit');    Route::put('/profile', function (Request $request) {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $data = $request->only('name', 'email');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect('/')->with('success', 'Profile updated successfully!');
    })->name('profile.update');
});

// Job Management Group (Authenticated User Access)
Route::prefix('jobs')->name('jobs.')->middleware('auth')->group(function () {
    Route::get('/', [JobController::class, 'index'])->name('index');
    Route::get('/create', [JobController::class, 'create'])->name('create');
    Route::post('/', [JobController::class, 'store'])->name('store');
    Route::get('/{job}', [JobController::class, 'show'])->name('show');
    Route::get('/{job}/edit', [JobController::class, 'edit'])->name('edit');
    Route::match(['PUT', 'PATCH'], '/{job}', [JobController::class, 'update'])->name('update');
    Route::delete('/{job}', [JobController::class, 'destroy'])->name('destroy');
});

// Legacy Job Routes (for backward compatibility) - No middleware
Route::prefix('job')->group(function () {
    Route::get('/', [JobController::class, 'index']);
    Route::get('jobs/{id}', function ($id) {
        $jobModel = new Job();
        $job = $jobModel->getJobById($id);

        if ($job) {
            return view('job', ['job' => $job]);
        } else {
            abort(404, 'Job not found');
        }
    });
});

// Admin Panel Routes (Admin Access Required)
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::resource('tags', TagController::class);
    Route::resource('users', UserController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('comment-lists', CommentListController::class);
    Route::resource('registered-users', RegisteredUserController::class);
});

// Mail Routes
//Route::get('test', [JobController::class, 'test'])->name('test.email');
Route::get('test', function () {
    $job = Job::first();
    TranslateJob::dispatch($job);
    return 'Job dispatched!';
});

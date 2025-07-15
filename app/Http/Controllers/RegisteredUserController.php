<?php

namespace App\Http\Controllers;

use App\Models\RegisteredUser;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = RegisteredUser::paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:registered_users'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['nullable', 'string', 'max:20'],
            'birth_date' => ['nullable', 'date'],
            'gender' => ['nullable', 'in:male,female,other'],
            'address' => ['nullable', 'string'],
            'is_active' => ['boolean']
        ]);

        $user = RegisteredUser::create($request->all());

        return redirect()->route('admin.registered-users.show', $user)->with('success', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RegisteredUser $registeredUser)
    {
        return view('users.show', compact('registeredUser'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegisteredUser $registeredUser)
    {
        return view('users.edit', compact('registeredUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegisteredUser $registeredUser)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:registered_users,email,' . $registeredUser->id],
            'password' => ['nullable', 'string', 'min:8'],
            'phone' => ['nullable', 'string', 'max:20'],
            'birth_date' => ['nullable', 'date'],
            'gender' => ['nullable', 'in:male,female,other'],
            'address' => ['nullable', 'string'],
            'is_active' => ['boolean']
        ]);

        $data = $request->all();
        if (empty($data['password'])) {
            unset($data['password']);
        }

        $registeredUser->update($data);

        return redirect()->route('admin.registered-users.show', $registeredUser)->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegisteredUser $registeredUser)
    {
        $registeredUser->delete();

        return redirect()->route('admin.registered-users.index')->with('success', 'User deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers\App;

// use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();

        return view('app.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => ['required'], 
        ]);

        User::create($validatedData);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Tenant $tenant)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Tenant $tenant)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Tenant $tenant)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Tenant $tenant)
    // {
    //     //
    // }
}

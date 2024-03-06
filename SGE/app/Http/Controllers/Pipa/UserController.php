<?php

namespace App\Http\Controllers\Pipa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pipa\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = \App\Models\User::all();
        return view('Pipa.panel-users', compact('users'));
    
        return view('Pipa.panel-users');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pipa.add-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        return ('Procesando..');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = \App\Models\User::find($id);
        return view('Pipa.edit-user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UserRequest $request, string $id):RedirectResponse
    public function update(Request $request, string $id):RedirectResponse
    {
        $user = \App\Models\User::find($id);
        $user->update($request->all());
        dd($user);
        // return redirect()->route('panel-users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        $user = \App\Models\User::find($id);
        $user->delete();
        return redirect()->route('panel-users.index');
    }
}

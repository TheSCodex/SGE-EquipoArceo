<?php

namespace App\Http\Controllers\Pipa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pipa\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = \App\Models\User::all();
        return view('Pipa.panel-users', compact('users'));
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
        $user = new \App\Models\User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->rol_id = $request->rol_id;
        $user->identifier = $request->identifier;
        $user->career_academy_id = $request->career_academy_id;
        // crear una password aleatoria para el usuario la primera vez que se crea
        $randomPassword = Str::random(8);
        $user->password = bcrypt($randomPassword);
        $user->save();

        $users=User::all();
        return view ('Pipa.panel-users', compact('users'));
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

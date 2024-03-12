<?php

namespace App\Http\Controllers\Pipa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pipa\UserRequest;
use App\Models\Career;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Role;
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
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all(); 
        $careers = Career::all();
        return view('Pipa.add-user', compact('roles', 'careers'));
        // return view('Pipa.add-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
         // correo electrónico único
        $request->validate([
            'email' => 'unique:users,email',
        ]);
        $user = new \App\Models\User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->rol_id = $request->rol_id;
        $user->identifier = $request->identifier;
        $user->career_academy_id = $request->career_academy_id;
        // password aleatoria
        $randomPassword = Str::random(8);
        $user->password = bcrypt($randomPassword);
        $user->save();

        // manda la contraseña al correo del usuario
        $user->notify(new \App\Notifications\NewUserPasswordNotification($randomPassword, $request->email, $request->name, $request->last_name));

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
    public function edit($id)
    {
        $roles = Role::all(); 
        $careers = Career::all();
        $user = \App\Models\User::find($id);
        return view('Pipa.edit-user', compact('user','roles', 'careers'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UserRequest $request, string $id):RedirectResponse
    public function update(Request $request, string $id):RedirectResponse
    {
        $roles = Role::all(); 
        $careers = Career::all();
        $user = \App\Models\User::find($id);
        $user->update($request->all());
        // dd($user);
        return redirect()->route('panel-users.index');
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

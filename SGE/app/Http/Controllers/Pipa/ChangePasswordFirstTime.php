<?php

namespace App\Http\Controllers\Pipa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Pipa\ChangePasswordRequest;

class ChangePasswordFirstTime extends Controller
{
    public function index()
    {
        return view('Pipa.change-password-first-time');
    }

    public function store(ChangePasswordRequest $request)
    {
        $user = Auth::user();

        // Validar que las contraseñas sean iguales
        if ($request->input('new_password') !== $request->input('confirmed_password')) {
            return redirect()->back()->withErrors(['new_password' => 'Las contraseñas no coinciden'])->withInput();
        }

        if (Hash::check($request->input('new_password'), $user->password)) {
            return redirect()->back()->withErrors(['new_password' => 'La contraseña no puede ser igual a la predeterminada'])->withInput();
        }

        // Cambiar la contraseña del usuario
        $user->update(['password' => Hash::make($request->input('new_password'))]);

        return redirect('/');
    }
}

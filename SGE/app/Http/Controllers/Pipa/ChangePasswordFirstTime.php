<?php

namespace App\Http\Controllers\Pipa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Pipa\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class ChangePasswordFirstTime extends Controller
{
    public function index()
    {
        return view('Pipa.change-password-first-time');
    }

    public function store(ChangePasswordRequest $request)
    {

        // Obtener el valor de 'user' desde la sesión
        $dataUser = Session::get('user');

        // Validar que las contraseñas sean iguales
        if ($request->input('new_password') !== $request->input('confirmed_password')) {
            return redirect()->back()->withErrors(['new_password' => 'Las contraseñas no coinciden'])->withInput();
        }

        if (Hash::check($request->input('new_password'), $dataUser->password)) {
            return redirect()->back()->withErrors(['new_password' => 'La contraseña no puede ser igual a la predeterminada'])->withInput();
        }

        // Cambiar la contraseña del usuario
        $dataUser->update(['password' => Hash::make($request->input('new_password'))]);

        // Autenticar al usuario después de cambiar la contraseña
        Auth::login($dataUser);

        // Regenerar la sesión
        $request->session()->regenerate();

        return redirect('/login');
    }
}

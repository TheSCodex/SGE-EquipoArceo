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

        // Cambiar la contraseña del usuario
        $user->update(['password' => Hash::make($request->input('new_password'))]);

        return redirect('login');
    }
}

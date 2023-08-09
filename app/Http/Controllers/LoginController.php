<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $credenciais = $request->getCredentials();

        if (!Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        } else {
            return redirect()->back()->withErrors(['field' => 'Usuário ou senha inválido']);
        }
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended('dashboard');
    }
    protected function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}

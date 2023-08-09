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

    public function auth(Request $request)
    {
        $request->validate([
            "email" =>'required|string',
            "password"=>'required'
        ],[        
            'email.required' => 'O campo email é obrigatório!',
            'password.required' => 'O campo senha é obrigatório!'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            session(['success' => true]);
            return redirect()->to('dashboard');
        } else {
            return redirect()->back()->withErrors(['field' => 'Credenciais inválidas!']);
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

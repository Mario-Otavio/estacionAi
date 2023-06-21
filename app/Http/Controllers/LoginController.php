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

    public function login(LoginRequest $request){
        $credenciais = $request->getCredentials();

        if (!Auth::validate($credenciais)) {
            return redirect()->to('login')->withErrors(['field' => 'Usuário ou senha inválido']);
        }

        $user = Auth::getProvider()->retrieveByCredentials($credenciais);
        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }
    protected function logout(){
        Auth::logout();
        return redirect("/");
    }
}

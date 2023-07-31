<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DashboardRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Veiculo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class DashboardController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view('dashboard');
    }

    //public function listar()
    //{
    //    $veiculos = Veiculo::all(); //vem do banco
    //    return view('/dashboard', ['dashboard' => $veiculos]);
    //}


}



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home(){

           Auth::user()->can('admin') ?: abort(403,'Você não está autorizado a acessar esta pagina.');
           

           return view('home');

    }
}

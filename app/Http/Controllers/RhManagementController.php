<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class RhManagementController extends Controller
{
    public function home()
    {
        Auth::user()->can('rh') ?: abort(403,'Você não está autorizado a acessar esta área.');
         //pegando todos os usuarios com o cargo rh 

         $colaborators = User::with('detail','department')
                         ->where('role','rh')
                         ->withTrashed()
                         ->get();

        return view('colaborators.colaborators',compact('colaborators'));
    }
}

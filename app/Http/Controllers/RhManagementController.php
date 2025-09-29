<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth; // quando for mensionar o usuario da sessão user essa facade 
use Illuminate\Http\Request;

class RhManagementController extends Controller
{
    public function home()
    {
        Auth::user()->can('rh') ?: abort(403,'Você não está autorizado a acessar esta pagina.');

         //pegando todos os usuarios com o cargo rh 

         $colaborators = User::with('detail','department')
                         ->where('role','colaborator')
                         ->withTrashed()
                         ->get();

        return view('colaborators.colaborators',compact('colaborators'));
    }
}

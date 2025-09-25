<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ColaboratorsController extends Controller
{
    public function index(){

         Auth::user()->can('admin')?:abort('403','Você não esta autorizado a acessar');

        //selecionando todos os colaboradores que podem ser de varios setores 
        //mas não podem ser administradores 

        $colaborators = User::with('detail', 'department')
            ->where('role', '<>', 'admin')
            ->get();

        return view('colaborators.admin-all-colaborators')->with('colaborators', $colaborators);

    }
}

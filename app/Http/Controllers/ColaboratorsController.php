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

    public function showDetails($id){
         Auth::user()->can('admin','rh')?:abort('403','Você não esta autorizado a acessar');

         //verificando se o id  que veio pertence ao mesmo usuario ao qual os detalhes foram solicitados
         //para avitar situações onde o usuario solicita o s dados de um colabordor e recebe os detalhes de outro

         if(Auth::user()->id === $id){
            return redirect()->route('home');
         }

         $colaborator = User::with('detail','department')
                        ->where('id',$id)
                        ->first();

         return view('colaborators.show-details')->with('colaborator',$colaborator);
         
    }
}

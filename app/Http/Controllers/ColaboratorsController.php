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

        $colaborators = User::withTrashed()
            ->with('detail', 'department')
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
         //evitando mostrar um erro de codigo na tela do cliente 
            if(!$colaborator){
                return redirect()->route('colaborators.all-colaborators');
            }

         return view('colaborators.show-details')->with('colaborator',$colaborator);
         
    }

    public function deleteColaborator($id){
        Auth::user()->can('admin','rh')?:abort('403','Você não esta autorizado a acessar');

        if(Auth::user()->id === $id){
            return redirect()->route('home');
         }

         $colaborator = User::findOrFail($id);

         return view('colaborators.delete-colaborator-confirm')->with('colaborator',$colaborator);

        
    }

    public function deleteColaboratorConfirm($id){
        Auth::user()->can('admin','rh')?:abort('403','Você não esta autorizado a acessar');

        if(Auth::user()->id === $id){
            return redirect()->route('home');
         }

         $colaborator = User::findOrFail($id);

        
         $colaborator->delete();

         return redirect()->route('colaborators.all-colaborators');



    }

    public function restoreColaborator($id){

       Auth::user()->can('admin')?:abort('403','Você não esta autorizado a acessar');

       $colaborator = User::withTrashed()->findOrFail($id);

       $colaborator->restore();

       return redirect()->route('colaborators.all-colaborators');

    }

    public function home(){
         Auth::user()->can('colaborator')?:abort('403','Você não esta autorizado a acessar');
        
         //pegando os dados do colaborador 

         $colaborator = User::with('detail','department')
                        ->where('id',Auth::user()->id)
                        ->first();
        
          return view('colaborators.show-details',compact('colaborator'));
    }
}

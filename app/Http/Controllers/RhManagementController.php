<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // quando for mensionar o usuario da sessão user essa facade 
use Illuminate\Http\Request;
use function abort;

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

    public function newColaborator(){
        Auth::user()->can('rh') ?: abort(403,'Você não está autorizado a acessar esta pagina.');
        
        //aqui eu seleciono todos os departamentos menos o admin e o Rh

        $departments = Department::where('id','>',2)->get();

        if($departments->count() === 0){
            abort(403,'Não existem departamentos cadastrar um colaborador. Avise a um admnistrador para cadastrar um departamento.');
        }

        

        return view('colaborators.add-colaborator', compact('departments'));

    }

    public function editColaborator($id){
          Auth::user()->can('rh') ?: abort(403,'Você não está autorizado a acessar esta pagina.');

          $colaborator = User::with('detail')->findOrFail($id);

          $departments = Department::where('id','>',7)->get();

          



    }
}

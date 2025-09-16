<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RhUserController extends Controller
{
    public function index(){
         Auth::user()->can('admin')?:abort('403','Você não esta autorizado a acessar');

         $colaborators = User::where('role','rh')->get();

         return view('colaborators.rh-users',compact('colaborators'));
    }

    public function newColaborator(){
         Auth::user()->can('admin')?:abort('403','Você não esta autorizado a acessar');

         //pegando todos os deparatmentos para que o administrador possa selecionar
         
         $departments = Department::all();
         
         return view('colaborators.add-rh-user',compact('departments'));
    }

    public function createRhColaborator(Request $request){

      Auth::user()->can('admin')?:abort('403','Você não esta autorizado a acessar');

      //validando formulario 

      $request->validate([
          'name'=>'required|string|max:255',
          'email'=>'required|email|max:255|unique:users,email',
          'select_department'=>'required|existis:departments,id'
      ]);

      //criando o novo usuario do rh 

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->role = 'rh';
      $user->department_id = $request->select_department;
      $user->permissions = '["rh"]';
      $user->save();

      //retornando para a view 

      return redirect()->route('colaborators.rh-users')->with('success','Colaborador cadastrado');

     


      
      

    }
    
    
}

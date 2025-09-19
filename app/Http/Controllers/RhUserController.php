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

        // $colaborators = User::where('role','rh')->get();

        $colaborators = User::with('detail')
                        ->where('role','rh')
                        ->get();

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
          'select_department'=>'required|exists:departments,id',
          'address'=>'required|string|max:255',
          'zip_code'=>'required|string|max:10',
          'city'=>'required|string|max:50',
          'phone'=>'required|string|max:20',
          'salary'=>'required|decimal:2',
          'admission_date'=>'required|date_format:y-m-d'
      ]);

      //validando se o id do departamento é igual a 2 
       
      if($request->select_department != 2){
         return redirect()->route('home');
      }

      //criando o novo usuario do rh 

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->role = 'rh';
      $user->department_id = $request->select_department;
      $user->permissions = '["rh"]';
      $user->save();

      //gravando os datelhes do usuario na tabela user_details

      $user->detail()->create([
        'address'=>$request->address,
        'zip_code'=>$request->zip_code,
        'city'=>$request->city,
        'phone'=>$request->phone,
        'salary'=>$request->salary,
        'admission_date'=>$request->admission_date
      ]);   
      

      //retornando para a view 

      return redirect()->route('colaborators.rh-users')->with('success','Colaborador cadastrado');

     


      
      

    }

    public function editRhColaborator($id){

       Auth::user()->can('admin')?:abort('403','Você não esta autorizado a acessar');

       $colaborator = User::with('detail')->where('role','rh')->findOrFail($id);

       return view('colaborators.edit-rh-user',compact('colaborator'));
    }

    public function updateRhColaborator(Request $request){

      Auth::user()->can('admin')?:abort('403','Você não esta autorizado a acessar');

      //form validation 
      $request->validate([
        'user_id'=>'required|exists:users,id',
        'salary'=>'required|decimal:2',
        'admission_date'=>'required|date_format:Y-m-d'
      ]);

      $user = User::findOrFail($request->user_id);
      $user->detail->update([
        'salary'=>$request->salary,
        'admission_date'=>$request->admission_date
      ]);

      return redirect()->route('colaborators.rh-users')->with('success','Cadastro atualizado');



       
    }
    
    
}

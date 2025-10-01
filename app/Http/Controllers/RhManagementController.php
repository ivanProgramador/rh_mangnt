<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // quando for mensionar o usuario da sessão user essa facade 
use Illuminate\Http\Request;
use App\Mail\ConfirmAccountEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
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

         //como essa rota será usada por um funcionario do rh 
         //eu não posso permitir que ele cadastre outrofuncionario do rh 
         //e nem que ele cadastre um administrador por isso 
         //todos os departamentos que parecerem pra ele devem ter o id maior que 1 e 2 
         //que são o rh e a administração 

         $departments = Department::where('id','>',2)->get();

         //se não tiver nenhum departamento alem de administração e rh 
         //o rh vai ter que pedir ao administrador para criar
         //pra isso eu vou testar  a vaeiravel  $departments pra ver se ela veio vazia
         
         if($departments->count() === 0){
             abort(403,'Não existem departamentos cadastrados fale com o administrador para cadastrar ');
         }

         return view('colaborators.add-colaborator',compact('departments'));

         
    }

    public function createColaborator(Request $request){

         Auth::user()->can('rh')?:abort('403','Você não esta autorizado a acessar');

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

      
       
      if($request->select_department <= 2){
         return redirect()->route('home');
      }

      //gerando token de confirmação

      $token = Str::random(64);


      //criando o novo usuario 

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->confirmation_token = $token;
      $user->role = 'colaborator';
      $user->department_id = $request->select_department;
      $user->permissions = '["colaborator"]';
      $user->save();

      // enviando email de confirmação para o novo usuario
      Mail::to($user->email)->send(new ConfirmAccountEmail(route('confirm-account',$token)));


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

      return redirect()->route('rh.management.home')->with('success','Colaborador cadastrado');


    }

    public function editColaborator($id){

         Auth::user()->can('rh')?:abort('403','Você não esta autorizado a acessar');

         $colaborator = User::with('detail')->findOrFail($id);
         $departments = Department::where('id','>',7)->get();

         dd($colaborator);

    }





    

    



   


}

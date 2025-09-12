<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use function Laravel\Prompts\password;

class ProfileController extends Controller
{
    public function index():View
    {
        return view('user.profile');
    }

    public function updatePassword(Request $request){
        
        //form validation 
        $request->validate([
            'current_password' => 'required|min:8|max:16',
            'new_password'     => 'required|min:8|max:16|different:current_password',
            'new_password_confirmation'=>'required|same:new_password',
        ]);

        $user = auth()->user();

        if(!password_verify($request->current_password,$user->password)){
            return redirect()->back()->with('error','A senha atual esta errada !');
        }

        //atualizando a senha 

        $user->password = bcrypt($request->new_password);
        $user->save();

         return redirect()->back()->with('success','A senha foi alterada com sucesso ');



       


    }

    public function updateUserData(Request $request){

       //validação
       $request->validate([
          'name'=>'required|min:3|max:255',
          //nessa linha eu digo que o email deve ser um atributo unico
          //o sistema vai saber se ja não existe ele cadastrado atraves de uma pesauisa em todos os ids de forma geral 
          //porque como eu não especifiquei que id deve ser comparado ele vai comparar com todos

          'email'=>'required|email|max:255|unique:users,email,'. auth()->id()
       ]);          

       //atualizando
       
       $user = auth()->user();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->save();

       //retonando a resposta 

       return redirect()->back()->with('success_change_data','dados alterados com sucesso');
    }
}

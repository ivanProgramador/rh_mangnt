<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use function Laravel\Prompts\password;

class ProfileController extends Controller
{
    public function index():View
    {

        $colaborator = User::with('detail','department')
                             ->findOrFail(auth()->id());

        return view('user.profile')->with('colaborator',$colaborator);
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

    public function updateUserAddress(Request $request){
        //Form validation 
        $request->validate([
            'address'=>'required|min:3|max:100',
            'zip_code'=>'required|min:8|max:12',
            'city'=>'required|min:3|max:50',
            'phone'=>'required|min:6|max:20'
        ]);

        
        //pegando os detalhes do usuario 

        $user = User::with('detail')->findOrFail(auth()->id());
        $user->detail->address = $request->address;
        $user->detail->zip_code = $request->zip_code;
        $user->detail->city = $request->city;
        $user->detail->phone = $request->phone;
        $user->detail->save();

        

        return redirect()->back()->with('address_success','endereço alterado com sucesso');


        

    }




}

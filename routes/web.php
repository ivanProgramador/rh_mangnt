<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use App\Models\User;




Route::get('/', function () {
   echo'Rh mangnt';
});

Route::get('/email', function () {

    Mail::raw('Mensagem de teste rh mangnt',function(Message $message){
       $message->to('teste@gmail.com')
       ->subject('Bem vindo ao Rh mangnt')
       ->from('rh@rhmangnt.com');
    });


    echo'email enviado com sucesso';
});

Route::get('/admin',function(){

   $admin = User::with('detail','department')->find(1);
   return view('admin',compact($admin));

});

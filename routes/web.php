<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;



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

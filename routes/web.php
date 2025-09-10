<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Routing\Route as RoutingRoute;

Route::middleware('auth')->group(function(){

    Route::redirect('/','home');

    Route::view('/home','home')->name('home');

    //rota para o perfil de usuario 

    Route::get('/user/profile',[ProfileController::class,'index'])->name('user.profile');


});




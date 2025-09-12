<?php

use App\Http\Controllers\DepartmentController;
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
    Route::post('/user/profile/update_password',[ProfileController::class,'updatePassword'])->name('user.profile.update-password');
    Route::post('/user/profile/update-user-data',[ProfileController::class,'updateUserData'])->name('user.profile.update-user-data');
    
    //rotas parar os departamentos 

    Route::get('/departments',[DepartmentController::class,'index'])->name('departments');
    





});




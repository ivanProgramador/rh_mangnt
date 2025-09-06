<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use App\Models\User;




Route::middleware('auth')->group(function(){

    Route::view('/home','home');
});




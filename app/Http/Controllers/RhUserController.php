<?php

namespace App\Http\Controllers;

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
}

<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){

         Auth::user()->can('admin')?:abort('403','Você não esta autorizado a acessar');

            $departments = Department::all();
            return view('departiment.departiments',compact('departments'));
    }
}

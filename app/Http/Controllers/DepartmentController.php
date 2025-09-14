<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function index(){

         Auth::user() && Auth::user()->can('admin') ?: abort('403','Você não está autorizado a acessar');

            $departments = Department::all();
            return view('departiment.departiments',compact('departments'));
    }

    public function newDepartment(){

         Auth::user()->can('admin')?:abort('403','Você não esta autorizado a acessar');
         return view('department.add-departiment');
    }

    public function createDepartment(Request $request){
        Auth::user()->can('admin')?:abort('403','Você não esta autorizado a acessar');

        //validando dados 

        $request->validate([
            'name'=>'required|string|max:58|unique:departments'
        ]);

        //salvando 

        Department::create([
            'name' => $request->name
        ]);

        //voltado pra view 

        return redirect()->route('departments');





    }


}

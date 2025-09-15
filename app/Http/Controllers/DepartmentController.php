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

    public function editDepartment($id){

      Auth::user()->can('admin')?:abort('403','Você não esta autorizado a acessar');

      // verrificando se o id do departamento é igual a 1 
      //o dia vai chegar como uma string então eu usei o intval para converter 
      if(intval($id) === 1){
         return redirect()->route('departments');
      }

      $department = Department::findOrFail($id);

      return view('department.edit-department',compact('department'));
    }

    public function updateDepartment(Request $request){

       Auth::user()->can('admin')?:abort('403','Você não esta autorizado a acessar');

       $id = $request->id;

       $request->validate([
        'id'=>'required',
        'name'=>'required|string|min:3|max:50|unique:departments,name,'.$id
       ]);

       if(intval($id) === 1){
         return redirect()->route('departments');
       }

       $department = Department::findOrFail($id);

       $department->update([
         'name' => $request->name
       ]);

       return redirect()->route('departments');

    }

    public function deleteDepartment($id){
        
        Auth::user()->can('admin')?:abort('403','Você não esta autorizado a acessar');

        if(intval($id) === 1){
         return redirect()->route('departments');
        }

        $department = Department::findOrFail($id);

        //mostrando a pagina de confimação
        
        return view('department.delete-department-confirm',compact('department'));        


    }

    public function deleteDepartmentConfirm($id){
       
        Auth::user()->can('admin')?:abort('403','Você não esta autorizado a acessar');

        if(intval($id) === 1){
           return redirect()->route('departments');
        }

        $department = Department::findOrFail($id);

        $department->delete();

        return redirect()->route('departments');



       
         
    }




}

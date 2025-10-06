<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home(){

           Auth::user()->can('admin') ?: abort(403,'Você não está autorizado a acessar esta pagina.');

           //coletando todas as informações da empresa
           $data=[];
           
           //pegando a quantidade de funcionarios não excluidos 

           $data['total_colaborators'] = User::whereNull('deleted_at')->count();

           //pegando a quantidade de funcionários excluidos

           $data['total_colaborators_deleted'] = User::onlyTrashed('deleted_at')->count();

           //pegando o salário total dos colaboradores contratados e não excluidos 
           //isso se divide em 3 fases 
           //1 - pegar os funcionários não excluidos
           //2 - pegar os detales relcionados a eles que é lá onde está o valor do salário
           //3 - depois de fazer isso somar o valor que foi retornado dntro de uma funcção de call back 
           //    porque não basta somar, eu tenho que retornar o valor pra tela 
           
           $data['total_salary'] = User::withoutTrashed()
                                   ->with('detail')
                                   ->get()
                                   ->sum(function($colaborator){
                                      return $colaborator->detail->salary;
                                   });

          //contando quantos colaboradore tem em cada departamento 
          //primeiro eu faço um select em todos os usuarios cadastrados e não excluidos
          //pegando tambem os dados dos departamentos associados 
          //nisso eu faço um agrupamento de funcionarios com base no id do departamento 
          // isso vai trazer pra mim uma lista de objetos 
          //então eu vou usar a função map para poegar cada um deles 
          // eu coloco dentro do map uma função de call back 
          // que faz o retorno de um ararry associativo 
          // mostrando no primiero indice os nomes dos departamentos 
          // e quantos funcionarios tem em cada grupo de id     

          $data['total_colaborators_per_department'] = User::withoutTrashed()
                                                             ->with('department')
                                                             ->get()
                                                             ->groupBy('department_id')
                                                             ->map(function($department){
                                                                return[
                                                                    'department'=>$department->first()->department->name ?? '-',
                                                                    'total'=>$department->count()
                                                                ];

                                                             });

        //calculando o valor bruto dos salario doa funcionários por departamento
        //nesse caso eu seleciono os funconario não excluidos e incluo os detalhes 
        // depois eu faço o agrupoamnto deles pelo id do departamento 
        // isso me retorna uma lista de funcionario associados aos departamentos
        //e divididos por grupos com base no id de cada departamento 
        //depois eu coloco uma call back dentro do map  pra poder ler e retornar array 
        //com os dados
        //no primeiro indice eu peguei os nomes dos departamentos 
        //no segundo eu pego os colaboradores acesso os detalhes deles pra pegar o valor do salario 
        //e faço uma soma de tudo 
        //assim eu vou ter uma lista dos departamentos em um indice e no outro quanto ea semoa dos salarios dos funcionarios 
        //cadastrados em cada um   

        $data['total_salary_by_department'] = User::withoutTrashed()
                                                    ->with('department','detail')
                                                    ->get()
                                                    ->groupBy('department_id')
                                                    ->map(function($department){
                                                        return [
                                                            'department'=>$department->first()->department->name ?? '-',
                                                            'total'=>$department->sum(function($colaborator){
                                                                return $colaborator->detail->salary;

                                                            })
                                                        ];
                                                    });

       // dd($data);


        return view('home', compact('data'));

    }
}

<x-layout-app pageTitle="Home">


     <h1>Bem vindo a pagina administrativa </h1>
     <hr>

     <div class="d-flex">
       <x-info-title-value item-title="Quantidade de funcionários" :item-value="$data['total_colaborators']" />
       <x-info-title-value item-title="Quantidade de funcionários excluidos" :item-value="$data['total_colaborators_deleted']" />
       <x-info-title-value item-title="Custo total de salários" :item-value="$data['total_salary']" />
       
     </div>

     <div class="d-flex">

        <x-info-title-colecao item-title="Funcionários por departamento" :collection="$data['total_colaborators_per_department']"/>
         <x-info-title-colecao item-title="Total de salário por departamento" :collection="$data['total_salary_by_department']"/>
       
    

</x-layout-app>


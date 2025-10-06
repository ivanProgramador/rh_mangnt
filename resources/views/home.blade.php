<x-layout-app pageTitle="Home">
     <h1>Bem vindo a pagina administrativa </h1>
     <hr>
     <x-info-title-value item-title="Quantidade de funcionários" :item-value="$data['total_colaborators']" />
     <x-info-title-value item-title="Quantidade de funcionários excluidos" :item-value="$data['total_colaborators_deleted']" />
     <x-info-title-value item-title="Custo total de salários" :item-value="$data['total_salary']" />
</x-layout-app>


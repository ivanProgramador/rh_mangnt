<x-layout-app pageTitle="Home">
     <h1>Bem vindo a pagina administrativa </h1>

     @can('Admin')

        <h3 class="text-center mt-5">O administrador esta logado </h3>
         
     @endcan
</x-layout-app>


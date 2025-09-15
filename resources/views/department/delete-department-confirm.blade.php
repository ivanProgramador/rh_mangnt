<x-layout-app pageTitle="Apagar departamento">
<div class="w-100 p-4">

    <h3>Apagar departamento</h3>

    <hr>

    <p>Você tem certeza que deseja apagar esse departamento ?</p>
    
    <div class="text-center">
        <h3 class="my-5">{{ $department->name }}</h3>
        <a href="{{ route('departments') }}" class="btn btn-secondary px-5">Não</a>
        <a href="{{ route('departments.delete-department-confirm',['id'=> $department->id]) }}" class="btn btn-danger px-5">Sim</a>
    </div>
    
</div>

</x-layout-app>

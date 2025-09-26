<x-layout-app pageTitle="Apagar departamento">

   <div class="w-100 p-4">

        <h3>Delete colaborator</h3>

        <hr>

        <p>Tem certeza que deseja excluir este colaborador ?</p>
        
        <div class="text-center">
            <h3 class="my-5">{{ $colaborator->name }}</h3>
            <p>{{ $colaborator->email }}</p>
             <a href="{{ route('colaborators.rh-users') }}" class="btn btn-secondary px-5">Não</a>
             <a href="{{ route('colaborators.rh.delete-confirm',['id'=> $colaborator->id]) }}" class="btn btn-danger px-5">Sim</a>
        </div>

    </div>
    
</div>

</x-layout-app>

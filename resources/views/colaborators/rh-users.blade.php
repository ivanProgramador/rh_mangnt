<x-layout-app pageTitle="Recursos humanos">

<div class="container-fluid ">

    <h3>Recursos Humanos Colaboradores</h3>

    <hr>

    @if($colaborators->count() === 0)
       <div class="text-center my-5">
           <p>Nenhum colaborador encontrado.</p>
           <a href="{{ route('colaborators.rh.new-colaborator') }}" class="btn btn-primary">Cadastrar um novo</a>
        </div>

    @else 
        <div class="mb-3">
           <a href="{{ route('colaborators.rh.new-colaborator') }}" class="btn btn-primary">Cadastrar um novo</a>
        </div>

        <table class="table" id="table">

        <thead class="table-dark">
            <th>Nome</th>
            <th>E-mail</th>
            <th>Função</th>
            <th>Salário</th>
            <th>Data de admissão</th>
            <th>Cidade</th>
             <th>Ações</th>
        </thead>
        <tbody>


          @foreach($colaborators as $colaborator)
            <tr>
                <td>{{ $colaborator->name }}</td>
                <td>{{ $colaborator->email }}</td>
                <td>{{ $colaborator->role }}</td>

                <td>{{$colaborator->detail->salary}}</td>

                <td>{{ $colaborator->detail->admission_date }}</td>

                <td>{{ $colaborator->detail->city}}</td>

               
              

                <td>

                    <div class="d-flex gap-3 justify-content-end">
                        @if($colaborator->id === 1)
                          <i class="fa-solid fa-lock"></i>
                        @else
                          <div class="d-flex gap-3 justify-content-end">
                             

                            @if(empty($colaborator->deleted_at))

                               <a href="{{ route('colaborators.rh.edit-colaborator',['id'=>$colaborator->id]) }}" class="btn btn-sm btn-outline-dark"><i class="fa-regular fa-pen-to-square me-2"></i>Edit</a>
                               <a href="{{ route('colaborators.rh.delete-colaborator',['id'=>$colaborator->id]) }}" class="btn btn-sm btn-outline-dark"><i class="fa-regular fa-trash-can me-2"></i>Delete</a>
                               
                            @else
                                 <a href="{{ route('colaborators.rh.restore',['id'=>$colaborator->id]) }}" class="btn btn-sm btn-outline-dark"><i class="fa-solid fa-trash-arrow-up me-2"></i>Restore</a>
                            @endif
                           
                           
                           
                          </div>
                        @endif

                    </div>

                  
                </td>
            </tr>

          @endforeach



        </tbody>
        </table>

    @endif 

</div>

</x-layout-app>


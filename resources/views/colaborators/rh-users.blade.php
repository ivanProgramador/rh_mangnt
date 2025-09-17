<x-layout-app pageTitle="Recursos humanos">

<div class="container-fluid ">

    <h3>Recursos Humanos Colaboradores</h3>

    <hr>

    @if($colaborators->count() === 0)
       <div class="text-center my-5">
           <p>Nenhum colaborador encontrado.</p>
           <a href="{{ route('colaborators.new-colaborator') }}" class="btn btn-primary">Cadastrar um novo</a>
        </div>

    @else 
        <div class="mb-3">
           <a href="{{ route('colaborators.new-colaborator') }}" class="btn btn-primary">Cadastrar um novo</a>
        </div>

        <table class="table w-100" id="table">

        <thead class="table-dark">
            <th>Nome</th>
            <th>E-mail</th>
            <th>Permissões</th>
        </thead>
        <tbody>


          @foreach($colaborators as $colaborator)
            <tr>
                <td>{{ $colaborator->name }}</td>
                <td>{{ $colaborator->email }}</td>
               @php
                      $permissions = json_decode($colaborator->premissions, true) ?? [];
               @endphp

                      <td>{{ implode(',', $permissions) }}</td>

                <td>

                    <div class="d-flex gap-3 justify-content-end">
                        @if($department->id === 1)
                          <i class="fa-solid fa-lock"></i>
                        @else
                          <div class="d-flex gap-3 justify-content-end">
                            <a href="#" class="btn btn-sm btn-outline-dark"><i class="fa-regular fa-pen-to-square me-2"></i>Edit</a>
                            <a href="#" class="btn btn-sm btn-outline-dark"><i class="fa-regular fa-trash-can me-2"></i>Delete</a>
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


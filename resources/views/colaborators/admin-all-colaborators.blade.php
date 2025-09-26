<x-layout-app page-title="Colaborators">

    <div class="w-100 p-4">

        <h3>All colaborators</h3>

        <hr>

        <!-- table -->

         @if($colaborators->count() === 0)
        <div class="text-center my-5">
           <p>Nenhum colaborador encontrado.</p>
           <a href="#" class="btn btn-primary">Cadastrar um novo</a>
        </div>

    @else 
        <div class="mb-3">
           <a href="#" class="btn btn-primary">Cadastrar um novo</a>
        </div>

        <table class="table" id="table">

        <thead class="table-dark">
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ativo</th>
            <th>Departamento</th>
            <th>Cargo</th>
            <th>Data de admissão</th>
            <th>Salario</th>
            <th>Ações</th>
        </thead>
        <tbody>


          @foreach($colaborators as $colaborator)
            <tr>
                <td>{{ $colaborator->name }}</td>
                <td>{{ $colaborator->email }}</td>

                {{-- embora eu tenha colocado o atributo active 
                     esse atributo não existe na base de dados
                     o que será verificado é o campo email_verified_at
                     se ele tiver uma data então o usuario esta ativo
                --}}
                <td>

                    @empty($colaborator->email_verified_at)
                        <span class="badge bg-danger">Inativo</span>
                    @else
                        <span class="badge bg-success">Ativo</span>
                    @endempty
                   
                </td>


                <td>{{ $colaborator->department->name }}</td>
                <td>{{ $colaborator->role }}</td>
                <td>{{ $colaborator->detail->admission_date }}</td>
                <td>{{ $colaborator->detail->salary }}</td>

                <td>
                    <div class="d-flex gap-3 justify-content-end">
                        @if($colaborator->id === 1)
                          <i class="fa-solid fa-lock"></i>
                        @else
                          <div class="d-flex gap-3 justify-content-end">
                            <a href="{{ route('colaborators.details', $colaborator->id) }}" class="btn btn-sm btn-outline-dark"><i class="fas fa-eye me-2"></i>Detalhes</a>
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

</x-layout-app>


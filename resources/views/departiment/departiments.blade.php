<x-layout-app pageTitle="departamentos">

<div class="container-fluid ">

    <h3>Departamentos</h3>

    <hr>

    @if($departments->count() === 0)
       <div class="text-center my-5">
           <p>Nenhum departamento encontrado.</p>
           <a href="{{ route('departments.new-department') }}" class="btn btn-primary">Criar um novo</a>
        </div>

    @else 
        <div class="mb-3">
           <a href="departments.new-department" class="btn btn-primary">Criar um novo</a>
        </div>

        <table class="table w-50" id="table">
        <thead class="table-dark">
            <th>Departamentos</th>
            <th></th>
        </thead>
        <tbody>


          @foreach($departments as $department)
            <tr>
                <td>{{ $department->name }}</td>
                <td>
                    <div class="d-flex gap-3 justify-content-end">
                        <a href="#" class="btn btn-sm btn-outline-dark"><i class="fa-regular fa-pen-to-square me-2"></i>Edit</a>
                        <a href="#" class="btn btn-sm btn-outline-dark"><i class="fa-regular fa-trash-can me-2"></i>Delete</a>
                    </div>
                </td>
            </tr>

          @endforeach



        </tbody>
        </table>

    @endif 

</div>

</x-layout-app>

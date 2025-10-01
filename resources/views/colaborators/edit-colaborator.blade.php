
<x-layout-app page-title="Editar colaborador">

    <div class="w-100 p-4">

        <h3>Editar dados do colaborador</h3>

        <hr>

        <form action="#" method="post">

            @csrf

            <div class="d-flex gap-5">
                <p>Nome do colaborador: <strong>{{ $colaborator->name }}</strong></p>
                <p>E-mail do colaborador: <strong>{{ $colaborator->email }}</strong></p>


            </div>

            <input type="hidden" name="user_id" value="{{ $colaborator->id }}" >

            <div class="container-fluid">
                <div class="row gap-3">
                            <div class="col">
                                <div class="mb-3">
                                     <label for="select_department">Departamento</label>
                                    <select class="form-select" id="select_department" name="select_department">
                                        @foreach ($departments as $department)
                                         
                                            <option value="{{ $department_id == $department->id ? 'selected':'' }}"> {{ $department->name  }}</option>
                                         
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="salary" class="form-label">Salario</label>
                                    <input type="number" class="form-control" id="salary" name="salary" step=".01" placeholder="0,00" value="{{ old('salary',$colaborator->salary) }}">
                                    @error('salary')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="admission_date" class="form-label">Data de contratação</label>
                                    <input type="text" class="form-control" id="admission_date" name="admission_date" placeholder="YYYY-mm-dd" value="{{ old('admission_date',$colaborator->admission_date) }}">
                                    @error('admission_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                  
                        

                       

                    </div>

                   

                </div>

                <div class="mt-3">
                    <a href="#" class="btn btn-outline-danger me-3">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Atualizar dados </button>
                </div>

            </div>

        </form>

    </div>

</x-layout-app>


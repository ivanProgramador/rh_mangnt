<x-layout-app page-title="Novo Departamento">
  <div class="w-25 p-4">

    <h3>Novo departmento</h3>

    <hr>

    <form action="#" method="post">

        <div class="mb-3">
            <label for="name" class="form-label">Nome do departamento</label>
            <input type="text" class="form-control" id="name" name="name" required>
            @error('name')
                
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Criar departamento</button>
        </div>

    </form>

</div>
</x-layout-app>

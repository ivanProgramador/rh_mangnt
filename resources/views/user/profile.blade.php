<x-layout-app pageTitle="Perfil do usuário">

    <div class="w-100 p-4">
        <h3>Perfil do usuário</h3>
        <hr>
          <x-profile-user-data />
        <hr>

       <div class="container-fluid">
    <div class="row">
        <div class="col-md-6 border p-5">
            <x-profile-user-change-data />
        </div>
        <div class="col-md-6 border p-5 ">
            <x-profile-user-change-password />
            
        </div>
    </div>
</div>
         
</div>
</div>
    </div>
</x-layout-app>

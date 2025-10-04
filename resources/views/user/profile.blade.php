<x-layout-app pageTitle="Perfil do usuário">

    <div class="w-100 p-4">
        <h3>Perfil do usuário</h3>
        <hr>
          <x-profile-user-data />
        <hr>

       <div class="container-fluid">

    <div class="row ">

        <div  class="col-4 border p-2">
            <x-profile-user-change-data />
        </div>

        <div class="col-4 border p-2 ">
            <x-profile-user-change-password />
        </div>

         <div class="col-4 border p-2 align-top">
            <x-profile-user-change-address />
        </div>
        


    </div>
</div>
         
</div>
</div>
    </div>
</x-layout-app>

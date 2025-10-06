<x-layout-app pageTitle="Perfil do usuário">

    <div class="w-100 p-4">
        <h3>Perfil do usuário</h3>
        <hr>
          <x-profile-user-data />
        <hr>

       <div class="container-fluid">

    <div class="row ">

        <div  class="col-4 border p-2">
            {{--
               Eu preciso passar os dados do claborador dessa forma pra ele chegar dentro do componente
               Nesses casos não basta so enviar pela rota 
            --}}
            <x-profile-user-change-data :colaborator="$colaborator"/>
        </div>

        <div class="col-4 border p-2 ">
            <x-profile-user-change-password />
        </div>

         <div class="col-4 border p-2 align-top">
            
            <x-profile-user-change-address :colaborator="$colaborator" />
        </div>
        


    </div>
</div>
         
</div>
</div>
    </div>
</x-layout-app>

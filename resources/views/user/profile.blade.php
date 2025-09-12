<x-layout-app pageTitle="Perfil do usuário">
    <div class="w-100 p-4">
        <h3>Perfil do usuário</h3>
        <hr>
          <x-profile-user-data />
        <hr>
        <div class="container fluid m 0 p 0 mt 5" >
             <div class="row">
                 <x-profile-user-change-password />
                 {{-- component--}}
                 
             </div>    
        </div>
    </div>
</x-layout-app>

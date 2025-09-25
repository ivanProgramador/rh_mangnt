<div class="d-flex flex-column sidebar pt-4">
   @can('admin')
    <a href="{{ route('home') }}" class=""><i class="fas fa-home me-3"></i>Home</a>
    <a href="{{ route('colaborators.all-colaborators') }}" ><i class="fas fa-users me-3"></i>Colaboradores</a>
    <a href="{{ route('colaborators.rh-users') }}" ><i class="fas fa-user-gear me-3"></i>RH Colaboradores</a>
     <a href="{{ route('departments') }}" ><i class="fas fa-industry me-3"></i>Departamentos</a>
   @endcan
    <hr>
    <a href="{{ route('user.profile') }}" class=""><i class="fas fa-cog me-3"></i>Perfil de usuário</a>

    {{-- logout --}}

    <form action="{{ route('logout') }}" method="post">
         @csrf
          <button type="submit" class="btn btn-sm btn-outline-dark" ><i class="fas fa-sign-out-alt"></i>LOGOUT</button>
    </form>
</div>
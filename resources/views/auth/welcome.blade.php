<x-layout-guest page-title='Bem vindo'>
     <div class="container mt-5">
        <div class="row justify-content-center">
              {{-- Logo --}}
                <div class="col-md-8 text-center mb-5">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 200px;">   

                </div>

                <div class="card p-5 text-center">
                    <p>Bem vindo <strong>{{ $user->name }}</strong> ! </p>
                    <p>A sua conta foi criada com sucesso !</p>
                    <p>Agora você pode <a href="{{ route('login') }}">acessar sua conta </a></p>
                </div>

                
</x-layout-guest>

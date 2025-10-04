<div class="col-12">
    <div class="border p-5 shadow-sm">
        <form action="{{ route('user.profile.update-user-address') }}" method="post">
            @csrf

            <h3>Editar endereço</h3>
            <hr>

            <div class="mb-3">

                <label for="address" class="form-label">Endereço</label>
                <input type="text" name="address" id="address" class="form-control">
                @error('address')
                    <div class="text-danger">
                        {{ $message }}
                    </div> 
                @enderror
            </div>

            <div class="d-flex">

                 <div class="mb-3">
                    <label for="zip code">Zip code</label>
                    <input type="text" name="zip_code" class="form-control" >
                    @error('zip_code')
                      <div class="text-danger"> {{ $message }}  </div> 
                    @enderror
                </div>

                  <div class="mb-3">
                    <label for="City">Cidade</label>
                    <input type="text" name="city" class="form-control" >
                    @error('city')
                      <div class="text-danger"> {{ $message }}  </div> 
                    @enderror
                </div>
            </div>

             <div class="mb-3">
                    <label for="phone">Telefone</label>
                    <input type="text" name="phone" class="form-control" >
                    @error('phone')
                      <div class="text-danger"> {{ $message }}  </div> 
                    @enderror
                </div>
            

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Atualizar endereço</button>
            </div>

        </form>
        {{-- essa varivel de sessão tem que ser diferente da outra para que saiba qual dos dois deu certo ou errado  --}}
         @if(session('success_change_data'))
            <div class="alert alert-success mt-3">
                                     {{ session('success_change_data') }}
            </div>
         @endif
    </div>
</div>
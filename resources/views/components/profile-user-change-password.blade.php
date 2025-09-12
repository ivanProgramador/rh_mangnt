
                    <div class="col-12"  >
                        <div class="border p-5 shadow-sm">
                            <form action="{{ route('user.profile.update-password') }}" method="post">
                                @csrf

                                <h3>Atualizar senha </h3>

                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Senha atual</label>
                                    <input type="password" name="current_password" id="current_password" class="form-control">
                                    @error('current_password')
                                       {{ $message }}   
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="new_password" class="form-label">Nova senha</label>
                                    <input type="password" name="new_password" id="new_password" class="form-control">
                                    @error('new_password')
                                       {{ $message }}   
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="new_password_confirmation" class="form-label">Confirme a nova senha</label>
                                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control">
                                     @error('new_password_confirmation')
                                       {{ $message }}   
                                    @enderror
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Mudar a senha</button>
                                </div>

                            </form>

                            @if(session('error')) 

                                 <div class="alert alert-danger mt-3">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success mt-3">
                                     {{ session('success') }}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

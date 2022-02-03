@extends('layouts.app')

@section('content')
<section class="hero is-light is-fullheight">
   <div class="hero-body">
  
    <div class ="container">
        <div class="columns is-centered">
            <div class="column is-5">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                <div class="field">
                    <label for="" class="label">Ime</label>
                    <p class="control has-icons-right">
                        <span class="icon is-small is-right">
                            <i class="fas fa-user"></i>
                          </span>
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </p>
                  </div>

                  <div class="field">
                    <label for="" class="label">Email</label>
                    <p class="control has-icons-right">
                        <span class="icon is-small is-right">
                            <i class="fas fa-envelope"></i>
                          </span>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                    </p>
                  </div>

                  <div class="field">
                    <label for="" class="label">Lozinka</label>
                    <p class="control has-icons-right">
                        <span class="icon is-small is-right">
                            <i class="fas fa-lock"></i>
                          </span>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </p>
                  </div>

                  <div class="field">
                    <label for="" class="label">Potvdri Lozinku</label>
                    <p class="control has-icons-right">
                        <span class="icon is-small is-right">
                            <i class="fas fa-lock"></i>
                          </span>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </p>
                  </div>
                  
                  <div class="field">
                    <p class="control">
                      <button type="submit" class="button is-success">
                        Registriraj se
                      </button>

                  </div>
                 
             </form>
            </div>
        </div>
    </div>
       
 </div> 
</section>  
@endsection
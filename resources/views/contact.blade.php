@extends('layouts.app')

@section('pageTitle', 'Katalog')

@section('content')
<div>
  
    <section class="hero is-light is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-half">
                        <form class="box"  action="/contact" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                  <label class="label">Od</label>
                                </div>
                                <div class="field-body">
                                  <div class="field">
                                    <p class="control is-expanded has-icons-left">
                                      <input class="input" type="text" placeholder="Ime" name="name" value="{{ old('name') }}">
                                      <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                      </span>
                                    </p>
                                    @if ($errors->has('name'))
                                      <p class="">{{ $errors->first('name') }}</p>
                                    @endif
                                  </div>
                                  <div class="field">
                                    <p class="control is-expanded has-icons-left has-icons-right">
                                      <input class="input" type="text" placeholder="Prezime" name="lastname" value="{{ old('lastname') }}">
                                      <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                      </span>
                                    </p>
                                    @if ($errors->has('lastname'))
                                      <p class="">{{ $errors->first('lastname') }}</p>
                                    @endif
                                  </div>
                                </div>
                              </div>
                              
                              <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Telefon</label>
                                </div>
                                <div class="field-body">
                                  <div class="field is-expanded">
                                    <div class="field has-addons">
                                      <p class="control">
                                        <a class="button is-static">
                                          +387
                                        </a>
                                      </p>
                                      <p class="control is-expanded">
                                        <input class="input" type="tel" placeholder="Unesite vaš broj telefona" name="phone" value="{{ old('phone') }}">
                                      </p>
                                      @if ($errors->has('phone'))
                                        <p class="">{{ $errors->first('phone') }}</p>
                                      @endif
                                    </div>
                                    <p class="help">NAPOMENA: Broj telefona nije obavezan.</p>
                                  </div>
                                </div>
                              </div>



                              <div class="field is-horizontal">
                                
                                <div class="field-label is-normal">
                                        <label class="label">Email</label>
                                </div>
                                
                                <div class="field-body">
                                  <div class="field is-expanded">
                                    <div class="field has-addons">
                                      <p class="control is-expanded is-expanded has-icons-left has-icons-right">
                                        <input class="input" type="email" placeholder="Unesite vašu email adresu" name="email" value="{{ old('email') }}">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                      </p>
                                      @if ($errors->has('email'))
                                        <p class="">{{ $errors->first('email') }}</p>
                                      @endif
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              
                            
                              
                              <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                  <label class="label">Naslov</label>
                                </div>
                                <div class="field-body">
                                  <div class="field">
                                    <div class="control">
                                      <input class="input" type="text" placeholder="Unesite naslov ovdje" name="title" value="{{ old('title') }}">
                                      @if ($errors->has('title'))
                                        <p class="">{{ $errors->first('title') }}</p>
                                      @endif
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                  <label class="label">Poruka</label>
                                </div>
                                <div class="field-body">
                                  <div class="field">
                                    <div class="control">
                                      <textarea class="textarea" placeholder="Unesite poruku ovdje" name="message"></textarea>
                                      @if ($errors->has('message'))
                                        <p class="">{{ $errors->first('message') }}</p>
                                      @endif
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="field is-horizontal">
                                <div class="field-label">
                                  
                                </div>
                                <div class="field-body">
                                  <div class="field">
                                    <div class="control">
                                        <input class="button is-primary" type="submit" value="Pošalji poruku" />
                                        <a href="{{ route("home") }}" class="button is-danger is-pulled-right">
                                            Na naslovnu
                                        </a>
                                    </div>
                                  </div>
                                </div>
                              </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>  

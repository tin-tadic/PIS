@extends('layouts.app')

@section('pageTitle', 'Katalog')

@section('content')
<div>
<br/>
<br/>
  
    <section class="hero is-light is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-half">
                        <form class="box" action="/editProfile/{{ $profile->id }}" method="POST" enctype="multipart/form-data">
                          @csrf
                            <div class="field">
                                <label>Izaberite novu sliku:</label>
                                <div class="field">
                                    <div class="file has-name">
                                        <label class="file-label">
                                          <input class="file-input" type="file" name="avatar">
                                          <span class="file-cta">
                                            <span class="file-icon">
                                              <i class="fas fa-upload"></i>
                                            </span>
                                            <span class="file-label">
                                              Choose a file…
                                            </span>
                                          </span>
                                        </label>
                                      </div>
                                  </div>
                            </div>

                            <div class="field ">
                              <label for="" class="label">Email</label>
                              <input class="input" type="text" name="email" value="{{ $profile->email }}">
                              @if ($errors->has('email'))
                                <p class="help has-text-danger">{{ $errors->first('email') }}</p>
                              @endif
                            </div>

                            <div class="field ">
                                <label for="" class="label">Dob</label>
                                <input class="input" type=“number” name="age" value="{{ $profile->age }}">
                                @if ($errors->has('age'))
                                  <p class="help has-text-danger">{{ $errors->first('age') }}</p>
                                @endif
                            </div>

                            <div class="field">
                                <div class="control">
                                    <label class="label">Spol</label>
                                    <input class="input" type="text" name="gender" value="{{ $profile->gender }}">
                                    @if ($errors->has('gender'))
                                      <p class="help has-text-danger">{{ $errors->first('gender') }}</p>
                                    @endif
                                  </div>
                            </div>

                            <div class="field ">
                                <label for="" class="label">Prebivalište</label>
                                <input class="input" type="text" name="location" value="{{ $profile->location }}">
                                @if ($errors->has('gender'))
                                  <p class="help has-text-danger">{{ $errors->first('location') }}</p>
                                @endif
                            </div>


                            <br />
                            <div class="field">
                                <p class="control">
                                    <input class="button is-success" type="submit" value="Spremi" />
                                    <a href="{{ route("home") }}" class="button is-danger is-pulled-right">
                                      Na naslovnu
                                  </a>
                                  
                                </p>
                              </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
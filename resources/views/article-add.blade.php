@extends('layouts.app')

@section('pageTitle', 'Dodaj novi artikal')

@section('content')
<div class="container">
    <section class="hero is-dark is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-half">
                        <form class ="box">

                            <div class="field ">
                              <label for="" class="label">Naziv</label>
                              <input class="input" type="text" placeholder="Unesite Naziv">
                            </div>

                            <div class="field ">

                                <label for="" class="label">Cijena</label>
                                <input class="input" type=“number” placeholder="Unesite Cijenu">
                            </div>

                            <div class="field ">
                                <label for="" class="label">Kratki opis</label>
                                <input class="input" type="text" placeholder="Unesite Kratki Opis">
                            </div>

                            <div class="field">
                                <div class="control">
                                    <label class="label">Da li je artikl in stock?</label>
                                    
                                    <label class="radio">
                                      <input type="radio" name="foobar">
                                      In Stock
                                    </label>
                                    <label class="radio">
                                      <input type="radio" name="foobar" checked>
                                      Out of Stock
                                    </label>
                                  </div>
                            </div>

                            <div class="field ">
                                <label for="" class="label">Detaljni opis:</label>
                                <div class="control">
                                    <textarea class="textarea" placeholder="Unesite Detaljni opis"></textarea>
                                  </div>
                            </div>

                            <div class="field">
                                <p class="control">
                                  <button class="button is-success ">
                                    Spremi
                                  </button>
                                  <button class="button is-danger is-pulled-right">
                                    Poništi
                                  </button>
                                  
                                </p>
                              </div>

                              <div class="field">
                                <div class="file has-name">
                                    <label class="file-label">
                                      <input class="file-input" type="file" name="resume">
                                      <span class="file-cta">
                                        <span class="file-icon">
                                          <i class="fas fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                          Choose a file…
                                        </span>
                                      </span>
                                      <span class="file-name">
                                        Primjer.png
                                      </span>
                                    </label>
                                  </div>
                              </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

  </div>
  @endsection
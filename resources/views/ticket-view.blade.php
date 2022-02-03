@extends('layouts.app')

@section('pageTitle', 'Katalog')

@section('content')

<div>
    
    <section class="hero is-light is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-half">
                        <div class ="box">

                            <div class="field ">
                              <label for="" class="label">Ime i Prezime</label>
                              <p class="has-background-light">{{ $ticket->name . " "  . $ticket->lastname}}</p>
                            </div>

                            <div class="field ">

                                <label for="" class="label">Email</label>
                                <p class="has-background-light">{{ $ticket->email }}</p>
                            </div>

                            <div class="field ">
                                <label for="" class="label">Telefon</label>
                                <p class="has-background-light">{{ $ticket->phone }}</p>
                            </div>

                            <div class="field ">
                                <label for="" class="label">Naslov</label>
                                <p class="has-background-light">{{ $ticket->title }}</p>
                            </div>


                            <div class="field ">
                                <label for="" class="label">Poruka:</label>
                                <p class="box"> 
                                    {{ $ticket->message }}
                                    <br /><br />
                                </p>
                            </div>

                            <div class="field">
                                <p class="control">
                                    <a href="{{ route('postSetTicketSolved', $ticket->id) }}">
                                        <button class="button is-success ">
                                            Označi kao pročitano
                                        </button>
                                    </a>
                                  <a href="{{ route('postSetTicketTrashed', $ticket->id) }}">
                                    <button class="button is-danger is-pulled-right">
                                        Izbriši poruku
                                    </button>
                                    </a>
                                </p>
                              </div>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
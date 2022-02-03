@extends('layouts.app')

@section('pageTitle', 'Stranica nije pronađena')

@section('content')
<div>
  
    <section class="hero is-light is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-half">
                        <form class ="box">

                        <h1 class="title is-1 has-text-centered	has-text-black mb-5">Greška!<br />Stranica nije pronađena!</h1>
                        <br/>
                        <br/>
                        <p class="has-text-centered	has-text-black">Da bi ste se vratili na naslovnu stranicu kliknite <a class="has-text-info" href="{{ route("home") }}">ovdje.</a></p>
                               
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div> 
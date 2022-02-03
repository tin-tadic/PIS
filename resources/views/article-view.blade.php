@extends('layouts.app')

@section('pageTitle', 'Katalog')

@section('content')

<div>
<br/>
<br/>
<br/>
    
    <section class="hero is-light is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-half">
                        <form class ="box">

                            <div class="field">
                                <figure class="image is-3by2 is-centered">
                                  @if($article->picture)
                                    <img src="/storage/articlePictures/{{ $article->picture }}" alt="avatar_image"/>
                                  @else
                                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="Placeholder image">
                                  @endif
                                </figure>
                            </div>

                            <div class="field ">
                              <label for="" class="label">Naziv</label>
                              <p class="has-background-light">{{ $article->title }}</p>
                            </div>

                            <div class="field ">
                                <label for="" class="label">Cijena</label>
                                <p class="has-background-light">{{ $article->price }} KM</p>
                            </div>

                            <div class="field ">
                                <label for="" class="label">Kratki opis</label>
                                <p class="has-background-light">{{ $article->description }}</p>
                            </div>

                            <div class="field ">
                                <label for="" class="label">Detaljni opis:</label>
                                <p class="box"> 
                                  {{ $article->more_info }}  
                                  <br /><br /> </p>
                            </div>

                            <div class="field">
                                <p class="control">

                                  @if(auth()->user())
                                    @if(!DB::table('subscriptions')->where('subscribed_user', '=', auth()->user()->id)->where('subscribed_article', '=', $article->id)->exists())
                                    <a href="{{ route("subscribe", $article->id) }}" class="button is-success ">
                                      Preplati se na Artikl
                                    </a>
                                    @else
                                    <a href="{{ route("unsubscribe", $article->id) }}" class="button is-danger ">
                                      Ukini pretplatu
                                    </a>
                                    @endif
                                  @endif

                                  @if( auth()->user() && auth()->user()->role >= 1)
                                  
                                  <a href="{{ route("deleteArticle", $article->id) }}" class="button mr-1 is-danger is-pulled-right">
                                    Izbriši artikl
                                  </a>
                                  <a href="{{ route("getEditArticle", $article->id) }}" class="button mr-1 is-info is-pulled-right">
                                    Uredi artikl
                                  </a>
                                  @endif
                                </p>
                              </div>
                              <br />
                              <br />
                              <div class="field">
                                <p class="control">
                                  <a href="{{ route("getContact") }}" class="button is-success is-fullwidth">
                                    Zainteresirani za kupovinu? Kontaktirajte nas!
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

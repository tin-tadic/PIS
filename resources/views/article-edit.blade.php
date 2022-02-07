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
                        <form class="box" action="/editArticle/{{ $article->id }}" method="POST" enctype="multipart/form-data">
                          @csrf

                            <div class="field">
                                <figure class="image is-3by2 is-centered">
                                  @if($article->picture)
                                    <img src="/storage/articlePictures/{{ $article->picture }}" alt="article_image"/>
                                  @else
                                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="Placeholder image">
                                  @endif
                                </figure>
                            </div>

                            <div class="field">
                                <label>Izaberite novu sliku:</label>
                                <div class="field">
                                    <div class="file has-name">
                                        <label class="file-label">
                                          <input class="file-input" type="file" name="picture">
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
                            @if ($errors->has('picture'))
                              <p class="">{{ $errors->first('picture') }}</p>
                          @endif

                            <div class="field ">
                              <label for="" class="label">Naziv</label>
                              <input class="input" type="text" placeholder="Unesite ime artikla" name="title" value="{{ $article->title }}">
                                @if ($errors->has('title'))
                                  <p class="">{{ $errors->first('title') }}</p>
                                @endif
                            </div>

                            <div class="field ">
                                <label for="" class="label">Cijena</label>
                                <input class="input" type="number" placeholder="Unesite cijenu" name="price" value="{{ $article->price }}">
                                @if ($errors->has('price'))
                                  <p class="">{{ $errors->first('price') }}</p>
                                @endif
                            </div>


                            <div class="field ">
                                <label for="" class="label">Kratki opis</label>
                                <input class="input" type="text" placeholder="Unesite  kratki opis" name="description" value="{{ $article->title }}">
                                @if ($errors->has('description'))
                                  <p class="">{{ $errors->first('description') }}</p>
                                @endif
                            </div>

                            <div class="field ">
                                <label for="" class="label">Detaljni opis:</label>
                                <div class="control">
                                    <textarea class="textarea" placeholder="Unesite detaljni opis" name="more_info">{{ $article->more_info }}</textarea>
                                    @if ($errors->has('more_info'))
                                      <p class="">{{ $errors->first('more_info') }}</p>
                                    @endif
                                  </div>
                            </div>

                            <div class="field">
                                <p class="control">
                                  <input class="button is-primary" type="submit" value="Spremi promjene" />
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

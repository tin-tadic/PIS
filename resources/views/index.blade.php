@extends('layouts.app')

@section('pageTitle', 'Katalog')

@section('content')
<div>
  <br/>
  <br/>
  <br/>
      <div class="columns">
      <div class="column is-one-fifth">
        <aside class="menu has-background-light">
          <label class="label">Pomoćna traka</label>

          <label class="menu-label">Pretraga</label>
          <div class="field has-addons">
            <div class="control">
              <input class="input" type="text" placeholder="Unesite tekst">
            </div>
            <div class="control">
              <a class="button is-info">Pretaži</a>
            </div>
          </div>

          <label class="menu-label">Sortiranje</label>
          <br/>

          <div class="dropdown">
            <div class="dropdown-trigger">
              <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
                <span>Sortiranje po:</span>
                <span class="icon is-small">
                  <i class="fas fa-angle-down" aria-hidden="true"></i>
                </span>
              </button>
            </div>
            <div class="dropdown-menu" id="dropdown-menu" role="menu">
              <div class="dropdown-content">
                <a href="#" class="dropdown-item">
                  Cijena-Najniža
                </a>
                <a class="dropdown-item">
                  Cijena-Najviša
                </a>
                <a href="#" class="dropdown-item">
                  Naziv-Uzlazno
                </a>
                <a href="#" class="dropdown-item">
                  Naziv-Silazno
                </a>

              </div>
            </div>
          </div>
          
          <br>
          <br>

          <div class="control mb-1">
            <label class="checkbox">
              <input type="checkbox">Sakrij out-of-stock artikle
            </label>
          </div>

          @if(auth()->user() && auth()->user()->role >= 1)
            <div class="field">
              <p class="control">
                <button class="button is-info is-fullwidth">
                  <a href="{{ route("getAddArticle") }}">Dodaj Artikal</a>
                </button>
              </p>
            </div>
          @endif

        </aside>
    </div>
      
    


    <section class="section is-multiline">

        <div class="container">
          <h3 class="title has-text-centered is-size-4">Artikli</h3>
          <div class="mt-5 columns is-multiline is-centered is-8 is-variable">
          

            @foreach($articles as $article)
            <div class="column is-4-tablet is-3-desktop">
              <div class="card">
                <div class="card-image has-text-centered px-6">
                  <img src="/storage/articlePictures/{{ $article->picture }}" alt="article_image"/>
                </div>
                <div class="card-content">
                  <p class="has-text-centered">{{ $article->price }}</p>
                  <p class="title is-size-5 has-text-centered">{{ $article->title }}</p>
                </div>
                <footer class="card-footer">
                  <p class="card-footer-item">
                    @if(auth()->user() && auth()->user()->role >= 1)
                      <a href="{{ route("getEditArticle", $article->id) }}" class="button mt-5" id="edit">Uredi</a>
                    @endif
                      <a href="{{ route("viewArticle", $article->id) }}" class="button mt-5" id="viewone">Detaljni pregled</a>
                  </p>
                </footer>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        
      </section>

</div>


<script>
  var dropdown = document.querySelector('.dropdown');
  dropdown.addEventListener('click', function(event) {
  event.stopPropagation();
  dropdown.classList.toggle('is-active');
});
</script>

@endsection
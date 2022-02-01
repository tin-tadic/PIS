@extends('layouts.app')

@section('pageTitle', 'Katalog')

@section('content')
<div class="container">
    
    <nav class="navbar is-fixed-top is-dark" role="navigation" aria-label="main navigation">
        <div class="navbar-menu">
            <div class="navbar-start">
                <a href="index.html" class="navbar-item has-background-success">Naslovna</a>
                <a href="contact.html" class="navbar-item has-background-success">Kontakt</a>
                <a href="tickets.html" class="navbar-item has-background-success">Tiketi</a>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a href="profile.html" class="button is-light"> Profil </a>
                        <a href="register.html" class="button is-info"> <strong> Registracija </strong> </a>
                        <a href="login.html" class="button is-success">Log in</a>
                        <a class="button is-success">Logout</a>
                    </div>
            </div>

        </div>
    </nav>

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

          <div class="field">
            <p class="control">
              <button class="button is-info is-fullwidth">
                <a href="article-add.html">Dodaj Artikal</a>
              </button>
            </p>
          </div>

        </aside>
    </div>
      
    


    <section class="section is-multiline">

        <div class="container">
          <h3 class="title has-text-centered is-size-4">Artikli</h3>
          <div class="mt-5 columns is-multiline is-centered is-8 is-variable">
          

            <div class="column is-4-tablet is-3-desktop">
              <div class="card">
                <div class="card-image has-text-centered px-6">
                  <img src="img/rajcica.jpg" alt="Placeholder image">
                </div>
                <div class="card-content">
                  <p class="has-text-centered">2KM</p>
                  <p class="title is-size-5 has-text-centered">Rajcica</p>
                </div>
                <footer class="card-footer">
                  <p class="card-footer-item">
                    <button class="button mt-5" id="edit">Edit</button>
                    <button class="button mt-5" id="viewone">View</button>
                    <button class="button mt-5 is-danger" id="delete">Delete</button>
                  </p>
                </footer>
              </div>
            </div>


            <div class="column is-4-tablet is-3-desktop">
              <div class="card">
                <div class="card-image has-text-centered px-6">
                  <img src="img/krumpir.jpg" alt="Placeholder image">
                </div>
                <div class="card-content">
                  <p class="has-text-centered">2KM</p>
                  <p class="title is-size-5 has-text-centered">Krumpir</p>
                </div>
                <footer class="card-footer">
                  <p class="card-footer-item">
                    <button class="button mt-5" id="edit">Edit</button>
                    <button class="button mt-5" id="view">View</button>
                    <button class="button mt-5 is-danger" id="delete">Delete</button>
                  </p>
                </footer>
              </div>
            </div>


            <div class="column is-4-tablet is-3-desktop">
              <div class="card">
                <div class="card-image has-text-centered px-6">
                  <img src="img/mrkva.jpg" alt="Placeholder image">
                </div>
                <div class="card-content">
                  <p class="has-text-centered">2KM</p>
                  <p class="title is-size-5 has-text-centered">Mrkva</p>
                </div>
                <footer class="card-footer">
                  <p class="card-footer-item">
                    <button class="button mt-5" id="edit"><a href="article-edit.html">Edit</a></button>
                    <button class="button mt-5" id="view"><a href="article-view.html">View</a></button>
                    <button class="button mt-5 is-danger" id="delete">Delete</button>
                  </p>
                </footer>
              </div>
            </div>
          </div>
        </div>
        
      </section>

</div>
@endsection

<script>
  var dropdown = document.querySelector('.dropdown');
  dropdown.addEventListener('click', function(event) {
  event.stopPropagation();
  dropdown.classList.toggle('is-active');
});
</script>
<style>
  body {
  background-color: beige;
  height: 100vh;
}

</style>
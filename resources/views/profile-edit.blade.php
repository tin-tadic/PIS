<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uredi Profil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
    
    <section class="hero is-dark is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-half">
                        <form class ="box">

                            <div class="field">
                                <figure class="image is-3by2 is-centered">
                                    <img src="img/profile.png">
                                </figure>
                            </div>

                            <div class="field">
                                <label>Izaberite novu sliku:</label>
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
                            </div>

                            <div class="field ">
                              <label for="" class="label">Email</label>
                              <input class="input" type="text" value="jozo.jozic@gmail.com">
                            </div>

                            <div class="field ">

                                <label for="" class="label">Dob</label>
                                <input class="input" type=“number” value="22">
                            </div>

                            <div class="field">
                                <div class="control">
                                    <label class="label">Spol</label>
                                    
                                    <label class="radio">
                                      <input type="radio" name="foobar">
                                      Muško
                                    </label>
                                    <label class="radio">
                                      <input type="radio" name="foobar">
                                      Žensko
                                    </label>
                                  </div>
                            </div>

                            <div class="field ">
                                <label for="" class="label">Prebivalište</label>
                                <input class="input" type="text" value="Mostar,BiH">
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


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>


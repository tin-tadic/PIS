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
                    <div class="column ">
                        <form class ="box">

                            <div class="tabs is-boxed is-centered">
                                <ul>
                                  <li class="is-active" data-target="product-details">
                                    <a>Korisnici</a> 
                                  </li>
                                  <li data-target="delivery-information">
                                    <a>Banani korisnici</a>
                                  </li>
                                </ul>
                              </div>
                              <div class="px-2" id="tab-content">
                                <div id="product-details">

                                  <div class="field has-background-dark md-2">
                                    <p class="has-icons-right">
                                        <span class="is-pulled-left">
                                            Ime:
                                            <a class="mr-5">Jozo Jozić</a>
                                            Email:
                                            <a class="mr-5">jozo.jozic@gmail.com</a>
                                            Kupon:
                                            <a class="mr-5">Primjenjen na: Mrkva</a>
    
    
                                        </span>
                                       </p>
                                    </div>
                
                                <br/>
                                <br/>
                                <div class="field has-background-dark md-2">
                                    <p class="has-icons-right">
                                        <span class="is-pulled-left">
                                            Ime:
                                            <a class="mr-5">Jozo Jozić</a>
                                            Email:
                                            <a class="mr-5">jozo.jozic@gmail.com</a>
                                            Kupon:
                                            <a class="mr-5">Primjenjen na: Mrkva</a>
    
    
                                        </span>
                                       </p>
                                    </div>
                              <br/>
                
                                </div>
                                <div id="delivery-information" class="is-hidden">
                                    <div class="field has-background-dark md-2">
                                        <p class="has-icons-right">
                                            <span class="is-pulled-left">
                                                Ime:
                                                <a class="mr-5">Ivana Ivanković</a>
                                                Email:
                                                <a class="mr-5">ivana.ivanković@gmail.com</a>
                                                Kupon:
                                                <a class="mr-5">Primjenjen na: None</a>
        
        
                                            </span>
                                           </p>
                                        </div>
                
                                <br/>
                                <br/>
                                
              
                              <br/>
                
                                </div>
                              </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>

<script>
    const tabs = document.querySelectorAll('.tabs li');
    const tabContentBoxes = document.querySelectorAll('#tab-content > div');
    
    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        tabs.forEach(item => item.classList.remove('is-active'));
        tab.classList.add('is-active');
    
        const target = tab.dataset.target;
        // console.log(target);
        tabContentBoxes.forEach(box => {
          if (box.getAttribute('id') === target) {
            box.classList.remove('is-hidden');
          } else {
            box.classList.add('is-hidden');
          }
        })
      })
    })
    </script>
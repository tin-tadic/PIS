<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>

    <div class="columns">
        <div class="column is-one-fifth">
          <aside class="menu has-background-light">
            <div class="card">

                <div class="card-image has-text-centered px-6">
                  <img src="img/profile.png" alt="Placeholder image">
                </div>

                <div class="card-content">
                  <p class="title is-size-5 has-text-centered">Jozo Jozić</p>
                  <p class="has-background-light">Email: <span id="email"></span></p>
                  <p class="has-background-light">Dob: <span id="dob"></span></p>
                  <p class="has-background-light">Spol: <span id="spol"></span></p>
                  <p class="has-background-light">Prebivalište: <span id="prebivaliste"></span></p>
                </div>

                <div class="field">
                    <p class="control">
                      <button class="button is-success is-fullwidth">
                        Edit
                      </button>
                    </p>
                  </div>

                  <div class="field">
                    <p class="control">
                      <button class="button is-danger is-fullwidth mb-1">
                        Ban
                      </button>
                      <button class="button is-warning is-fullwidth mb-1">
                        Unban
                      </button>
                    </p>
                  </div>

                  <div class="field">
                    <p class="control">
                      <button class="button is-info is-fullwidth mb-1">
                        Make Admin
                      </button>
                      <button class="button is-info is-fullwidth mb-1">
                        Unmake Admin
                      </button>
                    </p>
                  </div>

            </div>
          </aside>
        </div>


        <div class="column is-four-fiths is-pulled-right">
            <form class="box">
                <div class="tabs is-boxed is-centered">
                  <ul>
                    <li class="is-active" data-target="product-details">
                      <a>Preplaćeni artikli</a> 
                    </li>
                    <li data-target="delivery-information">
                      <a>Kuponi</a>
                    </li>
                  </ul>
                </div>
                <div class="px-2" id="tab-content">
                  <div id="product-details">
                    <h3 class="is-size-5 title">Preplaćeni artikli</h3>
                    <div class="field has-background-dark">
                        <p class="has-icons-right">
                            <span class="is-pulled-left">
                                Artikal:
                                <a class="mr-5">Mrkve</a>
                                In stock:
                                <a class="mr-5">Da</a>
                                Status kupona: Primjenjen
                            </span>
                          
                            <span class="icon is-small is-right is-pulled-right">
                              <i class="fas fa-trash mr-1"></i>
                           </p>
                  </div>
  
                  <br/>
                  <br/>
                  <div class="field has-background-dark">
                    <p class="has-icons-right">
                      <span class="is-pulled-left">
                          Artikal:
                          <a class="mr-5">Krumpir</a>
                          In stock:
                          <a class="mr-5">Ne</a>
                          Status kupona: Nije Primjenjen
                      </span>
                    
                      <span class="icon is-small is-right is-pulled-right">
                        <i class="fas fa-trash mr-1"></i>
                     </p>
                </div>
                <br/>
  
                  </div>
                  <div id="delivery-information" class="is-hidden">
                    <h3 class="is-size-5 title">Kuponi</h3>
                    <div class="field has-background-dark">
                      <p class="has-icons-right">
                        <span class="is-pulled-left">
                            Kupon:
                            <a class="mr-5">10%</a>
                            In stock:
                            <a class="">1</a>
                        </span>
                       </p>
                  </div>
  
                  <br/>
                  <br/>
                  <div class="field has-background-dark">
                    <p class="has-icons-right">
                      <span class="is-pulled-left">
                          Kupon:
                          <a class="mr-5">15%</a>
                          In stock:
                          <a class="">0</a>
                      </span>
                     </p>
                </div>

                <br/>
  
                  </div>
                </div>
              </div>
             </form>
        </div>
     </div>


    
</body>
</html>

<style>
    .section{
        height: 100%;
        position: center;
    }
</style>

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

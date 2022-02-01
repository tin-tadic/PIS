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
    <section class="hero is-dark is-fullheight">
      <div class="hero-body">   
       <div class="container">
          <div class="columns is-variable is-8 is-centered">
            <div class="column is-8-tablet">
             <form class="box">
              <div class="tabs is-boxed is-centered">
                <ul>
                  <li class="is-active" data-target="product-details">
                    <a>Nove Poruke</a> 
                  </li>
                  <li data-target="delivery-information">
                    <a>Stare poruke</a>
                  </li>
                </ul>
              </div>
              <div class="px-2" id="tab-content">
                <div id="product-details">
                  <h3 class="is-size-5 title">Nove poruke</h3>
                  <div class="field has-background-dark">
                    <p class="has-icons-right">
                      <span class="is-pulled-left">
                          Od:
                          <a class="mr-5">Jozo</a>
                          Naslov:
                          <a class="">Pitanje za produkt</a>
                      </span>
                    
                    <span class="icon is-small is-right is-pulled-right">
                        <i class="fas fa-check mr-1"></i>
                    <span class="icon is-small is-right is-pulled-right">
                        <i class="fas fa-window-close"></i>
                     </p>
                </div>

                <br/>
                <br/>

                </div>
                <div id="delivery-information" class="is-hidden">
                  <h3 class="is-size-5 title">Stare poruke</h3>
                  <div class="field has-background-dark">
                    <p class="has-icons-right">
                      <span class="is-pulled-left">
                          Od:
                          <a class="mr-5">Ivana</a>
                          Naslov:
                          <a class="">Problem s kuponom</a>
                      </span>
                    
                    <span class="icon is-small is-right is-pulled-right">
                        <i class="fas fa-trash mr-1"></i>
                     </p>
                </div>

                <br/>
                <br/>

                </div>
              </div>
            </div>
           </form>
          </div>
        </div>
       </div>    
      </section>
    
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
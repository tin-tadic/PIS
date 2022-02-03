@extends('layouts.app')

@section('pageTitle', 'Katalog')

@section('content')
<div>
    <section class="hero is-light is-fullheight">
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
                <br/>
                  <div id="product-details">
                    @foreach ($unprocessedTickets as $unprocessedTicket)
                    <div class="field has-background-dark">
                      <p class="has-icons-right">
                        <span class="is-pulled-left">
                            <b>Od: </b>
                            <a class="">{{ $unprocessedTicket->name . " " . $unprocessedTicket->lastname }}</a>
                            <b>Naslov: </b>
                            <a class="" target="_blank" href="{{ route('getGetTicketInfo', $unprocessedTicket->id) }}">{{ $unprocessedTicket->title }}</a>
                        </span>
                      
                      <span class="icon is-small is-right is-pulled-right">
                          <a href="{{ route('postSetTicketSolved', $unprocessedTicket->id) }}"><i class="fas fa-check mr-1"></i></a>
                      </p>
                  </div>
                  <br />
                  <br />
                  @endforeach
                </div>


                
                <div id="delivery-information" class="is-hidden">
                  @foreach ($processedTickets as $processedTicket)
                  <div class="field has-background-dark">
                    <p class="has-icons-right">
                      <span class="is-pulled-left">
                        <b>Od: </b>
                        <a class="">{{ $processedTicket->name . " " . $processedTicket->lastname }}</a>
                        <b>Naslov: </b>
                        <a class="" target="_blank" href="{{ route('getGetTicketInfo', $processedTicket->id) }}">{{ $processedTicket->title }}</a>
                      </span>
                    
                    <span class="icon is-small is-right is-pulled-right">
                      <a href="{{ route('postSetTicketTrashed', $processedTicket->id) }}"><i class="fas fa-trash mr-1"></i></a>
                     </p>
                </div>
                <br/>
                <br/>
                @endforeach
                



                </div>
              </div>
            </div>
           </form>
          </div>
        </div>
       </div>    
      </section>
    
</div>


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

@endsection
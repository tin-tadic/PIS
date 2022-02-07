@extends('layouts.app')

@section('pageTitle', 'Katalog')

@section('content')
<div>
<br/>
<br/>
<br/>
<br/>
    <div class="columns">
        <div class="column is-one-fifth">
          <aside class="menu has-background-light">
            <div class="card">

                <div class="card-image has-text-centered px-6">
                  @if($profile->avatar)
                    <img src="/storage/profilePictures/{{ $profile->avatar }}" alt="avatar_image"/>
                  @else
                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="Placeholder image">
                  @endif
                </div>

                <div class="card-content">
                  <p class="title is-size-5 has-text-centered">{{ $profile->name }}</p>
                  <p class="has-background-light">Email: {{ $profile->email }}<span id="email"></span></p>
                  <p class="has-background-light">Dob: {{ $profile->age }}<span id="dob"></span></p>
                  <p class="has-background-light">Spol: {{ $profile->gender }}<span id="spol"></span></p>
                  <p class="has-background-light">Prebivalište: {{ $profile->location }}<span id="prebivaliste"></span></p>
                </div>

                @if ( (auth()->user()->id == $profile->id) || (auth()->user()->role == 2 || auth()->user()->role > $profile->role) )
                <div class="field">
                    <p class="control">
                      <a href="{{ route("getEditProfile", $profile->id) }}">
                        <button class="button is-success is-fullwidth">
                          Edit
                        </button>
                      </a>
                    </p>
                  </div>
                @endif

                  @if (auth()->user()->role >= 1 && $profile->role == 0)
                  <div class="field">
                    <p class="control">
                      @if (!$profile->isBanned)
                        <a href="{{ route('postBanUser', $profile->id) }}">
                          <button class="button is-danger is-fullwidth mb-1">
                            Ban
                          </button>
                        </a>
                      @else
                        <a href="{{ route('postUnbanUser', $profile->id) }}">
                          <button class="button is-warning is-fullwidth mb-1">
                            Unban
                          </button>
                        </a>
                      @endif
                    </p>
                  </div>
                  @endif

                  @if (auth()->user()->role >= 2 && auth()->user()->id != $profile->id)
                    <div class="field">
                      <p class="control">
                        @if ($profile->role == 0)
                        <a href="{{ route('postAdminUser', $profile->id) }}">
                          <button class="button is-info is-fullwidth mb-1">
                            Make Admin
                          </button>
                        </a>
                        @else
                        <a href="{{ route('postUnadminUser', $profile->id) }}">
                          <button class="button is-info is-fullwidth mb-1">
                            Unmake Admin
                          </button>
                        </a>
                        @endif
                      </p>
                    </div>
                  @endif
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
                    <h3 class="is-size-5 title">Zapraćeni artikli</h3>
                    @foreach($subscribedArticles as $subscribedArticle)
                      <div class="field has-background-dark">
                          <p class="has-icons-right">
                              <span class="is-pulled-left">
                                  Artikal:
                                  <a href="{{ route("viewArticle", $subscribedArticle->id) }}" class="mr-5">{{ $subscribedArticle->title }}</a>
                              </span>
                            
                              @if(auth()->user()->id == $profile->id)
                                <a href="{{ route("unsubscribe", $subscribedArticle->id) }}">
                                  <span class="icon is-small is-right is-pulled-right">
                                    <i class="fas fa-trash mr-1"></i>
                                </a>
                              @endif
                            </p>
                      </div>
                     <br/>
                      <br/>
                    @endforeach
                    <br/>
  
                  </div>
                  <div id="delivery-information" class="is-hidden">
                    <h3 class="is-size-5 title">Kuponi</h3>
                    @foreach($coupons as $coupon)
                      <div class="field has-background-dark">
                        <p class="has-icons-right">
                          <span class="is-pulled-left">
                              ID kupona:
                              <a class="mr-5">{{ $coupon->coupon_id }}</a>
                              Popust:
                              <a class="">{{ $coupon->discount_amount }}%</a>
                            </span>
                              @if(auth()->user()->role >= 1)
                              <a href="{{ route("removeCoupon", $coupon->coupon_id) }}">
                                <span class="icon is-small is-right is-pulled-right">
                                  <i class="fas fa-trash mr-1"></i>
                              </a>
                            @endif

                        </p>
                    </div>
                    <br/>
                    <br/>
                  @endforeach 
                  <br/>
                  </div>
                </div>
              </div>
             </form>
        </div>
     </div>

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

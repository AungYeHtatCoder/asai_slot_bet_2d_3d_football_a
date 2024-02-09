@extends('user.layouts.app')

@section('content')
<!-- CAROUSEL START -->
<div class="" style="margin-top: 60px; padding-top: 10px">
  <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade px-2" data-bs-ride="carousel">
    <div class="carousel-inner">
      @foreach ($banners ?? "" as  $banner)
      <div class="carousel-item {{ $banners[0] ? 'active' : '' }}">
        <img src="{{ $banner->img_url }}" style="max-height: 500px" class="d-block w-100" alt="..." />
        <div class="marquee">
                <small class="marquee-text d-block py-1">
                  {{ $bannerText->text }}
                </small>
              </div>
      </div>
      @endforeach

      {{-- <div class="carousel-item">
        <img src="{{ asset('slot_app/images/banner/banner2.png') }}" style="max-height: 500px" class="d-block w-100" alt="..." />
     
      </div>
      <div class="carousel-item">
        <img src="{{ asset('slot_app/images/banner/banner3.png') }}" style="max-height: 500px" class="d-block w-100" />
        <!-- <div class="marquee">
                <div class="marquee-text">
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Dolorem ea id exercitationem. Quos consequuntur vitae soluta
                  aliquid odit temporibus beatae iste autem?
                </div>
              </div> -->
      </div> --}}
    </div>
  </div>
</div>
<!-- CAROUSEL END -->

<!-- GAME START -->
<div class="game mt-5">
  <div>
    <div class="game-content-title" id="hotgames">
      <span>
        <img src="{{ asset('slot_app/images/hotgame.png') }}" alt="hotgame" style="width: 30px; height: 30px" class="ms-2" />
        ဟော့ဂိမ်းများ
      </span>
    </div>
    <div class="game-content mt-2">
      <div class="row mx-1">
        @foreach ($hotGames as $game)
        <div class="col-4">
          <a href="#" class="text-decoration-none">
          <img src="{{ asset('game_logo/'.$game->image) }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">{{$game->name_en}}</span>
          </a>
        </div>
        @endforeach
    </div>
  </div>
  @foreach ($gameTypes as $types)

  <div class="mt-3" >
    <div class="game-content-title">
      <span style="font-size: 16px">
        <img src="{{ asset('slot_app/images/icon').'/'.$types->icon }}" alt="livecasino" style="width: 30px; height: 30px" class="ms-2" />
        {{$types->description}}
      </span>
    </div>

    <div class="game-content mt-2" id="{{ $types->id }}">
      
        <div class="row mx-1">
        @foreach ($types->providers as $provider)
          @if($types->id == 3 || $types->id == 2 && $provider->id == 3 || $types->id == 2 && $provider->id == 7 
            || $types->id == 2 && $provider->id == 2)
          <div class="col-4 mt-4">
            <a href="{{ route('user.directGame',['provider_id' => $provider->id ,'game_type_id' => $types->id]) }}"
            class="text-decoration-none text-white">
              <img src="{{ asset('slot_app/images/gametypeicon/' . $provider->pivot->image) }}" alt="olympus"
              style="width: 100%; border-radius: 10px; display: block" />
                <span class="text-center mt-2">{{$provider->description}}</span>
            </a>
          </div>
          @else
          <div class="col-4 mt-4">
            <a href="{{ route('user.gamelist',['provider_id' => $provider->id ,'game_type_id' => $types->id]) }}"
            class="text-decoration-none text-white">
              <img src="{{ asset('slot_app/images/gametypeicon/' . $provider->pivot->image) }}" alt="olympus"
               style="width: 100%; border-radius: 10px; display: block" />
                <span class="text-center mt-2">{{$provider->description}}</span>
            </a>
          </div>
          @endif
        @endforeach
        </div>

      </div>


  </div>
@endforeach
{{--
  <!-- FISH GAME -->
  <div class="mt-3">
    <div class="game-content-title">
      <span>
        <img src="{{ asset('slot_app/images/fishgames/fishlogo.png') }}" alt="hotgame" style="width: 30px; height: 30px" class="ms-2" />
        ငါးဖမ်း
      </span>
    </div>
    <div class="game-content mt-2">
      <div class="row mx-1">
        <div class="col-4">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('slot_app/images/fishgames/fishgame1.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">JILIfishing</span>
          </a>
        </div>
        <div class="col-4">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('slot_app/images/fishgames/fishgame2.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">KA ငါးဖမ်း</span>
          </a>
        </div>
        <div class="col-4">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('slot_app/images/fishgames/fishgame3.jpg') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">CQ9 ငါးဖမ်း</span>
          </a>
        </div>
      </div>

      <div class="row mx-1 mt-2">
        <div class="col-4">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('slot_app/images/fishgames/fishgame4.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">JDB ငါးဖမ်း</span>
          </a>
        </div>
        <div class="col-4">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('slot_app/images/fishgames/fishgame5.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">FG ငါးဖမ်း</span>
          </a>
        </div>
        <div class="col-4">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('slot_app/images/fishgames/fishgame6.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">BG ငါးဖမ်း</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- LIVE CASINO -->
  <div class="mt-3">
    <div class="game-content-title">
      <span>
        <img src="{{ asset('slot_app/images/livecasino/casinologo.png') }}" alt="hotgame" style="width: 30px; height: 30px" class="ms-2" />
        LIVE Casino
      </span>
    </div>
    <div class="game-content mt-2">
      <div class="row mx-1">
        <div class="col-4">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('slot_app/images/livecasino/casino1.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">AG Live casino</span>
          </a>
        </div>
        <div class="col-4">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('slot_app/images/livecasino/casino2.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">EVO Live casino</span>
          </a>
        </div>
        <div class="col-4">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('slot_app/images/livecasino/casino3.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">DG Live casino</span>
          </a>
        </div>
      </div>

      <div class="row mx-1 mt-2">
        <div class="col-4">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('slot_app/images/livecasino/casino4.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">BBIN Live casino</span>
          </a>
        </div>
        <div class="col-4">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('slot_app/images/livecasino/casino5.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">BG Live casino</span>
          </a>
        </div>
        <div class="col-4">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('slot_app/images/livecasino/casino6.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">CQ9 Live casino</span>
          </a>
        </div>
      </div>

      <div class="row mx-1 mt-2">
        <div class="col-4">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('slot_app/images/livecasino/casino7.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">AE Live casino</span>
          </a>
        </div>
        <div class="col-4">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('slot_app/images/livecasino/casino8.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">OG Live casino</span>
          </a>
        </div>
        <div class="col-4">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('slot_app/images/livecasino/casino9.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">WM Live casino</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- SPORT -->
  <div class="mt-3">
    <div class="game-content-title">
      <span>
        <img src="{{ asset('slot_app/images/sport/sportlogo.png') }}" alt="hotgame" style="width: 30px; height: 30px" class="ms-2" />
        SPORT
      </span>
    </div>
    <div class="game-content mt-2">
      <div class="row mx-1">
        <div class="col-4">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('slot_app/images/sport/sport1.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">BTI အားကစား</span>
          </a>
        </div>
        <div class="col-4">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('slot_app/images/sport/sport2.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">Saba အားကစား</span>
          </a>
        </div>
        <div class="col-4">
          <a href="#" class="text-decoration-none">
            <img src="{{ asset('slot_app/images/sport/sport3.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
            <span class="text-center">UG အားကစား</span>
          </a>
        </div>
      </div>
    </div>
  </div>

    <!-- ကဒ်ဂိမ်း -->
    <div class="mt-3">
        <div class="game-content-title">
        <span>
            <img src="{{ asset('slot_app/images/card/cardlogo.png') }}" alt="hotgame" style="width: 30px; height: 30px" class="ms-2" />
            ကဒ်ဂိမ်း
        </span>
        </div>
        <div class="game-content mt-2">
        <div class="row mx-1">
            <div class="col-4">
            <a href="#" class="text-decoration-none">
                <img src="{{ asset('slot_app/images/card/card1.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
                <span class="text-center">FG ကဒ်ဂိမ်း</span>
            </a>
            </div>
            <div class="col-4">
            <a href="#" class="text-decoration-none">
                <img src="{{ asset('slot_app/images/card/card2.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
                <span class="text-center">KS စစ်တုရင်ကစားနည်း</span>
            </a>
            </div>
            <div class="col-4">
            <a href="#" class="text-decoration-none">
                <img src="{{ asset('slot_app/images/card/card3.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
                <span class="text-center">V8 စစ်တုရင်နှင့်ကတ်များ</span>
            </a>
            </div>
        </div>
        </div>
    </div>

    <!-- Esports -->
    <div class="mt-3">
        <div class="game-content-title">
        <span>
            <img src="{{ asset('slot_app/images/esport/esportlogo.png') }}" alt="hotgame" style="width: 30px; height: 30px" class="ms-2" />
            Esports
        </span>
        </div>
        <div class="game-content mt-2">
        <div class="row mx-1">
            <div class="col-4">
            <a href="#" class="text-decoration-none">
                <img src="{{ asset('slot_app/images/esport/esport1.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
                <span class="text-center">TF Esports</span>
            </a>
            </div>
            <div class="col-4">
            <a href="#" class="text-decoration-none">
                <img src="{{ asset('slot_app/images/esport/esport2.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
                <span class="text-center">IM Esports</span>
            </a>
            </div>
        </div>
        </div>
    </div>

    <!-- ကြက်တိုက်ခြင်း။ -->
    <div class="mt-3">
        <div class="game-content-title">
        <span>
            <img src="{{ asset('slot_app/images/chickenfight/chickenfightlogo.png') }}" alt="hotgame" style="width: 30px; height: 30px" class="ms-2" />
            ကြက်တိုက်ခြင်း။
        </span>
        </div>
        <div class="game-content mt-2">
        <div class="row mx-1">
            <div class="col-4">
            <a href="#" class="text-decoration-none">
                <img src="{{ asset('slot_app/images/chickenfight/chicken1.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
                <span class="text-center">SV388ကြက်တိုက်ပွဲ</span>
            </a>
            </div>
        </div>
        </div>
    </div>

    <!-- ထီ -->
    <div class="mt-3">
        <div class="game-content-title">
        <span>
            <img src="{{ asset('slot_app/images/lottery/lottorylogo.png') }}" alt="hotgame" style="width: 30px; height: 30px" class="ms-2" />
            ထီ
        </span>
        </div>
        <div class="game-content mt-2">
        <div class="row mx-1">
            <div class="col-4">
            <a href="#" class="text-decoration-none">
                <img src="{{ asset('slot_app/images/lottery/lottory1.png') }}" alt="olympus" style="width: 100%; border-radius: 10px; display: block" />
                <span class="text-center">BBIN ထီ</span>
            </a>
            </div>
        </div>
        </div>
    </div> --}}

</div>
<!-- GAME END -->

<!-- FOOTER INFO START-->

<!-- FOOTER INFO END-->
@include('user.layouts.sub-footer')


@endsection

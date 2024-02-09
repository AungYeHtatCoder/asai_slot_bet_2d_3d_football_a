
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel"></h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body text-white">
      <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ url('/') }}" class="text-decoration-none">
              <div class="d-flex list-card">
                <img src="{{ asset('slot_app/images/sidebaricon/all.png') }}" alt="all" />
                <p class="ps-3">အားလုံး</p>
              </div>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/#hotgames') }}" class="text-decoration-none">
              <div class="d-flex list-card">
                <img src="{{ asset('slot_app/images/hotgame.png') }}" alt="hotgame" />
                <p class="ps-3">ဟော့ဂိမ်းများ</p>
              </div>
            </a>
          </li>
        @php
          $gameTypes = App\Models\Admin\GameType::all();
        @endphp
        @foreach($gameTypes as $types)
            <li class="nav-item">
                <a href="{{ '#'.$types->id }}" class="text-decoration-none">
                    <div class="d-flex list-card">
                        <img src="{{ asset('slot_app/images/icon').'/'.$types->icon }}" alt="livecasino" style="width: 30px; height: 30px" class="ms-2" />
                        <p class="ps-3">{{$types->description}}</p>
                    </div>
                </a>
            </li>
        @endforeach
        
        
        
      </ul>
      
    </div>
</div>




